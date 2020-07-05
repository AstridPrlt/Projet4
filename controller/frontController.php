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
$reqPostId = $postManager->getPost();

$reqComments = new CommentManager;
$reqPostComments = $reqComments->getComments();

require '../view/post.php';
}

function getPostComments() 
{    
$reqComments = new CommentManager;
$reqPostComments = $reqComments->getComments();
}

function admin() 
{
$postManager = new PostManager;
$postManager->dbConnect();

$reqPosts = $postManager->getPosts();
require '../view/admin.php';
}