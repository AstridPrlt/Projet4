<?php

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
    $rank = $postManager->rankPost();
    require '../view/roman.php';
}

public function getPostById() 
{
    $postManager = new PostManager;
    $dataId = $postManager->getPost();

    $reqComments = new CommentManager;
    $commentsId = $reqComments->getComments();

    require '../view/post.php';
}

public function getLastPost()
{
    $postManager = new PostManager;
    $lastPost = $postManager->getLast();
    $getRank = $postManager->rankPost();
    $rank = end($getRank);
    return $dataLast = array($lastPost, $rank);
    // require '../view/home.php';
}

}

$frontController = new FrontController;