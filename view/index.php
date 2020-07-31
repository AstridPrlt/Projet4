<?php
<<<<<<< Updated upstream
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
=======
require_once '../autoloader.php';
use \OCR\P4\controller\FrontController;
use \OCR\P4\controller\AdminController;
require_once '../controller/adminLogin.php';

class Router {


    public function run()
    {
        $frontController = new FrontController;
        $adminController = new AdminController;

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
            if (isset($_GET['rank']) && $_GET['rank'] > 0) {
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
        else {
            header('Location: error.php');
>>>>>>> Stashed changes
        }
    }
<<<<<<< Updated upstream
    elseif ($_GET['p'] == 'admin') {
        admin();
    }
    else {
        echo 'Erreur : aucun identifiant de billet envoyé';
=======

>>>>>>> Stashed changes
    }
}
else {
    require 'home.php';
}

<<<<<<< Updated upstream
=======
$router = new Router;
$router->run();

>>>>>>> Stashed changes
?>