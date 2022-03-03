
<?php
session_start();
include "connectBdd.php";

$login = $_POST['login'];
$mdp = $_POST['pwd'];

$requete="SELECT * FROM utilisateur WHERE mail_utilisateur = :login AND mot_de_passe = :mdp";


    // cette requête permet de récupérer l'utilisateur depuis la BD
try {
  $resultat = $cnx->prepare($requete);
  $resultat->execute(array(":login"=>$login, ":mdp"=>$mdp));
  $tabloResultat=$resultat->fetch(PDO::FETCH_ASSOC);

  if (!empty($tabloResultat)) {
    // code...
    //echo "Bienvenue ".$tabloResultat["Prenom_utilisateur"];
    echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            Bienvenue <strong>".$tabloResultat['Prenom_utilisateur']."!</strong>
          </div>";
    require "index.php";

  }

  else {
    // code...
    echo "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Attention!</strong> Identifiant et/ou Mot de passe incorrect(s)!!!
          </div>";
    require "Formconnexion.php";
  }


} catch (\PDOException $e) { //gestion des erreurs
  echo"ERREUR PDO  " . $e->getMessage(); // afficahge du message d'erreur
}


?>
