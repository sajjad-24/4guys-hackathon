<?php
// echo "hi suck my pp";
// //insert.php

// // $connect = new PDO('mysql:host=localhost;dbname=hackoverflow', 'root', '');
// $con = mysqli_connect("localhost","root","","hackoverflow");
// $title = "test1";
// $start = "2023-11-08 22:32:04.000000";
// $end = "2023-11-08 22:32:04.000000";

// if(isset($_POST["title"]))
// {

//     $q = "insert into events values('$title','$start','$end')";
//     $result = mysqli_query($con, $q);
// }
// ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $start_event = $_POST['start_event'];
    $end_event = $_POST['end_event'];

    // Database connection (assuming you have a MySQL database)
    $conn = new mysqli("localhost", "root", "", "hackoverflow");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert form data into the database
    $sql = "INSERT INTO events (title, start_event, end_event) VALUES ('$title', '$start_event', '$end_event')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
