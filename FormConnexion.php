<?php
require "entete.php";

if (isset($_POST["valider"])) {
  include "connectBdd.php";
  
  // code...
  $requete="SELECT * FROM utilisateur WHERE mail_utilisateur = :login AND mot_de_passe = :mdp";
      // cette requête permet de récupérer l'utilisateur depuis la BD
  try {
    $resultat = $cnx->prepare($requete);
    $resultat->execute(array(":login"=>$_POST['login'], ":mdp"=>$_POST['pwd']));
    $tabloResultat=$resultat->fetch(PDO::FETCH_ASSOC);
    if (!empty($tabloResultat)) {
      // code...
      $_SESSION['Nom_utilisateur'] = $tabloResultat["Nom_utilisateur"];
      $_SESSION['Num_utilisateur'] = $tabloResultat["Num_utilisateur"];
      $_SESSION['statut'] = $tabloResultat["statut"];
      header('Location: index.php');
    }
    else {
      // code...
      echo "<div class='alert alert-danger alert-dismissible' style='margin-bottom:0'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              <strong>Attention!</strong> Identifiant et/ou Mot de passe incorrect(s)!!!
            </div>";
    }
  } catch (\PDOException $e) { //gestion des erreurs
    echo"ERREUR PDO  " . $e->getMessage(); // afficahge du message d'erreur
  }
}

//formulaire de connexion juste après
?>


<div  class="conex" style='margin-top:5%'>

<form action="" class="container was-validated" method="post">
  <div>
  <div class="form-group">
    <label>Identifiant :</label>
    <input type="text" name="login" class="form-control" id="username" placeholder="Entrer votre identifiant" required>
  </div>
  <div class="form-group">
    <label>Mot de passe :</label>
    <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Entrer votre mot de passe" required>
  </div>

  <button type="submit" class="btn btn-success" name="valider">connexion</button>
  <a class="btn btn-primary" href="FormInscription.php" role="button">
    S'inscrire
  </a>
</div>
</form>
<br><br>
</div>

<?php include 'footer.html'; ?>
