<?php
require '../controller/frontController.php';

if (isset($_GET['p'])) {

    if ($_GET['p'] == 'roman') {
        getAllPost();
    }
    elseif ($_GET['p'] == 'contact') {
        require 'contact.php';
    }
    elseif ($_GET['p'] == 'connexion') {
        require 'connexion.php';
    }
    elseif ($_GET['p'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            getPostById();            
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