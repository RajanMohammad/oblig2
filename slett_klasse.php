    <meta charset ="UTF-8">
    <?php /* oblig2/slett_klasse.php */
    /*
    /*Programmet lager et skjema for sletting av en klasse fra databasen
    /*Programmet sletter klassen når skjema er sendt inn    
    */

    ?>

    <script type="text/javascript">
     function bekfreft() {
        return confirm("Er du sikker?")
     }
</script>

    <h2>Slett en klasse</h2>

   
<form method="post" id="slettKlasse" name="slettKlasse" onSubmit="return bekreft()">
    Velg klasse <select id="klasseKode" name="klasseKode" required>
        <?php $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;"; include("db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("kunne ikke hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

        for ($r=1;$r<=$antallRader;$r++) {
            $rad=mysqli_fetch_array($sqlResultat);
            $klassekode=$rad["klassekode"];
            print ("<option value='$klassekode'>$klassekode</option>");
        }
        ?>
        </select><br>
    <input type="submit" value="Slett klasse" id="slettklasseKnapp" name="slettklasseKnapp">
</form>

<?php
if (isset($_POST ["slettklasseKnapp"])) {

    $klassekode=$_POST ["klasseKode"];

    $sqlSetning="SELECT * FROM student where klassekode='$klassekode';";
    $sqlResultat=mysqli_query($db,$sqlSetning);
    $antallRader=mysqli_num_rows($sqlResultat);

    if ($antallRader!=0) {
        print("Det finnes fortsatt studenter i klassen $klassekode. Klassen kan ikke slettes!");
    }
    else {
        $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
        mysqli_query($db,$sqlSetning) or die ("kan ikke slette data i databsen");
        print ("Klassen $klassekode er nå slettet!");
    }
}
?>
