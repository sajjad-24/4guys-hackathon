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
    <style>
        .nv{
            background-color: #303C6C!important ;
        }

    </style>

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
                <a href="focus.php">
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
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </nav>
    </div>
    <nav style="z-index: -1; "  class="navbar navbar-dark nv justify-content-between">
        <a style="width: 100px;" class="navbar-brand"></a>
        <h1 style="color: #FBE8A6">Welcome back!</h1>
        <form class="form-inline">
            <div>
                <!-- <div id="demo"></div> -->
                        
            </div>
           
        </form>
    </nav>
    <?php
    $conn = new mysqli("localhost", "root", "", "hackoverflow");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve count of assignments from the events table
    $sql = "SELECT COUNT(*) as assignment_count FROM events";
    $result = $conn->query($sql);

    // Fetch the result and convert it to associative array
    $row = $result->fetch_assoc();

    // Get the assignment count
    $assignmentCount = $row['assignment_count'];
    ?>
        <div style="display: flex; justify-content: center; margin: -0px 50px; z-index: -1; background-color: #f1f1f1; padding: 20px; border-radius: 25px;">
        <div style="align-self: center; margin: 0 5px;">
                <br> <h1 id="demo1">Today  </h1>
                
            </div>
            <div style="margin: 0 100px;display: flex;align-items: center;justify-content: center;text-align: center;" id="ball1"><br> Assignment due</div>
            <div style="margin: 0 10px;display: flex;align-items: center;justify-content: center;text-align: center;" id="ball1"><br>homework due</div>
            <script>const assignmentCount = $assignmentCount;</script>
        </div>
        <div class="board" style="position: relative;left: 200px;">
            <form id="todo-form">
                <input type="text" placeholder="New TODO..." id="todo-input" />
                <button type="submit">Add +</button>
            </form>

            <div class="lanes">
                <div class="swim-lane" id="todo-lane">
                    <h3 class="heading">TODO</h3>

                    <p class="task" draggable="true">CE Assignment</p>
                    <p class="task" draggable="true">POAI Homework</p>
                    <p class="task" draggable="true">play valo</p>
                </div>

                <div class="swim-lane">
                    <h3 class="heading">Doing</h3>

                    <p class="task" draggable="true">Binge 80 hours of </p>
                </div>

                <div class="swim-lane">
                    <h3 class="heading">Done</h3>

                    <p class="task" draggable="true">
                        Watch video of a man raising a grocery store lobster as a pet
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
    const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                const weekday = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
                const d = new Date();
                let name = month[d.getMonth()];
                let day = d.getDate();
                let dayy = weekday[d.getDay()];
                // document.getElementById("demo").innerHTML = dayy+" "+name+" "+day;
                document.getElementById("demo1").innerHTML += dayy+" "+name+" "+day;
                document.getElementById("ball1").innerHTML = assignmentCount + "<br>Assignment due";

            </script> 
           
</body>

</html>