<meta charset ="UTF-8">
<?php
include ('db.php');

// Hent alle studenter
$sqlsetning = "SELECT * FROM student ORDER BY etternavn;";
$sqlresultat = mysqli_query($db, $sqlsetning) or die ("Ikke mulig å hente data fra databasen");

// Lag tabell
echo "<h2>Alle studenter</h2>";
echo "<table border='1'>";
echo "<tr> <th> Studentnr </th> <th> Fornavn </th> <th> Etternavn </th> <th> Klassekode </th> </tr>";

while ($rad = mysqli_fetch_assoc($sqlresultat)) {
    $studentnr = $rad["studentnr"];
    $fornavn = $rad["fornavn"];
    $etternavn = $rad["etternavn"];
    $klassekode = $rad["klassekode"];
    echo "<tr> <td> $studentnr </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td> </tr>";
}

echo "</table>";
?>