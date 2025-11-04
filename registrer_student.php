<meta charset ="UTF-8">
<?php /* oblig2/registrer_student.php */
/* 
/*Programmet lager et html-skjema for registrering av ny student i databasen
/* Programmet registrerer studenten når skjema er sendt inn
*/
?>

<h2>Registrer ny student</h2>
<form method="post" action="registrer_student.php">  
    <label for="brukernavn">Brukernavn:</label>
    <input type="text" id="brukernavn" name="brukernavn" required><br><br>
    
    <label for="fornavn">Fornavn:</label>
    <input type="text" id="fornavn" name="fornavn" required><br><br>
    
    <label for="etternavn">Etternavn:</label>
    <input type="text" id="etternavn" name="etternavn" required><br><br>
    
    <label for="klassekode">Klassekode:</label>
    <input type="text" id="klassekode" name="klassekode" required><br><br>
    
    <input type="submit" value="Registrer student">
</form>

<?php
if (isset($_POST ["brukernavn"]))
{
$brukernavn=$_POST ["brukernavn"];
$fornavn=$_POST ["fornavn"];
$etternavn=$_POST ["etternavn"];
$klassekode=$_POST ["klassekode"];

if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode)
{
print ("Alle felt m&aring; fylles ut");
}
else
{
include("db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */

$sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */

for ($r=1;$r<=$antallRader;$r++)
{
    $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra resultatet */
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];

}

if ($antallRader!=0) /* studenten er registrert fra før */
{
print ("Studenten er registrert fra f&oslashr");
}
else
{
$sqlSetning="INSERT INTO student (brukernavn,fornavn,etternavn,klassekode)
VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
/* SQL-setining sendt til database-serveren */
print ("F&oslash;lgende student er n&aring; registrert: $brukernavn $fornavn $etternavn $klassekode");
}
}
}
?>
