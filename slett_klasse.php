    <meta charset ="UTF-8">
    <?php /* oblig2/slett_klasse.php */
    /*
    /*Programmet lager et skjema for sletting av en klasse fra databasen
    /*Programmet sletter klassen når skjema er sendt inn    
    */

    ?>

    <script src="funksjoner.js"></script>

    <h2>Slett en klasse</h2>

    <form method= "post" action""id="slettKlasseSkjema name="slettKlasseSkjema" onsubmit="return bekreft();">
    Emne <select name="klassekode" id="klassekode">
    <?php print "<option value=''>Velg klassekode</option>";
    include ("include dynamiske funksjoner.php"); listeboksKlassekoder(); ?>
    </form>

    <?php

    if (isset($_POST["SlettklassekodeKnapp"]))
    { 
    $klassekode=$_POST ["klassekode"];

    if (!$klassekode)
    {
    print ("Det er ikke noe valgt");
    }
    else
    {
    include ('db.php'); /* tilkobling til database-server utført og valg av database foretatt */
    $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
    mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; slette data fra databasen");
    /* SQL-setning sendt til database-serveren */
    print ("F&oslash;lgende klasse er n&aring; slettet: $klassekode <br>");
    }
    }
    ?>
