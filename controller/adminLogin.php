<?php
use \OCR\P4\model\AdminManager;
require_once '../model/adminManager.php';
session_start();

class AdminLogin {
   
    public function login() 
    {    
            $connexion = new AdminManager;
            $connexion->connexion();
                
            if(($_POST['pseudo'] == $connexion->login['pseudo']) && password_verify($_POST['pw'], $connexion->login['pw'])) {
                $_SESSION['connected'] = 'OK';
                header('Location: ../view/index.php?p=admin');
                exit();
            } else {
                $_SESSION['erreur'] = "L'email et/ou le mot de passe est faux";
                header('Location: ../view/index.php?p=connexion');
                exit();
            }
    }

    public function logout() 
    {
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


/*
//génère la page admin avec la liste des posts et leurs commentaires
function admin() 
{
$adminManager = new AdminManager;
$allPostsAdmin = $adminManager->getPostsAdmin();
$rank = $adminManager->rankPost();
$commentsId = $adminManager->getCommentsAdmin();
require '../view/admin.php';
}

// $titlePost = dataValid($_POST['title']);
// $contentPost = dataValid($_POST['content']);
// $dataPostId = $_POST['getIdPost'];

//pour s'assurer de l'intégrité des données
function dataValid($data)
{
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
}

// LA GESTION DES FORMULAIRES

// connexion à la partie admin
if(isset($_POST['login'])){

$connexion = new AdminManager;
$connexion->connexion();
    
if(($_POST['pseudo'] == $connexion->login['pseudo']) && password_verify($_POST['pw'], $connexion->login['pw'])) {
    header('Location: ../view/index.php?p=admin');
    exit();
} else {
    header('Location: ../view/index.php?p=connexion');
    echo '<script>alert("Email ou mot de passe incorrect")</script>';
    exit();
}

//création d'un nouveau post
} else if(isset($_POST['createPost'])) {

$newPost = new AdminManager;
$newPost->addPost();

header('Location: ../view/index.php?p=admin');
exit();

// modification d'un post existant
} else if(isset($_POST['update'])) {

$updatePostId = new AdminManager;
$updatePostId->updatePost($_POST['title'], $_POST['content'], $_POST['getIdPost']);
header('Location: ../view/index.php?p=admin');
exit();

// suppression d'un post
} else if(isset($_POST['delete'])) {

$deletePostId = new AdminManager;
$deletePostId->deletePost($_POST['delete']);

header('Location: ../view/index.php?p=admin');
exit();

// suppression d'un commentaire
} else if(isset($_POST['deleteComment'])) {

    $deleteComment = new AdminManager;
    $deleteComment->deleteComment($_POST['deleteComment']);
    
    header('Location: ../view/index.php?p=admin');
    exit();

}
*/