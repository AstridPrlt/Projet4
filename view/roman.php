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

    <section class="page-section">

        <?php
            foreach($allPosts as $dataPost) {
        ?>

        <div class="container mb-5">
            <div class="card text-center">
                <h3 class="card-header text-left">Episode <?= $dataPost['id'] . " : " . $dataPost['title']; ?></h3>
                <div class="card-body">
                  <p class="card-text text-left"><?= substr($dataPost['content'], 0, 600) ?><a href="index?p=post&amp;id=<?= $dataPost['id']?>">...Lire la suite</a></p>
                </div>
              </div>
            </div>
        </div>

        <?php
            }
        ?>

        </section>

    <?php $content = ob_get_clean();

    require 'layout.php';
?>