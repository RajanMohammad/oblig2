<meta charset="UTF-8">
<?php
include ('db.php');
if (isset($_POST["klassekode"])) { // sjekker om skjema er sendt inn 
$klassekode = $_POST["klassekode"];
$klassenavn = $_POST["klassenavn"];
$studiumkode = $_POST["studiumkode"];   
$sqlsetning = "INSERT INTO klasse VALUES ('$klassekode', '$klassenavn', '$studiumkode');";
mysqli_query($db, $sqlsetning) or die ("Ikke mulig å registrere data i databasen");
print ("<h2>Følgende klasse er nå registrert:</h2>");
print ("Klassekode: $klassekode <br> Klassenavn: $klassenavn <br> Studiumkode: $studiumkode <br>");
}
?>