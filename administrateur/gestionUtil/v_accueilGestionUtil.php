<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestion Utilisateur</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css" media="screen" /><!-- css concernant seulement "index.php" -->
    </head>
    <body>
        <h3>Gestion Utilisateur</h3>
        <a href='../index.php'>Accueil Administrateur</a><br/>
        
        <br/><br/>
        <FORM method="post">
        <SELECT name="choix" size="1">
        <OPTION>Afficher les utilisateurs
        <OPTION>Modifier droits
        </SELECT>
            <input type="submit" value="Accéder" />
        </FORM>

        <br/>
        <br/>
        
        <?php 
            if(isset($_REQUEST['choix']))
            {
                if($_REQUEST['choix'] == 'Afficher les utilisateurs')
                {
                header("Location: v_afficherUtilisateur.php"); 
                }
                if($_REQUEST['choix']== 'Modifier droits')
                {
                    header("Location: v_modifierDroitUtil.php"); 
                }
            }
        ?>  
    </body>
</html>

