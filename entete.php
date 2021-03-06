<?php session_start();

?>

<html lang="fr">
<head>
  <title> AkimbO </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="stylee.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
      <a class="navbar-brand" href="index.php"><img src='images/AkimbO.png' alt='logo' style='width:120px; height:50px'></a>
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
                            echo "<a class='dropdown-item' href='tri.php?cate=".$ligne["categorie"]."'>".$ligne["categorie"]."</a>";
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

                  $sql="SELECT * FROM realisateur";// on écrit la requête sous forme de chaine de caractères
                  try{
                      $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
                       // lecture du curseur $résultat  dans un tableau associatif
                      $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
                          foreach($tabloResultat as $ligne)   {
                            echo "<a class='dropdown-item' href='tri.php?rea=".$ligne["num"]."'>".$ligne["prenom"].' '.$ligne["nom"]."</a>";
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
              Filtre
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class='dropdown-item' href='filtre.php?filtre1=1'>Année</a>
              <a class='dropdown-item' href='filtre.php?filtre2=2'>Classement</a>
              <?php
              if (isset($_SESSION['Nom_utilisateur'])) {
                echo "<a class='dropdown-item' href='filtre.php?filtre3=3'>Mes préférences</a>";
              }
              ?>

            </div>
          </li>

            <?php
            if (isset($_SESSION['Nom_utilisateur'])) {
              // code...
              if ($_SESSION['statut'] == 0) {
                // si admin
                echo "<li class='nav-item'><a class='nav-link text-light' href='selectRealisateur.php' border = 1px>Ajouter</a></li>";
              }
                echo "<li class='nav-item'><a class='nav-link' href='deco.php' border = 1px>déconnexion</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='' border = 1px>Salut ".$_SESSION['Nom_utilisateur'].",</a></li>";
            }
            else {
              // code...
              echo "<li class='nav-item'><a class='nav-link' href='Formconnexion.php' border = 1px>connexion</a></li>";
            }
            ?>



        </ul>
        </div>



      </nav>
  </header>
