 <?php 
      if (isset($_POST['login']) and isset($_POST['mdp']))
      {
              $longeur = strlen($_POST['mdp']);
              if ($longeur<6) // mot de passe de plus de 6 caractères
              {
                  echo'<p>Mot de passe trop faible ! Veuillez entrez au moins 6 caractéres</p>';
              }
              else if($_REQUEST['mdp']!= $_REQUEST['mdp2']) // deux mots de passe identiques
              {
                  echo'<p>Les deux mots de passe ne sont pas identiques !</p>';
              }
              else if(strlen($_REQUEST['cp'])!= 5 || !is_numeric($_REQUEST['cp'])) // vérifie que le code postal est bien composé de 5 chiffre                                                                     
              {
                  echo'<p>Erreur dans le code postal</p>';
              }
              else // si toutes les vérifications sont correctes on enregistre dans la base de donnée
              {
              $utilisateur = new Authentification(($_POST['login']),($_POST['mdp']),($_POST['adresse']),($_POST['cp']),($_POST['ville']));
              $utilisateur->creation(($_POST['login']),($_POST['mdp']),($_POST['adresse']),($_POST['cp']),($_POST['ville']));
              echo '<script language="Javascript">
              alert ("Utilisateur bien crée , vous allez être redirigé vers la page de connexion");
              </script>';
              header("Refresh: 1;URL=../index.php");
              }
      }
      