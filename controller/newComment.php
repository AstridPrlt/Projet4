<?php

require_once '../autoloader.php';
use \OCR\P4\model\CommentManager;

class NewComment {

    //créé un nouveau commentaire
    public function addNewComment() {
        $newComment = new CommentManager;
        $newComment->addComment();

        header('Location: ../view/index.php?p=post&rank=' . $_POST['getRank']);
        exit();
    }

    //signale un commentaire
    public function reportComment() {
        $reportComment = new CommentManager;
        $reportComment->addReportComment($_POST['report']);

        header('Location: ../view/index.php?p=post&rank=' . $_POST['getRank']);
        exit();
    }

}

$addNewComment = new NewComment;

if(isset($_POST['newComment'])) {
    $addNewComment->addNewComment();
} elseif (isset($_POST['report'])) {
    $addNewComment->reportComment();
}