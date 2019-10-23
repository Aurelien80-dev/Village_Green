<?php require 'header.php';?>

    
  
    

<center><h1>Information a modifier</h1><hr></center>


   
<div class="form-group">
<?php echo form_open(); ?>



<h1>Vos informations</h1>
<label for="Nom">Nom </label><input type="text" name="nom" value="<?php echo $this->session->clients->nom ?>" class="form-control"/><br>
<label for="prenom">Prénom</label><input type="text" name="prenom" value="<?php echo $this->session->clients->prenom ?>" class="form-control"/><br>
<label>Adresse</label> <input type="text" name="Adresse" value="<?php echo $this->session->clients->adresse ; ?>" class="form-control"><br>
<label for="cp">Code Postale </label><input type="text" name="cp" value="<?php echo $this->session->clients->cp ?>" class="form-control"/><br>
<label for="ville">Ville </label><input type="text" name="ville" value="<?php echo $this->session->clients->ville ?>" class="form-control"/><br>
<label for="pays">Pays</label><input type="text" name="pays" value="<?php echo $this->session->clients->pays ?>" class="form-control"/><br>

<h1>Telephone</h1>
<label for="mobile">mobile</label><input type="text" name="mobile" value="<?php echo $this->session->clients->mobile ?>" class="form-control"/><br>
<label for="fixe">fixe</label><input type="text" name="fixe" value="<?php echo $this->session->clients->fixe ?>" class="form-control"/><br>




<input type="submit" value="Modifier" class="btn btn-danger"/>
<input type="reset" value="Annuler" class="btn btn-danger"/>
</fieldset>
</div>
<a href="<?php  echo site_url('Customers/details_clients');?>" class='btn btn-danger'>Retour a mes information</a>
<?php  form_close();?>
</div>
<?php require 'footer.php'; ?>
