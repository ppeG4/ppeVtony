<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Valider réservation</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h3>Validation des réservation</h3>
        <a href='../index.php'>Accueil Administrateur<br/><br/></a>
        


	<?php
		require '../../conf/BDD_Connexion2.php';
		
		if(isset($_GET['id']) && is_numeric($_GET['id'])) {
			// Traitement de la suppression de l'événement
			$id = htmlentities($_GET['id']);
			
			$req = "UPDATE reservations SET accepte = 1 WHERE id_reservation='$id'";
			mysql_query($req);
			
			echo '<ul><li>Réservation acceptée !!</li></ul>';
		}
		
		
		// Récupération des événements
		$req = "SELECT * FROM reservations WHERE accepte = 0";
		$evenements = mysql_query($req);
		
		if(mysql_num_rows($evenements)) $nbEvents = true;
		else $nbEvents = false;
		
		
		mysql_close();
	?>
	
    <?php
	if($nbEvents) {
		
		while($evenement = mysql_fetch_array($evenements)) {
				if (html_entity_decode($evenement['accepte']) == 0)
			{
				$etat = "En attente";
			}else{
				if(html_entity_decode($evenement['accepte']) == 1){
					$etat = "Validé";
			}
			}
			
				if (html_entity_decode($evenement['numPension']) == 0)
			{
				$pension = "demi-pension";
			}else{
				$pension = "pension compléte";
			};
			
				if (html_entity_decode($evenement['menage']) == 1)
			{
				$menage = "Oui";
			}else{
				$menage = "Non";
			};
			$numLogement = html_entity_decode($evenement['numLogement']) ;
			
			
			include("../../conf/BDD_Connexion.php");
			$req = "SELECT typeLogement FROM logements WHERE numLogement = '$numLogement'";
			$resultat = $bdd->query($req);
			$typeLogement = "";
			while ($donnees = $resultat->fetch())
			{
				$typeLogement = $donnees['typeLogement'];
			}
			
					
			
			echo '
			<table class="listeEvent">
			
				<tr><td>Etat : '.$etat.'</td></tr>
				<tr><td>Id réservation	: '.html_entity_decode($evenement['id_reservation']).'</td></tr>
				<tr><td>Titre : '.html_entity_decode($evenement['titre_reservation']).'</td></tr>
				<tr><td>Auteur : '.html_entity_decode($evenement['pseudoUtil']).'</td></tr>
				<tr><td>Contenu : '.html_entity_decode($evenement['contenu_reservation']).'</td></tr>
				<tr><td>Prix réservation :  '.html_entity_decode($evenement['prix_reservation']).'</td></tr>
				<tr><td>Pension choisie :  '.$pension.'</td></tr>
                                <tr><td>Ménage (Oui/Non) :  '.$menage.'</td></tr>
                                <tr><td>Votre numéro de logement :  '.$numLogement.'</td></tr>
				<tr><td>Votre type de logement :  '.$typeLogement.'</td></tr>
				<tr><td><a href="v_reservationEnCour.php?id='.$evenement['id_reservation'].'">Valider</a></td></tr>
			</table>
			<br/><br/>
			';
		}
		
	} else {
		
		echo '<p>Aucune réservations en cours</p>';
		
	}
	?>
		
    </body>
</html>

