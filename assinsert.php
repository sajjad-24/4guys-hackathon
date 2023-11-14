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
    $title = $_POST['name'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    
    $filename = $_FILES["choosefile"]["name"];
    $tempfile = $_FILES["choosefile"]["tmp_name"];
    $folder = "files/" . $filename;
    echo $filename." ".$tempfile; 

    // Database connection (assuming you have a MySQL database)
    $conn = new mysqli("localhost", "root", "", "hackoverflow");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Move uploaded file to the specified directory
    move_uploaded_file($tempfile, $folder);

    // SQL query to insert form data and file name into the database
    $sql = "INSERT INTO ass (name, dueDate, priority, status, files) VALUES ('$title', '$due_date', '$priority', '$status', '$filename')";

    if ($conn->query($sql) === TRUE) {
        header("Location: assignment.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
