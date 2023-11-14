<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!--Stylesheet-->
    <!-- <link rel="stylesheet" href="stylenav.css -->
    <link rel="stylesheet" href="stylenav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="drag.js" defer></script>
    <script src="todo.js" defer></script>

</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <a href="#">
                <img src="profileicon.jpg" alt="logo" class="logo">
            </a>
        </div>
        <nav id="sliderr">
            <li>
                <a href="homepage.php">
                    <i class="fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="far fa-calendar-alt"></i>
                    <p>Focus Mode</p>
                </a>
            </li>
            <li>
                <a href="index.php">
                    <i class="far fa-calendar-alt"></i>
                    <p>Calender</p>
                </a>
            </li>
            <li>
                <a href="navbar.php">
                    <i class="fas fa-book"></i>
                    <p>Homework</p>
                </a>
            </li>
            <li>
                <a href="assignment.php">
                    <i class="fas fa-clipboard-check"></i>
                    <p>Assignment</p>
                </a>
            </li>
     
            <li>
                <a href="setting.html">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </nav>
    </div>
    <nav style="z-index: -1; "  class="navbar navbar-dark nv justify-content-between">
        <a style="width: 100px;" class="navbar-brand"></a>
        <h1 style="color: #FBE8A6">Focus Mode</h1>
        <form class="form-inline">
            <div>
                <!-- <div id="demo"></div> -->
                        
            </div>
            
        </form>
    </nav>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pomodoro Timer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .pomodoro-box {
            background-color: #553092;
            border: 2px solid #3498db;
            border-radius: 15px;
            padding: 50px;
            margin-right: 20px;
        }

        .timer-container {
            background-color: #ffffff;
            border: 2px solid #3498db;
            border-radius: 50%;
            padding: 20px;
            width: 250px;
            height: 250px;
            position: relative;
        }

        .timer {
            font-size: 3rem;
            font-weight: bold;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .controls {
            margin-top: 20px;
        }

        .progress-container {
            background-color: #2cb337;
            border: 2px solid #3498db;
            border-radius: 15px;
            padding: 20px;
        }

        .progress {
            font-size: 2rem;
            color: white;
        }

        .goal {
            font-size: 2rem;
            color: white;
        }

        button {
            background-color: rgb(22, 20, 27);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="pomodoro-box">
            <div class="timer-container">
                <div class="timer" id="timer">25:00</div>
            </div>
            <div class="controls">
                <button id="startButton">Start</button>
                <button id="pauseButton">Pause</button>
                <button id="resetButton">Reset</button>
            </div>
        </div>

        <div class="progress-container">
            <div class="progress">Daily Progress: <span id="progressTime">0:00</span></div>
            <div class="goal">Daily Goal: 1 hour</div>
        </div>
    </div>

    <script>
        const timer = document.getElementById('timer');
        const startButton = document.getElementById('startButton');
        const pauseButton = document.getElementById('pauseButton');
        const resetButton = document.getElementById('resetButton');
        const progressTime = document.getElementById('progressTime');
        let timeLeft = 25 * 60; // 25 minutes in seconds
        let goalTime = 60 * 60; // 1 hour in seconds
        let timerInterval;
        let progressInterval;

        function updateTimerDisplay() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            const formattedTime = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            timer.innerText = formattedTime;
        }

        function updateProgressDisplay() {
            const minutes = Math.floor((goalTime - timeLeft) / 60);
            const seconds = (goalTime - timeLeft) % 60;
            const formattedTime = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            progressTime.innerText = formattedTime;
        }

        function startTimer() {
            startButton.disabled = true;
            pauseButton.disabled = false;
            resetButton.disabled = false;

            timerInterval = setInterval(function () {
                timeLeft--;
                updateTimerDisplay();
                updateProgressDisplay();

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    alert('Pomodoro completed! Take a break.');
                    resetTimer();
                }
            }, 1000);

            progressInterval = setInterval(updateProgressDisplay, 1000);
        }

        function pauseTimer() {
            startButton.disabled = false;
            pauseButton.disabled = true;
            resetButton.disabled = false;

            clearInterval(timerInterval);
            clearInterval(progressInterval);
        }

        function resetTimer() {
            startButton.disabled = false;
            pauseButton.disabled = true;
            resetButton.disabled = true;

            clearInterval(timerInterval);
            clearInterval(progressInterval);
            timeLeft = 25 * 60;
            updateTimerDisplay();
            updateProgressDisplay();
        }

        startButton.addEventListener('click', startTimer);
        pauseButton.addEventListener('click', pauseTimer);
        resetButton.addEventListener('click', resetTimer);
    </script>
</body>
</html>
           
</body>

</html>