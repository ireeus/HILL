<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MONITORING";

if (isset($_POST["username"]) and $page != "registration.php"){session_start();}

//mysqli_connect($servername,$username,$password) or die(mysqli_error()."Nie mozna polaczyc sie z baza danych. Prosze chwile odczekac i sprobowac ponownie.");
//mysqli_select_db($dbname) or die(mysqli_error()."Nie mozna wybrac bazy danych.");
//$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start();
mysql_connect($servername,$username,$password) or die(mysql_error()."Nie mozna polaczyc sie z baza danych. Prosze chwile odczekac i sprobowac ponownie.");
mysql_select_db($dbname) or die(mysql_error()."Nie mozna wybrac bazy danych.");

$conn = mysqli_connect($servername, $username, $password, $dbname);
$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);


?>
