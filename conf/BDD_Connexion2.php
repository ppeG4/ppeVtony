<?php
    try {
			mysql_connect("localhost", "root", "mysql");
			mysql_select_db("ppe_gestion");
        }
        catch(Exception $e)
        {
          
            die('Erreur : ' .$e->getMessage());
        }
          
?>
