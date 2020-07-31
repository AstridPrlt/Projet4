<?php $title = "Connexion";

    ob_start(); ?>

<<<<<<< Updated upstream
    <div class="d-flex">
        <div class="col-6 container m-auto">
            <h2 class="text-center mb-4">Espace privé</h2>
            <form class="w-75 m-auto">
=======
    <div class="container-fluid vh-100">
      <div class="row vh-100">
        <div class="col col-sm-6 m-auto">
            <h2 class="text-center mb-4">Espace privé</h2>
            <form class="w-75 m-auto" method="post" action='../controller/AdminLogin.php'>
                <?php if(isset($_SESSION['erreur'])) {?>
                <div class="alert alert-danger" role="alert"><?= $_SESSION['erreur']; unset($_SESSION['erreur']); ?></div><?php } ?>
>>>>>>> Stashed changes
                <div class="form-group mx-auto">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse e-mail">
                </div>
                <div class="form-group mx-auto">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Connexion</button>
            </form>
        </div>
    
<<<<<<< Updated upstream
        <img class="col-6 vh-100 pr-0" src="../public/img/alaska.jpg" alt="">
    
=======
        <img class="d-none d-sm-inline-block col-sm-6 pr-0 vh-100" src="../public/img/alaska.jpg" alt="">
      </div>
>>>>>>> Stashed changes
    </div>
    
    <?php $content = ob_get_clean();

    require 'layout.php';
?>