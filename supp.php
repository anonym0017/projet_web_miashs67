
<?php
include "connectBdd.php";

try {
  $sql="DELETE  from  film where num= :id";
  $resultat = $cnx->prepare($sql);
  $nbLignes= $resultat->execute(array('id'=>$_GET["num"]));
  header("Location: index.php?bang=0");
  }
catch(PDOException $e)
  { // gestion des erreurs
    echo"ERREUR dans la modification ".$e->getMessage();
  }
?>
