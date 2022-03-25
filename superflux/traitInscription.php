<?php
// Connexion à la BDD, instanciation de l’objet $cnx
include "connectBdd.php";

//verification et introduction dans la base de donnée utilisateur
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
    ?>
