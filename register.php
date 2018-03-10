<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><center><img src='lib/img/logo.png' width='150'></center></div>
      <div class="card-body">
<?php


$ip = $_SERVER['REMOTE_ADDR'];
if(isset($_GET['action'])) {$action = 'execute';
if ($action == 'execute')
	{ //echo 'execute ok';

	//
	include ("config.php");
	//$account_type = $_POST['account_type'];
	$username = substr(addslashes(htmlspecialchars($_POST['username'])) , 0, 32);
	$surname =  ucfirst(strtolower($_POST['surname']));
	$name =  ucfirst(strtolower($_POST['name']));
	$password = substr(addslashes($_POST['password']) , 0, 32);
	$vpassword = substr($_POST['vpassword'], 0, 32);
	$email = substr($_POST['email'], 0, 32);
	//$vemail = substr($_POST['vemail'], 0, 32);
	$username = trim($username);
	
	
	//echo $username.'<br>';
	//echo $surname.'<br>';
	//echo $name.'<br>';
	//echo $password.'<br>';
	//echo $vpassword.'<br>';
	//echo $email.'<br>';
	
	
	
	
	
	// several checks of username and email 
	$query1 = "SELECT COUNT(*) FROM `USERS` USERS WHERE USERNAME='$username' LIMIT 1";
	$query2 = "SELECT COUNT(*) FROM `USERS` USERS WHERE EMAIL='$email' LIMIT 1";
	$spr1 = mysqli_fetch_array(mysqli_query($link,$query1)); //checkinhg if username exists 
	$spr2 = mysqli_fetch_array(mysqli_query($link,$query2)); // checking if email exists
	$pos = strpos($email, "@");
	$pos2 = strpos($email, ".");
	$emailx = explode("@", $email);
	
	

	$warning = '';
	$spr4 = strlen($username);
	$spr5 = strlen($password);

	// CHECKING WHAT WAS DONE INCORRECTLY 
	if (!$username || !$email || !$password || !$vpassword )
		{
		$warning.= '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>You need to fill out all fields<br /></div>';
		}

	if ($spr4 < 4)
		{
		$warning.= '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>The username needs to be at least 4 characters long.<br /></div>';
		}

	if ($spr5 < 4)
		{
		$warning.= '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>The password needs to be at least 4 characters long.<br /></div>';
		}

	if ($spr1[0] >= 1)
		{
		$warning.= '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>This username already exist.<br /></div>';
		}

	if ($spr2[0] >= 1)
		{
		$warning.= '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>This e-mail is taken!<br /></div>';
		}

	

	if ($password != $vpassword)
		{
		$warning.= '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>Passwords don\'t match<br /></div>';
		}

	if ($pos == false OR $pos2 == false)
		{
		$warning.= '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>Incorrect e-mail<br /></div>';
		}



	// If there is something wrong, locks the registration and shows errors

	if ($warning)
		{
		echo $warning;
		}
	  else
		{

		// if everything is ok adds the user to the database and shows information 
 

		$username = str_replace(' ', '', $username);
		$password = md5($password); //Password encryption
		$share = md5($username); //username encryption for sharing purpose
		$token_char = $email . 'activation' . $username;
		$token = md5($token_char);

		// inserts user data to USERS and ADDRESS tables
		//$query3 = "INSERT INTO `USERS` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `NAME`, `SURNAME`, `ACTIVATION`, `IP`) VALUES (NULL, '$username', '$password', '$email', '$name', '$surname', ''$token, '$ip')";
        $query3 = "INSERT INTO `serversv_MONITORING`.`USERS` (`USERNAME`, `PASSWORD`, `EMAIL`, `NAME`, `SURNAME`, `ACTIVATION`, `IP`) VALUES ('$username','$password','$email', '$name', '$surname','$token','$ip')";

		mysqli_query($conn, $query3) or die("Error: 0001");// Error: 0001 unable to register in USERS table
		//mysql_query("INSERT INTO `serversv_shouse`.`ADDRESS` (`USERNAME`) VALUES ('$username')") or die("Error: 0002"); // Error: 0002 unable to register in ADDRESS table

		/*
		//Checking the values added to the database
		echo $username.'<br>';
		echo $email.'<br>';
		echo $password.'<br>';
		echo $token.'<br>';
		echo $ip.'<br>';
		*/
	
	
		// Sending activation link

		$message = 'Activation link';
		$email = $_POST['email'];
		$link = ' http://servers.vxm.pl/HILL/activation.php?id=' . $token . '';
		$msg = '' . $message . '' . $link . '';
		$emailfrom = 'ireeus@gmail.com';
		$headers = 'Account activation :' . ' ' . $emailfrom . '' . "\r\n";
		mail($email, $headers, "Account activation.", $msg);
		echo ' <div class="alert alert-success">
  <strong>Success!</strong> Your account <span style="color: red; font-weight: bold;">' . $username . ' </span> was registred. To continue, you need to activate your account. Please check your email (spam folder) for activation link.</span>
</div>
 <br /><br /><br /><br /><br /><br /><br />';
 $status = '1';
 
 mysqli_close($link);
 
		}
	}}
