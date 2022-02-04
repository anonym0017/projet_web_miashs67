<!DOCTYPE html>
<html lang="en">
<head>
  <title> AkimbO </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/1f7457abdb.js"></script>
  <style>
  </style>
</head>
<body>
  <!-- ENTETE -->
  <header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="index.php">AkimbO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              include "connectBdd.php";

                  $sql="SELECT distinct categorie FROM film";// on écrit la requête sous forme de chaine de caractères
                  try{
                      $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
                       // lecture du curseur $résultat  dans un tableau associatif
                      $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
                          foreach($tabloResultat as $ligne)   {
                            echo "<a class='dropdown-item' href='autres.php'>".$ligne["categorie"]."</a>";
                         }
                  }
                  catch(PDOException $e) {   // gestion des erreurs
                          echo"ERREUR PDO  " . $e->getMessage();
                  }
                  ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Realisateurs
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php

                  $sql="SELECT distinct nom, prenom FROM realisateur";// on écrit la requête sous forme de chaine de caractères
                  try{
                      $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
                       // lecture du curseur $résultat  dans un tableau associatif
                      $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
                          foreach($tabloResultat as $ligne)   {
                            echo "<a class='dropdown-item' href='autres.php'>".$ligne["prenom"].' '.$ligne["nom"]."</a>";
                         }
                  }
                  catch(PDOException $e) {   // gestion des erreurs
                          echo"ERREUR PDO  " . $e->getMessage();
                  }
                  ?>

            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="FormInscription.php">Classement</a>
          </li>
        </ul>
        <div class="form-inline">
          <a class="nav-link" href="FormInscription.php">Inscription</a>
          <button href="Formconnexion.php" class="btn btn-success" type="submit">connexion</button>
        </div>
        </div>

      </nav>
  </header>
