<?php
require "entete.php";
require "connectBdd.php";

$annee = "SELECT * FROM film WHERE annee=:annee";
$categorie = "SELECT * FROM film WHERE categorie=:categorie";
$realisateur = "SELECT * FROM film WHERE numRealisateur=:numRealisateur";
//pour avoir le nom du realisateur
$nom_real = "SELECT * FROM realisateur WHERE num=:num";


try{
  if (isset($_GET["cate"])) {
    // traitement par catégories
    $resultat = $cnx->prepare($categorie);
    $resultat->execute(array(':categorie' => $_GET["cate"]));
    $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
      //premiere ligne de film, il faut mettre par categorie
      ?>
        <div class="container p-3 my-3" style="border-top: 5px solid blue;">
          <fieldset>
            <legend><strong><?php echo $_GET["cate"];  ?></strong></legend>
          <div class="row">
      <?php
        foreach($tabloResultat as $ligne)   {

          echo "
            <div class='col-sm-4' style='margin-top:2rem;'>
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

  elseif (isset($_GET["rea"])) {
    // traitement par realisateur
    $resultat = $cnx->prepare($realisateur);
    $resultat->execute(array(':numRealisateur' => $_GET["rea"]));
    $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
      //premiere ligne de film, il faut mettre par realisateur
      ?>
        <div class="container p-3 my-3" style="border-top: 5px solid blue;">
          <fieldset>
            <legend><strong><?php
            $resulto = $cnx->prepare($nom_real);
            $resulto->execute(array(':num' => $_GET["rea"]));
            $tabloResulto=$resulto->fetchAll(PDO::FETCH_ASSOC);
            foreach ($tabloResulto as $key) {
              // tout ceci pour afficher le nom du realisateur au debut pufffff
              echo $key["prenom"]." ".$key["nom"];
            }
            ?></strong></legend>
          <div class="row">
      <?php
      if (empty($tabloResultat)) {
        // code...
        echo "aucun film";
      }
      else {
        // code...
        foreach($tabloResultat as $ligne)   {

          echo "
            <div class='col-sm-4' style='margin-top:2rem;'>
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

      }

       ?>
       </div>
     </fieldset>
     </div>

<?php
}// fin realisateur

elseif (isset($_GET["annee"])) {
  // traitement par catégories
  $resultat = $cnx->prepare($annee);
  $resultat->execute(array(':annee' => $_GET["annee"]));
  $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
    //premiere ligne de film, il faut mettre par categorie
    ?>
      <div class="container p-3 my-3" style="border-top: 5px solid blue;">
        <fieldset>
          <legend><strong><?php echo $_GET["annee"];  ?></strong></legend>
        <div class="row">
    <?php
      foreach($tabloResultat as $ligne)   {

        echo "
          <div class='col-sm-4' style='margin-top:2rem;'>
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
}//fin année

else {
  header("Location:index.php");
}


}

catch(PDOException $e) {   // gestion des erreurs
        echo"ERREUR PDO  " . $e->getMessage();
}

require "footer.html"; ?>
