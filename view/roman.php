<?php 

    try
    {
        $bdd = new PDO('mysql:host=localhost;port=3308;dbname=testblog;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT title FROM chapter');
        while ($donnees = $reponse->fetch())
        {
            echo $donnees['title'] . '<br />';
        }
                  
        $reponse->closeCursor();
    }
    catch(PDOException $e)
    {
            echo '<p>Erreur : '.$e->getMessage() . '</p>';
    }    

    $title = "Billet simple pour l'Alaska - Le Roman";

    ob_start(); ?>

    <!-- Masthead-->
    <header class="masthead vh-50 mh-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">Le Roman</h1>
                </div>
            </div>
        </div>
    </header>

    <?php $content = ob_get_clean();

    require 'layout.php';
?>