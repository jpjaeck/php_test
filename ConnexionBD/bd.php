

<?php

echo 'Version PHP courante : ' . phpversion() .'<br/>';




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
             . " order by plac_id,plac_partie";

    echo($requete);    
    echo("<br/>================================================================================<br/>");    
    
    $reponse = $myBD->query($requete);

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
        print_r($donnees);
        echo('<br/><br/>');
    }

    $reponse->closeCursor(); // Termine le traitement de la requête
}

?> 

