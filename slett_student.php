<meta charset ="UTF-8">
<?php /* oblig2/slett_student.php */
/*
programmet lager et skjema for sletting av en student fra databasen
programmet sletter studenten når skjema er sendt inn    
*/
?>

<script src="funksjoner.js"> </script>

<h2>Slett student</h2>
<form method= "post" action=""id="slettStudentSkjema" name="slettStudentSkjema" onsubmit="return bekreft()">
Student
<select name="studentkode" id="studentkode">
<?php print("<option value=''>velg student </option>");
include("dynamiske-funksjoner.php"); listeboksStudentkode(); ?>
</select> <br/>
<input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>
<?php
if (isset($_POST ["slettStudentKnapp"]))
{
$studentkode=$_POST ["studentkode"];
if (!$studentkode)
{
print ("Det er ikke valgt noe student");
}
else
{
include("db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="DELETE FROM student WHERE studentkode='$studentkode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende student er n&aring; slettet: $studentkode <br />");
}
}
?>
