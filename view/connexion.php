<?php $title = "Connexion";

    ob_start(); ?>

    <div class="d-flex">
        <div class="col-6 container m-auto">
            <h2 class="text-center mb-4">Espace privé</h2>
            <form class="w-75 m-auto" method="post" action="../controller/adminController.php">
                <div class="form-group mx-auto">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse e-mail" name="pseudo">
                </div>
                <div class="form-group mx-auto">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" name="pw">
                </div>
                <button type="submit" name="login" class="btn btn-primary w-100 rounded-pill">Connexion</button>
            </form>
        </div>
    
        <img class="col-6 vh-100 pr-0" src="../public/img/alaska.jpg" alt="">
    
    </div>
    
    <?php $content = ob_get_clean();

    require 'layout.php';
?>