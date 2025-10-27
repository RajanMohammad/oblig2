    <meta charset ="UTF-8">
    <?php /* oblig2/slett_klasse.php */
    /*
    /*Programmet lager et skjema for sletting av en klasse fra databasen
    /*Programmet sletter klassen når skjema er sendt inn    
    */

    ?>

    <h2>Slett en klasse</h2>
    <form method="post" action="slett_klasse.php" onsubmit="return bekreftSletting();">  
        <label for="klassekode">Velg klasse å slette:</label>
        <select name="klassekode" id="klassekode">
    </form>

    <?php
    if (isset($_POST["klassekode"]))
    { 
    $klassekode=$_POST ["klassekode"];

    if (!$klassekode)
    
    {
    print ("klassekode m&aring; fylles ut");
    }
    else
    {
    include ('db.php'); /* tilkobling til database-server utført og valg av database foretatt */
    $sqlsetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
    $sqlresultat=mysqli_query($db, $sqlsetning) or die ("Ikke mulig å slette data fra databasen");
    $antallRader=mysqli_num_rows($sqlresultat);

    if ($antallRader==0) /* klassen er ikke registert  */
    {
    print ("klassen finnes ikke i databasen");
    }
    else
    {
    $sqlsetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
    mysqli_query($db, $sqlsetning) or die ("Ikke mulig &aring; slette data fra databasen");
    /* SQL-setning sendt til database-serveren */

    print ("F&oslash;lgende poststed er n&aring; slettet: $klassekode <br>");
    }
    }
    }
?>   

