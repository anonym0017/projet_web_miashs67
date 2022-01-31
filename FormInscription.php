<?php require 'entete.html';?>

        
<section>
        <div class="container" style="margin-top:30px">
          <div class="row">
            <div class="col-sm-4">
              <h2>Concevoir un site web pour apprendre ...</h2>
              <h5></h5>
              <img class="img-fluid" src="images\logoBootstrap.png">
            
              <p> HTML CSS Bootstrap et PHP...</p>
              <h3>Liens utiles</h3>
              <p>à consulter pour vous aider</p>
              <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                            <a class="nav-link active" href="https://www.w3schools.com/bootstrap4">La référence Bootstrap4</a>
                           
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  href="https://www.jquery-az.com/6-templates-bootstrap-4-cards-online-examples/">Exemple de cards</a>
                          </li>
                          <li class="nav-item">
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
              <hr class="d-sm-none">
            </div>
        
            <div class="col-sm-8">
                <form>
                <div class="form-group">
                    <label for="NameDemo">Your Name:</label>
                    <input type="text" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="Enter Full Name">
                    <small id="nameHelp" class="form-text text-muted">Please enter your full name</small>
                </div>
                <div class="form-group">
                    <label for="EmailDemo">Your Email:</label>
                    <input type="email" class="form-control" id="EmailDemo" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">Please enter your primary email, we will send confirmation email!</small>
                </div>
                <div class="form-group">
                    <label for="passDemo">Enter Password:</label>
                    <input type="password" class="form-control" id="passDemo" aria-describedby="passHelp" placeholder="Password">
                    <small id="passHelp" class="form-text text-muted">Must be 8 characters long</small>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="CheckDemo">
                    <label class="form-check-label" for="CheckDemo">Agree with Terms & Conditions?</label>
                </div>
                <button type="submit" class="btn btn-success">Create Account</button>
                </form>
            </div>
          </div>
        </div>
</section>
 <!-- FOOTER -->
 <?php require 'footer.html';?>    
</body>
</html>