<?php require "entete.php";
if (!$_SESSION['Nom_utilisateur']) {
  header("Location:Formconnexion.php");
}
if (isset($_POST["valider"])) {
  include "connectBdd.php";

          try {
              $sql="insert into film(titre, titrevo, resume, annee, photo, numRealisateur, categorie) values(:titre, :titrevo, :resume, :annee, :photo, :numRealisateur, :categorie)";
              //on prepare la requete dans un tableau
              $resultat = $cnx->prepare($sql);
              //on affecte les champs du formulaire à des variables
              $ftitre = htmlspecialchars($_POST["titre"]);
              $ftitrevo = htmlspecialchars($_POST["titrevo"]);
              $fresume = htmlspecialchars($_POST["resume"]);
              $fannee = $_POST["annee"];
              $fimage = "images/".$_POST["photo"];//["photo"];
              $nReal = $_GET["num"]; //rajouter un code sql ici r
              $fcateg = $_POST["categorie"];

              $nbLignes= $resultat->execute(array(":titre" => $ftitre,":titrevo" => $ftitrevo, ":resume" => $fresume, ":annee" => $fannee, ":photo" => $fimage, ":numRealisateur" => $nReal, ":categorie" => $fcateg));

              header("Location: index.php?bang=1");
              }

          catch(PDOException $e) {   // gestion des erreurs
                  echo"ERREUR dans l'ajout  " . $e->getMessage();
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
                    <input type="text" name="titre" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre nom">

                </div>
                <div class="form-group">
                    <label for="NameDemo"> Titre original:</label>
                    <input type="text" name="titrevo" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre prénom">

                </div>
                <div class="form-group">
                    <label for=""> Résumé :</label>
                    <textarea name="resume" class="form-control" rows="10" cols="70%"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Année de publication :</label>
                    <input type="text" name="annee" class="form-control">
                </div>

                <div class="form-group">
                    <label for=""> Image :</label>
                    <input type="file" name="photo" class="input-group">
                </div>

                <div class="form-group">
                    <label for=""> Catégorie :</lhttp://localhost/projet_web_miashs67/index.php#demoabel>
                    <input type="text" name="categorie" class="form-control">
                </div>

                <button type="submit" class="btn btn-success" name="valider"> Enregistrer </button>
                <button type="reset" class="btn btn-danger" name="annuler">Annuler</button>
                </form>
            </div>
          </div>
        </div>
</section>

<?php require "footer.html" ?>
