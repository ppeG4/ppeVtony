<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestion Réservation / suppression</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h2>Supprimer Réservation</h2>
        <div>
            <a href='.././index.php'>Accueil Administrateur</a><br/><br/><br/>
        </div>
        
   
    <?php
    include_once 'class/class_Reservation.php';
    	
            $reservationCount = new Reservation();
            $nbreservation = $reservationCount->getNombreReservation(); // recupère le nombre total de réservation 
            $nbPages = ceil($nbreservation / 5) ; // on met 5 réservation par page
                if($nbreservation <= 5)
                    $nbPages = 1;
           
                 if(!isset($_REQUEST['nbpages']))
                    {
                    $_REQUEST['nbpages'] = 1;
                    }
           $min = 0;
           
           
           for($i = 1; $i<= $nbPages; $i++)  
           {
            
                if($_REQUEST['nbpages'] == $i)
                {
                    
                    $rep = $reservationCount->getLesReservations($min, 5); 
                  
        
		while($evenement = $rep->fetch())
                   {
                     $unEvenementId = $evenement['id_reservation'];
			echo '
			<table class="listeEvent" id="Evenement" >
				<tr><td>Titre : '.html_entity_decode($evenement['titre_reservation']).'</td></tr>
				<tr><td>Auteur : '.html_entity_decode($evenement['pseudoUtil']).'</td></tr>
				<tr><td>Contenu : '.html_entity_decode($evenement['contenu_reservation']).'</td></tr>
				<tr><td><a href="v_confirmationSuppression.php?confirmation=false&idE='.$unEvenementId.'">Supprimer</a></td></tr>
			</table>
			<br/><br/>
			';                 
                    }
                 
                }
               
                $min += 5;
                          
                    
                
            }
      
           
           
           for ($i = 1; $i<=$nbPages;$i++) 
                echo "<a href='v_supprimerReservation.php?nbpages=$i'>$i</a>";
         
           
 
	?>


		
    </body>
</html>
