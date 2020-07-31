<?php
namespace OCR\P4\controller;

require_once '../autoloader.php';
use \OCR\P4\model\PostManager;
use \OCR\P4\model\CommentManager;
use \OCR\P4\model\AdminManager;


class FrontController {

//renvoie la page "roman" avec la liste de tous les épisodes
public function getAllPosts() 
{
    $postManager = new PostManager;
    $allPosts = $postManager->getPosts();
    require '../view/roman.php';
}

//revoie la page de l'épisode demandé avec ses commentaires
public function getPostById() 
{
    $postManager = new PostManager;
    $dataId = $postManager->getPost();

    $reqComments = new CommentManager;
    $commentsId = $reqComments->getComments();

    require '../view/post.php';
    return $dataId;
}

//renvoie le dernier épisode publié pour la page d'accueil
public function getLastPost()
{
    $postManager = new PostManager;
    $dataLast = $postManager->getLast();
    return $dataLast;
}

}

$frontController = new FrontController;