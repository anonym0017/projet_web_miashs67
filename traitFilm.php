<?php
include "connectBdd.php";

    //verification et introduction dans la table realisateur
        // try {
        //     $sql="insert into realisateur(nom_real, prenom_real, date_naiss, date_dec) values(:nom, :prenom, :dateNaiss, :dateDeces)";
        //     //on prepare la requete dans un tableau
        //     $resultat = $cnx->prepare($sql);
        //     //on affecte les champs du formulaire à des variables
        //     $rname = $_POST["nom_real"];
        //     $rfname = $_POST["prenom_real"];
        //     $rnaiss = $_POST["date_naiss"];
        //     $rdeces = $_POST["date_dec"]; // rajouter un if on met pas de date
        //     $nbLignes= $resultat->execute(array(":nom" => $rname, "prenom" => ));
        //     }


        //verification et introduction dans la table film
        try {
            $sql="insert into film(titre, titrevo, resume, anneepub, image, categorie) values(:titre, :titrevo, :resume, :annee, :photo, :numRealisateur, :categorie)";
            //on prepare la requete dans un tableau
            $resultat = $cnx->prepare($sql);
            //on affecte les champs du formulaire à des variables
            $ftitre = $_POST["titre"];
            $ftitrevo = $_POST["titrevo"];
            $fresume = $_POST["resume"];
            $fannee = $_POST["anneepub"];
            $fimage = $_POST["image"];
            $nReal = 1; //rajouter un code sql ici
            $fcateg = $_POST["categorie"];
            $nbLignes= $resultat->execute(array(":titre" => $ftitre,":titrevo" => $ftitrevo, ":resume" => $fresume, ":annee" => $fannee, ":photo" => $fimage, ":numRealisateur" => $nReal, ":categorie" => $fcateg));

            echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Success!</strong> film ajouté.
                 </div>";
                 
            require "ajoutFilm.php";
            }

        catch(PDOException $e) {   // gestion des erreurs
                echo"ERREUR dans l'ajout  " . $e->getMessage();
            }

?>


















//fin
