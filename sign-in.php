<?php
include("config.php");

if (isset($_POST['username']) || isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = addslashes($password);
    $username = addslashes($username);
    $username = htmlspecialchars($username);
    
    if ($_GET['username'] != '') { //when someone is trying to mes up with the address to log in
        
    }
    if ($_GET['password'] != '') { //when someone is trying to mes up with the address to log in
        
    }
    
    $password = md5($password); //password encryption
	
    if (!$username OR empty($username)) {
        
        
        header("Location: login.php?item=1");die();
        
    }
    if (!$password OR empty($password)) {
        
         header("Location: sign-in.php?item=2");die();        
     
    }
	$query1 = "SELECT * FROM  `USERS` WHERE `USERNAME` = '$username' AND `PASSWORD` = '$password'";
    $istnick = mysqli_fetch_array(mysqli_query($link,$query1)); // sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
    if ($istnick[0] == 0) {
   
        header("Location: login.php?item=3");die();
        
    } else {
        
        $_SESSION['username'] = $username;
        //$_SESSION['password'] = $password;
           header("Location: index.php");

		 exit;
    }
} 



?>
