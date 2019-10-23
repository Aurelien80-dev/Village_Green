<?php require 'header.php';?>
<center><h1>Fournisseur a modifier</h1><hr></center>


   
<?php echo form_open(); ?>
<div class="form-group">
<label for="fou_ref">Référence fournisseur</label><input type="text" name="fou_ref" value="<?php echo $fournisseurs->fou_ref ?>"class="form-control"/>
<label for="nom">Raison sociale </label><input type="text" name="nom" value="<?php echo $fournisseurs->nom?>"class="form-control"/>
<label for="contact">Contact :</label><input type="text" name="contact" value="<?php echo $fournisseurs->contact ?>" class="form-control"/>


<label for="email">E-mail :</label><input type="text" name="email" value="<?php echo $fournisseurs->email ?>" class="form-control"/>
<label for="adresse">Adresse :</label><input type="text" name="adresse" value="<?php echo $fournisseurs->adresse ?>" class="form-control"/>
<label for="ville">ville :</label><input type="text" name="ville" value="<?php echo $fournisseurs->ville ?>" class="form-control"/>
<label for="cp">Code postale :</label><input type="text" name="cp" value="<?php echo $fournisseurs->cp ?>" class="form-control"/>
<label for="pays">Pays :</label><input type="text" name="pays" value="<?php echo $fournisseurs->pays ?>" class="form-control"/>
<label for="tel">Telephone :</label><input type="text" name="tel" value="<?php echo $fournisseurs->tel ?>" class="form-control"/>



<input type="submit" value="Modifier" class="btn btn-danger"/>
<input type="reset" value="Annuler"class="btn btn-danger"/>
</fieldset>
</div>