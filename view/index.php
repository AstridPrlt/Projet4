<?php
//session_start();
use \OCR\P4\controller\FrontController;
// use Exception;

require_once '../controller/frontController.php';
require_once '../controller/adminController.php';
require_once '../controller/adminLogin.php';

class Router {

    public function run()
    {

        $frontController = new FrontController;

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
        else {
            header('Location: error.php');
            // echo 'erreur';
            // var_dump($_SERVER);
        }

    } else {
        // (end(explode("/", $_SERVER['REQUEST_URI'])) == 'home.php')
        // $frontController->getLastPost();
        // $dataLast = $frontController->dataLast;
        header('Location: ../view/home.php');
        // var_dump($_SERVER);
        // require '../view/home.php';
    }
    }

}

$router = new Router;

// try{
$router->run();
// }
// catch(Exception $e){
//     echo 'Erreur :' . $e->getMessage();
// }
?>