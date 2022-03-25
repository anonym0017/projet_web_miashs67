<?php

if (isset($_POST["valide"])) {
  include "connectBdd.php";
  //on affecte les champs du formulaire à des variables
  $ftitre = htmlspecialchars($_POST["titre"]);
  $ftitrevo = htmlspecialchars($_POST["titrevo"]);
  $fresume = htmlspecialchars($_POST["resume"]);
  $fannee = $_POST["annee"];
  $fimage = "images/".$_POST["photo"];//["photo"];
  $nReal = $_GET["num"]; //r
  $fcateg = $_POST["categorie"];

  //verif si le film n'existe pas déja
  $requete = "SELECT * FROM film where titre = :titre and annee = :annee and numRealisateur =:numRealisateur";
  $resulta = $cnx->prepare($requete);
  $resulta->execute(array(":titre"=>$ftitre, ":annee"=>$fannee, ":numRealisateur"=>$nReal));
  $tabloResultat=$resulta->fetchAll(PDO::FETCH_ASSOC);

          try {
            if (empty($tabloResultat)) {
              $sql="insert into film(titre, titrevo, resume, annee, photo, numRealisateur, categorie) values(:titre, :titrevo, :resume, :annee, :photo, :numRealisateur, :categorie)";
              //on prepare la requete dans un tableau
              $resultat = $cnx->prepare($sql);

              $nbLignes= $resultat->execute(array(":titre" => $ftitre,":titrevo" => $ftitrevo, ":resume" => $fresume, ":annee" => $fannee, ":photo" => $fimage, ":numRealisateur" => $nReal, ":categorie" => $fcateg));

              header("Location: index.php?bang=1");
              }
            }
            else {
              // code...
              echo "<div class='alert alert-danger alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                      <strong>Attention!</strong> Film existant!!!
                    </div>";
            }
            }

          catch(PDOException $e) {   // gestion des erreurs
                  echo"ERREUR dans l'ajout  " . $e->getMessage();
              }

}
require "entete.php";

if (!isset($_SESSION['Nom_utilisateur'])) {
  header("Location:Formconnexion.php");
  if ($_SESSION['statut'] != 0) {
    // code...
    header("Location:index.php");
  }
}
?>

<section>
        <div class="container" style="margin-top:40px">
          <h1> Ajouter un film </h1>

          <div class="row">


            <div class="col-sm-8">

                <form action="" method="post">
                <div class="form-group">
                    <label for="NameDemo">Titre :</label>
                    <input type="text" name="titre" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre nom" required>

                </div>
                <div class="form-group">
                    <label for="NameDemo"> Titre original:</label>
                    <input type="text" name="titrevo" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre prénom" required>

                </div>
                <div class="form-group">
                    <label for=""> Résumé :</label>
                    <textarea name="resume" class="form-control" rows="10" cols="70%" required></textarea>
                </div>

                <div class="form-group">
                    <label for="">Année de publication :</label>
                    <input type="text" name="annee" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for=""> Image :</label>
                    <input type="file" name="photo" class="input-group" required>
                </div>

                <div class="form-group">
                    <label for=""> Catégorie :</lhttp://localhost/projet_web_miashs67/index.php#demoabel>
                    <input type="text" name="categorie" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success" name="valide"> Enregistrer </button>
                <button type="reset" class="btn btn-danger" name="annuler">Annuler</button>
                </form>
            </div>
          </div>
        </div>
</section>

<?php require "footer.html" ?>
