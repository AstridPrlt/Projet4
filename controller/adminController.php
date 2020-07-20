<?php
use \OCR\P4\model\AdminManager;
require_once '../model/adminManager.php';

class AdminController {

    //génère la page admin avec la liste des posts et leurs commentaires
    
    public function admin() 
    {
        $adminManager = new AdminManager;
        $allPostsAdmin = $adminManager->getPostsAdmin();
        $rank = $adminManager->rankPost();
        $commentsId = $adminManager->getCommentsAdmin();
        require '../view/admin.php';
    }

    //création d'un nouveau post
    public function createPost() 
    {
        $newPost = new AdminManager;
        $newPost->addPost($_POST['title'], $_POST['content']);
        header('Location: ../view/index.php?p=admin');
        exit();
    }

    // modification d'un post existant
    public function updatePost() {
        $updatePostId = new AdminManager;
        $updatePostId->updatePost($_POST['title'], $_POST['content'], $_POST['getIdPost']);
        header('Location: ../view/index.php?p=admin');
        exit();
    }

    // suppression d'un post
    public function deletePost() {
        $deletePostId = new AdminManager;
        $deletePostId->deletePost($_POST['delete']);
        header('Location: ../view/index.php?p=admin');
        exit();
    }

    // suppression d'un commentaire
    public function deleteComment() {
        $deleteComment = new AdminManager;
        $deleteComment->deleteComment($_POST['deleteComment']);
        header('Location: ../view/index.php?p=admin');
        exit();
    }

}

    $adminController = new AdminController;

    if(isset($_POST['createPost'])) {
        $adminController->createPost();
    } else if(isset($_POST['update'])) {
        $adminController->updatePost();
    } else if(isset($_POST['delete'])) {
        $adminController->deletePost();
    } else if(isset($_POST['deleteComment'])) {
        $adminController->deleteComment();
    }


/*
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