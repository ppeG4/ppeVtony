<?php
require_once("../include/head.inc.php");
?>
<body>
<center><img src="../image/banniere.jpg" width=55% ></img></center>
<?php
require_once("../include/menu.inc.php");
?>
		<h1>Faire une réservation</h1>
    <h5>Une réservation dure une semaine et ne peut se faire seulement pendant les périodes de <a href="vacances.php">vacances scolaires.</a></h5>
	<?php
		// Variables vides pour les valeurs par défaut des champs
		$titre=""; $description=""; $pension="";$menage ="";$prix_Reservation="";$type="";$num_Logement = "";
		$dateDebut = date("d-m-Y", time());	
			
       
			if(isset($_POST['envoi2']))
			{
				$num_Logement = htmlentities($_POST['logement']);
				$dateDebut = $_SESSION['dateDebut'];
				echo $dateDebut ;
				echo " ";
				list($anneeDebut,$moisDebut,$jourDebut) = explode("-",$dateDebut);
			
				$tabDateDebut = date("d/m/Y",time());
				
				$tabDateDeb[1] = $moisDebut;
				$tabDateDeb[0] = $jourDebut;
				$tabDateDeb[2] = $anneeDebut;
				echo $tabDateDeb[0];
				echo " ";
				
				$timestampDebut = mktime(0, 0, 0, $tabDateDeb[1],$tabDateDeb[0],$tabDateDeb[2]);
				$nbreJours = 7;		//On veut que la réservation dure une semaine .
				
				// Traitement de l'enregistrement de l'événement
							$identifiantCommun = time();
							$timeDuJour = $timestampDebut;
							
							include("../conf/BDD_Connexion.php");
							
							for($i=0 ; $i<$nbreJours ; $i++) 
							{
								$bdd->query("INSERT INTO calendrier VALUES ('', ".date('d', $timeDuJour).", ".date('m', $timeDuJour).", ".date('Y', $timeDuJour).", $identifiantCommun)")or die("Erreur SQL");
								
								$timeDuJour += 86400; // On augmente le timestamp d'un jour
							}
								$nom = $_SESSION['pseudo'];
								$titre=$_SESSION['titre'];
								$description=$_SESSION['description'];
								$pension=$_SESSION['pension'];
								$menage=$_SESSION['menage'];
								
								$bdd->query("INSERT INTO reservations VALUES ($identifiantCommun, '$titre', '$description','','$nom','$pension','$menage',FALSE,'$num_Logement')")or die("Erreur Sql 2");
							
							
							
							echo '<ul><li>Réservation enregistré !</li></ul>';
									   
			}
				
			
			
			if(isset($_POST['envoi'])) 
            {
				// Traitement de l'envoi de l'événement
				$_SESSION['titre'] = htmlentities(addslashes($_POST['titre']));
				$_SESSION['description'] = nl2br(htmlentities(addslashes($_POST['description'])));
				
				$_SESSION['dateDebut'] = htmlentities($_POST['debut']);
				
				$_SESSION['pension'] = htmlentities($_POST['pension']);		
				$_SESSION['menage'] = htmlentities($_POST['menage']);
				$_SESSION['level'] = htmlentities($_POST['type']);
				
				if ( $num_Logement == "" )
				{
							$level = $_SESSION['level'];
							$requete2 = "SELECT * FROM logements WHERE niveauLogement='$level';" ;
							include("../conf/BDD_Connexion2.php");
							$reponse2 = mysql_query($requete2);
							?>
				<form method="post" action="ajoutevent.php">
				<table id="tabAjoutEvent">
						<tr>
				<td><label for="type">Numéro logement souhaités : </label>
				<?php
				echo'<select name="logement">';
				while ($donnees = mysql_fetch_array($reponse2) )
				{
					?>
						<option value="<?php echo $donnees['numLogement']; ?>"><?php echo $donnees['numLogement']; ?></option>
					<?php
				} 
				echo'</select>';
				mysql_close(); // Déconnexion de MySQL
				
					
				echo '</td>
			</tr>';
			?><tr>
					<td colspan="2"><input type="submit" name="envoi2" value="Valider"/></td>
            		<td colspan="2"><input type="button" value="Annuler" onclick='location.href="ajoutevent.php"' /></td>
			</tr>
					</table>
					
<?php				}
				}
			
			
		
		$requete = 'SELECT DISTINCT typeLogement , niveauLogement
					FROM logements';
					
		include("../conf/BDD_Connexion2.php");
		
		$reponse = mysql_query($requete);
				

   ?> 
    <!-- Formulaire d'envoi -->
	
    <form method="post" action="ajoutevent.php" id="formulaire">
    	<table id="tabAjoutEvent">
        	<tr>
				<td><label for="type">Type de prestation souhaité: </label>
				<?php
				echo'<select name="type">';
				while ($donnees = mysql_fetch_array($reponse) )
				{
					?>
						<option value="<?php echo $donnees['niveauLogement']; ?>"><?php echo $donnees['typeLogement']; ?></option>
					<?php
				} 
				echo'</select>';
				mysql_close(); // Déconnexion de MySQL

?>
				</td>
			</tr>
			<tr>
            	<td><label for="date">Date de début : <input type="date" name="debut" value="<?php echo $dateDebut ?>" /></label></td>
               
            </tr>
			
       		<tr>
       			<td colspan="2"><br/>
                	<label for="titre">Intitulé de la réservation :</label>
       				<input type="text" name="titre" id="titre" size="30" value="<?php echo $titre ?>"/><br/><br/>
                </td>
       		</tr>
            <tr>
            	<td colspan="2">
       				<label for="description">Description de la réservation :</label></br>
       				<textarea rows="10" cols="50" id="description" name="description"><?php echo $description ?></textarea>
                </td>
            </tr>
			<tr>
				<td colspan="2">
					<label for="pension">Type de pension désirée :</label>
					<select name="pension">
						<option value=0 name=0>Demi-Pension</option>
						<option value=1 name=1>Pension Compléte</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label for="menage">Souhaitez vous engagez une femme de ménage a la fin de votre séjour ? </label>
					<select name="menage">
						<option value=0 name=0>Non</option>
						<option value=1 name=1>Oui</option>
					</select>
				</td>
			</tr>
            <tr>
            	<td colspan="2"><input type="submit" name="envoi" value="Valider"/></td>
            </tr>
       </table>
    </form>
    
  
</body>
</html>
