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
    <script>tinymce.init({selector: 'textarea.editor', menubar: true, plugins: "paste"});</script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../public/img/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../public/css/styles.css" rel="stylesheet" />
  </head>

  <body>
    <div class="wrap vh-100">
        <div class="container">
            <div class="row justify-content-md-center">
                <h2 class="text-center text-light">Bienvenue sur la page administrateur du site "Billet simple pour l'Alaska" !</h2>
                <div class="col-md-12 col-lg-8">
                    <?php
                    if(isset($_POST['updatePost'])){
                    $updateTitle = $_POST['updateTitle'];
                    $updateContent = $_POST['updateContent'];
                    ?>
                        <form action="../controller/adminController.php" method="post">
                            <input type="hidden" name="getIdPost" value="<?= $_POST['updatePost']?>"></input>
                            <input type="text" placeholder="Titre" name="title" value="<?= $updateTitle ?>" required></input>
                            <div class="form-group">
                                <textarea class="editor" rows=15 name="content" required><?= $updateContent ?></textarea>
                            </div>
                            <button type="submit" name="update" value="<?= $_POST['updatePost']?>" class="btn btn-primary">Publier</button>
                        </form>
                    <?php 
                    } else { ?>
                        <form action="../controller/adminController.php" method="post">
                            <h2 class="h2 mb-4">Ecrire un nouvel épisode :</h2>
                            <input required type="text" placeholder="Titre" name="title" class="w-100 mb-2"></input>
                            <div class="form-group">
                                <textarea class="editor" rows=15 name="content"></textarea>
                            </div>
                            <button type="submit" name="createPost" class="btn btn-primary">Publier</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php 
        // foreach($allPostsAdmin as $dataPost) {
            for($i = 0; $i<count($allPostsAdmin); $i++) {
        ?>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?= $allPostsAdmin[$i]['id']?>" aria-expanded="false" aria-controls="collapse<?= $allPostsAdmin[$i]['id']?>">Episode <?= $rank[$i][0]. " : " . $allPostsAdmin[$i]['title']?></button>
                </h2>
            </div>

            <div id="collapse<?= $allPostsAdmin[$i]['id']?>" class="collapse" aria-labelledby="heading<?= $allPostsAdmin[$i]['id']?>" data-parent="#accordionExample">
                <div class="card-body"><?= $allPostsAdmin[$i]['content']; ?></div>
                <div class="d-flex justify-content-center">
                    <form method="post">
                        <input type="hidden" name="updateTitle" value="<?= $allPostsAdmin[$i]['title']?>"></input>
                        <input type="hidden" name="updateContent" value="<?= $allPostsAdmin[$i]['content']?>"></input>
                        <button type="submit" name="updatePost" value="<?= $allPostsAdmin[$i]['id']?>" class="btn btn-primary m-3">Modifier</button>
                    </form>
                    <form id="delForm" method="post" action="../controller/adminController.php">
                        <button type="submit" name="delete" value="<?= $allPostsAdmin[$i]['id']?>" class="btn btn-danger m-3" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?');">Supprimer</button>
                    </form>
                </div>

                <!--la liste des commentaires du post-->
                <?php
                foreach($commentsId as $commentId) {
                    if($commentId['id_post'] == $allPostsAdmin[$i]['id']) {
                ?>
                <div class="list-group w-75 m-auto">
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex mb-1 justify-content-between">
                            <h4>Par <strong><?= htmlspecialchars($commentId['author']);?></strong></h4>
                            <small><?= $commentId['date_comment'];?></small>
                        </div>
                        <div class="d-flex mb-1 justify-content-between">
                            <p class="text-break"><?= htmlspecialchars($commentId['comment']);?></p>
                            <button form="delForm" type="submit" name="deleteComment" value="<?= $commentId['id'] ?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?');">&#x274C</button>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>
    <?php } ?>
        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>