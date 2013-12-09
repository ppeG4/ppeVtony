<?php
session_start();	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        </br></br></br></br></br></br>
        <center>
        <h1>Merci de vous identifier : </h1>
        <form method="post" action="index.php">
            <label>Utilisateur :<input type="text" name="pseudo" placeholder="Pseudo" required/></br></label>
            <label>Mot de passe :<input type="password" name="mdp" placeholder="******" required/><br/></label><br/>
            <input type="submit" title="Connexion" name="online" value="Se connecter" />
        </form>
        </br></br>
        <a href="vue/Inscription_util.php">Pas encore inscrit ?</a>
        </center>   
    <?php
    
      require 'class/class_auth.php';
      if (isset($_POST['pseudo']) && isset($_POST['mdp']))
      {
              $utilisateur = new Authentification(($_POST['pseudo']),($_POST['mdp']));
              $_SESSION['pseudo']=$_POST['pseudo'];
              $utilisateur->verification();
              
      }  
	
   ?>

    </body>
</html>














