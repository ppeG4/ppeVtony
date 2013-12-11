<?php
/**
 * Description of Logement
 *
 * @author tony
 */
class Logement {
    private $bdd;

    function __construct() {
       include_once '../../conf/BDD_Connexion.php'; 
       $this->bdd = $bdd;
       
    }
    
    function afficherLesLogements($typeLogement)
    {
        
        $req = "select numLogement, typeLogement,descriptionLogement from logements where typeLogement = '$typeLogement'; ";
        $res = $this->bdd->query($req) or die('erreur');
        $cpt = 0;
        while($donnee = $res->fetch())
        {
            $cpt++;
            echo "Numéro de logement: ".$donnee['numLogement']."<br/>Type logement: ".$donnee['typeLogement']."<br/>Description: 
                ".$donnee['descriptionLogement'];
            $numLogement = $donnee['numLogement'];
            echo "<a href='v_afficherLogement.php?numlogement=$numLogement'><img src='../../image/croix.png' alt='suppression'></a><br/><br/>";        
            
       } 
        if ($cpt == 0)
        {
            echo "Il n'y a aucun logement";
        }
        
    }
    
    function getLogementBytype()
    {
        $req = "select distinct typeLogement from logements";
        $rep = $this->bdd->query($req);
        $tabTypeLogement = array();
        while ($donnee = $rep->fetch())
        {
            array_push($tabTypeLogement, $donnee['typeLogement']);
        }
        return $tabTypeLogement;
    }
    /**
     * Fonction qui ajoute un logement à la bdd
     * @param type $numLogement
     * @param type $typeLogement
     * @param type $descriptionLogement
     */
    function ajouterTypeLogement($numLogement,$typeLogement,$descriptionLogement,$niveauLogement)
    {
      $req = "insert into logements (numLogement, typeLogement, descriptionLogement,niveauLogement) values ($numLogement,'$typeLogement','$descriptionLogement',$niveauLogement); ";
      $this->bdd->query($req) or die('<p>Ce numéro de logement est déjà pris !</p>'+$req);   
    }
    
    /**
     * Supprime un logement passé en paramètre
     * @param type $numlogement
     */
    function supprimerLogement($numlogement)
    {
       $reqQ = "DELETE FROM `logements` WHERE `numLogement`= $numlogement;";
       $this->bdd->query($reqQ);       
    }
    
}
