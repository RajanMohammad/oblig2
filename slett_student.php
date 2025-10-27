<meta charset ="UTF-8">
<?php /* oblig2/slett_student.php */
/*
programmet lager et skjema for sletting av en student fra databasen
programmet sletter studenten når skjema er sendt inn    
*/
?>

<h2>Slett en student</h2>
<form method="post" action="slett_student.php" onsubmit="return bekreftSletting();">  
    <label for="brukernavn">Velg student å slette:</label>
    <select name="brukernavn" id="brukernavn">
    </select>
</form>

<?php
if (isset($_POST["brukernavn"]))
{ 
$brukernavn=$_POST ["brukernavn"];
if (!$brukernavn)
{
print ("brukernavn m&aring; fylles ut");
}
else
{
include ('db.php'); /* tilkobling til database-server utført og valg av database foretatt */

$sqlsetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
$sqlresultat=mysqli_query($db, $sqlsetning) or die ("Ikke mulig &aring; å hente data fra databasen");
$antallRader=mysqli_num_rows($sqlresultat);

if ($antallRader==0) /* studenten er ikke registert  */
{
    print ("studenten finnes ikke i databasen");
}
else
{
$sqlsetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
mysqli_query($db, $sqlsetning) or die ("Ikke mulig å slette data fra databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende student er n&aring; slettet: $brukernavn <br>");
}
}
}
?>
