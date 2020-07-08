<?php
namespace OCR\P4\model;
require_once 'database.php';

class AdminManager extends Database {

    //liste des posts
    public function getPostsAdmin()
    {
        $db = $this->dbConnect();
        $reqPosts = $this->bdd->query('SELECT * FROM posts');
        $allPosts = $reqPosts->fetchAll();
        $reqPosts->closeCursor();
        return $allPosts;
    }
    
    //liste des commentaires pour la partie admin
    public function getCommentsAdmin() 
    {
        $db = $this->dbConnect();
        $reqPostComments = $this->bdd->query('SELECT * FROM comments ORDER BY date_comment DESC');
        $commentsId = $reqPostComments->fetchAll();
        $reqPostComments->closeCursor();
        return $commentsId;
        
    }
}