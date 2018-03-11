<?php 
////////////// Configuration //////////////
$page = 'activation.php';


///////////// Security /////////////
session_start();

// Connecting to database
include("config.php");
$username   = $_SESSION['username'];

// Redirecting to Sign in page if no session id found
if ($_SESSION['username'] == '') {
header("Location: login.php");
}

/* Usual SQL Queries */

$query    = "SELECT * FROM `USERS` WHERE `USERNAME` =  '$username'";
$result1  = mysqli_query($link, $query);
if (mysqli_num_rows($result1) > 0) {
while ($row = mysqli_fetch_array($result1)) {
	
$ACTIVATION = $row['ACTIVATION'];

	if($ACTIVATION!='ACTIVE') {
		$activation_code = $_POST['activation'];
	if($activation_code==$ACTIVATION) {mysqli_query($link, "UPDATE `serversv_MONITORING`.`USERS` SET `ACTIVATION` = 'ACTIVE' WHERE `USERS`.`ACTIVATION` ='$ACTIVATION'");}
	
}$result1  = mysqli_query($link, $query);
if (mysqli_num_rows($result1) > 0) {
while ($row = mysqli_fetch_array($result1)) {
if ($row['ACTIVATION'] =='ACTIVE')header("Location: index.php");{}
}
    }
   
}} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Activation</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center><img src='lib/img/logo.png' width='150'></center></div>
      <div class="card-body">
        <div class="alert alert-warning">
  <strong>Activation </strong>Please check your email for activation code and enter it below.<br></span>
<p>
  <form method="post" action="activation.php">

  
            <div class="form-row">
              <div class="col-md-6">
                
				  <p><input class="form-control" maxlength="18" id="InputActivation" name="activation"  type="text" aria-describedby="nameHelp" placeholder="Activation code" required></p> </div>
              </div>  
			<div class="form-group">			  
			  <div class="form-row">  <br /><br /><button type="submit" class="btn btn-primary btn-block">Activate</button>
			  </div>
            </div>
  </div>	

  </form></p>
 <br /><br />
      
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
