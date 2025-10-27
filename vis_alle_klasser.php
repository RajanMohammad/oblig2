<meta charset="UTF-8">
<?php
include ('db.php');

$sqlsetning = "SELECT * FROM klasse order by klassekode;";
$sqlresultat = mysqli_query($db, $sqlsetning) or die ("Ikke mulig å hente data fra databasen");
$antallRader = mysqli_num_rows($sqlresultat);

print ("<h2>Alle klasser</h2>");
print ("<table border='1'>");
print ("<tr> <th> Klassekode </th> <th> Klassenavn </th> <th> Studiumkode </th> </tr>");

for ($r = 1; $r <= $antallRader; $r++) {
    $rad = mysqli_fetch_array($sqlresultat);
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
$studiumkode = $rad["studiumkode"];
    print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> <td> $studiumkode </td> </tr>");
}
print ("</table>");
?>