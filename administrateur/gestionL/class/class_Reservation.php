<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reservation
 *
 * @author tony
 */
class Reservation {
    private $bdd;
    
    function __construct() 
    {
       require '../../conf/BDD_Connexion.php'; 
       $this->bdd = $bdd;
       
    }
    
    public function updateReservation($idRerservation,$titreReservation, $contenuReservation, $montant, $numPension, $menage, $accepte, $numLogement)
    {
       if($menage == 'Non')
       {
           $menage = 0;
       }
       else
           $menage = 1;
       
       if($accepte == 'Non')
       {
          $accepte = 0; 
       }
       else 
           $accepte = 1;
       
       $req = "update reservations set titre_reservation='$titreReservation', contenu_reservation='$contenuReservation', prix_reservation=$montant,
               numPension=$numPension, menage=$menage, accepte=$accepte, numLogement=$numLogement where id_reservation=$idRerservation;"; 
      
       $this->bdd->query($req) or die("Erreur de mis à jour réservation");
      
    }
    
    public function getLesReservations($limitMin,$limitMax)
    {
       $req = "select * from reservations LIMIT $limitMin,$limitMax;";
       $rep = $this->bdd->query($req)or die("Erreur affichage reservation"); 
       return $rep;
    }
    
     public function getReservationById($idReservation)
    {
       $req = "select * from reservations where id_reservation = $idReservation;";
       $rep = $this->bdd->query($req)or die("Erreur affichage reservation"); 
       return $rep;
    }
    
    function getNombreReservation()
    {
        $req = "select count(*) from reservations;";
        $res = $this->bdd->query($req) or die('erreur count');
        $nbreservation;
        while($donnee = $res->fetch()){
            $nbreservation = $donnee['count(*)'];
        }
        
        return $nbreservation;
    }
}

?>
