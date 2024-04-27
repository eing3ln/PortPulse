<!DOCTYPE html>
<html lang="en">

<head>
  <title>PortPulse</title>
  <link rel="icon" type="image/x-icon" href="logo.png">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

<!-- Navbar (sit on top) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand w3-wide"><b>PortPulse</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link w3-button" href="home.html">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">Customer</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="customer/create.php">Add Customer</a></li>
              <li><a class="dropdown-item" href="customer/crud-index.php">Customer Reports</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">Device</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="device/create.php">Add Device</a></li>
              <li><a class="dropdown-item" href="device/crud-index.php">Device Reports</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">Luggage</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="luggage/create.php">Add Luggage</a></li>
              <li><a class="dropdown-item" href="luggage/crud-index.php">Customer Luggage Report</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">Admin Profile</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="profile/update.php">Update Profile</a></li>
              <li><a class="dropdown-item" href="index.html">Sign out</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Dashboard of CRUD for Luggage Details -->
<div class="w3-row-padding w3-padding-36 w3-container">
  <div class="dashboard">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="mt-5 mb-3 clearfix">
                      <h1 class="pull-left">LUGGAGE DETAILS</h1>
                      <a href="create.php" class="button pull-right"><i class="fa fa-plus"></i> Add New Luggage</a>
                  </div>
                  
                  <?php
                  // Include config file
                  require_once "connectdB-crudLuggage.php";
                      
                  // Attempt select query execution
                  $sql = "SELECT * FROM luggage";
                  if($result = mysqli_query($link, $sql)) {
                      if(mysqli_num_rows($result) > 0) {
                          echo '<table class="table table-bordered table-striped">';
                              echo "<thead>";
                                  echo "<tr>";
                                      echo "<th>#</th>";
                                      echo "<th>Luggage ID Number</th>";
                                      echo "<th>Status</th>";
                                      echo "<th>Location</th>";
                                      echo "<th>Date</th>";
                                      echo "<th>QR Code</th>";
                                      echo "</tr>";
                              echo "</thead>";
                              echo "<tbody>";
                              
                              while($row = mysqli_fetch_array($result)) {
                                  echo "<tr>";
                                      echo "<td>" . $row['ID'] . "</td>";
                                      echo "<td>" . $row['Lnum'] . "</td>";
                                      echo "<td>" . $row['stat'] . "</td>";
                                      echo "<td>" . $row['loc'] . "</td>";
                                      echo "<td>" . $row['date'] . "</td>";
                                      echo "<td>" . $row['qr'] . "</td>";
                                      echo "<td>";
                                          echo '<a href="read.php?ID='. $row['ID'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye" style="font-size:24px"></span></a>';
                                          echo '<a href="update.php?ID='. $row['ID'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil" style="font-size:24px"></span></a>';
                                          echo '<a href="delete.php?ID='. $row['ID'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash" style="font-size:24px"></span></a>';
                                      echo "</td>";
                                  echo "</tr>";
                              }
                              
                              echo "</tbody>";                            
                          echo "</table>";
                          
                          // Free result set
                          mysqli_free_result($result);
                          
                      }
                      
                      else {
                          echo '<div class="alert alert-danger"><em>ERROR! No records were found..</em></div>';
                      }
                      
                  }
                  
                  else {
                      echo "Oops! Something went wrong. Please try again later.";
                  }
  
                  // Close connection
                  mysqli_close($link);
                  ?>
              </div>
          </div>        
      </div>
  </div>
</div>

<!-- Footer -->
<footer class="footer">
  <h4 class="footer-dev">Developed by: <h4 class="footer-name">Naguit | Isidro | Opena | Fisalbon | Camus | Aquino</h4></h4>
</footer>

</body>
</html>