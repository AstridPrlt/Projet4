
<?php

use \OCR\P4\model\Manager\CommentManager;

require '../model/commentManager.php';

function postComments() 
{    
$reqComments = new CommentManager;
$reqComments->dbConnect();

$reqPostComments = $reqComments->getComments();

}