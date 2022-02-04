<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
</head>
<html>
<title> films dramatiques </title>

<?php
include "entete.html";
include "connectBdd.php";
$sql="SELECT * FROM film WHERE categorie = 'Drame'";
$resultat = $cnx->query($sql); //renvoie un curseur
$tabloResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
foreach ($tabloResultat as $ligne) {
    # code...
    echo "<img src=".$ligne["photo"]." width=750 >"."<br>".$ligne["titre"]."<br>".$ligne["titrevo"]."<br>".$ligne["categorie"]."<br>".$ligne["numRealisateur"]."<br>".$ligne["annee"]."<br>".$ligne["resume"]."<br>"."<br>";
}
echo "Le nombre de films : ".count($tabloResultat);
?>

</form>
<?php include "footer.html" ?>
</html>
