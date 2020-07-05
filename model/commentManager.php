<?php
namespace OCR\P4\model;
require_once 'database.php';
use \OCR\P4\model\CommentSetup;

class CommentManager extends Database {

    //liste des commentaires pour un post
    public function getComments() 
    {
        $db = $this->dbConnect();
        $reqPostComments = $this->bdd->prepare('SELECT * FROM posts p INNER JOIN comments c ON p.id = c.id_post WHERE p.id=?');
        $reqPostComments->execute(array($_GET['id']));
        return $reqPostComments;
    }
    
    //création d'un commentaire
    public function addComment()
    {

    }

    //suppression d'un commentaire
    public function deleteComment()
    {

    }
}