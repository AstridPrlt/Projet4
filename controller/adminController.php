<?php
use \OCR\P4\model\AdminManager;
require_once '../model/adminManager.php';

//génère la page admin avec la liste des posts et leurs commentaires
function admin() 
{
$adminManager = new AdminManager;
$allPostsAdmin = $adminManager->getPostsAdmin();
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

//création d'un nouveau post
if(isset($_POST['createPost'])) {

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

// connexion à la partie admin
} else if(isset($_POST['login'])){

$connexion = new AdminManager;
$connexion->connexion();

if(($_POST['pseudo'] == $connexion->login['pseudo']) && password_verify($_POST['pw'], $connexion->login['pw'])) {
    header('Location: ../view/index.php?p=admin');
    exit();
} else {
    header('Location: ../view/index.php?p=connexion');
    exit();
}

}
