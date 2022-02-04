<?php include 'entete.php'; ?>

<form action="/action_page.php" class="was-validated" method="post">
  <div class="form-group">
    <label for="uname">Identifiant :</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="pwd">Mot de passe :</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember" required> J'accepte les conditions générales d'utilisations...
      <!-- <div class="valid-feedback">Validé</div> -->
      <div class="invalid-feedback">Cocher cette case avant de poursuivre.</div>
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Soumettre</button>
</form>

<?php include 'footer.html'; ?>
