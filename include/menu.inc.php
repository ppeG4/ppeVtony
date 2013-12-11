        <?php 
        include '../class/class_auth.php';
        $utilDroit = new Authentification($_SESSION['pseudo']);
        $_SESSION['droit'] = $utilDroit->getDroitUtil(); // on a la variable droit de session
                                                         // si 1 administrateur       
        ?>

        <p>Connecté en tant que <?php echo $_SESSION['pseudo']; ?></p>
		
		<ul class="menu">
				<li><a href="accueilUtilisateur.php"><span>Accueil</span></a></li>
				
				<li><a href=""><span>Réservations</span></a>
					<ul>
						<li><a href="ajoutevent.php"><span> Ajouter une réservation</span></a></li>
						<li><a href="mesreserv.php"><span>Mes réservations</span></a></li>
					</ul>
				</li>
				
				<?php 
				if($_SESSION['droit'] == 1)
				{
				?>
				<li><a href="../administrateur/"><img src="" /><span>Administration</span></a></li>
				<?php
				}
				?>
				<li><a href="contact.php"><img src="" /><span>Contacter l'administrateur</span></a></li>
				<li><a href="update.php"><span>Modifier mon mot de passe</span></a></li>
				<li><a href="logout.php"><img src="" /><span>Se déconnecter</span></a></li>
		</ul>
		</div>
		

