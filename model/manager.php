<?php

   //connexion à la bdd
   
    try
    {
        $bdd = new PDO('mysql:host=localhost;port=3308;dbname=blogp4;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(PDOException $e)
    {
        echo '<p>Erreur : '.$e->getMessage() . '</p>';
    }

