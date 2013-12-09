<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Modifier droit utilisateur</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h3>Modifier droit utilisateur</h3>
        <a href='./v_accueilGestionUtil.php'>Retour</a><br/> 
        
        <br/><br/>
        <p></p>
         <form method="post">
             <label>Pseudo de l'utilisateur: <br/>
                 <?php 
                 require 'class/class_Utilisateur.php';
                 $util = new Utilisateur();
                 $tabUtil = array();
                 $tabUtil = $util->getUtilisateur();
                 ?>
                 <input list="pseudo" value='<?php if(isset($_GET['pseudo']))echo $_GET['pseudo'];?>'>
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
             </label><br/>
             
             <label>Droit à attribuer (0 ou 1): <br/><input type="number" name="droit" min="0" max="1" required/></label>
             <br/><input type="submit" value="Changer le droit"/>
        </form>
          
        <br/>
        <br/>
        
        <?php    
            if(isset($_REQUEST['pseudo']) && isset($_REQUEST['droit']))
            {
                if($_REQUEST['droit'] == 0 || $_REQUEST['droit'] == 1 )
                {
                    $utilPresent = $util->utilPresent($_REQUEST['pseudo']);
                    if($utilPresent > 0)
                    {
                       $util->updateDroitUtil($_REQUEST['pseudo'],$_REQUEST['droit']);
                       echo '<p>Le droit de l\'utilisateur '.$_REQUEST['pseudo'].' a bien été mis à jour</p>'; 
                    }
                    else
                        echo '<p>Utilisateur inconnu</p>';
                }
                 else
                     echo '<p>Le droit de l\'utilisateur doit être soit 0 (utilisateur normal) ou 1 (administrateur).</p>';                
            }        
            
        ?>  
    </body>
</html>
