<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulaire modification</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <?php 
         if(isset($_REQUEST['idResrv']) && is_numeric($_REQUEST['idResrv']))
             $idReservation = $_REQUEST['idResrv'];
         else
             $idReservation = '';
         
         if($idReservation != '')
         {  
         ?>
            <h3>Modification de la réservation <?php echo $idReservation; ?></h3>
         <?php 
                require 'class/class_Reservation.php';
                $reservation = new Reservation();
                $rep = $reservation->getReservationById($_REQUEST['idResrv']); // on récupère les informations de la réservation par l'id
                $tabReservation = array(); // on placera les infos dans un tableau 
               
                while ($donnee = $rep->fetch())
                {
                    $tabReservation[0] = $donnee['titre_reservation'];
                    $tabReservation[1] = $donnee['contenu_reservation'];
                    $tabReservation[2] = $donnee['prix_reservation'];
                    $tabReservation[3] = $donnee['pseudoUtil'];
                    $tabReservation[4] = $donnee['numPension'];
                    $tabReservation[5] = $donnee['menage'];
                    $tabReservation[6] = $donnee['accepte'];
                    $tabReservation[7] = $donnee['numLogement'];
                }
         ?>
            <div>
                <form method="post">
                 <label for="titreReserv">Titre de la réservation: <br/></label><input id='titreReserv' name="titreReserv" type="text" value="<?php  echo $tabReservation[0];?>"/><br/>
                 <label for="ContenuReserv">Contenu de la réservation:<br/></label><textarea id='ContenuReserv' name="ContenuReserv" rows="4" cols="50"><?php  echo $tabReservation[1];?></textarea><br/>
                 <label for="prix">Montant: <br/></label><input id='prix' name="prix" type="text" value="<?php  echo $tabReservation[2];?>"/><br/>
                 <label for="pseudo">Pseudo: <br/></label><input id='pseudo' name="pseudo" type="text" value="<?php  echo $tabReservation[3];?>" disabled/><br/>
                 <label for="numPension">N° pension: <br/></label><input id='numPension' name="numPension" type="number" value="<?php  echo $tabReservation[4];?>" min="0" max="1"/><br/><br/>
                 <label for="Menage">Ménage: (Actuellement <?php if($tabReservation[5] == 0)echo "Non"; else echo "Oui";?>)<br/></label>
                 <SELECT id="Menage" name="menage" size="1">
                    <OPTION>Non
                    <OPTION>Oui
                 </select><br/>
                 
                 <label for="accepte">Réservation acceptée: (Actuellement <?php if($tabReservation[6] == 0)echo "Non"; else echo "Oui";?>)<br/></label>
                 
                 <SELECT id="accepte" name="accepte" size="1">
                    <OPTION>Non
                    <OPTION>Oui
                 </select>
                 
                 <label for="numLogement"><br/>Numéro de logement: <br/></label><input id='numLogement' name="numLogement" type="text" value="<?php  echo $tabReservation[7];?>" />
                 <br/><br/>
                 <input type="submit" value="Modifier la réservation" />
             </form>
                
            </div>
                    <?php
                    
                    if(isset($_REQUEST['titreReserv']) && isset($_REQUEST['ContenuReserv']) && isset($_REQUEST['prix'])
                            && isset($_REQUEST['numPension']) && isset($_REQUEST['menage'])
                            && isset($_REQUEST['accepte']) && isset($_REQUEST['numLogement']))
                    {
                       
                        $reservation->updateReservation($_REQUEST['idResrv'],$_REQUEST['titreReserv'], $_REQUEST['ContenuReserv'], $_REQUEST['prix'], $_REQUEST['numPension']
                                , $_REQUEST['menage'], $_REQUEST['accepte'], $_REQUEST['numLogement']);
                        echo '<p>mis à jour</p>';
                    }
                        
                                            
                    
                       
                     ?>
            <a href='.././index.php'><br/>Accueil Administrateur</a><br/>
        
        <?php
         }
         else
             echo "<p>Aucun article n'a été trouvé pour cet identifiant<br/><a href='.././index.php'>Accueil Administrateur</a><br/></p>";
        ?>
    </body>
</html>
