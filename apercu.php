<?php require "entete.php";
$idfilm = $_GET["num"];
//on verifie s'il y a un element a afficher
if (!$idfilm) {
  header("Location:index.php");
}
// note moyenne
$evaluation = "SELECT * FROM note WHERE id_film = :id_film";
$result = $cnx->prepare($evaluation);
$result->execute(array(":id_film"=>$idfilm));
$tabloResulta=$result->fetchAll(PDO::FETCH_ASSOC);
//
////calcul de la note moyenne
$notation=0; $moyenne=0;
foreach ($tabloResulta as $key) {
  $notation= $notation + $key["note"];
}
if (count($tabloResulta)!=0) {
  $moyenne = $notation/count($tabloResulta);
}

try {
$average="UPDATE film SET noteMoyenne = :noteMoyenne WHERE num = :num";
$resulti = $cnx->prepare($average);
$nbLigne= $resulti->execute(array(":noteMoyenne" => $moyenne,":num" => $idfilm));
}
catch(PDOException $e) { // gestion des erreurs
echo"ERREUR dans la modification " . $e->getMessage();
}


/// fin d'évaluation

//traitement de la note
if (isset($_POST["valider"])) {
  // code...
  include "connectBdd.php";
  $movie = $idfilm;
  $user = $_SESSION["Num_utilisateur"];
  $comment = $_POST["commentaire"];
  $rate = $_POST["note"];


  if ($rate != 0) {
    $requete = "SELECT * FROM note where id_film = :id_film and id_utilisateur = :id_utilisateur ";
    $resulta = $cnx->prepare($requete);
    $resulta->execute(array(":id_film"=>$movie, ":id_utilisateur"=>$user));
    $tabloResultat=$resulta->fetchAll(PDO::FETCH_ASSOC);
      //verification et introduction dans la table realisateur
           try {
             if (empty($tabloResultat)) {
               // code...
               $sql="insert into note(id_film, id_utilisateur, commentaire, note) values(:id_film, :id_utilisateur, :commentaire, :note)";
               //on prepare la requete dans un tableau
               $resultat = $cnx->prepare($sql);
               //on affecte les champs du formulaire à des variables
               $nbLignes= $resultat->execute(array(":id_film" => $movie, ":id_utilisateur" =>$user, ":commentaire" =>$comment, ":note" =>$rate));

               echo "<div class='alert alert-success alert-dismissible'>
                       <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        Vous venez d'attribuer une note de ".$rate." à ce film
                     </div>";
             }

             else {
               // modifiaction...
               try {
                    $modif = "UPDATE note SET commentaire = :commentaire, note = :note WHERE id_film = :id_film AND id_utilisateur = :id_utilisateur ";
                    $resultat = $cnx->prepare($modif);
                    $nbLignes= $resultat->execute(array(":commentaire"=>$comment, ":note"=>$rate, ":id_film"=>$movie, ":id_utilisateur"=>$user));
                    echo "<div class='alert alert-success alert-dismissible'>
                              <button type='button' class='close' data-dismiss='alert'>&times;</button>
                               Vous venez de modifier la note et le commentaire de ce film : ".$rate."
                            </div>";
                    }
                    catch(PDOException $e) { // gestion des erreurs
                      echo"ERREUR dans la modif  " . $e->getMessage();
                    }
             }

              }

            catch(PDOException $e) {   // gestion des erreurs
                    echo"ERREUR dans l'ajout  " . $e->getMessage();
              }

  }

  else {
    echo "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Attention!</strong> Saisissez une note valide!!!
          </div>";
  }
}


  $sql = "SELECT * FROM film F, realisateur R WHERE F.num = :idfilm and F.numRealisateur = R.num limit 1";

try {
// preparation de la requete pour mettre le film dans un tableau
  $resultat = $cnx->prepare($sql);
  $resultat->execute(array(':idfilm' => $idfilm));
  $tabloResultat=$resultat->fetchAll(PDO::FETCH_ASSOC);
?>
<div class='container' style='position:center;'>
<?php
  foreach ($tabloResultat as $ligne) {

    echo "
    <br><br>

      <h2>".$ligne["titre"]."</h2>
      <div class='header'>
        <img src='".$ligne["photo"]."' class='img-fluid' alt='Responsive image'><br>
        <figcaption class='figure-caption'>".$ligne["titrevo"]."</figcaption>
      </div><br>
      <p>note : ".$moyenne." / 5</p>
      <p><a class='dropdown-item' href='tri.php?rea=".$ligne["num"]."'>Par : ".$ligne["prenom"]." ".$ligne["nom"]."</a></p>
      <p><a class='dropdown-item' href='tri.php?annee=".$ligne["annee"]."'>Annee de publication : ".$ligne["annee"]."</a></p>
      <p><a class='dropdown-item' href='tri.php?cate=".$ligne["categorie"]."'>Categorie : ".$ligne["categorie"]."</a></p>
      <p>Resume : <div>".$ligne["resume"]."</div></p>";

  }

  if (isset($_SESSION['Nom_utilisateur'])) {
    // code...
    echo "<br><br>
    <form action='' method='post'>
        <div class='stars'>
            <i class='lar la-star' data-value='1'></i><i class='lar la-star' data-value='2'></i><i class='lar la-star' data-value='3'></i><i class='lar la-star' data-value='4'></i><i class='lar la-star' data-value='5'></i>
        </div>
        <input type='hidden' name='note' id='note' value='0'>
        <div class='form-group'>
            <label> commentaire :</label>
            <textarea name='commentaire' class='form-control' rows='3' cols='1'></textarea>
        </div>
        <br>
        <button class='btn btn-success' type='submit' name='valider'>Noter</button>
    </form>
    <script src='jsnote.js'></script>";

    if ($_SESSION['statut'] == 0) {
      // code...
      echo "<a class='btn btn-danger' href='supp.php?num=".$idfilm."' role='button'>supprimer ce film</a>";
            //."<a class='btn btn-primary' href='' role='button'>modifier ce film</a>";
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

<?php
//affichage commentaires
$comment = "SELECT * FROM note where id_film = :id_film";
$resul=$cnx->prepare($comment);
$resul->execute(array(":id_film" => $_GET["num"]));
$tabloResul = $resul->fetchAll(PDO::FETCH_ASSOC);
if (!empty($tabloResul)) {
  // code...
  ?>
  <div class = 'container'>
  <table class="table">
  <thead class="table-dark">
    <tr>
      <th>Nom</th>
      <th>Note</th>
      <th>Commentaire</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach ($tabloResul as $key) {
    //prenom utilisateur
    $user = "SELECT Nom_utilisateur FROM utilisateur WHERE Num_utilisateur = :Num_utilisateur";
    $resu=$cnx->prepare($user);
    $resu->execute(array(":Num_utilisateur" => $key["id_utilisateur"]));
    $tabloResu = $resu->fetchAll(PDO::FETCH_ASSOC);
    $prenom = "";
    foreach ($tabloResu as $ligne) {
      // code...
      $nom = $ligne["Nom_utilisateur"];
    }
    echo "<tr><td>".$nom."</td><td>".$key["note"]." / 5</td><td>".$key["commentaire"]."</td></tr>";
  }


  ?>
      </tbody>
    </table>
  </div>
<?php
}

?>
<br><br>



<?php require "footer.html"; ?>
