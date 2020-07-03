<?php
namespace OCR\P4\model;
require_once 'manager.php';

class CommentManager extends Manager {

    //liste des commentaires pour un article
    public function getComments() 
    {
        $db = $this->dbConnect();
        $reqPostComments = $this->bdd->prepare('SELECT * FROM posts p INNER JOIN comments c ON p.id = c.id_post WHERE p.id=?');
        $reqPostComments->execute(array($_GET['id']));
        return $reqPostComments;
    }
    
}