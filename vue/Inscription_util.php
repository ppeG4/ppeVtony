<?php
require_once("../include/head.inc.php");
?>
    <body>
        </br></br></br></br></br></br>
        <center>
        
        <h1>Création d'un compte : </h1>
        <form method="POST">
            <fieldset>
            	<legend>Formulaire de création de compte : </legend>
                
                <label for="login">Login :  </label>
                <input id="login" type="text" name="login" placeholder="Login" required/>
                <br/>
                <label for="mdp1">Mot de passe (+ de 6 caractéres svp ):</label>
                <input id='mdp1' type="password" name="mdp" placeholder="Mot de passe" required/>
                <br/>
                <label for="mdp2">Verification (+ de 6 caractéres svp ):</label>
                <input id="mdp2" type="password" name="mdp2" placeholder="Entrez à nouveau" required/>
                <br/>
                <label for="adresse">Adresse:</a>
                <input id="adresse" type="text" name="adresse" placeholder="Adresse" required/>
                <br/>
                <label for="cpt">Code Postal:</label>
                <input id="cpt" type="text" name="cp" placeholder="Code postal" required/>
                <br/>
                <label for="ville">Ville :</label>
                <input id="ville" type="text" name="ville" placeholder="Ville" required/>
                <br/>
                <br/>
                <input type="submit" value="Créer">
                <input type="button" value="Annuler" onclick="window.location='../index.php'"/>
            </fieldset>
        </form>
        </center>
    

<?php


require '../class/class_auth.php';
require '../fonction/verifInscription.php';

?>
    
    </body>
</html>
