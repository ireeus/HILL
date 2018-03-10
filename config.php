<?php 
$servername = "";
$username = "";
$password = "";
$dbname = "";

if (isset($_POST["username"]) and $page != "registration.php"){session_start();}

session_start();

$conn = mysqli_connect($servername, $username, $password, $dbname);
$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//mysqli_close($link);


?>
