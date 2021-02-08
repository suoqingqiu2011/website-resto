<?php include("header.php"); ?>

<div style="margin-top:50px;"> </div>

<div class="container">
	<div class="row">
    	<?php include("left_col.php"); ?>
        <div class="col-lg-9">
        	<div class="page-header">
            	<h2>Inscription</h2>
            </div>
            <div class="row">
            <div class="panel panel-default col-lg-6">
                <div class="panel-heading">J'ai d&eacute;j&agrave; un compte</div>
                <div class="panel-body">
                  <p>
                  	<?php if ($inscription==1) { ?>
                    	<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Votre inscription a bien &eacute;t&eacute; prise en compte, veuillez vous connecter ci-dessous &dArr;</div>
					<?php } ?>
					<?php if ($erreur==1) { ?>
                        <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email ou mot de passe incorrect, r&eacute;&eacute;ssayez </div>
					<?php } ?>
					
                    <form class="form-horizontal" role="form" action="rueresto-commande-en-ligne-sushi-login.html" method="post" target="_top">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input name="pseudo" type="email" class="form-control" id="pseudo" placeholder="Email" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary pull-right">Entrez</button>
                        </div>
                      </div>
                    </form>
					
                  </p> 
                </div>
            </div>
			
            <div class="panel panel-default col-lg-6">
               <div class="panel-heading">Je souhaite cr&eacute;er un compte</div>
                 <div class="panel-body">
                  <p>
                    <?php
						if ($message==1) {
							echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Votre mot de passe est vide</div>";
						} elseif ($message==2) {
							echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Vous avez mal recopi&eacute; votre mot de passe</div>";
						} elseif ($message==3) {
							echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Votre email est invalide</div>";
						} elseif ($message==4) {
							echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Votre email est vide</div>";
						} elseif ($message==5) {
							echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Un compte utilise d&eacute;j&agrave; votre email</div>";
						}
				    ?>
					
                    <form class="form-horizontal" role="form" action="rueresto-restaurant-japonais-inscription.html" method="post">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input name="pseudo" type="email" class="form-control" id="pseudo" placeholder="Email" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Password">
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Confirmation</label>
                        <div class="col-sm-10">
                          <input name="mdp2" type="password" class="form-control" id="mdp2" placeholder="Confirmation Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary pull-right">Inscription</button>
                        </div>
                      </div>
                    </form>
					
                  </p>
                </div>
              </div>
           </div>
		   
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
