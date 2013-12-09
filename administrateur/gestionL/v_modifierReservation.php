<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Modification Réservation</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" />
        
    </head>
    <body>
        <h3>Modification Réservation</h3>
        <a href='.././index.php'>Retour</a><br/> 


        <form method="post">
           
        </form>
           <?php
            require 'class/class_Reservation.php';
            $reservation = new Reservation();
            $nbPages = $reservation->getNombreReservation() / 5; // 5 nb voulu
            $nbPages = ceil($nbPages); // arrondi a l'entier supérieur
            $limitMin = 0;
            $limitMax = 5;
            
           
            
            if(!isset($_REQUEST['id']))
                $_REQUEST['id'] = 1;
           
            for($i = 1; $i<=$nbPages; $i++)
            {    
                
                if($_REQUEST['id'] > $nbPages) // permet de controler l'id si l'utilisateur entre dans l'url un id trop grand
                     $_REQUEST['id'] = $nbPages;
                else if ($_REQUEST['id'] <= 0)
                     $_REQUEST['id'] = 1;
                
             
                if($_REQUEST['id'] == $i)
                {
                    $rep = $reservation->getLesReservations(0, $limitMax);
                    while($donnee = $rep->fetch())
                    {
                        $idReservation = $donnee['id_reservation'];
                    echo "ID RESERVATION: <span style='font-weight: bold;'>".$donnee['id_reservation']."</span><p>Titre réservation: ".$donnee['titre_reservation']
                            ."<br/>Contennu de la réservation:".$donnee['contenu_reservation'].
                            "<br/>Prix de la réservation: ".$donnee['prix_reservation']." Euros".
                            "<br/>Numéro de logement: ".$donnee['numLogement'].
                            "<br/>Pseudo: <span style='font-weight: bold;'>".$donnee['pseudoUtil']."</span>".
                            "<a href='v_formulaireModification.php?idResrv=$idReservation'><img src='../../image/update.jpg' alt='modifier' width='2%'/></a>".
                           "</p>";
                    }  
                }
                   
               
               $limitMax +=5;
            }
            
            
            echo'<p>';
            if($nbPages>0)
            {
                
               for($i = 1; $i<=$nbPages; $i++)
                {  
                    echo "<a href=v_modifierReservation.php?id=$i>".$i."</a> ";
                }
            }
            else
                echo 'Aucune réservation';
           
            echo '</p>';
           
            ?>
        
        

    </body>
</html>
