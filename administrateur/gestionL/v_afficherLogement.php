<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestion logement affichage - suppression</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h3>Gestion logement / affichage - suppression</h3>
        <a href='./v_gererLogement.php'>Retour</a><br/> 
        
       <?php require 'class/class_Logement.php';
                $logement = new Logement(); 
                
        ?>

        <form method="post" action="v_afficherLogement.php" ><br/> 
            <label>Quel type de logement à afficher: </label><br/> 
            <SELECT name="typeLogement" size="1">
                <?php foreach($logement->getLogementBytype() as $unTypeLogement)
                {
                ?><OPTION n><?php echo $unTypeLogement;
                }
                ?>
            </SELECT>
            <input type="submit" value="Envoyer" />
        </form>
           <?php
                
                if(isset($_REQUEST['typeLogement']))
                {
                   $logement->afficherLesLogements($_REQUEST['typeLogement']);                  
                     
                }
                if(isset($_GET['numlogement']))
                {
                    $logement->supprimerLogement($_GET['numlogement']);
                    ?>
                        <script>alert("Le logement "+<?php echo $_GET['numlogement']; ?>+" a été supprimé !");</script>
                    <?php                
                }
                
                
            ?>

    </body>
</html>
