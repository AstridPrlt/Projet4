<?php

$title = "Page introuvable";

ob_start(); ?>

<header class="jumbotron-fluid h-50 flex-shrink-0">
        <div class="container h-100">
        </div>
    </header>

<div class="w-75 m-auto">
    <p>Erreur : il semblerait que la page demandée n'existe pas !</p>
</div>

<?php $content = ob_get_clean();

require 'layout.php';
?>