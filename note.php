<?php
if (!$_SESSION['Nom_utilisateur']) {
  header("Location:Formconnexion.php");
}

$num = $_GET["num"]
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
    <!-- http://127.0.0.1:5500/index.html?titre=C%27est+bien&comment=Super+avis&note=4 -->
    <br><br>
    <form action="apercu.php?num=<?php echo $num; ?>" method="post">
        <div class="stars">
            <i class="lar la-star" data-value="1"></i><i class="lar la-star" data-value="2"></i><i class="lar la-star" data-value="3"></i><i class="lar la-star" data-value="4"></i><i class="lar la-star" data-value="5"></i>
        </div>
        <input type="hidden" name="note" id="note" value="0">
        <br>
        <button class="btn btn-success" type="submit" name="valider">Noter</button>
    </form>

    <script src="jsnote.js"></script>
</body>
</html>
