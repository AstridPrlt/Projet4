<?php
<<<<<<< Updated upstream

//class PostManager extends Manager {
=======
namespace OCR\P4\model;

require_once '../autoloader.php';
use \OCR\P4\model\Database;

class PostManager extends Database {
>>>>>>> Stashed changes

    //liste des posts
    function getPosts()
    {
        require 'manager.php';

        $reqPosts = $bdd->query('SELECT * FROM posts');

        return $reqPosts;
    }

<<<<<<< Updated upstream
    //gestion d'un post précis
    //function getPost()

    function getPost()
    {
        require 'manager.php';

        $reqPostId = $bdd->prepare('SELECT * FROM posts WHERE id=?');
        $reqPostId->execute(array($_GET['id']));
        return $reqPostId;
    }
//}
=======
}
>>>>>>> Stashed changes

?>
