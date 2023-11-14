<?php  

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "hackoverflow";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$name = $_POST["name"];
$age = $_POST["age"];
$mobile = $_POST["mobile"];
// $licno = $_POST["licno"];
$email = $_POST["email"];
$password = $_POST["password"];
$salt = "ipproject";
$password_encrypted = sha1($password.$salt);


$sql = "INSERT INTO users (name, age, mobile, email, password) 
VALUES ('$name','$age','$mobile', '$email', '$password_encrypted')";

if($conn->query($sql) === TRUE){
		header("Location: login.php");
	
}
else{
	?>
	<script>
		alert('Values did not insert');
	</script>
	<?php
}


?>




















