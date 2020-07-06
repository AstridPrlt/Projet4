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
        //    $data = $reqPostId->fetch()
         ?>

        <div class="container mb-5">
            <div class="card text-center">
                <h3 class="card-header text-left">Episode <?= $dataId['id'] . " : " . $dataId['title']; ?></h3>
                <div class="card-body">
                  <p class="card-text text-left"><?= $dataId['content']; ?></p>
                </div>
              </div>
            </div>
        </div>

        <!--le formulaire pour écrire un nouveau commentaire-->
        <form class="w-50 m-auto" method="post" action="../controller/newComment.php">
            <div class="form-group">
                <input type="hidden" name="getId" value="<?= $_GET['id'];?>"></input>
                <input required class="form-control" type="text" name="nom" id="exampleFormControlTextarea1" placeholder="Nom*" maxlength="20"></input>
            </div>
            <div class="form-group">
                <textarea required class="form-control" type="text" name="commentaire" id="exampleFormControlTextarea1" rows="3" placeholder="Commentaire*"></textarea>
            </div>
                <button type="submit" class="btn btn-primary rounded-pill">Envoyer</button>
        </form>

        <?php
         //   $reqPostId->closeCursor();
            foreach($commentsId as $commentId) {;
        ?>

        <!--la liste des commentaires du post-->
        <div class="list-group w-75 m-auto accordion" id="accordionExample">
            <div class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between">
                    <h4 class="mb-1">Par <strong><?= htmlspecialchars($commentId['author']);?></strong></h4>
                    <small><?= $commentId['date_comment'];?></small>
                </div>
                <p class="mb-1"><?= htmlspecialchars($commentId['comment']);?></p>
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?= $commentId['id']?>" aria-expanded="false" aria-controls="collapse<?= $commentId['id']?>"><small>Répondre</small></button>
                <div id="collapse<?= $commentId['id']?>" class="collapse" data-parent="#accordionExample">
                <form class="form-inline" method="post">
                    <div class="form-group col-2">
                        <input required class="form-control" id="exampleFormControlTextarea1" placeholder="Nom*" maxlength="20"></input>
                    </div>
                    <div class="form-group mx-2 col-7">
                        <textarea required class="form-control" id="exampleFormControlTextarea1" placeholder="Commentaire*" rows=1></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill">Envoyer</button>
                </form>
            </div>
        </div>
            

        </div>

        <?php
           } // $reqPostComments->closeCursor();
        ?>

    </section>

    <?php $content = ob_get_clean();

    require 'layout.php';
?>