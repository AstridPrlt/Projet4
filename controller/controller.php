<?php

require '../model/postManager.php';

function romanPage() 
{
$reqPosts = getPosts();
require '../view/roman.php';
}

function postPage() 
{
$reqPostId = getPost();
require '../view/post.php';
}

function admin() 
{
$reqPosts = getPosts();
require '../view/admin.php';
}