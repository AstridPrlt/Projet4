<?php 
    $title = "Billet simple pour l'Alaska - Le Roman";

    ob_start(); ?>

    <!-- Masthead-->
    <header class="jumbotron-fluid h-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-middle">
                    <h1 class="text-uppercase text-white font-weight-bold">Le Roman</h1>
                </div>
            </div>
        </div>
    </header>

    <!--le corps de la page-->

    <a href="index.php?p=roman" class="pt-9 ml-5"><i class="fas fa-arrow-left mr-2"></i><span>Retour à la liste des épisodes</span></a>

    <section class="page-section">

    <!--le post-->
        <?php
            $data = $reqPostId->fetch()
         ?>

        <div class="container mb-5">
            <div class="card text-center">
                <h3 class="card-header text-left">Episode <?= $data['id'] . " : " . $data['title']; ?></h3>
                <div class="card-body">
                  <p class="card-text text-left"><?= $data['content']; ?></p>
                </div>
              </div>
            </div>
        </div>

        <!--le formulaire pour écrire un nouveau commentaire-->
        <form class="w-50 m-auto">
            <div class="form-group">
                <input required class="form-control" id="exampleFormControlTextarea1" placeholder="Nom*"></input>
            </div>
            <div class="form-group">
                <textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Commentaire*"></textarea>
            </div>
                <button type="submit" class="btn btn-primary rounded-pill">Envoyer</button>
        </form>

        <?php
            $reqPostId->closeCursor();
            $comments = $reqPostComments->fetch();
        ?>

        <!--la liste des commentaires du post-->
        <div class="list-group w-75 m-auto">
            <div class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between">
                    <h4 class="mb-1">Par <strong><?= $comments['author'];?></strong></h4>
                    <small><?= $comments['date_comment'];?></small>
                </div>
                <p class="mb-1"><?= $comments['comment'];?></p>
                <a href="#"><small>Répondre</small></a>
            </div>
        </div>

        <?php
            $reqPostComments->closeCursor();
        ?>

    </section>

    <?php $content = ob_get_clean();

    require 'layout.php';
?>