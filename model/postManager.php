<?php
namespace OCR\P4\model;
require_once 'database.php';
use \OCR\P4\model\PostSetup;

class PostManager extends Database {

    //liste des posts
    public function getPosts()
    {
        $db = $this->dbConnect();
        $reqPosts = $this->bdd->query('SELECT * FROM posts');
        return $reqPosts;
    }

    //récupération d'un post précis en fonction de l'id
    public function getPost()
    {
        $db = $this->dbConnect();
        $reqPostId = $this->bdd->prepare('SELECT * FROM posts WHERE id=?');
        $reqPostId->execute(array($_GET['id']));
        $dataId = $reqPostId->fetch();
        $reqPostId->closeCursor();
        return $dataId;
        
    }

    //récupération du dernier post rédigé
    public function getLast()
    {
        $db = $this->dbConnect();
        $reqLastPost = $this->bdd->query('SELECT * FROM posts WHERE id=(SELECT max(id) FROM posts)');
        //('SELECT * FROM posts ORDER BY id DESC LIMIT 1')
        $dataLast = $reqLastPost->fetch();
        $reqLastPost->closeCursor();
        return $dataLast;
        
    }

    //création d'un nouveau post
    public function addPost()
    {

    }

    //modification d'un post existant
    public function updatePost()
    {

    }

    //suppression d'un post
    public function deletePost()
    {

    }

}

?>
