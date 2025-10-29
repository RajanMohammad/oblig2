<meta charset ="UTF-8">
<?php /* oblig2/vis_alle_studenter.php */
/*
/*Programmet viser alle studenter i databasen
*/

include ('db.php');


$sqlsetning = "SELECT * FROM student ORDER BY etternavn;";
$sqlresultat = mysqli_query($db, $sqlsetning) or die ("Ikke mulig å hente data fra databasen");
$sqlantallRader = mysqli_num_rows($sqlresultat);


print "<h2>Alle studenter</h2>";
print "<table border='1'>";
print "<tr> <th> Studentnr </th> <th> Fornavn </th> <th> Etternavn </th> <th> Klassekode </th> </tr>";

while ($rad = mysqli_fetch_assoc($sqlresultat)) {
    $studentnr = $rad["studentnr"];
    $fornavn = $rad["fornavn"];
    $etternavn = $rad["etternavn"];
    $klassekode = $rad["klassekode"];
    print "<tr> <td> $studentnr </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td> </tr>";
}

print "</table>";
?>
