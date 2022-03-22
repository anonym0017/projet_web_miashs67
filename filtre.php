<?php
include "entete.php";

$annee = "SELECT distinct annee FROM film ORDER by annee DESC";

if (isset($_GET["filtre1"])) {
  // code...
  try{
      $resultat = $cnx->query($annee); // on exécute la requête qui renvoie un curseur
       // lecture du curseur $résultat  dans un tableau associatif
      $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);

      foreach($tabloResultat as $key) {

        ?>
          <div class="container p-3 my-3" style="border-top: 5px solid skyblue;">
            <fieldset>
              <legend><strong><?php echo $key["annee"];  ?></strong></legend>
            <div class="row">
        <?php

        $sql="SELECT * FROM film WHERE annee = :annee";// on écrit la requête sous forme de chaine de caractères
        try{
          $resulta = $cnx->prepare($sql);
          $resulta->execute(array(':annee' => $key["annee"]));
          $tabloResulta=$resulta->fetchAll(PDO::FETCH_ASSOC);
          foreach ($tabloResulta as $ligne) {
            // code...
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

        }
        catch(PDOException $e) {   // gestion des erreurs
                echo"ERREUR PDO  " . $e->getMessage();
        }
        ?>
      </div>
          </fieldset>
        </div>
        <?php
      }

  }
  catch(PDOException $e) {   // gestion des erreurs
          echo"ERREUR PDO  " . $e->getMessage();
  }
}
//par Classement
elseif (isset($_GET["filtre2"])) {
  // code...
  ?>
    <div class="container p-3 my-3" style="border-top: 5px solid skyblue;">
      <fieldset>
        <legend><strong> Classement </strong></legend>
        <br>
      <div class="row">
  <?php

  $sql="SELECT * FROM film WHERE noteMoyenne > 0 ORDER BY noteMoyenne DESC";// on écrit la requête sous forme de chaine de caractères
  try{
    $resulta = $cnx->query($sql);
    $tabloResulta=$resulta->fetchAll(PDO::FETCH_ASSOC);
    $classe = 0;
    foreach ($tabloResulta as $ligne) {
      // code...
      $classe += 1;
      echo "
        <div class='col-sm-4'>
          <div class='card' style='width:100%'>
              <h3>N° ".$classe."  ".$ligne["titre"]."</h3>
              <img class='card-img-top' src=".$ligne["photo"]." alt='Card image' style='width:100%; height:200px'>
              <div class='card-body'>
                <h6>".$ligne["titrevo"]."</h6>
                <p>Note : ".$ligne["noteMoyenne"]." / 5</p>
                <a href='apercu.php?num=".$ligne["num"]."' class='btn btn-primary stretched-link'>Regarder le film</a>
              </div>
            </div>
      </div>";
    }

  }
  catch(PDOException $e) {   // gestion des erreurs
          echo"ERREUR PDO  " . $e->getMessage();
  }
  ?>
</div>
    </fieldset>
  </div>
  <?php
}
//par pref
elseif (isset($_GET["filtre3"])) {
  // code...
  echo "bonsoir";
}

else {
  // code...
  echo "bonjour";
}

include "footer.html";
?>
