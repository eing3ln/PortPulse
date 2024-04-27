<!-- Database connection using PHP -->

<?php
	session_start();

	include('connectdB.php');

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$fullName = $_POST['fName'];
		$idNumber = $_POST['idNum'];
		$userName = $_POST['username'];
		$password = $_POST['pswd'];

		if(!empty($fullName) && !empty($idNumber) && !empty($userName) && !empty($password)) {
			$query = "INSERT INTO register (fName, idNum, username, pswd) values (?, ?, ?, ?)";
			$stmt = mysqli_prepare($conn, $query);
			mysqli_stmt_bind_param($stmt, 'siss', $fullName, $idNumber, $userName, $password);
			mysqli_stmt_execute($stmt);

			echo "<script type='text/javascript'> alert('Registered Successfully!')</script>";
		}

		else {
			echo "<script type='text/javascript'> alert('Error! Please fill out all required information.')</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>PortPulse</title>
<link rel="icon" type="image/x-icon" href="images/logo.png">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
	body,h1,h2,h3,h4,h5,h6 {
		font-family: "Raleway", sans-serif
	}

	.h3 {
		text-align: center;
		padding: 128px 16px;
	}

	.body,html {
		height: 100%;
		line-height: 1.8;
	}

	.w3-bar {
		padding: 16px;
	}

	.signup {
		width: 420px;
		height: 600px;
		margin: auto;
		background: white;
		border-radius: 5px;
	}

	.footer-dev {
		margin-top:32px;
	}

	.footer-name {
		color: yellow; 
		text-align: center;
	}
</style>
</head>

<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="index.html" class="w3-bar-item w3-button w3-wide">PortPulse</a>
    
<!-- Right-sided navbar links -->
<div class="w3-right w3-hide-small">
      <a href="about.html" class="w3-bar-item w3-button">ABOUT US</a>
      <a href="track.html" class="w3-bar-item w3-button">TRACK</a>
      <a href="developers.html" class="w3-bar-item w3-button">DEVELOPERS</a>
      <a href="contact.php" class="w3-bar-item w3-button">CONTACT</a>
      <a href="login.php" class="w3-bar-item w3-button">ADMIN LOGIN</a>
    </div>

<!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="index.html" onclick="w3_close()" class="w3-bar-item w3-button">PortPulse</a>
  <a href="track.html" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT US</a>
  <a href="track.html" onclick="w3_close()" class="w3-bar-item w3-button">TRACK</a>
  <a href="developers.html" onclick="w3_close()" class="w3-bar-item w3-button">DEVELOPERS</a>
  <a href="contact.php" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button">ADMIN LOGIN</a>
</nav>

<!-- Registration Section -->
<div class="w3-container w3-teal" style="padding:64px 12px;">
	<div class="container py-5 h-100">
	<div class="row d-flex justify-content-center align-items-center h-100">
	<div class="col col-xl-10">
	<div class="card" style="border-radius: 1rem;">
	<div class="row g-0">
	<div class="col-md-6 col-lg-5 d-none d-md-block">
		<img src="images/register.jpg" alt="register form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 710px;">
	</div>
	<div class="col-md-6 col-lg-7 d-flex align-items-center">
	<div class="card-body p-4 p-lg-5 text-black">
	
	<h3>REGISTER</h3>
	<form method="POST" action="register.php" class="was-validated">

		<div class="form-floating mb-3 mt-3">
			<input type="text" class="form-control" id="fName" placeholder="Enter Full Name" name="fName" required>
			<label for="fName">Full Name</label>
			<div class="valid-feedback">Valid.</div>
		</div>

		<div class="form-floating mb-3 mt-3">
			<input type="text" class="form-control" id="idNum" placeholder="Enter Employee ID Number" name="idNum" required>
			<label for="idNum">Employee ID Number</label>
			<div class="valid-feedback">Valid.</div>
		</div>

		<div class="form-floating mb-3 mt-3">
			<input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
			<label for="username">Username</label>
			<div class="valid-feedback">Valid.</div>
		</div>

		<div class="form-floating mb-3 mt-3">
			<input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" required>
			<label for="pswd">Password</label>
			<div class="valid-feedback">Valid.</div>
		</div>

		<div class="password-checkbox" style="text-align: right; margin-top: 12px;">
			<input type="checkbox" onclick="myFunction()" style="align-right"> Show Password
		</div>

		<div class="pt-1 mb-4">
			<button class="btn btn-success btn-lg btn-block" type="submit">Register</button>
			<button class="btn btn-dark btn-lg btn-block" type="reset">Reset</button>
		</div>
	</form>

	<p>By clicking the Register Button, you agree to our 
		<a href="#">Terms and Condition</a> and <a href="#">Privacy Policy</a>
	</p>
		
	<p>Already have an account? <a href="login.php">Login here</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
	function myFunction() {
	  var x = document.getElementById("pswd");
	  if (x.type === "password") {
		x.type = "text";
	  } else {
		x.type = "password";
	  }
	}
</script>

<!-- Footer -->
<footer class="footer">
   <h4 class="footer-dev">Developed by: <h4 class="footer-name">Naguit | Isidro | Opena | Fisalbon | Camus | Aquino</h4></h4>
</footer>

</body>
</html>