<?php
require '../controller/controller.php';

if (isset($_GET['p'])) {

    if ($_GET['p'] == 'roman') {
        romanPage();
    }
    elseif ($_GET['p'] == 'contact') {
        require 'contact.php';
    }
    elseif ($_GET['p'] == 'connexion') {
        require 'connexion.php';
    }
    elseif ($_GET['p'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            postPage();            
        }
    }
    elseif ($_GET['p'] == 'admin') {
        admin();
    }
    else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }
}
else {
    require 'home.php';
}

?>