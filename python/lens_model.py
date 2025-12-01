from flask import Flask, Response, jsonify
import cv2 as cv
import numpy as np
import mediapipe as mp
import os

app = Flask(__name__)

# --------------------------------------------------------
#  ORIGINAL SCRIPT (UNCHANGED LOGIC) → ONLY MOVED INSIDE
# --------------------------------------------------------

# Initialize MediaPipe FaceMesh
mp_face_mesh = mp.solutions.face_mesh
face_mesh = mp_face_mesh.FaceMesh(
    max_num_faces=1,
    refine_landmarks=True,
    min_detection_confidence=0.5,
    min_tracking_confidence=0.5
)

# ---------------------------------
# Load Multiple Lens Images
# ---------------------------------
lens_files = ["lenses.png", "lenses1.png", "lenses2.png"]
lens_images = []
for file in lens_files:
    img = cv.imread(file, cv.IMREAD_UNCHANGED)
    if img is not None:
        lens_images.append(img)
    else:
        print(f"⚠️ Warning: '{file}' not found, skipping...")

if not lens_images:
    raise SystemExit("❌ No lens images found!")

current_lens_index = 0
lens_img = lens_images[current_lens_index]
print(f"✅ Using lens: {lens_files[current_lens_index]}")

LEFT_IRIS = [474, 475, 476, 477]
RIGHT_IRIS = [469, 470, 471, 472]
LEFT_EYE_TOP = 386
LEFT_EYE_BOTTOM = 374
RIGHT_EYE_TOP = 159
RIGHT_EYE_BOTTOM = 145

# --------------------------------------------------------
# Overlay + Helper Functions (UNCHANGED)
# --------------------------------------------------------
def overlay_transparent(background, overlay, x, y, overlay_size=None, mask=None):
    bg = background.copy()
    if overlay_size is not None:
        overlay = cv.resize(overlay, overlay_size, interpolation=cv.INTER_AREA)

    h, w, _ = overlay.shape
    rows, cols, _ = bg.shape

    if x >= cols or y >= rows:
        return bg

    y1, y2 = max(0, y), min(rows, y + h)
    x1, x2 = max(0, x), min(cols, x + w)
    overlay_y1, overlay_y2 = max(0, -y), h - max(0, (y + h) - rows)
    overlay_x1, overlay_x2 = max(0, -x), w - max(0, (x + w) - cols)

    if overlay_y1 >= overlay_y2 or overlay_x1 >= overlay_x2:
        return bg

    roi = bg[y1:y2, x1:x2]
    overlay_crop = overlay[overlay_y1:overlay_y2, overlay_x1:overlay_x2]
    alpha = overlay_crop[:, :, 3] / 255.0

    if mask is not None:
        mask = cv.resize(mask, (overlay_crop.shape[1], overlay_crop.shape[0]))
        mask = cv.GaussianBlur(mask, (5, 5), 0)
        mask = mask / 255.0
        alpha = alpha * mask

    for c in range(3):
        roi[:, :, c] = roi[:, :, c] * (1 - alpha) + overlay_crop[:, :, c] * alpha

    bg[y1:y2, x1:x2] = roi
    return bg

def eye_open_ratio(eye_top, eye_bottom, img_h, img_w):
    top = np.array([eye_top.x * img_w, eye_top.y * img_h])
    bottom = np.array([eye_bottom.x * img_w, eye_bottom.y * img_h])
    return np.linalg.norm(top - bottom)

THUMB_SIZE = 80
THUMB_MARGIN = 10
thumbnail_positions = []
button_prev = None
button_next = None

def create_thumbnail_bar(frame_w):
    global thumbnail_positions, button_prev, button_next

    thumbs = []
    thumbnail_positions = []
    for i, lens in enumerate(lens_images):
        if lens.shape[2] == 4:
            thumb_bgr = cv.cvtColor(lens[:, :, :3], cv.COLOR_BGRA2BGR)
        else:
            thumb_bgr = lens
        thumb_bgr = cv.resize(thumb_bgr, (THUMB_SIZE, THUMB_SIZE))
        thumbs.append(thumb_bgr)
        x_start = i * (THUMB_SIZE + THUMB_MARGIN)
        thumbnail_positions.append((x_start, x_start + THUMB_SIZE))

    total_w = max(frame_w, (THUMB_SIZE + THUMB_MARGIN) * len(thumbs) + 220)
    bar = np.ones((THUMB_SIZE + 60, total_w, 3), dtype=np.uint8) * 30

    button_prev = (10, 10, 90, 50)
    cv.rectangle(bar, (button_prev[0], button_prev[1]), (button_prev[2], button_prev[3]), (100, 100, 255), -1)
    cv.putText(bar, "< Prev", (20, 40), cv.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)

    button_next = (total_w - 100, 10, total_w - 10, 50)
    cv.rectangle(bar, (button_next[0], button_next[1]), (button_next[2], button_next[3]), (100, 255, 100), -1)
    cv.putText(bar, "Next >", (total_w - 90, 40), cv.FONT_HERSHEY_SIMPLEX, 0.7, (0, 0, 0), 2)

    x_offset = 120
    for i, thumb in enumerate(thumbs):
        x_start = x_offset + i * (THUMB_SIZE + THUMB_MARGIN)
        bar[10:10 + THUMB_SIZE, x_start:x_start + THUMB_SIZE] = thumb
        thumbnail_positions[i] = (x_start, x_start + THUMB_SIZE)
        cv.putText(bar, str(i + 1), (x_start + 5, THUMB_SIZE + 15),
                   cv.FONT_HERSHEY_SIMPLEX, 0.5, (255, 255, 255), 1)

    return bar

