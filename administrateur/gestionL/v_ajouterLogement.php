<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestion logement / Ajout</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h3>Ajout logement</h3>
        <a href='./v_gererLogement.php'>Retour</a><br/><br/> 
        
        <p>Vous allez enregistrer un nouveau logement</p>
        <form method="post">
            <label>Entrez le numéro de logement: <br/> <input type="text" name="numLogement" required /></label><br/>
             <label>Type de logement: <br/> <input type="text" name="typeLogement" required /></label><br/>
             <label>Description logement<br/><textarea rows="4" cols="50" placeholder="Description complète" name="descLogement" required></textarea></label>
             <br/><label>Niveau logement: <br/> <input type="number" name="nivLogement" min="0" max="4" required /></label><br/>
            <br/><input type="submit" value="Envoyer" />
        </form>
           <?php
            require 'class/class_Logement.php';
                $logement = new Logement();
               
            if(isset($_REQUEST['numLogement']) && isset($_REQUEST['typeLogement']) && isset($_REQUEST['descLogement'])&& isset($_REQUEST['nivLogement']))
            {
                $logement->ajouterTypeLogement($_REQUEST['numLogement'], $_REQUEST['typeLogement'], $_REQUEST['descLogement'], $_REQUEST['nivLogement']);
                 ?><script>alert("Le logement "+<?php echo$_REQUEST['numLogement']; ?>+" a été ajouté !");</script><?php
            }
                      
            ?>

    </body>
</html>
