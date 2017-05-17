
<!DOCTYPE html>
<html>
<head>
	<title>Test insertion message dans BD</title>
	<meta charset="utf-8" />
	<style> 
	</style>
	
</head>
<body>

    <p>
    <form  method="post" name="form1" action="./bd3_insert.php" style="border: 1px solid black;">
        Insertion d'un message : <br/>    
        <label for="IdSpeudo">speudo :</label>
        <input type="text" name="champSpeudo" id="idSpeudo" style="width:200px"/>
        <br/>    
        <label for="IdMessage">message :</label>
        <input type="text" name="champMessage" id="idMessage"  style="width:300px"/>
        <br/>    
        <input type="submit" value="Insertion message" />
    </form>
    </p>    

<?php
//---------------- PARTIE CODE PHP -----------------------------
// connexion à la base    
try
{
	$myBD = new PDO('mysql:host=localhost:8889;dbname=taiji_01;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


// affichage des messages 
if($myBD)
{
    
    $requete = "SELECT * FROM _tempMessage"
             . " order by timestamp";
    echo("<br/>================================================================================<br/>");    
    echo 'Version PHP courante : ' . phpversion() .'<br/>';
    echo("requête : " . $requete);
    echo("<br/>================================================================================<br/>");    

    $oQuery = $myBD->query($requete);
    // On affiche chaque ligne
    while ($donnees = $oQuery->fetch())
    {
    ?>  
        <span> <?php echo(htmlspecialchars($donnees['timestamp']) . " - "); ?> </span>
        <span> <?php echo(htmlspecialchars($donnees['speudo']). " - "); ?> </span>
        <span> <?php echo(htmlspecialchars($donnees['message']). " " ); ?> </span>
        <br/>

    <?php    
    }

    $oQuery->closeCursor(); // Termine le traitement de la requête

}

?>

</body>
</html>