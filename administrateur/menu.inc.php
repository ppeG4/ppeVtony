<?php
	require_once("../conf/BDD_Connexion2.php");
		
		$req= "SELECT COUNT(DISTINCT id_reservation) FROM reservations WHERE accepte = 0";
		$attente = mysql_query($req) or die("Erreur dans le count");
		$resultat =  mysql_fetch_row($attente);
		
		?>
<a href="gestionL/v_gererLogement.php">Gérer les logements</a><br/>
<a href="gestionUtil/v_accueilGestionUtil.php">Gérer les utilisateurs</a><br/>
<a href="gestionL/v_modifierReservation.php">Modifier réservations</a></br>
<a href="gestionL/v_supprimerReservation.php">Supprimer réservations</a></br>
<a href="gestionL/v_reservationEnCour.php">Réservation en attente :</a><div class="rond"> <?php echo $resultat[0]; echo " réservation(s) ";?></div>
<br/><br/>
<a href="../index.php">Retour à l'application</a>
