<?php
use \OCR\P4\model\CommentManager;
require_once '../model/commentManager.php';

class NewComment {

    public function addNewComment() {
        $newComment = new CommentManager;
        $newComment->addComment();

        header('Location: ../view/index.php?p=post&id='. $_POST['getId'] . '&rank=' . $_POST['getRank']);
        exit();
    }

}

$addNewComment = new NewComment;
$addNewComment->addNewComment();