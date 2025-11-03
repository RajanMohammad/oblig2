    <meta charset ="UTF-8">
    <?php /* oblig2/slett_klasse.php */
    /*
    /*Programmet lager et skjema for sletting av en klasse fra databasen
    /*Programmet sletter klassen når skjema er sendt inn    
    */

    ?>

    <script src="funksjoner.js"></script>

    <h2>Slett en klasse</h2>

   
<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return
bekreft()">
Emne <select name="klassekode" id="klassekode">
<?php print("<option value=''>velg klasse </option>");
include("dynamiske-funksjoner.php"); listeboksEmnekode(); ?>
</select> <br/>
<input type="submit" value="Slett emne" name="slettEmneKnapp" id="slettEmneKnapp" />
</form>
<?php
if (isset($_POST ["slettKlasseKnapp"]))
{
include("db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$klassekode=$_POST ["klassekode"];
if (!$klassekode)
{
print ("Det er ikke valgt noe emne");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="DELETE FROM emne WHERE klassekode='$klassekode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende emne er n&aring; slettet: $klassekode <br />");
}
}
?>

