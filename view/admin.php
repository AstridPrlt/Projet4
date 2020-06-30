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
                    <h1 class="h2 mb-4">Nouvel épisode</h1>
                    <label>Describe the issue in detail</label>
                    <div class="form-group">
                        <textarea id="editor" rows=15></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </div>
        </div>
    </div>

    <?php 
        while($data = $reqPosts->fetch()) {
        ?>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?= $data['id']?>" aria-expanded="false" aria-controls="collapse<?= $data['id']?>">Episode <?= $data['id']. " : " . $data['title']?></button>
            </h2>
        </div>

        <div id="collapse<?= $data['id']?>" class="collapse" aria-labelledby="heading<?= $data['id']?>" data-parent="#accordionExample">
            <div class="card-body">
                <?= $data['content']?>
            </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary m-3">Modifier</button>
            <button type="submit" class="btn btn-danger m-3">Supprimer</button>
        </div>
        </div>
    </div>
        <?php } 
        $reqPosts->closeCursor();
        ?>
        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>