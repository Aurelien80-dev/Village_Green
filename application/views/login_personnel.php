<?php require 'header.php'?>
	


	 
	  <?php echo form_open('Personnel/connexion');?>
									
	 							<h1>Connexion</h1>
                                    <div class="form-group">
                                        <label for="user">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Adresse E-mail">
                                        <label for="mdp">Mot de passe</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Rester connecté</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Se connecter maintenant</button>
                                    Vous avez oublié votre mot de passe ?
                                    <?php echo form_close()?>
                                    
                                    
                                    
                                     
<?php require 'footer.php'; ?>
	