

<?php require 'entete.php';
include "connectBdd.php";

if (isset($_POST["valider"])) {
  try {
      $sql="insert into utilisateur(Nom_utilisateur, Prenom_utilisateur, mail_utilisateur, mot_de_passe, statut) values(:Nom_utilisateur, :Prenom_utilisateur, :mail_utilisateur, :mot_de_passe, :statut)";
      //on prepare la requete dans un tableau
      $resultat = $cnx->prepare($sql);
      //on affecte les champs du formulaire à des variables
      $uname = $_POST["Nom_utilisateur"];
      $ufname = $_POST["Prenom_utilisateur"];
      $umail = $_POST["mail_utilisateur"];
      $upw = $_POST["mot_de_passe"];
      $stat = 1;

      $nbLignes= $resultat->execute(array(":Nom_utilisateur" => $uname,":Prenom_utilisateur" => $ufname, ":mail_utilisateur" => $umail, ":mot_de_passe" => $upw, ":statut" => $stat));
      echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Success!</strong> utilisateur ajouté.
           </div>";
      //require "FormInscription.php";
      header ("FormInscription.php");
      }

      catch(PDOException $e) {   // gestion des erreurs
          echo"ERREUR dans l'ajout  " . $e->getMessage();
      }

}
?>



<section>
        <div class="container" style="margin-top:40px">
          <div class="row">


            <div class="col-sm-8">

                <form action="Forminscription.php" method="post">
                <div class="form-group">
                    <label for="NameDemo">Nom :</label>
                    <input type="text" name="Nom_utilisateur" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre nom">

                </div>
                <div class="form-group">
                    <label for="NameDemo">Prenom :</label>
                    <input type="text" name="Prenom_utilisateur" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre prénom">

                </div>
                <div class="form-group">
                    <label for="EmailDemo">Email :</label>
                    <input type="email" name="mail_utilisateur" class="form-control" id="EmailDemo" aria-describedby="emailHelp" placeholder="Entrez votre email">

                </div>
                <div class="form-group">
                    <label for="passDemo">Mot de passe :</label>
                    <input type="password" name="mot_de_passe" class="form-control" id="passDemo" aria-describedby="passHelp" placeholder="Entrez votre mot de passe">
                    <small id="passHelp" class="form-text text-muted">4 caractères minimum</small>
                </div>


                <button type="submit" class="btn btn-success" name="valider">Créer votre compte</button>
                </form>
            </div>
          </div>
        </div>
</section>
 <!-- FOOTER -->
 <?php require 'footer.html';?>
</body>
</html>
