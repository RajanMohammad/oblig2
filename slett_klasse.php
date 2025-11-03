    <meta charset ="UTF-8">
    <?php /* oblig2/slett_klasse.php */
    /*
    /*Programmet lager et skjema for sletting av en klasse fra databasen
    /*Programmet sletter klassen når skjema er sendt inn    
    */

    ?>

    <script src="funksjoner.js"></script>

    <h2>Slett en klasse</h2>

   
<form method="post" id="slettKlasse" name="slettKlasse" onSubmit="return bekreft()">
    Velg klasse <select id="klasseKode" name="klasseKode" required>
        <?php $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("kunne ikke hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

        for ($r=1;$r<=$antallRader;$r++) {
            $rad=mysqli_fetch_array($sqlResultat);
            $klasseKode=$rad["klassekode"];
            print ("<option value='$klasseKode'>$klasseKode</option>");
        }
        ?>
        </select><br>
    <input type="submit" value="Slett klasse" id="slettklasseKnapp" name="slettklasseKnapp">
</form>

<?php
if (isset($_POST ["slettKlasseKnapp"]))
{
include("db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */

$klassekode=$_POST ["klassekode"];

if (!$klassekode)
{
print ("Det er ikke valgt noe klasse");
}
else
{
    
$sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende klasse er n&aring; slettet: $klassekode <br />");
}
}
?>
