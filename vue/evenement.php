<?php
require_once("../include/head.inc.php");
?>
<body>
<center><img src="../image/banniere.jpg" width=55% ></img></center>
<?php
require_once("../include/menu.inc.php");
?>
		
	<?php
		$typeDate = "#^[0-3]?[0-9]/[01]?[0-9]/[0-9]{4}$#";
		
		if(isset($_GET['d']) && preg_match($typeDate, $_GET['d'])) {
			// Traitement de l'affichage
			$date = htmlentities($_GET['d']);
			$tabDate = explode('/', $date);
			
			$req = "SELECT * FROM evenements WHERE id_evenement IN (SELECT id_evenement FROM calendrier WHERE jour_evenement=".$tabDate[0]." AND mois_evenement=".$tabDate[1]." AND annee_evenement=".$tabDate[2].")";
			
			require_once("../conf/BDD_Connexion2.php");
		
			$evenements = mysql_query($req);
			
			echo '</br></br>';
			if(mysql_num_rows($evenements)) {
				while($evenement = mysql_fetch_array($evenements)) {
					echo '
						<table>
							<tr>
								<th>'.$evenement['titre_evenement'].'</th>
							</tr>
							<tr>
								<td>'.$evenement['contenu_evenement'].'</td>
							</tr>
						</table>
						
						<br/><br/>
					';
					
				}
				
			} else {
				echo '<p>Il n\'y a aucun événement pour cette date.</p>';
			}
			
			mysql_close();
		}
		
		
	?>
</body>
</html>