clicked_coords = [None, None]


# --------------------------------------------------------------------------
#   ✔✔✔ CONVERTED MAIN LOOP → Flask MJPEG Stream (NO LOGIC CHANGES)
# --------------------------------------------------------------------------
def generate():
    global current_lens_index, lens_img, clicked_coords

    cap = cv.VideoCapture(0)

    while True:
        ret, frame = cap.read()
        if not ret:
            break

        frame = cv.flip(frame, 1)
        rgb_frame = cv.cvtColor(frame, cv.COLOR_BGR2RGB)
        img_h, img_w = frame.shape[:2]
        results = face_mesh.process(rgb_frame)

        if results.multi_face_landmarks:
            for face_landmarks in results.multi_face_landmarks:
                mesh_points = np.array([
                    np.multiply([p.x, p.y], [img_w, img_h]).astype(int)
                    for p in face_landmarks.landmark
                ])

                left_open = eye_open_ratio(
                    face_landmarks.landmark[LEFT_EYE_TOP],
                    face_landmarks.landmark[LEFT_EYE_BOTTOM],
                    img_h, img_w
                )
                right_open = eye_open_ratio(
                    face_landmarks.landmark[RIGHT_EYE_TOP],
                    face_landmarks.landmark[RIGHT_EYE_BOTTOM],
                    img_h, img_w
                )

                if left_open > 5:
                    (l_cx, l_cy), l_radius = cv.minEnclosingCircle(mesh_points[LEFT_IRIS])
                    l_center = np.array([int(l_cx), int(l_cy)], dtype=np.int32)
                    lens_size_left = (int(l_radius * 2.2), int(l_radius * 2.2))

                    iris_mask = np.zeros((img_h, img_w), dtype=np.uint8)
                    cv.fillConvexPoly(iris_mask, mesh_points[LEFT_IRIS], 255)

                    frame = overlay_transparent(
                        frame, lens_img,
                        int(l_center[0] - lens_size_left[0] // 2),
                        int(l_center[1] - lens_size_left[1] // 2),
                        lens_size_left,
                        mask=iris_mask[
                            int(l_center[1] - lens_size_left[1] // 2):int(l_center[1] + lens_size_left[1] // 2),
                            int(l_center[0] - lens_size_left[0] // 2):int(l_center[0] + lens_size_left[0] // 2)
                        ]
                    )

                if right_open > 5:
                    (r_cx, r_cy), r_radius = cv.minEnclosingCircle(mesh_points[RIGHT_IRIS])
                    r_center = np.array([int(r_cx), int(r_cy)], dtype=np.int32)
                    lens_size_right = (int(r_radius * 2.2), int(r_radius * 2.2))

                    iris_mask = np.zeros((img_h, img_w), dtype=np.uint8)
                    cv.fillConvexPoly(iris_mask, mesh_points[RIGHT_IRIS], 255)

                    frame = overlay_transparent(
                        frame, lens_img,
                        int(r_center[0] - lens_size_right[0] // 2),
                        int(r_center[1] - lens_size_right[1] // 2),
                        lens_size_right,
                        mask=iris_mask[
                            int(r_center[1] - lens_size_right[1] // 2):int(r_center[1] + lens_size_right[1] // 2),
                            int(r_center[0] - lens_size_right[0] // 2):int(r_center[0] + lens_size_right[0] // 2)
                        ]
                    )


        # UI Bar
        thumbnail_bar = create_thumbnail_bar(frame.shape[1])
        frame = np.vstack((frame, thumbnail_bar))

        cv.putText(frame, f"Lens: {lens_files[current_lens_index]}",
                   (10, 30), cv.FONT_HERSHEY_SIMPLEX, 0.7, (0, 255, 0), 2)

        _, jpeg = cv.imencode('.jpg', frame)
        yield (b'--frame\r\nContent-Type: image/jpeg\r\n\r\n' + jpeg.tobytes() + b'\r\n')

    cap.release()

# --------------------------------------------------------
# FLASK ROUTES
# --------------------------------------------------------
@app.route('/')
def home():
    return jsonify({"status": "Flask Running with Multi-Lens Overlay!"})

@app.route('/video_feed')
def video_feed():
    return Response(generate(),
                    mimetype='multipart/x-mixed-replace; boundary=frame')

# --------------------------------------------------------
# RUN
# --------------------------------------------------------
if __name__ == "__main__":
    app.run(host="127.0.0.1", port=5000, debug=True)
