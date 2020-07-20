<?php 
    require_once '../controller/frontController.php';
    $dataLast = $frontController->getLastPost();

    $title = "Billet simple pour l'Alaska - Jean Forteroche";

    ob_start(); ?>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">Billet simple pour l'Alaska</h1>
                    <hr class="divider my-4" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">Découvrez la nouvelle aventure littéraire de Jean Forteroche</p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">J'embarque !</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Présentation de l'auteur-->
    <section class="page-section bg-primary" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <img src="../public/img/people1.jpg" alt="Jean Forteroche" class="rounded-circle mx-auto mb-3">
                    <h2 class="text-white mt-0">Jean Forteroche</h2>
                    <hr class="divider light my-4" />
                    <p class="text-white-50 mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. In ipsam hic dicta cum dolore nemo architecto autem adipisci natus consectetur aut illo pariatur optio, mollitia necessitatibus, qui expedita tempore esse?</p>
                    <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Le Roman</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Le dernier épisode -->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">Le dernier épisode publié</h2>
            <hr class="divider my-4" />
            <div class="card text-center">
                <h3 class="card-header text-left">Episode <?= $dataLast[1][0] . " : " .$dataLast[0]['title']; ?></h3>
                <div class="card-body">
                <!--  <h5 class="card-title">Special title treatment</h5> -->
                  <p class="card-text text-left"><?= substr($dataLast[0]['content'], 0, 600); ?><a href="index?p=post&amp;id=<?= $dataLast[0]['id']?>&amp;rank=<?= $dataLast[1][0]?>">...Lire la suite</a></p>
                  <a href="index.php?p=roman" class="btn btn-primary btn-xl">Voir tous les épisodes</a>
                </div>
              </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section bg-dark text-white">
        <div class="container text-center">
            <h2 class="mb-4">Restons en contact !</h2>
            <hr class="divider my-4" />
            <a class="btn btn-light btn-xl" href="index.php?p=contact">Ecrivez-moi</a>
        </div>
    </section>        
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <h2 class="text-center mt-0">Mes autres romans</h2>
            <hr class="divider my-4" />
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6">
                    <div class="portfolio-box"
                        ><img class="img-fluid" src="../public/img/portfolio/jungle.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Roman</div>
                            <div class="project-name">Au détour de la jungle</div>
                        </div></div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="portfolio-box"
                        ><img class="img-fluid" src="../public/img/portfolio/voyage.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Roman</div>
                            <div class="project-name">Le grand départ</div>
                        </div></div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="portfolio-box"
                        ><img class="img-fluid" src="../public/img/portfolio/rando.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Roman</div>
                            <div class="project-name">Aux antipodes</div>
                        </div></div>
                </div>
            </div>
        </div>
    </div>

    <?php $content = ob_get_clean();

    require 'layout.php';
?>