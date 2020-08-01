<?php
require_once '../autoloader.php';
use \OCR\P4\controller\FrontController;
use \OCR\P4\controller\AdminController;
require_once '../controller/AdminLogin.php';


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
        }
    
        } 
        else {
        header('Location: home.php');
        }
    }
}
$router = new Router;
$router->run();

?>