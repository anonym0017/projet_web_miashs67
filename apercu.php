<?php require "entete.php";

//traitement de la note
if (isset($_POST["valider"])) {
  // code...
  $fnote = $_POST["note"];

  if ($fnote != 0) {
    echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
             Vous venez d'attribuer une note de ".$fnote." à ce film
          </div>";
  }
  else {
    echo "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Attention!</strong> Saisissez une note valide!!!
          </div>";
  }
}

//on verifie s'il y a un element a afficher
if (!$_GET['num']) {
  header("Location:index.php");
}


$idfilm = $_GET["num"];

  $sql = "SELECT * FROM film WHERE num = :idfilm limit 1";
try {

  $resultat = $cnx->prepare($sql);
  $resultat->execute(array(':idfilm' => $idfilm));
  $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
?>
<div class='container' style='position:center;'>
<?php
  foreach ($tabloResultat as $ligne) {
    // code...
    echo "
    <br><br>

      <h2>".$ligne["titre"]."</h2>
      <div class='header'>
        <img src='".$ligne["photo"]."' class='img-fluid' alt='Responsive image'><br>
        <figcaption class='figure-caption'></figcaption>
      </div><br>
      <div>".$ligne["resume"]."</div>
    ";

  }

  if (isset($_SESSION['Nom_utilisateur'])) {
    // code...
    echo "<br><br>
    <form action='' method='post'>
        <div class='stars'>
            <i class='lar la-star' data-value='1'></i><i class='lar la-star' data-value='2'></i><i class='lar la-star' data-value='3'></i><i class='lar la-star' data-value='4'></i><i class='lar la-star' data-value='5'></i>
        </div>
        <input type='hidden' name='note' id='note' value='0'>
        <br>
        <button class='btn btn-success' type='submit' name='valider'>Noter</button>
    </form>
    <script src='jsnote.js'></script>";

    if ($_SESSION['statut'] == 0) {
      // code...
      echo "<a class='btn btn-danger' href='' role='button'>supprimer ce film</a>
            <a class='btn btn-primary' href='' role='button'>modifier ce film</a>";
    }
  }

?>
</div>
<?php
} catch (PDOException $e) {
  echo "ERREUR PDO ".$e->getMessage();
}

?>

<br><br>



<?php require "footer.html"; ?>
