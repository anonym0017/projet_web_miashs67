<?php
require 'entete.php';
require 'connectBdd.php';

if (isset($_SESSION['Nom_utilisateur'])) {

  //succes d'ajout de film
  if (isset($_GET["bang"])) {
    echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
             Film ajouté !</div>";
  }
  //supp de film
  if (isset($_GET["bang"])) {
    echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
             Film supprimé !</div>";
  }


}

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
      <img src=".$ligne["photo"]." width=100% height = 80%>
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
  <div class='container' style='position:center;'>

<?php
// afficahge de films selon trois catégories aléatoires de la bdd
  $requete = "SELECT distinct categorie FROM film ORDER BY RAND() limit 3";
try {
  $result = $cnx->query($requete); // on exécute la requête qui renvoie un curseur
  // lecture du curseur $résultat  dans un tableau associatif
  $tabloResult=$result->fetchAll(PDO::FETCH_ASSOC);

  foreach ($tabloResult as $lign) { // se realise 3 fois en fonction des 3 catégories du tableau

  $sql="SELECT * FROM film WHERE categorie = :categorie ORDER BY RAND() LIMIT 3";// on écrit la requête sous forme de chaine de caractères
  try{
    $resultat = $cnx->prepare($sql);
    $resultat->execute(array(':categorie' => $lign["categorie"]));
    $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
      //premiere ligne de film, il faut mettre par categorie
      ?>
        <div class="container p-3 my-3" style="border-top: 7px solid skyblue;">
          <fieldset>
            <legend><strong><?php echo $lign["categorie"];  ?></strong></legend>
          <div class="row">
      <?php
        foreach($tabloResultat as $ligne)   {
          echo "
            <div class='col-sm-4'>
              <div class='card' style='width:100%'>
                  <h5>".$ligne["titre"]."</h5>
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
      </fieldset>
      </div>
         <?php
    }
    catch(PDOException $e) {   // gestion des erreurs
            echo"ERREUR PDO  " . $e->getMessage();
    }
  } // fin du gros foreach
}
catch(PDOException $e) {   // gestion des erreurs
        echo"ERREUR PDO  " . $e->getMessage();
}

$sql1= "SELECT * FROM film ";
?>

  <div class="container-fluid p-5 bg-primary text-white text-center rounded">
    <h1>L'un des meilleurs films</h1>
    <p>Vivez une expérience unique avec AkimbO</p>
  </div>

  <?php // ici on fera par ordre (meilleure note)
    $sql="SELECT * FROM film ORDER BY noteMoyenne DESC LIMIT 3";// on écrit la requête sous forme de chaine de caractères
    try{
        $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
         // lecture du curseur $résultat  dans un tableau associatif
        $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
        //premiere ligne de film, il faut mettre par categorie
        ?>
          <div class="container p-3 my-3" style="border-top: 7px solid skyblue;">
            <fieldset>
              <legend><strong>PODIUM</strong></legend>
            <div class="row">
        <?php
        $i=1;
          foreach($tabloResultat as $ligne)   {
            echo "
              <div class='col-sm-4'>
                <div class='card' style='width:100%'>
                    <h3>N° ".$i." ".$ligne["titre"]."</h3>
                    <img class='card-img-top' src=".$ligne["photo"]." alt='Card image' style='width:100%; height:200px'>
                    <div class='card-body'>
                      <h6>".$ligne["titrevo"]."</h6>
                      <p>De ".$ligne["annee"]."</p>
                      <a href='apercu.php?num=".$ligne["num"]."' class='btn btn-primary stretched-link'>Regarder le film</a>
                    </div>
                  </div>
            </div>";
            $i++;
         }
         ?>
          </div>
          </fieldset>
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
