<meta charset="UTF-8">
<?php /* oblig2/vis_alle_klasser.php */
/*
/*Programmet viser alle klasser i databasen
*/
include ('db.php'); /* tilkobling til database-server utført og valg av database foretatt */

$sqlSetning = "SELECT * FROM klasse;";
$sqlResultat = mysqli_query($db, $sqlsetning) or die ("Ikke mulig å hente data fra databasen");
/* SQL-setning sendt til database-serveren */
$antallRader = mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */

print ("<h2>Alle klasser</h2>");
print ("<table border='1'>");
print ("<tr> <th> Klassekode </th> <th> Klassenavn </th> <th> Studiumkode </th> </tr>");

for ($r = 1; $r <= $antallRader; $r++) {
    $rad = mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
    $klassekode = $rad["klassekode"]; /* eller klassekode = $rad[0]; */
    $klassenavn = $rad["klassenavn"]; /* eller klassenavn = $rad[1]; */
    $studiumkode = $rad["studiumkode"]; /* eller studiumkode = $rad[2]; */
    print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> <td> $studiumkode </td> </tr>");
}
print ("</table>");
?>
