<?php include 'entete.php'; ?>

<form action="traitconnect.php" class="was-validated" method="post">

  <div class="form-group">
    <label>Identifiant :</label>
    <input type="text" name="login" class="form-control" id="username" placeholder="Entrer votre identifiant" required>
  </div>
  <div class="form-group">
    <label>Mot de passe :</label>
    <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Entrer votre mot de passe" required>
  </div>

  <button type="submit" class="btn btn-primary">connexion</button>
</form>
<br><br>
<?php include 'footer.html'; ?>
