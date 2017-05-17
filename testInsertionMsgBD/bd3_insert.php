

<?php
//---------------- PARTIE CODE PHP -----------------------------
$flagSpeudo = false;
$strSpeudo = "";
$flagMessage = false;    
$strMessage = "";    
$strDate = date("Y-m-d H:i:s");

// champ speudo
if (isset($_POST['champSpeudo']) and (!empty($_POST['champSpeudo'])) )
{
    $flagSpeudo = true;
    $strSpeudo = $_POST['champSpeudo'];
}
// champ message        
if (isset($_POST['champMessage']) and (!empty($_POST['champMessage'])) )
{
    $flagMessage = true;
    $strMessage = $_POST['champMessage'];
}

    
try
{
	$myBD = new PDO('mysql:host=localhost:8889;dbname=taiji_01;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if($myBD)
{
    echo("<br/>================================================================================<br/>");    
    $requete = "INSERT into _tempMessage (speudo, message, timestamp)"
             . " values( :speudo, :message, :date)";
    echo($requete);    
    echo("<br/>================================================================================<br/>");    
    echo("strSpeudo = " . $strSpeudo) ;
    echo("<br/>strMessage = " . $strMessage);
    echo("<br/>strDate = " . $strDate);
    echo("<br/>================================================================================<br/>");        
    
    
    $req =$myBD->prepare($requete);
    $bExecute = $req->execute(array( 'speudo' => $strSpeudo,
                         'message' => $strMessage,
                         'date' => $strDate));
    if($bExecute)
    {
      echo("<br/> Requête bien exécutée !");
    }
}

// Redirection vers la page origine
header('Location: bd3.php');

?> 


