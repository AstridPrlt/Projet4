<?php

use \OCR\P4\model\PostManager;
use \OCR\P4\model\CommentManager;
require_once '../model/postManager.php';
require_once '../model/commentManager.php';

function romanPage() 
{
$postManager = new PostManager;
$reqPosts = $postManager->getPosts();
require '../view/roman.php';
}

function postPage() 
{
$postManager = new PostManager;
$reqPostId = $postManager->getPost();

$reqComments = new CommentManager;
$reqPostComments = $reqComments->getComments();

require '../view/post.php';
}

function admin() 
{
$postManager = new PostManager;
$postManager->dbConnect();

$reqPosts = $postManager->getPosts();
require '../view/admin.php';
}