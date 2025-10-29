<meta charset ="UTF-8">
<?php /* oblig2/vis_alle_studenter.php */
/*
/*Programmet viser alle studenter i databasen
*/

include ('db.php'); /* tilkobling til database-server utført og valg av database foretatt */


$sqlsetning = "SELECT * FROM student ORDER BY etternavn;";
$sqlresultat = mysqli_query($db, $sqlsetning) or die ("Ikke mulig å hente data fra databasen");
/* SQL-setning sendt til database-serveren */
$sqlantallRader = mysqli_num_rows($sqlresultat); /* antall rader i resultatet */


print "<h2>Alle studenter</h2>";
print "<table border='1'>";
print "<tr> <th> Studentnr </th> <th> Fornavn </th> <th> Etternavn </th> <th> Klassekode </th> </tr>";

for ($r = 1; $r <= $sqlantallRader; $r++) 
    {
    $studentnr = $rad["studentnr"]; /* eller studentnr = $rad[0]; */
    $fornavn = $rad["fornavn"]; /* eller fornavn = $rad[1]; */
    $etternavn = $rad["etternavn"]; /* eller etternavn = $rad[2]; */
    $klassekode = $rad["klassekode"]; /* eller klassekode = $rad[3]; */
    print "<tr> <td> $studentnr </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td> </tr>";
}

print "</table>";
?>
