<meta charset ="UTF-8">
<?php /* oblig2/slett_student.php */
/*
programmet lager et skjema for sletting av en student fra databasen
programmet sletter studenten når skjema er sendt inn    
*/
?>

<script src="funksjoner.js"> </script>

<h2>Slett student</h2>
<form method="post" id="slettStudent" name="slettStudent" onSubmit="return bekreft()">
    Velg klasse <select id="brukernavn" name="brukernavn" required>
        <?php $sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("kunne ikke hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

        for ($r=1;$r<=$antallRader;$r++) {
            $rad=mysqli_fetch_array($sqlResultat);
            $brukernavn=$rad["brukernavn"];
            $fullnavn = $rad["fornavn"] . " " . $rad["etternavn"];
            print ("<option value='$brukernavn'>$brukernavn | $fullnavn</option>");
        }
        ?>
        </select><br>
    <input type="submit" value="Slett student" id="slettStudentKnapp" name="slettStudentKnapp">
</form>

<?php
if (isset($_POST ["slettStudentKnapp"])) {

    $brukernavn=$_POST ["brukernavn"];

    $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
    mysqli_query($db,$sqlSetning) or die ("kan ikke slette data i databsen");
    print ("Studenten $fullnavn er nå slettet!");
}
?>
