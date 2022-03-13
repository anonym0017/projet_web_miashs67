<?php

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

            echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <strong>Success!</strong> film ajouté.
                 </div>";

            //require "ajoutFilm.php";
            require "ajoutFilm.php";
            }

        catch(PDOException $e) {   // gestion des erreurs
                echo"ERREUR dans l'ajout  " . $e->getMessage();
            }

?>


















//fin
