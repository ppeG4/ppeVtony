<?php
require_once("../include/head.inc.php");
?>
<body>
<center><img src="../image/banniere.jpg" width=55% ></img></center>
<?php
require_once("../include/menu.inc.php");
?>
	
	<?php
		require_once("../conf/BDD_Connexion2.php");
		if(isset($_GET['id']) && is_numeric($_GET['id'])) {
			// Traitement de la suppression de l'événement
			$id = htmlentities($_GET['id']);
			
			$req = "DELETE FROM calendrier WHERE id_evenement = " .$id;
			mysql_query($req);
			
			$req = "DELETE FROM reservations WHERE id_reservation = " .$id;
			mysql_query($req);
			
			echo '<ul><li>Réservations annulée !</li></ul>';
		}
		
		$nom = $_SESSION['pseudo'];
		// Récupération des événements
		$req = "SELECT * FROM reservations WHERE pseudoUtil = '$nom'";
		$evenements = mysql_query($req);
		
		if(mysql_num_rows($evenements)) $nbEvents = true;
		else $nbEvents = false;
				
		mysql_close();
	?>
    
	<h1>Mes réservation</h1>
	
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
			
			
			include("../conf/BDD_Connexion.php");
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
				
				<tr><td><a href="mesreserv.php?id='.$evenement['id_reservation'].'">Annuler</a></td></tr>
			</table>
			<br/><br/>
			';
		}
		
	} else {
		
		echo '<p>Vous n\'avez aucune réservations en cours</p>';
		
	}
	?>
    
    <a href="mesreserv.php">Remonter en haut .</a>
    
</body>
</html>
