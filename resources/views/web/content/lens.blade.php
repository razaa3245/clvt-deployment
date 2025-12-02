<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Eye Lens Filter</title>
    <style>
        /* Reset and body styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            background-color: #111;
            overflow: hidden;
        }

        /* Background video */
        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -2;
        }

        /* Dark overlay */
        #bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: -1;
        }

        /* Header */
        h1 {
            margin-top: 60px;
            font-size: 48px;
            text-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
        }

        /* Buttons */
        button {
            margin: 15px 10px;
            padding: 12px 25px;
            font-size: 18px;
            font-weight: bold;
            border: 2px solid #31d2f7;
            border-radius: 25px;
            background: linear-gradient(90deg, #31d2f7, #0fb8f3);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 255, 255, 0.3);
        }

        button:hover {
            transform: scale(1.1);
            background: linear-gradient(90deg, #0fb8f3, #31d2f7);
            box-shadow: 0 6px 20px rgba(0, 255, 255, 0.5);
        }

        /* Video container */
        #video-container {
            margin-top: 40px;
        }

        img {
            border: 3px solid #31d2f7;
            border-radius: 20px;
            width: 720px;
            height: 540px;
            box-shadow: 0 8px 25px rgba(0, 255, 255, 0.4);
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.03);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 36px;
            }
            img {
                width: 90%;
                height: auto;
            }
            button {
                font-size: 16px;
                padding: 10px 20px;
            }
        }
    </style>
</head>

<body>

<!-- Background video -->
<video autoplay muted loop playsinline id="bg-video">
    <source src="images/Background_video.mp4" type="video/mp4">
</video>

<!-- Blur dark overlay -->
<div id="bg-overlay"></div>

<h1>Real-Time Eye Lens Filter</h1>

<button onclick="fetch('/prev_lens')">Previous Lens</button>
<button onclick="fetch('/next_lens')">Next Lens</button>

<div id="video-container">
    <img src="http://127.0.0.1:5000/video_feed" alt="Real-Time Video Stream">
</div>

</body>
</html>
