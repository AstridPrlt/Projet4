<?php

use \OCR\P4\model\PostManager;
use \OCR\P4\model\CommentManager;
require_once '../model/postManager.php';
require_once '../model/commentManager.php';

function getAllPosts() 
{
$postManager = new PostManager;
$reqPosts = $postManager->getPosts();
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

// function getPostComments() 
// {    
// $reqComments = new CommentManager;
// $commentsId = $reqComments->getComments();
// }

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

function admin() 
{
$postManager = new PostManager;
$postManager->dbConnect();

$reqPosts = $postManager->getPosts();
require '../view/admin.php';
}