<?php
session_start();
// enregistre le nom de l'utilisateur dans la variable de session $user
if (!isset ($_SESSION["uname"])// si elle n’existe pas déjà!!
$_SESSION["username"]=$_POST["uname"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>Exemple de session</title>
</head>
<body>
<p> identifiant de session :
<?php echo session_id();
?>
Nom de session :
<?php echo session_name(); ?>
<p> Bienvenue vous êtes connecté en tant que
<?php echo $_SESSION["username"]; ?><br>
<a href="pageSuivante.php"> cliquez ici pour la page
suivante</a></p>
</body>
</html>
