<?php
use \OCR\P4\model\CommentManager;
require_once '../model/commentManager.php';

$name = dataValid($_POST["nom"]);
$comment = dataValid($_POST["commentaire"]);

//pour s'assurer de l'intégrité des données
function dataValid($data)
{
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
}

$newComment = new CommentManager;
$newComment->addComment();

header('Location: ../view/index.php?p=post&id='. $_POST['getId']);
exit();
