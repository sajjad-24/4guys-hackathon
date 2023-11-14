<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assignment</title>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="stylenav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .container {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        .add-button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .file-upload-form {
            float: right;
            margin-right: 50px;
            /* Adjust the margin as needed */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .upload-button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .upload-button:hover {
            background-color: #45a049;
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
        <h1 style="color: #FBE8A6">Assignments</h1>
        <form class="form-inline">
            <div>
                <div>Saturday 5th November &nbsp; </div>
            </div>

        </form>
    </nav>
    <div class="container" style="position:relative;left:200px;">
        <h1>Total Assignments Due: 5</h1>
        <h1>Next Assignment Due: November 10, 2023</h1>
        <p id="remaining-time"></p>
        <h2>Homework List</h2>
        <!-- <table>
            <tr>
                <th>Assignment</th>
                <th>Due Date</th>
                <th>Priority</th>
                <th>Satus</th>
            </tr>
            <tr>
                <td>TOC Assignment</td>
                <td>November 5, 2023</td>
                <td>Medium</td>
                <td>not done</td>
            </tr>

            <tr>
                <td>Science Project</td>
                <td>November 7, 2023</td>
                <td>High</td>
                <td>not done</td>
            </tr>
            <tr>
                <td>English Essay</td>
                <td>November 9, 2023</td>
                <td>Low</td>
                <td>not done</td>
            </tr>

        </table> -->
        <?php
        // Database connection (assuming you have a MySQL database)
        $conn = new mysqli("localhost", "root", "", "hackoverflow");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to retrieve data from the events table
        $sql = "SELECT * FROM ass";
        $result = $conn->query($sql);

        // Check if there are any records in the result set
        if ($result->num_rows > 0) {
            echo "<table border='1'>
            <tr>
                <th>Assignment</th>
                <th>Due Date</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Files</th>
            </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["dueDate"] . "</td>
                <td>" . $row["priority"] . "</td>
                <td>" . $row["status"] . "</td>
                <td><a href=files/" . $row["files"] . ">view</a></td>
                
            </tr>";
            }

            echo "</table>";
        } else {
            echo "No records found";
        }

        // Close the database connection
        $conn->close();
        ?>

        <button class="add-button">Add New Assignment</button><br>

        <form action="assinsert.php" method="post" enctype="multipart/form-data">
            <label for="recipient-name">Name:</label>
            <input id="recipient-name" name="name" type="text" required><br>

            <label for="event-date">Due Date:</label>
            <input id="event-date" name="due_date" type="date" required><br>

            <label for="end-date">Priority:</label>
            <input id="end-date" name="priority" type="text" required><br>

            <label for="end-date">Status:</label>
            <input id="end-date" name="status" type="text" required><br>

            <label for="file">File Upload:</label>
            <input type="file" id="choosefile" name="choosefile" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        // Due date of the next assignment (November 10, 2023)
        var dueDate = new Date('2023-11-10T00:00:00').getTime();

        // Update remaining time every second
        var countdownInterval = setInterval(function() {
            // Current date and time
            var currentDate = new Date().getTime();
            // Calculate the remaining time
            var timeDiff = dueDate - currentDate;

            // Calculate remaining hours, minutes, and seconds
            var remainingHours = Math.floor(timeDiff / (1000 * 60 * 60));
            var remainingMinutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
            var remainingSeconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

            // Display the remaining time
            document.getElementById('remaining-time').textContent = 'Time Left for Next Assignment: ' + remainingHours + ' hours, ' + remainingMinutes + ' minutes, ' + remainingSeconds + ' seconds';

            // Stop the countdown when the due date is reached
            if (timeDiff <= 0) {
                clearInterval(countdownInterval);
                document.getElementById('remaining-time').textContent = 'Time Left for Next Assignment: Time is up!';
            }
        }, 1000); // Update every second (1000 milliseconds)
    </script>
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

</body>

</html>