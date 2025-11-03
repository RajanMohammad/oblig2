<?php 

/* Programmet kobler til database-server og velger database */

$host = getenv('ramoh0645');
$username = getenv('ramoh0645');
$password = getenv('abf8ramoh0645');
$database = getenv('ramoh0645');

$db = mysqli_connect($host, $username, $password, $database) or die ("Kan ikke koble til database-serveren");
/* tilkobling til database-serveren utført */
?>

