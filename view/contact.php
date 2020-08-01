<?php $title = "Billet simple pour l'Alaska - Contact";

    ob_start(); ?>

    <!-- Masthead-->
    <header class="jumbotron-fluid h-50 flex-shrink-0">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-middle">
                    <h1 class="text-uppercase text-white font-weight-bold">Contact</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="page-section">
        <div class="container m-auto">
            <form class="col-10 col-md-6 m-auto" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleFormControlTextarea1" placeholder="Prénom" name="prenom" required></input>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleFormControlTextarea1" placeholder="Nom" name="nom"required></input>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse e-mail" name="email" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Envoyer</button>
            </form>
        </div>

        <?php
        if (isset($_POST['message'])) {
            $mailSent = mail('webcreation@astrid-perillat.fr', 'Contact "Billet simple pour l\'Alaska"', 'Message de ' . $_POST["prenom"] . ' ' . $_POST["nom"] . ' : ' . "\r\n" . $_POST['message'], 'From: ' . $_POST['email']);
            if($mailSent) {
                echo '<script>alert("Votre message a été envoyé")</script>';
			} else {
			  echo '<script type="text/javascript">alert("Erreur. Le message n\'a pas été envoyé")</script>';
            }
        }
    ?>
    </section>
    
    <script>
    if (window.history.replaceState) {
  		window.history.replaceState(null, null, window.location.href);
    }
    </script>
    
    <?php $content = ob_get_clean();

    require 'layout.php';
?>