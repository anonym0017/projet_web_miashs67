<?php require 'entete.php';?>


<section>
        <div class="container" style="margin-top:40px">
          <div class="row">


            <div class="col-sm-8">

                <form action="traitInscription.php" method="post">
                <div class="form-group">
                    <label for="NameDemo">Nom :</label>
                    <input type="text" name="Nom_utilisateur" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre nom">

                </div>
                <div class="form-group">
                    <label for="NameDemo">Prenom :</label>
                    <input type="text" name="Prenom_utilisateur" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre prénom">

                </div>
                <div class="form-group">
                    <label for="EmailDemo">Email :</label>
                    <input type="email" name="mail_utilisateur" class="form-control" id="EmailDemo" aria-describedby="emailHelp" placeholder="Entrez votre email">

                </div>
                <div class="form-group">
                    <label for="passDemo">Mot de passe :</label>
                    <input type="password" name="mot_de_passe" class="form-control" id="passDemo" aria-describedby="passHelp" placeholder="Entrez votre mot de passe">
                    <small id="passHelp" class="form-text text-muted">4 caractères minimum</small>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="agree" class="form-check-input" id="CheckDemo">
                    <label class="form-check-label" for="CheckDemo">Pour poursuivre, acceptez les conditions générales d'utilisations.</label>
                </div>
                <button type="submit" class="btn btn-success">Créer votre compte</button>
                </form>
            </div>
          </div>
        </div>
</section>
 <!-- FOOTER -->
 <?php require 'footer.html';?>
</body>
</html>
