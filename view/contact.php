<?php $title = "Billet simple pour l'Alaska - Contact";

    ob_start(); ?>

    <!-- Masthead-->
    <header class="jumbotron-fluid h-50">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-middle">
                    <h1 class="text-uppercase text-white font-weight-bold">Contact</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="page-section">
        <div class="col-6 container m-auto">
            <form class="w-75 m-auto">
                <div class="form-group">
                    <input class="form-control" id="exampleFormControlTextarea1" placeholder="Prénom"></input>
                </div>
                <div class="form-group">
                    <input class="form-control" id="exampleFormControlTextarea1" placeholder="Nom"></input>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse e-mail">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Envoyer</button>
            </form>
        </div>
    </section>

    
    <?php $content = ob_get_clean();

    require 'layout.php';
?>