<meta charset="UTF-8">
<?php /* oblig2/registrer_klasse.php */
/*
/*Programmet lager et html-skjema for registrering av ny klasse i databasen
/*Programmet registrerer klassen når skjema er sendt inn
*/
?>

<h2>Registrer ny klasse</h2>
<form method="post" action="registrer_klasse.php">  
    <label for="klassekode">Klassekode:</label>
    <input type="text" id="klassekode" name="klassekode" required><br><br>
    
    <label for="klassenavn">Klassenavn:</label>
    <input type="text" id="klassenavn" name="klassenavn" required><br><br>
    
    <label for="studiumkode">Studiumkode:</label>
    <input type="text" id="studiumkode" name="studiumkode" required><br><br>
    
    <input type="submit" value="Registrer klasse">
</form>

<?php
if (isset($_POST["klassekode"]))
{ 
    include ('db.php');
    
    $klassekode = mysqli_real_escape_string($db, $_POST["klassekode"]);
    $klassenavn = mysqli_real_escape_string($db, $_POST["klassenavn"]);
    $studiumkode = mysqli_real_escape_string($db, $_POST["studiumkode"]);
    
    $sqlsetning = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES ('$klassekode', '$klassenavn', '$studiumkode');";
    mysqli_query($db, $sqlsetning) or die ("Ikke mulig å registrere data i databasen");
    
    print ("<h2>Følgende klasse er nå registrert:</h2>");
    print ("Klassekode: $klassekode <br> Klassenavn: $klassenavn <br> Studiumkode: $studiumkode <br>");
}
?>
