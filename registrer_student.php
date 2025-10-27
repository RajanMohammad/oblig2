<meta charset ="UTF-8">
<?php /* oblig2/registrer_student.php */
/* 
/*Programmet lager et html-skjema for registrering av ny student i databasen
/* Programmet registrerer studenten når skjema er sendt inn
*/
?>

<h2>Registrer ny student</h2>
<form method="student" action="registrer_student.php">  
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
if (isset($_POST["brukernavn"]))
{ 
    include ('db.php');
    
    $brukernavn = mysqli_real_escape_string($db, $_POST["brukernavn"]);
    $fornavn = mysqli_real_escape_string($db, $_POST["fornavn"]);
    $etternavn = mysqli_real_escape_string($db, $_POST["etternavn"]);
    $klassekode = mysqli_real_escape_string($db, $_POST["klassekode"]);
    
    $sqlsetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode');";
    mysqli_query($db, $sqlsetning) or die ("Ikke mulig å registrere data i databasen");
    
    print ("<h2>Følgende student er nå registrert:</h2>");
    print ("Brukernavn: $brukernavn <br> Fornavn: $fornavn <br> Etternavn: $etternavn <br> Klassekode: $klassekode <br>");
}
?>

