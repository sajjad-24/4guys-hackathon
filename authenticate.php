<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $database = "hackoverflow";

    $conn = new mysqli($servername, $username, $password_db, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: homepage.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
    $conn->close();
} else {
    header("Location: login.php");
    exit();
}
?>
