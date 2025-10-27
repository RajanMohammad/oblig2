    <meta charset ="UTF-8">
    <?php
    include ('db.php');
    // Hvis skjema er sendt inn, slett klassen
    if (isset($_POST["klassekode"])) {
    $klassekode = mysqli_real_escape_string($db, $_POST["klassekode"]);

    // SQL for å slette klassen
    $sqlsetning = "DELETE FROM klasse WHERE klassekode = '$klassekode';";
        mysqli_query($db, $sqlsetning) or die ("Ikke mulig å slette data fra databasen");
        echo "<h2>Følgende klasse er nå slettet:</h2>";
        echo "Klassekode: $klassekode <br>";
        echo "<a href='slett_klasse.php'>Slett en annen klasse</a><br>";
        echo "<a href='index.php'>Tilbake til hovedsiden</a>";
    }
    // Hent alle klasser for valg i skjema
    $sql_hent = "SELECT klassekode, klassenavn FROM klasse ORDER BY klassekode;";
    $resultat = mysqli_query($db, $sql_hent) or die ("Ikke mulig å hente data fra databasen");

    // Lag skjema for sletting av klasse
    echo "<h2>Slett en klasse</h2>";
    echo "<form method='post' action='slett_klasse.php'>";
    echo "<label for='klassekode'>Velg klasse å slette:</label>";
    echo "<select name='klassekode' id='klassekode'>";
    while ($rad = mysqli_fetch_assoc($resultat)) {
        $kode = $rad['klassekode'];
        $navn = $rad['klassenavn'];
        echo "<option value='$kode'>$kode - $navn</option>";
    }
    echo "</select><br><br>";
    echo "<input type='submit' value='Slett klasse'>";
    echo "</form>";
    ?>