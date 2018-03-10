<?php 
//destroying existing session
session_destroy();
session_unset();     

session_start();
$_SESSION['username'] = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
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
	 
	  
        <form  action="sign-in.php" method="post">
          <div class="form-group">
            <label for="usernameid">Username</label> <?php echo $_SESSION['username']; ?>
            <input type="name" name="username" class="form-control" id="usernameid" placeholder="name">
          </div>
          <div class="form-group">
            <label for="passwordid">Password</label>
            <input type="password" name="password" class="form-control" id="passwordid" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Me</label>
            </div>
          </div>
		  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        
        </form>
		
						
		
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
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
