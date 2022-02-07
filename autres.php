<?php require 'entete.php';?>
<section>
<div class="container" style="margin-top:30px">
  <div class="row">

    <div class="col-sm-8" margin-left = auto>
      <?php
      include "connectBdd.php";
      $sql="SELECT * FROM film";
      $resultat = $cnx->query($sql); //renvoie un curseur
      $tabloResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
      foreach ($tabloResultat as $ligne) {
          echo "
          <article>
                  <h2>".$ligne["titre"]."</h2>
                  <h5>".$ligne["titrevo"]."</h5>
                  <h2>".$ligne["numRealisateur"]."</h2>
                  <img class='img-fluid' src=".$ligne["photo"]." width=750  >
                  <p>".$ligne["annee"]."</p>
                  <p>".$ligne["categorie"]."</p>
                  <p>".$ligne["resume"]."</p>
                  <br>
            </article>";}

            echo "Le nombre de films : ".count($tabloResultat);

      ?>
    </div>
</div>
</section>
 <!-- FOOTER -->
 <?php require 'footer.html';?>
</body>
</html>
