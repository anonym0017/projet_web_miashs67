<?php
//action apres validation
if (isset($_POST["valider"])) {
  // code...
  $rea = $_POST["listerea"];
  header("Location:ajoutFilm.php?num=".$rea);
}

include "entete.php";
include "connectBdd.php"; //appel de la bdd
if (!isset($_SESSION['Nom_utilisateur'])) {
  header("Location:Formconnexion.php");
  if ($_SESSION['statut'] != 0) {
    // code...
    header("Location:index.php");
  }
}

?>
    <br><br><br>
    <div class="col-sm-8">
    <form action="" method="post">

    <label> Choix du réalisateur : </label>
    <select name="listerea">
    <?php
    $sql="SELECT distinct nom, prenom, num FROM realisateur";// on écrit la requête sous forme de chaine de caractères
    try{
        $resultat = $cnx->query($sql); // on exécute la requête qui renvoie un curseur
         // lecture du curseur $résultat  dans un tableau associatif
        $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
            foreach($tabloResultat as $ligne)   {
               echo "<option class='form-group'  value='".$ligne["num"]."'>".$ligne["prenom"]." ".$ligne["nom"]."</option>";
           }
    }
    catch(PDOException $e) {   // gestion des erreurs
            echo"ERREUR PDO  " . $e->getMessage();
    }
    ?>
    </select>
    <br>
    <br>
    <button class="btn btn-success" type="submit" name="valider"> Valider </button>
    <a class="btn btn-primary" href="ajoutRealisateur.php" role="button">
    nouveau réalisateur
    </a>
    </form>
  </div>

  <br><br><br><br><br>

<?php include "footer.html"; ?>
