<?php
namespace OCR\P4\model;
require_once 'database.php';

class PostManager extends Database {

    //pour connaître le numéro de l'épisode (=son rang du post dans la liste)
    public function rankPost($idToRank)
    {
        $db = $this->dbConnect();
        $reqRank = $this->bdd->prepare('SELECT COUNT(*) FROM posts WHERE id <= ?');
        $reqRank->execute(array($idToRank));
        $rank = $reqRank->fetch();
        $reqRank->closeCursor();
        return $rank;
    }

    //liste des posts
    public function getPosts()
    {
        $db = $this->dbConnect();
        $reqPosts = $this->bdd->query('SELECT * FROM posts ORDER BY id');
        $allPosts = $reqPosts->fetchAll();
        $reqPosts->closeCursor();
        return $allPosts;
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

    public function rankLastPost()
    {
        $db = $this->dbConnect();
        $reqRank = $this->bdd->query('SELECT COUNT(*) FROM posts');
        $rank = $reqRank->fetch();
        $reqRank->closeCursor();
        return $rank;
    }

}

?>
