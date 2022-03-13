<?php
require 'entete.php';
require 'connectBdd.php';
?>

<div id="demo" class="carousel slide" data-ride="carousel" height = "70px">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <?php
    $sql="SELECT * FROM film ORDER BY RAND() LIMIT 3";// on écrit la requête sous forme de chaine de caractères
    try{
        $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
         // lecture du curseur $résultat  dans un tableau associatif
        $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
        //premiere ligne de film, il faut mettre par categorie
  ?>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <?php
    $act = "active";

      foreach($tabloResultat as $ligne)   {

echo "<div class='carousel-item ".$act."' width=100%>
      <img src=".$ligne["photo"]." width=100% height = 550px>
      <div class='carousel-caption'>
        <h3><a class='btn btn-info' href='apercu.php?num=".$ligne["num"]."'>".$ligne["titrevo"]."</a></h3>
        <p>".$ligne["categorie"]." Incroyable!</p>
      </div>
    </div>";
    $act ="";

     }
     ?>

    </div>
<?php
}
catch(PDOException $e) {   // gestion des erreurs
        echo"ERREUR PDO  " . $e->getMessage();
}
?>


  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

<section>
<div class="container" style="margin-top:30px">

<?php
  $sql="SELECT * FROM film WHERE categorie = 'Science fiction' ORDER BY RAND() LIMIT 3";// on écrit la requête sous forme de chaine de caractères
  try{
      $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
       // lecture du curseur $résultat  dans un tableau associatif
      $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
      //premiere ligne de film, il faut mettre par categorie
      ?>
        <div class="container p-3 my-3 border">
          <div class="row">
      <?php
        foreach($tabloResultat as $ligne)   {

          echo "
            <div class='col-sm-4'>
              <div class='card' style='width:100%'>
                  <h3>".$ligne["titre"]."</h3>
                  <img class='card-img-top' src=".$ligne["photo"]." alt='Card image' style='width:100%; height:200px'>
                  <div class='card-body'>
                    <h6>".$ligne["titrevo"]."</h6>
                    <p>De ".$ligne["annee"]."</p>
                    <a href='apercu.php?num=".$ligne["num"]."' class='btn btn-primary stretched-link'>Regarder le film</a>
                  </div>
                </div>
          </div>";
       }
       ?>
        </div>
      </div>
       <?php
  }
  catch(PDOException $e) {   // gestion des erreurs
          echo"ERREUR PDO  " . $e->getMessage();
  }
?>

<?php //par categorie aussi
  $sql="SELECT * FROM film WHERE categorie = 'Animation' ORDER BY RAND() LIMIT 3";// on écrit la requête sous forme de chaine de caractères
  try{
      $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
       // lecture du curseur $résultat  dans un tableau associatif
      $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
      //premiere ligne de film, il faut mettre par categorie
      ?>
        <div class="container p-3 my-3 border">
          <div class="row">
      <?php
        foreach($tabloResultat as $ligne)   {
          echo "
            <div class='col-sm-4'>
              <div class='card' style='width:100%'>
                  <h3>".$ligne["titre"]."</h3>
                  <img class='card-img-top' src=".$ligne["photo"]." alt='Card image' style='width:100%; height:200px'>
                  <div class='card-body'>
                    <h6>".$ligne["titrevo"]."</h6>
                    <p>De ".$ligne["annee"]."</p>
                    <a href='apercu.php?num=".$ligne["num"]."' class='btn btn-primary stretched-link'>Regarder le film</a>
                  </div>
                </div>
          </div>";
       }
       ?>
        </div>
      </div>
       <?php
  }
  catch(PDOException $e) {   // gestion des erreurs
          echo"ERREUR PDO  " . $e->getMessage();
  }
?>

<?php // par Realisateurs
  $sql="SELECT * FROM film WHERE categorie = 'Fantastique' ORDER BY RAND() LIMIT 3";// on écrit la requête sous forme de chaine de caractères
  try{
      $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
       // lecture du curseur $résultat  dans un tableau associatif
      $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
      //premiere ligne de film, il faut mettre par categorie
      ?>
        <div class="container p-3 my-3 border">
          <div class="row">
      <?php
        foreach($tabloResultat as $ligne)   {
          echo "
            <div class='col-sm-4'>
              <div class='card' style='width:100%'>
                  <h3>".$ligne["titre"]."</h3>
                  <img class='card-img-top' src=".$ligne["photo"]." alt='Card image' style='width:100%; height:200px'>
                  <div class='card-body'>
                    <h6>".$ligne["titrevo"]."</h6>
                    <p>De ".$ligne["annee"]."</p>
                    <a href='apercu.php?num=".$ligne["num"]."' class='btn btn-primary stretched-link'>Regarder le film</a>
                  </div>
                </div>
          </div>";
       }
       ?>
        </div>
      </div>
       <?php
  }
  catch(PDOException $e) {   // gestion des erreurs
          echo"ERREUR PDO  " . $e->getMessage();
  }
?>

  <div class="container-fluid p-5 bg-primary text-white text-center rounded">
    <h1>My First Bootstrap Page</h1>
    <p>Resize this responsive page to see the effect!</p>
  </div>

  <?php // ici on fera par ordre (meilleure note)
    $sql="SELECT * FROM film WHERE categorie = 'Animation' ORDER BY RAND() LIMIT 3";// on écrit la requête sous forme de chaine de caractères
    try{
        $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
         // lecture du curseur $résultat  dans un tableau associatif
        $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
        //premiere ligne de film, il faut mettre par categorie
        ?>
          <div class="container p-3 my-3 border">
            <div class="row">
        <?php
          foreach($tabloResultat as $ligne)   {
            echo "
              <div class='col-sm-4'>
                <div class='card' style='width:100%'>
                    <h3>".$ligne["titre"]."</h3>
                    <img class='card-img-top' src=".$ligne["photo"]." alt='Card image' style='width:100%; height:200px'>
                    <div class='card-body'>
                      <h6>".$ligne["titrevo"]."</h6>
                      <p>De ".$ligne["annee"]."</p>
                      <a href='apercu.php?num=".$ligne["num"]."' class='btn btn-primary stretched-link'>Regarder le film</a>
                    </div>
                  </div>
            </div>";
         }
         ?>
          </div>
        </div>
         <?php
    }
    catch(PDOException $e) {   // gestion des erreurs
            echo"ERREUR PDO  " . $e->getMessage();
    }
  ?>

</div>
</section>
<?php require 'footer.html';?>

</body>
</html>
