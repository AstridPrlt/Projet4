<?php
session_start();
require_once '../controller/frontController.php';
require_once '../controller/adminController.php';

if (isset($_GET['p'])) {

    if ($_GET['p'] == 'roman') {
        getAllPosts();
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
        if($_SESSION['connected'] == 'OK') {
            admin();
        } else {
            header('Location: ../view/index.php?p=connexion');
        }
    }
    else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }
}
else {
    // $dataLast = getLastPost();
    require 'home.php';
}

?>