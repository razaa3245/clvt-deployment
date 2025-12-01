<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Eye Lens Filter</title>
    <style>
        body {
            background-color: #111;
            color: white;
            text-align: center;
            font-family: Arial;
        }
        h1 {
            margin-top: 40px;
            font-size: 42px;
        }
        #video-container {
            margin-top: 40px;
        }
        img {
            border: 3px solid #31d2f7;
            border-radius: 15px;
            width: 720px;
            height: 540px;
        }
    </style>
</head>

<body>

<h1>Real-Time Eye Lens Filter</h1>
<button onclick="fetch('/prev_lens')">Previous Lens</button>
<button onclick="fetch('/next_lens')">Next Lens</button>
<div id="video-container">
    <img src="http://127.0.0.1:5000/video_feed" alt="Real-Time Video Stream">
</div>

</body>
</html>
