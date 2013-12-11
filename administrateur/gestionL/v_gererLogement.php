<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestion logement</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h3>Gestion logement</h3>
        <a href='../index.php'>Accueil Administrateur</a><br/>
        
        <br/><br/>
        <FORM method="post" action="v_gererLogement.php">
        <SELECT name="choix" size="1">
        <OPTION>Afficher / supprimer logement
        <OPTION>Ajouter logement
        </SELECT>
            <input type="submit" value="Accéder" />
        </FORM>

        <br/>
        <br/>
        
        <?php 
            if(isset($_REQUEST['choix']))
            {
                if($_REQUEST['choix'] == "Afficher / supprimer logement")
                {
                     header("Location: v_afficherLogement.php"); 
                }
                if($_REQUEST['choix'] == "Ajouter logement")
                {
                    header("Location: v_ajouterLogement.php"); 
                }          
            }
        ?>  
    </body>
</html>

