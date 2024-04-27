<!-- Database connection using PHP -->

<?php
	session_start();

	include('connectdB.php');

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$firstName = $_POST['fName'];
		$lastName = $_POST['lName'];
    $email = $_POST['email'];
    $subject = $_POST['subj'];
    $message = $_POST['msg'];

		if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($subject) && !empty($message)) {
			$query = "INSERT INTO contact (fName, lName, email, subj, msg) values (?, ?, ?, ?, ?)";
			$stmt = mysqli_prepare($conn, $query);
			mysqli_stmt_bind_param($stmt, 'sssss', $firstName, $lastName, $email, $subject, $message);
			mysqli_stmt_execute($stmt);

			echo "<script type='text/javascript'> alert('Message Sent Successfully! We will go back to you as soon as we can.')</script>";
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" id="myNavbar">
    <a href="index.html" class="w3-bar-item w3-button w3-wide"><b>PortPulse</b></a>

<!-- Right-sided navbar links -->
<div class="w3-right w3-hide-small">
  <a href="about.html" class="w3-bar-item w3-button">ABOUT US</a>
  <a href="track.html" class="w3-bar-item w3-button">TRACK</a>
  <a href="developers.html" class="w3-bar-item w3-button">DEVELOPER</a>
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
<nav class="w3-sidebar w3-bar-block w3-light-grey w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none; z-index: 9999;" id="open_sidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="index.html" onclick="w3_close()" class="w3-bar-item w3-button"><b>PortPulse</b></a>
  <a href="about.html" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-question" style="color: #435650;"></i>     ABOUT US</a>
  <a href="track.html" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-plane" style="color: #435650;"></i>     TRACK</a>
  <a href="developers.html" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user" style="color: #435650;"></i>     DEVELOPER</a>
  <a href="contact.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-envelope" style="color: #435650;"></i>     CONTACT</a>
  <a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-address-card" style="color: #435650;"></i>     ADMIN LOGIN</a>
</nav>

<!-- Contact Section -->
<section class="contact">
  <div class="row">
     <form action="" method="post" class="form was-validated">
        <h3 style="color:teal">Contact Us</h3>
        <h4 style="color:light-grey">Lets get in touch. Send us a message:</h4>
        <div class="form-group">
          <input type="text" class="box" name="fName" maxlength="20" required>
          <label for="fName">First Name</label>
        </div>

        <div class="form-group">
          <input type="text" class="box" name="lName" maxlength="20" required>
          <label for="lName">Last Name</label>
        </div>

        <div class="form-group">
          <input type="email" class="box" name="email" maxlength="20" required>
          <label for="email">Email</label>
        </div>

        <div class="form-group">
          <input type="text" class="box" name="subj" maxlength="30" required>
          <label for="subj">Subject of Concern</label>
        </div>

        <div class="form-group">
          <input type="text" class="message" name="msg" maxlength="200" required>
          <label for="msg">Message</label>
        </div>

          <button type="submit" class="inline-btn">Submit</button>
          <button type="reset" class="inline-btn">Reset</button>
     </form>

    <div class="image">
      <img src="images/logo.png" alt="PortPulse" width="100" height="450">
    </div>
  </div>

  <div class="box-container">
    <div class="box">
      <i class="fa fa-phone"></i>
      <a href="tel:0287777777">(02) 8777 7777</a>
   </div>
   
   <div class="box">
      <i class="fa fa-envelope"></i>
      <a href="mailto:portpulse@gmail.com">portpulse @gmail.com</a>
   </div>

   <div class="box">
      <i class="fa fa-plane"></i>
      <a href="https://maps.app.goo.gl/MTkdHASck1VmmtYk9">PLM, Manila, Philippines</a>
   </div>
  </div>
</div>
</section>

<!-- Footer -->
<footer class="footer">
  <h4 class="footer-dev">Developed by:</h4>
  <h4 class="footer-name">Naguit | Isidro | Opena | Fisalbon | Camus | Aquino</h4>
</footer>

<script>
	// Toggle between showing and hiding the sidebar when clicking the menu icon
  function w3_open() {
      var sidebar = document.getElementById("open_sidebar");
      if (sidebar.style.display === 'block') {
        sidebar.style.display = 'none';
      } else {
        sidebar.style.display = 'block';
      }
  }

  // Close the sidebar with the close button
  function w3_close() {
      var sidebar = document.getElementById("open_sidebar");
      sidebar.style.display = "none";
    }
</script>
</body>
</html>