<?php
use \OCR\P4\model\AdminManager;
require_once '../model/adminManager.php';

$titlePost = dataValid($_POST['title']);
$contentPost = dataValid($_POST['content']);
$dataPostId = $_POST['getIdPost'];

//pour s'assurer de l'intégrité des données
function dataValid($data)
{
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
}

if(isset($_POST['createPost'])) {

$newPost = new AdminManager;
$newPost->addPost();

header('Location: ../view/index.php?p=admin');

} else if(isset($_POST['update'])) {

$updatePostId = new AdminManager;
$updatePostId->updatePost($_POST['title'], $_POST['content'], $_POST['getIdPost']);

header('Location: ../view/index.php?p=admin');

} else if(isset($_POST['delete'])) {

$deletePostId = new AdminManager;
$deletePostId->deletePost($_POST['delete']);

header('Location: ../view/index.php?p=admin');
}


