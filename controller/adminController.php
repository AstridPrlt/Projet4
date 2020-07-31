<?php
namespace OCR\P4\controller;
require_once '../autoloader.php';
use \OCR\P4\model\AdminManager;

class AdminController {

    //génère la page admin avec la liste des posts et leurs commentaires + la liste des commentaires signalés
    
    public function admin() 
    {
        $adminManager = new AdminManager;
        $allPostsAdmin = $adminManager->getPostsAdmin();
        $commentsId = $adminManager->getCommentsAdmin();
        $reportedComments = $adminManager->getReportedComments();
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
        $deletePostId->deletePostComments($_POST['delete']);
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

    // validation d'un commentaire signalé
    public function confirmComment() {
        $okComment = new AdminManager;
        $okComment->okReportedComment($_POST['confirmComment']);
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
    } else if(isset($_POST['confirmComment'])) {
        $adminController->confirmComment();
    }