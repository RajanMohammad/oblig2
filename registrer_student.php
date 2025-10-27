<meta charset ="UTF-8">
<?php
include ('db.php');
if (isset($_POST["klassekode"])) { // sjekker om skjema er sendt inn

$brukernavn = mysqli_real_escape_string($db, $_POST["brukernavn"]);
$fornavn = mysqli_real_escape_string($db, $_POST["fornavn"]);   
$etternavn = mysqli_real_escape_string($db, $_POST["etternavn"]);
$klassekode = mysqli_real_escape_string($db, $_POST["klassekode"]);

$sqlsetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode');";
mysqli_query($db, $sqlsetning) or die ("Ikke mulig å registrere data i databasen");

print ("<h2>Følgende student er nå registrert:</h2>");
print ("Brukernavn: $brukernavn <br> Fornavn: $fornavn <br> Etternavn: $etternavn <br> Klassekode: $klassekode <br>");
}
?>