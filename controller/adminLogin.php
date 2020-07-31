<?php
namespace OCR\P4\controller;
require_once '../autoloader.php';
use \OCR\P4\model\AdminManager;

session_start();

class AdminLogin {
   
    public function login() 
    {    
            $connexion = new AdminManager;
            $connexion->connexion();
            
            //vérifie la validité des identifiants
            if(($_POST['pseudo'] == $connexion->login['pseudo']) && password_verify($_POST['pw'], $connexion->login['pw'])) {
                //si OK, envoie vers la page admin
                $_SESSION['connected'] = 'OK';
                header('Location: ../view/index.php?p=admin');
                exit();
            } else {
                //si faux, retour à la page de connexion
                $_SESSION['erreur'] = "L'email et/ou le mot de passe est faux";
                header('Location: ../view/index.php?p=connexion');
                exit();
            }
    }

    public function logout() 
    {
        //à l'appui du bouton de déconnexion, détruit les variables de session et renvoie vers la page de connexion
        $_SESSION = array();
        session_destroy();
        header('Location: ../view/index.php?p=connexion');
        exit();
    }
}

$admLogin = new AdminLogin;

if(isset($_POST['login'])) {
    $admLogin->login();
} elseif (isset($_POST['logout'])) {
    $admLogin->logout();
}