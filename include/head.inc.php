<?php
session_start();	
if (empty($_SESSION['pseudo']))
{
	header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" /><!-- css toute les vues -->
        <link rel="stylesheet" type="text/css" href="../css/calendrier.css" media="screen" />

   </head>