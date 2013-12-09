<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_Utilisateur
 *
 * @author tony
 */
class Utilisateur {
    
    private $bdd;
    
    function __construct() {
         include_once '../../conf/BDD_Connexion.php'; 
         $this->bdd = $bdd;
    }
    
    /**
     * retpurne un tableau avec le descriptif d'un utilisateur passé en paramètre
     * @param type $pseudo
     * @return array
     */
    function afficherUtilisateur($pseudo)
    {
        $req = "select idUtilisateur, pseudoUtil, droitUtil from utilisateur where pseudoUtil='$pseudo';";
        $rep = $this->bdd->query($req);
        $tabUnUtil = array();
        while($donnee = $rep->fetch())
        {
            array_push($tabUnUtil, $donnee['idUtilisateur']);
            array_push($tabUnUtil, $donnee['pseudoUtil']);
            array_push($tabUnUtil, $donnee['droitUtil']);
        }
        return $tabUnUtil;
    }
    
    /**
     * Fonction qui retourne un tableau de pseudo des utilisateurs
     * @return array
     */
     function getUtilisateur()
    {
        $req = "select pseudoUtil from utilisateur;";
        $rep = $this->bdd->query($req);
        $tabUtilisateur = array();
        while($donnee = $rep->fetch())
        {
            array_push($tabUtilisateur, $donnee['pseudoUtil']);
        }
        return $tabUtilisateur;
    }
    
    function utilPresent($pseudo)
    {
        $reqRechercheUtil = "select count(*) from utilisateur where pseudoUtil = '$pseudo';";
        $rep = $this->bdd->query($reqRechercheUtil);
        while ($donnee = $rep->fetch())
        {
           return  $donnee['count(*)'];
        }
    }
    function  updateDroitUtil($pseudo,$droit)
    {
        
        
        $req = "update utilisateur set droitUtil = $droit where pseudoUtil = '$pseudo';";
        return  $this->bdd->query($req) or die ('erreur maj droit');
        
        
    }
}
