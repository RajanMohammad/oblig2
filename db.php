<?php 

/* Programmet kobler til database-server og velger database */

$host = 'ramoh0645';
$username = 'ramoh0645';
$password = 'abf8ramoh0645';
$database = 'ramoh0645';

$db = mysqli_connect($host, $username, $password, $database) or die ("Kan ikke koble til database-serveren");
/* tilkobling til database-serveren utført */
?>
