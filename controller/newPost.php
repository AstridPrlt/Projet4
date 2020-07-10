<?php
use \OCR\P4\model\AdminManager;
require_once '../model/adminManager.php';

$title = dataValid($_POST['title']);
$content = dataValid($_POST['content']);

//pour s'assurer de l'intégrité des données
function dataValid($data)
{
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
}

$newPost = new AdminManager;
$newPost->addPost();

header('Location: ../view/index.php?p=admin');
