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
			
			echo '<ul><li>Evénement supprimé !</li></ul>';
		}
		
		
		// Récupération des événements
		$req = "SELECT * FROM reservations";
		$evenements = mysql_query($req);
		
		if(mysql_num_rows($evenements)) $nbEvents = true;
		else $nbEvents = false;
		
		
		mysql_close();
	?>
    
	<h1>Supprimer un événement</h1>
	
    <?php
	if($nbEvents) {
		
		while($evenement = mysql_fetch_array($evenements)) {
			echo '
			<table class="listeEvent">
				<tr><td>'.html_entity_decode($evenement['titre_reservation']).'</td></tr>
				<tr><td>'.html_entity_decode($evenement['contenu_reservation']).'</td></tr>
				<tr><td><a href="supprevent.php?id='.$evenement['id_reservation'].'">Supprimer</a></td></tr>
			</table>
			<br/><br/>
			';
		}
		
	} else {
		
		echo '<p>Il n\'y a pas d\'événements à supprimer</p>';
		
	}
	?>
    
    
    
</body>
</html>
