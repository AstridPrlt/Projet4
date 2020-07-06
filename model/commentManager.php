<?php
namespace OCR\P4\model;
require_once 'database.php';
use \OCR\P4\model\CommentSetup;

class CommentManager extends Database {

    // s'assure de l'intégrité des données envoyées
    // public $name = dataValid($_POST["nom"]);
    // public $comment = dataValid($_POST["commentaire"]);
    
    // function dataValid($data)
    // {
    //     $data = htmlspecialchars($data);
    //     $data = stripslashes($data);
    // }

    //liste des commentaires pour un post
    public function getComments() 
    {
        $db = $this->dbConnect();
        $reqPostComments = $this->bdd->prepare('SELECT * FROM posts p INNER JOIN comments c ON p.id = c.id_post WHERE p.id=? ORDER BY c.date_comment DESC');
        $reqPostComments->execute(array($_GET['id']));
        $commentsId = $reqPostComments->fetchAll();
        $reqPostComments->closeCursor();
        return $commentsId;
        
    }
    
    //création d'un commentaire
    public function addComment()
    {
        if (!empty(($_POST['nom'])) && strlen(($_POST['nom'])) <= 20 && !empty($_POST['commentaire'])) {
        $db = $this->dbConnect();
        $reqAddComment = $this->bdd->prepare('INSERT INTO comments(id_post, author, date_comment, comment) VALUES(?, ?, NOW(), ?)');
        $reqAddComment->execute(array($_POST['getId'], $_POST['nom'], $_POST['commentaire']));
        $reqAddComment->closeCursor();
        }
    }

    //suppression d'un commentaire
    // public function deleteComment()
    // {
    //     $db = $this->dbConnect();
    //     $reqDelComment = $this->bdd->exec('DELETE FROM comments WHERE id=""');
    // }
}