<?php

if (isset($_POST['pass']))
{

    $password = $_POST['pass'];

    //vérifier les caractères autorisés :  [a-z]  [A-Z]  [0-9]  [*+-/_]
    // taille entre 5 et 10 caractères
    $flagPasswordOK = false;
    if (preg_match('#^[a-zA-Z0-9*+-/_]{5,10}$#', $password))
    {
        echo('1er vérif ok...<br/>');
        //vérifier si mot de passe contient bien,
        // a-z : doit inclure au moins 1 miniscule
        // A-Z : doit inclure au moins 1 majuscule
        // 0-9 : doit inclure au moins 1 chiffre
        // \W : doit inclure au moins 1 caractère spécial
        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password))
        {
            $flagPasswordOK = true;
            echo('2ème vérif ok...<br/>');
        }
	}

    if($flagPasswordOK)
    {
        echo('Mot de passe conforme...');

        // Blowfish cryptage
        //==================
        // blowfish_salt
        // $2y=blowfish et $10=degre de cryptage
        $blowfish_salt = "$2y$10$".bin2hex(openssl_random_pseudo_bytes(10)).'$' ;
        // cryptage blowfish
        $passwordCrypte =crypt($password, $blowfish_salt);

        // affichage du résultat
        echo '<p>password crypté = ' . $passwordCrypte . '</p>';
        echo('$blowfish_salt = ' . $blowfish_salt);

    }
    else
    {
        ?>
        <p>
                <strong>Mot de passe non conforme !!!</strong> <br/>
                Caractères autorisés :
                caractères alphanumériques et les caractères  * / + - _ <br/>
                Contraintes :
                <ul>
                    <li> taille entre 5 et 10 caractères.</li>
                    <li> Au moins un caractère numérique.</li>
                    <li> Au moins une lettre en minuscule.</li>
                    <li> Au moins une lettre en majuscule.</li>
                    <li> Au moins l'un des caractères suivants : * / + - _ </li>
                </ul>

        </p>
        <?php
	}


}

else // On n'a pas encore rempli le formulaire
{
?>
Version 0.2.21
<p>Saisir password à crypter.</p>

<form method="post">
    <p>
        password : <input type="text" name="pass"><br /><br />

        <input type="reset" value="RAZ">
        <input type="submit" value="Crypter">
    </p>
</form>

<?php

}
?>
