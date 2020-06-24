<?php $title = "Connexion";

    ob_start(); ?>

    <div class="d-flex">
        <div class="col-6 container m-auto">
            <form class="w-75 m-auto">
                <div class="form-group mx-auto">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse e-mail">
                </div>
                <div class="form-group mx-auto">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                </div>
                <div class="form-group form-check mx-auto">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Rester connecté</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Connexion</button>
            </form>
        </div>
    
        <img class="col-6 vh-100" src="../public/img/alaska2.jpg" alt="">
    
    </div>
    
    <?php $content = ob_get_clean();

    require 'layout.php';
?>