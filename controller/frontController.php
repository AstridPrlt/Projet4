<?php

use \OCR\P4\model\PostManager;
use \OCR\P4\model\CommentManager;
use \OCR\P4\model\AdminManager;
require_once '../model/postManager.php';
require_once '../model/commentManager.php';
require_once '../model/adminManager.php';

function getAllPosts() 
{
$postManager = new PostManager;
$allPosts = $postManager->getPosts();
require '../view/roman.php';
}

function getPostById() 
{
$postManager = new PostManager;
$dataId = $postManager->getPost();

$reqComments = new CommentManager;
$commentsId = $reqComments->getComments();

require '../view/post.php';
}

function getLastPost()
{
    $postManager = new PostManager;
    $dataLast = $postManager->getLast();
    return $dataLast;
    // require '../view/home.php';
}

function addNewComment()
{
    $reqAddNewComment = new CommentManager;
    $newComment = $reqAddNewComment->addComment();
}
