
<!DOCTYPE html>
<html>
<head>
	<title>Test 1</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="TP2.css" />
	
</head>
<body>

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
    $requete = "SELECT * FROM _tempbillet"
             . " order by datecreation desc";
    echo("<br/>================================================================================<br/>");    
    echo 'Version PHP courante : ' . phpversion() .'<br/>';
    echo("requête : " . $requete);
    echo("<br/>================================================================================<br/>");    

    $oQuery = $myBD->query($requete);
    // On affiche chaque ligne
    while ($donnees = $oQuery->fetch())
    {
    ?>  

        <div class="news">
            <h3> 
                <?php echo(htmlspecialchars($donnees['titre'])); ?> 
                <?php echo(" le "  . htmlspecialchars($donnees['datecreation']) ); ?>
            </h3>
            <P>
                <?php echo(htmlspecialchars($donnees['contenu'])); ?> 
                <br/>
                <a href="./ListeCommentaires.php?<?php echo(htmlspecialchars($donnees['id'])); ?>" >Commentaires </a>
            </p>
         </div>


    <?php    
    }

    $oQuery->closeCursor(); // Termine le traitement de la requête

}

?>

                                 
</body>
</html>

