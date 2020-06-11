<?php
// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("upload/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
      var_dump($_FILES);
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="assets\style.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
  <link href="img\icon.png" rel="icon">

  <title>tp upload</title>
</head>

<body>

  <!------------------------------------------------- HEADER ------------------------------->
  <header>
    <div id="img-accueil" class="container-fluid">
      <div class="row justify-content-lg-start justify-content-center text-center">
        <div class="col-12 justify-content-center text-center">
          <h1 class="typo-specialelite" id="titreHeader">Bovis-Shark</h1>
        </div>
      </div>
    </div>
  </header>
  <!------------------------------------------------- MAIN ------------------------------->
  <main id="id-main">
    <div class="container">
      <div class="row">
        <div class="row col-12 my-5 shadow" id="id-workarea">
          <!------------------------------------------------- COL GAUCHE ------------------------------->
          <div class="col-6 border my-5">
            <div>
              <img class="preview" />
            </div>
            <form action="index.php" method="post" enctype="multipart/form-data">
              <h2>Upload Fichier</h2>
              <label for="fileUpload">Fichier:</label>
              <input type="file" data-preview=".preview" name="photo" id="fileUpload">
              <input type="submit" name="submit" value="Upload">
              <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une
                taille maximale de 5 Mo.</p>
            </form>
          </div>

          <!------------------------------------------------- COL DROITE ------------------------------->
          <div class="col-6 my-5">
            <img src="img\cover-crop-circle.jpg" alt="cover-crop-circle-Astronogeek" width="100%">
          </div>

        </div>
      </div>
    </div>
  </main>
  <!------------------------------------------------- FOOTER ------------------------------->
  <footer>
    <div class="container-fluid">
      <div class="row justify-content-center text-center">
        <div class="col-12 foot1">
          <span>test123test</span>
        </div>
        <div class="col-12 foot2">
          <span>@copiright bla bla</span>
        </div>
      </div>
    </div>
  </footer>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
  <script src="assets/script.js"></script>
</body>

</html>