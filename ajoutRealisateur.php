<?php require "entete.php";

if (!isset($_SESSION['Nom_utilisateur'])) {
  header("Location: Formconnexion.php");
  if ($_SESSION['statut'] != 0) {
    // code...
    header("Location: index.php");
  }
}

if (isset($_POST["valider"])) {
  // code...
  include "connectBdd.php";
  $rname = $_POST["nom_real"];
  $rfname = $_POST["prenom_real"];
  $rnaiss = $_POST["date_naiss"];
  $rdeces = $_POST["date_dec"]; // rajouter un if on met pas de date
  if (!isset($_POST["date_dec"])) {
    $redeces = NULL;
  }
  $num;


  $requete = "SELECT * FROM realisateur where nom = :nom_real and prenom = :prenom_real ";
  $resulta = $cnx->prepare($requete);
  $resulta->execute(array(":nom_real"=>$rname, ":prenom_real"=>$rfname));
  $tabloResultat=$resulta->fetchAll(PDO::FETCH_ASSOC);
    //verification et introduction dans la table realisateur
         try {

           if (empty($tabloResultat)) {
             // code...
             $sql="insert into realisateur(nom, prenom, dateNaiss, dateDeces) values(:nom, :prenom, :dateNaiss, :dateDeces)";
             //on prepare la requete dans un tableau
             $resultat = $cnx->prepare($sql);
             //on affecte les champs du formulaire à des variables
             $nbLignes= $resultat->execute(array(":nom" => $rname, ":prenom" =>$rfname, ":dateNaiss" =>$rnaiss, ":dateDeces" =>$rdeces));

             // on relance la recherche dans le tableau pour recuperer le num realisateur
            $nm= $cnx->lastInsertId();
            header("Location: ajoutFilm.php?num=".$nm);
           }
           else {
             // code...
             echo "<div class='alert alert-danger alert-dismissible'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>
                     <strong>Attention!</strong> réalisateur existant!!!
                   </div>";
           }

            }

          catch(PDOException $e) {   // gestion des erreurs
                  echo"ERREUR dans l'ajout  " . $e->getMessage();
              }

}

?>



















<section>
        <div class="container" style="margin-top:40px">
          <h1> Ajouter un réalisateur </h1>

          <div class="row">


            <div class="col-sm-8">

                <form action="" method="post">
                <div class="form-group">
                    <label for="NameDemo">Nom :</label>
                    <input type="text" name="nom_real" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre nom" required>
                </div>
                <div class="form-group">
                    <label for="NameDemo">Prénom :</label>
                    <input type="text" name="prenom_real" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre prénom" required>
                </div>
                <div class="form-group">
                    <label for="NameDemo">Date de Naissance :</label>
                    <input type="date" name="date_naiss" class="form-control" id="datemax" name="datemax" max="2002-12-31">
                </div>
                <div class="form-group">
                    <label for="NameDemo">Date de décès :</label>
                    <input type="date" name="date_dec" class="form-control" id="datemin" name="datemin" max="<?php echo date('Y-M-D'); ?>">
                </div>


                <button type="submit" class="btn btn-success" name="valider"> Continuer </button>
                <button type="reset" class="btn btn-danger" name="annuler"> Annuler </button>
                </form>
            </div>
          </div>
        </div>
</section>

<?php require "footer.html" ?>
