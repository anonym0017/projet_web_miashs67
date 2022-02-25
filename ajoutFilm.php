<?php require "entete.php" ?>

<section>
        <div class="container" style="margin-top:40px">
          <h1> Ajouter un film </h1>

          <div class="row">


            <div class="col-sm-8">

                <form action="traitFilm.php" method="post">
                <div class="form-group">
                    <label for="NameDemo">Titre :</label>
                    <input type="text" name="titre" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre nom">

                </div>
                <div class="form-group">
                    <label for="NameDemo"> Titre original:</label>
                    <input type="text" name="titrevo" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Entrez votre prénom">

                </div>
                <div class="form-group">
                    <label for=""> Résumé :</label>
                    <textarea name="resume" class="form-control" rows="10" cols="70%"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Année de publication :</label>
                    <select class="form-control" name="anneepub">
                      <?php
                      $a=1990;
                      $Dat = date('Y');
                      for ($i=1990; $i < $Dat + 1 ; $i++) {
                        // code...
                        echo "<option value=$a>$a</option>";
                        $a+=1;
                      }
                      ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for=""> Image :</label>
                    <input type="file" name="image" class="input-group">
                </div>

                <div class="form-group">
                    <label for=""> Catégorie :</label>
                    <input type="text" name="Categorie" class="form-control">
                </div>

                <button type="submit" class="btn btn-success"> Enregistrer </button>
                <button type="reset" class="btn btn-danger" name="annuler">Annuler</button>
                </form>
            </div>
          </div>
        </div>
</section>

<?php require "footer.html" ?>