if (isset($status) === '1') {echo'ok <br><br> ';}
elseif (isset($status) !='1' ) {
	if (isset($_POST['username']) and isset($_POST['email']) and isset($_POST['vemail'])) {$username = $_POST['username']; $email = $_POST['email']; $vemail = $_POST['vemail'];
	echo '

	

<tr><td colspan="2" align="center"><input type="submit"  class="btn btn-info" value="Register"><br><br><a href="sign-in.php"> Sign in </a><br><br><br><br><br><br><br></td></tr>
</table></form>

       <form method="post" action="register.php?action=register">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputUsername">Username</label>
                <input class="form-control" maxlength="18" id="InputUsername" name="username" value="'.$username.'" type="text" aria-describedby="nameHelp" placeholder="Username" required>
              </div>
              
            </div>
          </div> 
		<div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputName">Name</label>
                <input class="form-control" maxlength="32" id="InputName" name="name" type="text" placeholder="Name" required>
              </div>
              <div class="col-md-6">
                <label for="InputSurname">Surname</label>
                <input class="form-control" maxlength="32" id="InputSurname" name="surname" type="text" placeholder="Surname" required>
              </div>		  
		  </div>
          </div>
		  
		  
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputPassword1">Password</label>
                <input class="form-control" maxlength="32" id="InputPassword1" name="password" type="password" placeholder="Password" required>
              </div>
              <div class="col-md-6">
                <label for="ConfirmPassword">Confirm password</label>
                <input class="form-control" maxlength="32" id="ConfirmPassword" name="vpassword" type="password" placeholder="Confirm password" required>
              </div>		  
		  </div>
          </div>
		  
          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input class="form-control" maxlength="50" name="email" id="InputEmail1" type="email" value="'.$email.'" aria-describedby="emailHelp" placeholder="Email" required>
          </div>
         

            
		  <button type="submit" class="btn btn-primary btn-block">Register</button>
        
        </form>



'
;
	
	
	}

else	
	echo '        <form method="post" action="register.php?action=register">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputName">Username</label>
                <input class="form-control" maxlength="18" id="InputName" name="username" type="text" aria-describedby="nameHelp" placeholder="Username" required>
              </div>
              
            </div>
          </div> 
		  	<div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputName">Name</label>
                <input class="form-control" maxlength="32" id="InputName" name="name" type="text" placeholder="Name" required>
              </div>
              <div class="col-md-6">
                <label for="InputSurname">Surname</label>
                <input class="form-control" maxlength="32" id="InputSurname" name="surname" type="text" placeholder="Surname" required>
              </div>		  
		  </div>
          </div>
		  
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputPassword1">Password</label>
                <input class="form-control" maxlength="32" id="InputPassword1" name="password" type="password" placeholder="Password" required>
              </div>
              <div class="col-md-6">
                <label for="ConfirmPassword">Confirm password</label>
                <input class="form-control" maxlength="32" id="ConfirmPassword" name="vpassword" type="password" placeholder="Confirm password" required>
              </div>		  
		  </div>
          </div>
		  
          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input class="form-control" maxlength="50" id="InputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Email" required>
          </div>
         

            
		  <button type="submit" class="btn btn-primary btn-block">Register</button>
        
        </form>
		
'
;}
	//echo $token;

?>
	  
	  
		
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
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
