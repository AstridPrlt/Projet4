<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Espace privé</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--TinyMCE-->
    <script src="https://cdn.tiny.cloud/1/b2hlk206i664rolu1ltqguctqtkyinihjfk583idalf3l1zx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: 'textarea#editor', menubar: true});</script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../public/img/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../public/css/styles.css" rel="stylesheet" />
  </head>

  <body>
    <div class="wrap vh-100">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-12 col-lg-8">
                    <form action="" method="post">
                        <h1 class="h2 mb-4">Nouvel épisode</h1>
                        <input type="text" placeholder="Titre" name="title"></input>
                        <div class="form-group">
                            <textarea id="editor" rows=15 name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
        foreach($allPosts as $dataPost) {
        ?>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?= $dataPost['id']?>" aria-expanded="false" aria-controls="collapse<?= $dataPost['id']?>">Episode <?= $dataPost['id']. " : " . $dataPost['title']?></button>
            </h2>
        </div>

        <div id="collapse<?= $dataPost['id']?>" class="collapse" aria-labelledby="heading<?= $dataPost['id']?>" data-parent="#accordionExample">
            <div class="card-body">
                <?= $dataPost['content']?>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary m-3">Modifier</button>
                <button type="button" class="btn btn-danger m-3">Supprimer</button>
            </div>
            <?php
            foreach($commentsId as $commentId) {
                if($commentId['id_post'] == $dataPost['id']) {
            ?>
        <!--la liste des commentaires du post-->
            <div class="list-group w-75 m-auto">
                <div class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-1">Par <strong><?= htmlspecialchars($commentId['author']);?></strong></h4>
                        <small><?= $commentId['date_comment'];?></small>
                    </div>
                    <p class="mb-1"><?= htmlspecialchars($commentId['comment']);?></p>
                    <button type="button" class="btn btn-danger">&#x274C</button>
                </div>
            </div>

            <?php
                }
            }
            ?>
        </div>
    </div>
        <?php 
        }
        ?>
        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>