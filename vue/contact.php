
<?php
require_once("../include/head.inc.php");
?>
	<body>
	<center><img src="../image/banniere.jpg" width=55% ></img></center>
        <?php
require_once("../include/menu.inc.php");
?>
		
		<center>
        <h1>Contact</h1>
        </center>
	
	


<p class="contentIntro">
N'hésitez pas à contacter l'administrateur pour tout renseignement complémentaire !
</p>


<div id="contact">
	<form method="post" enctype="text/plain" action="mailto:Admin@reservationPPE.fr?subject=Contact via le formulaire reservation/contact.php">
		<table align="center">
			<tr>
				<td><label for="name"><b><span class="underline">Nom:</span></b></label></td>
				<td>
					<input type="text" name="nom" required placeholder="Votre Nom" id="name" />
				</td>
			</tr>
			<tr>
				<td><label for="prenom"><b><span class="underline">Prenom:</span></b></label></td>
				<td>
					<input type="text" name="prenom" required placeholder="Votre Prenom"id="prenom"/>
				</td>
			</tr>
			<tr>
				<td><label for="mail"><b><span class="underline">Mail:</span></b></label></td>
				<td>
					<input type="email" name="mail" required placeholder="Votre adresse e-mail"id="mail"/>
				</td>
			</tr>
			<tr>
				<td><label for="telephone"><b>Tel : </b></label></td>
				<td>
					<input type="tel" name="telephone" id="telephone"/>
				</td>
			</tr>
			<tr>
				<td><label for="objet"><b><span class="underline">Objet:</span></b></label></td>
				<td>
					<input type="objet" name="objet" required placeholder="Objet" id="objet"/>
				</td>
			</tr>	
			<tr>
				<td><label for="message"><b><span class="underline">Message:</span></b></label></td>
				<td>
					<textarea rows="8" cols="45" name="message" required placeholder="Tapez votre message" id="message"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" > 
				<h6>Les champs <span class="underline">souligné</span> sont obligatoires</h6>
				<input type="submit"  alt="envoyer" align="right" />
				</td>
			</tr>
		</table>
	</form>
</div>	
	</body>
</html>
