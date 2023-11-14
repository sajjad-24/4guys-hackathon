<!DOCTYPE html>
<html>

<head>
	<title>GeniusGrind - Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<div class="container" id="container">
		<div class="form-container sign-up-container">

			<form method="POST" action="signup.php">
				<h1>Create Account</h1>
				<input type="text" name="name" placeholder="Name">
				<input type="text" name="age" placeholder="Age">
				<input type="text" name="mobile" placeholder="Mobile">
				<!-- <input type="text" name="grade" placeholder="Grade"> -->
				<input type="email" name="email" placeholder="Email">
				<input type="password" name="password" placeholder="Password">
				<button>Sign up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="authenticate.php" method="post">
				<h1>Sign In</h1>
				<label for="email" style="position:relative;text-align:left;">Email:</label>
				<input type="email" name="email" placeholder="Email">
				<label for="password">Password:</label>
				<input type="password" name="password" placeholder="Password">
				<a href="#">Forgot Your Password?</a>

				<button> <a href="homepage.php"> Sign In </a></button>
			</form>
</body>

</html>

</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>Click below to Login</p>
			<button class="ghost" id="signIn">Login In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hello!</h1>
			<p>Enter your details and sign up!</p>
			<button class="ghost" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>
<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database_name = 'hackoverflow';

$conn = new mysqli($hostname, $username, $password, $database_name);

// Check the connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$name = $_POST['name'];
	$age = $_POST['age'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Hash the password (use appropriate hashing algorithm, e.g., password_hash())
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	// Prepare SQL insert statement
	$sql = "INSERT INTO users (name, age, mobile, email, password) VALUES ('$name', '$age', '$mobile', '$email', '$hashed_password')";

	// Execute SQL statement
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the database connection
	$conn->close();
}
?>
<!-- <?php
		$hostname = 'localhost';
		$username = 'root';
		$password = '';
		$database_name = 'hackoverflow';

		$conn = new mysqli($hostname, $username, $password, $database_name);
		$email = $_POST["email"];
		$password = $_POST["password"];

		$sql = mysqli_query($conn, "SELECT count(*) as total from users WHERE email = '" . $email . "' and  password = '" . $password . "'");

		$row = mysqli_fetch_array($sql);

		if ($row["total"] > 0) {
			header("Location: homepage.php");
			// exit();
		} else {
		?>
    <script>
        alert('Login failed');
    </script>
    <?php
		}

		// Close the connection
		$conn->close();
	?> -->

</body>

</html>