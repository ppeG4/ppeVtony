<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestion Réservation / suppression</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h2>Confirmation suppression</h2>
        <div>
            <a href='v_supprimerReservation.php'>Retour à la liste de réservation</a><br/><br/><br/>
        </div>
        
     <?php if(isset($_REQUEST['confirmation']) && $_REQUEST['confirmation']=='false' && isset($_REQUEST['idE']))                 
            {?>
                
                <div id="suppression_definitive">
                    <form method='post' >
                    <p>
                        Etes-vous sûr de vouloir supprimer la réservation <?php echo $_REQUEST['idE']; ?> 
                        <br/><button name="reponse" type="submit" value="oui">Oui</button>
                        <button name="reponse" type="submit" value="non">Non</button>
                    </p>
                    </form>
                </div>
                    
      <?php }
            else
                echo "<p>Aucune réservation à supprimer</p>";
         
                    if(isset($_REQUEST['reponse'])) 
                    {
			if($_REQUEST['reponse'] == 'oui' && isset($_REQUEST['idE']))
                        {
                        require_once("../../conf/BDD_Connexion2.php");
                        $id = htmlentities($_REQUEST['idE']);
			
			$req = "DELETE FROM calendrier WHERE id_evenement = " .$id;
			mysql_query($req);
			
			$req = "DELETE FROM reservations WHERE id_reservation = " .$id;
			mysql_query($req);	
			echo "<p>La réservation a bien été supprimée, redirection...</p>";
                         header('Refresh: 2; url=v_supprimerReservation.php'); 
                        }
                        else 
                            header('Location: v_supprimerReservation.php');  
                        
			
                    }
         
         
         ?>
         
         
</body>
</html>