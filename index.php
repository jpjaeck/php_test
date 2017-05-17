<!DOCTYPE html>
<html>
<head>
	<title>Test 1</title>
	<meta charset="utf-8" />
	<style> 
	</style>
	
</head>
<body>
    <h1>
    Page tools & cie
    </h1>
    
    <p> >> 
       <a href="./CrypterMotPasse/crypterMotPasse.php"> Crypter mot de passe </a>
    </p>    

    <p> >> 
       <a href="./ConnexionBd/bd.php"> Connexion à la base de données + requête </a>
    </p>    

    <br/>
    <p> >> 
    Connexion à la base de données + requête avec liste déroulante 
    <form  method="post" name="form1" action="./ConnexionBd/bd2.php">
        <select name="typeActivite">
            <option value="" selected></option>
            <option value="1">Taiji quan</option>
            <option value="2">Qi gong</option>
        </select>     
        <select name="jourSemaine">
            <option value="" selected></option>
            <option value="1">Lundi</option>
            <option value="2">Mardi</option>
            <option value="3">Mercredi</option>
            <option value="4">jeudi</option>
            <option value="5">vendredi</option>
            <option value="6">samedi</option>
            <option value="7">dimanche</option>
        </select>
        <input type="submit" value="Voir résultat" />
    </form>
    </p>    
    <br/>
    
    <p> >> 
       <a href="./testInsertionMsgBD/bd3.php"> Insertion d'un message dans BD </a>
    </p>    

    <p> >> 
       <a href="./test_TP2/ListeBillets.php"> TP2 </a>
    </p>    
    
                             
</body>
</html>
