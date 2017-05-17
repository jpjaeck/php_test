
<!DOCTYPE html>
<html>
<head>
	<title>Test 1</title>
	<meta charset="utf-8" />
	<style> 
	</style>
	
</head>
<body>

                     

<?php
//---------------- PARTIE CODE PHP -----------------------------

echo 'Version PHP courante : ' . phpversion() .'<br/>';

$flagTypeActivite = false;
$typeActivite = "";
$strCritereTypeActivite = "";    

$flagJourSemaine = false;    
$jourSemaine = "";    
$strCritereJourSemaine = "";    

// critere type d'activite    
if (isset($_POST['typeActivite']) and (!empty($_POST['typeActivite'])) )
{
    $flagTypeActivite = true;
    $typeActivite = $_POST['typeActivite'];
    $strCritereTypeActivite = " and a1.act_type_id = :paramTypeActivite";
}
// critere jour de semaine        
if (isset($_POST['jourSemaine']) and (!empty($_POST['jourSemaine'])) )
{
    $flagJourSemaine = true;
    $jourSemaine = $_POST['jourSemaine'];
    $strCritereJourSemaine = " and p1.plac_joursemaine = :paramJourSemaine";
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
    $requete = "SELECT plac_id as identifiant,"
             . " plac_partie as partie,"
             . " plac_libelle as libelle,"
             . " act_libelle as libelle_long,"
             . " plac_joursemaine as jour,"
             . " plac_heure as heure,"
             . " plac_dureeminutes as duree,"
             . " liep_ville  as ville,"
             . " liep_libelle as lieu"
             . " FROM planning_cours as p1" 
             . " left join activite as a1 on p1.plac_activite_id = a1.act_id"
             . " left join lieu_pratique as l1 on p1.plac_lieu_id = l1.liep_id"
             . " where 1=1"        
             . $strCritereTypeActivite
             . $strCritereJourSemaine
             . " order by plac_id,plac_partie";

    echo($requete);    
    echo("<br/>================================================================================<br/>");    
    echo("critere 1 = " . $typeActivite . "   (". $strCritereTypeActivite . ")<br/>");
    echo("critere 2 = " . $jourSemaine . "   (". $strCritereJourSemaine . ")<br/>");
    echo("<br/>================================================================================<br/>");        
    
    
    $oQuery = $myBD->prepare($requete);
    if($flagTypeActivite) {
    $oQuery->bindParam(':paramTypeActivite', $typeActivite, PDO::PARAM_INT); }
    if($flagJourSemaine) {
        $oQuery->bindParam(':paramJourSemaine', $jourSemaine, PDO::PARAM_INT); }
    $oQuery->execute();

    // On affiche chaque entrée une à une
    while ($donnees = $oQuery->fetch())
    {
        print_r($donnees);
        echo('<br/><br/>');
    }

    $oQuery->closeCursor(); // Termine le traitement de la requête
}

?> 

    
</body>
</html>
