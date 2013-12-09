<?php
class  Authentification 
{
    var $login;
    var $mdp;
	
    function __construct($login='',$mdp='')
    {
        $this->login=$login;
        $this->mdp=$mdp;
     }
    
     function verification()
     {
         include("conf/BDD_Connexion.php");
         $sale = "@tony@Anthony@Kevin";
         $this->mdp = sha1(sha1($this->mdp).$sale);
         $resultat = $bdd->query("SELECT COUNT(*) FROM utilisateur WHERE pseudoUtil='$this->login' AND passwordUtil='$this->mdp'")->fetch();
         if ($resultat['COUNT(*)'] ==  1)
         {
             if($_SESSION['pseudo']!= '')
             {       
                 header("Location: vue/accueilUtilisateur.php");      
             }
             
         }
         else{
                  echo '<script language="Javascript">
                        alert ("ERREUR ! , mauvaise information d\'identification entrée " )
                        </script>';
             }      
     }
     
     function creation($pseudo_ajout,$mdp_ajout,$adresse,$cp,$ville)
     {
         include("../conf/BDD_Connexion.php");
         $sale = "@tony@Anthony@Kevin";
         $mdp_ajout = sha1(sha1($mdp_ajout).$sale); 
         $bdd->query("INSERT INTO utilisateur(pseudoUtil,passwordUtil,adresseUtil,codePostalUtil,villeUtil,droitUtil) "
                 . "VALUES('$pseudo_ajout','$mdp_ajout','$adresse','$cp','$ville','0')") or die("<br/>Pseudo déjà utilisé !");
         // Etant donné que le pseudo doit être unique avec la contrainte dans la bdd si le pseudo est déjà utilisé déclenchera l'erreur.
                 
      }
     
	 
	/**
         * Modification du mot de passe Attention sha1
         * @param type $login
         * @param type $old_mdp
         * @param type $new_mdp
         * @param type $new_mdp2
         */	 
     function modification($login,$old_mdp,$new_mdp,$new_mdp2)
     {
         include("../conf/BDD_Connexion.php");
         $sale = "@tony@Anthony@Kevin";
         $old_mdp = sha1(sha1($old_mdp).$sale);
         $resultat = $bdd->query("SELECT COUNT(*) FROM utilisateur WHERE pseudoUtil='$login' AND passwordUtil='$old_mdp'")->fetch();
         if ($resultat['COUNT(*)'] ==  1) // si l'utilisateur est présent dans la bdd
         {
			 if ( $new_mdp == $new_mdp2 ) // si les deux mots de passe de vérification
			 {
                                  $longeur = strlen($new_mdp);
				  if ($longeur<6)
				  {
					  echo '<script language="Javascript">
                                                alert ("Mot de passe trop faible ! Veuillez entrez au moins 6 caractéres" )
                                                </script>';
				  }else{ // on modifie le mot de passe et redirige
                                        $new_mdp = sha1(sha1($new_mdp).$sale);
                                        $bdd->query("UPDATE Utilisateur SET passwordUtil = '$new_mdp' WHERE pseudoUtil = '$login'");
                                        echo '<script language="Javascript">
                                        alert ("Mot de passe changé avec succés !" )
                                         </script>';
                                        header("Refresh: 1;URL=accueilUtilisateur.php");
                                        }
			 }
                            else // si ils ne sont pas identiques
                            {
                                echo '<script language="Javascript">
                                 alert ("ERREUR ! mot de passe de vérification pas identique " )
                                 </script>';
                            }
          }else{
	         echo '<script language="Javascript">
                 alert ("ERREUR ! , Veuillez entrez l\'ancien mot de passe " )
                 </script>';
	       }
         
     }
     
     /**
      * Fonction qui retourne le droit de l'utilisateur courant
      * @return int
      */
     function getDroitUtil()
     {
         include("../conf/BDD_Connexion.php");
         $droit; // contiendra le droit retourné
         $req = "select droitUtil from utilisateur where pseudoUtil = '$this->login';";
         $rep = $bdd->query($req);
         while($donne = $rep->fetch())
         {
             $droit = $donne['droitUtil'];
         }
         
         return $droit;
     }

}
?>