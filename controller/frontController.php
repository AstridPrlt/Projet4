<?php
namespace OCR\P4\controller;

use \OCR\P4\model\PostManager;
use \OCR\P4\model\CommentManager;
use \OCR\P4\model\AdminManager;
require_once '../model/postManager.php';
require_once '../model/commentManager.php';
require_once '../model/adminManager.php';

class FrontController {

public function getAllPosts() 
{
    $postManager = new PostManager;
    $allPosts = $postManager->getPosts();
    require '../view/roman.php';
}

public function getPostById() 
{
    $postManager = new PostManager;
    $dataId = $postManager->getPost();

    $reqComments = new CommentManager;
    $commentsId = $reqComments->getComments();

    require '../view/post.php';
    return $dataId;
}

public function getLastPost()
{
    $postManager = new PostManager;
    $dataLast = $postManager->getLast();
    return $dataLast;
}

}

$frontController = new FrontController;