<?php
namespace OCR\P4\model;
require_once 'database.php';

class CommentManager extends Database {

    //liste des commentaires pour un post
    public function getComments() 
    {
        $db = $this->dbConnect();
        $reqPostComments = $this->bdd->prepare('SELECT c.id, id_post, author, comment, DATE_FORMAT(date_comment, \'Le %d/%m/%Y à %H h %i\') AS date_comment FROM posts p INNER JOIN comments c ON p.id = c.id_post WHERE p.id=? ORDER BY c.date_comment DESC');
        $reqPostComments->execute(array($_GET['id']));
        $commentsId = $reqPostComments->fetchAll();
        $reqPostComments->closeCursor();
        return $commentsId;
        
    }
    
    //création d'un commentaire
    public function addComment()
    {
        if (!empty(($_POST['nom'])) && strlen(($_POST['nom'])) <= 30 && !empty($_POST['commentaire'])) {
        $db = $this->dbConnect();
        $reqAddComment = $this->bdd->prepare('INSERT INTO comments(id_post, rank_post, author, date_comment, comment) VALUES(?, ?, ?, NOW(), ?)');
        $reqAddComment->execute(array($_POST['getId'], $_POST['getRank'], $_POST['nom'], $_POST['commentaire']));
        $reqAddComment->closeCursor();
        }
    }

    //signaler un commentaire
    public function addReportComment($id)
    {
        $db = $this->dbConnect();
        $addReport = $this->bdd->prepare('UPDATE comments SET reported = 1 WHERE id = ?');
        $addReport->execute(array($id));
        $addReport->closeCursor();
    }
}