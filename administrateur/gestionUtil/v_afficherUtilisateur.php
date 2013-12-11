<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Afficher les utilisateurs</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h3>Afficher les utilisateurs</h3>
        <a href='./v_accueilGestionUtil.php'>Retour</a><br/> 
        
        <br/><br/>
        <p>Entrez le pseudo de l'utilisateur à rechercher dans la base de donnée<br/>
        <span style='text-decoration: underline;'>Rmq</span>: Double cliquez pour avoir la liste des utilisateurs</p>
        <form method="post">
        <?php 
         require 'class/class_Utilisateur.php';     
         $util = new Utilisateur();
         $tabUtil = array();
         $tabUtil = $util->getUtilisateur();
         ?>
        
            <label for='pseudo'>Pseudo: </label><input list="pseudo" name="pseudo" required="">
        <datalist id="pseudo">
         <?php
         foreach ($tabUtil as $tab)
         {
         ?>
            <option value="<?php echo $tab;?>">
        <?php
    
         }          
         ?> 
         </datalist>
         <br/>
            <input type="submit" value="Envoyer" />
        </form> 
        
           
        <br/>  
        
        <?php
        
         $tabUtil = array();  
         if(isset($_REQUEST['pseudo']))
         {      
            $tabUtil = $util->afficherUtilisateur($_REQUEST['pseudo']); // place l'utilisateur dans un tableau
             if(empty($tabUtil))
             {
             echo "<p>Votre utilisateur n'existe pas...";
             }
             else{
                 echo "<p>ID Utilisateur: ".$tabUtil[0]."<br/>";
                 echo "Pseudo: ".$tabUtil[1]."<br/>";
                 echo "Droit de l'utilisateur: ".$tabUtil[2]."</p>";
                 echo "<p>Vous pouvez changer le droit de l'utilisateur <a href='v_modifierDroitUtil.php?pseudo=$tabUtil[1]'>ici</a></p>";
                 }    
         }
          
        ?>  
    </body>
</html>
