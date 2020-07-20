<?php
//session_start();
require_once '../controller/frontController.php';
require_once '../controller/adminController.php';
require_once '../controller/adminLogin.php';

if (isset($_GET['p'])) {

    if ($_GET['p'] == 'roman') {
        $frontController->getAllPosts();
    }
    elseif ($_GET['p'] == 'contact') {
        require 'contact.php';
    }
    elseif ($_GET['p'] == 'connexion') {
        require 'connexion.php';
    }
    elseif ($_GET['p'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['rank']) && $_GET['rank'] > 0) {
            $frontController->getPostById();
        }
        else {
            header('Location: ../view/index.php?p=roman');
        }
    }
    elseif ($_GET['p'] == 'admin') {
        if(isset($_SESSION['connected']) && $_SESSION['connected'] == 'OK') {
            $adminController->admin();
        } else {
            header('Location: ../view/index.php?p=connexion');
        }
    }

} else {
    // $frontController->getLastPost();
    // $dataLast = $frontController->dataLast;
    require '../view/home.php';
}

?>