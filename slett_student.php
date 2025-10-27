<meta charset ="UTF-8">
<?php
include ('db.php');

// Hvis skjema er sendt inn, slett studenten
if (isset($_POST["brukernavn"])) { 
$brukernavn = mysqli_real_escape_string($db, $_POST["brukernavn"]);

$sql_slett = "DELETE FROM student WHERE brukernavn = '$brukernavn';";
    mysqli_query($db, $sql_slett) or die ("Ikke mulig å slette data fra databasen");
    echo "<h2>Følgende student er nå slettet:</h2>";
    echo "brukernavn: $brukernavn <br>";
    echo "<a href='slett_student.php'>Slett en annen student</a><br>";
    echo "<a href='index.php'>Tilbake til hovedsiden</a>";
}
// Hent alle studenter for valg i skjema
$sql_hent = "SELECT brukernavn, fornavn, etternavn FROM student ORDER BY etternavn";
$resultat = mysqli_query($db, $sql_hent) or die ("Ikke mulig å hente data fra databasen");

// Lag skjema for sletting av student
echo "<h2>Slett en student</h2>";
echo "<form method='post' action='slett_student.php'>";
echo "<label for='brukernavn'>Velg student å slette:</label>";
echo "<select name='brukernavn' id='brukernavn'>";
while ($rad = mysqli_fetch_assoc($resultat)) {
    $nr = $rad['brukernavn'];
    $fornavn = $rad['fornavn'];
    $etternavn = $rad['etternavn'];
    echo "<option value='$nr'>$nr - $fornavn $etternavn</option>";
}
echo "</select><br><br>";
echo "<input type='submit' value='Slett student'>";
echo "</form>";
?>