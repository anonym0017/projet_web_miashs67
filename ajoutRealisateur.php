<?php require "entete.php" ?>

<section>
        <div class="container" style="margin-top:40px">
          <h1> Ajouter un réalisateur </h1>

          <div class="row">


            <div class="col-sm-8">

                <form action="ajoutFilm.php" method="post">
                <div class="form-group">
                    <label for="NameDemo">Nom :</label>
                    <input type="text" name="nom_real" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="NameDemo">Prénom :</label>
                    <input type="text" name="prenom_real" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre prénom">
                </div>
                <div class="form-group">
                    <label for="NameDemo">Date de Naissance :</label>
                    <input type="date" name="date_naiss" class="form-control" id="datemax" name="datemax" max="2002-12-31">
                </div>
                <div class="form-group">
                    <label for="NameDemo">Date de décès :</label>
                    <input type="date" name="date_dec" class="form-control" id="datemin" name="datemin" max="<?php echo date('Y-M-D'); ?>">
                </div>


                <button type="submit" class="btn btn-success"> Continuer </button>
                <button type="reset" class="btn btn-danger" name="annuler"> Annuler </button>
                </form>
            </div>
          </div>
        </div>
</section>

<?php require "footer.html" ?>
