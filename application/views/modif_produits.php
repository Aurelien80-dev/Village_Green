<?php require 'header.php';?>

    
    <?php ob_start(); ?>
    

<center><h1>Produit a modifier</h1><hr></center>


   
<?php echo form_open(); ?>
<div class="form-group">
<label for="pro_libelle">Libellé du produit: </label><input type="text" name="pro_libelle" value="<?php echo $produits->pro_libelle?>"class="form-control"/><br>
<label for="pro_ref">Référence du produit: </label><input type="text" name="pro_ref" value="<?php echo $produits->pro_ref?>"class="form-control"/><br>
<label for="pro_description">Description du produit:</label><br/>

<textarea name="pro_description" rows="10" cols="50" class="form-control"><?php echo $produits->pro_description?></textarea><br>
<label>Couleur :</label> <input type="text" name="pro_couleur" value="<?php echo $produits->pro_couleur; ?>"class="form-control"><br>
<label for="pro_prix">Prix du produit: </label><input type="number" step="1" name="pro_prix" value="<?php echo $produits->pro_prix?>"class="form-control"/><br>


<label for="pro_stock">Stock actuel du produit: </label><input type="number" name="pro_stock" value="<?php echo $produits->pro_stock?>"class="form-control"/><br>
<label for="pro_photo">Photo</label><input type="text" name="pro_photo" value="<?php echo $produits->pro_photo?>" placeholder="jpg, png, gif"/class="form-control"><br>
<label for="pro_photo">Extension de la photo: </label><input type="file" name="pro_photo"  class="form-control" /><br>
<label>Le produit est-il bloqué à la vente en ce moment ?</label>
<input type="radio" name="pro_bloque" value="1"class="form-control"/><label>Oui</label>
<input type="radio" name="pro_bloque" value="0"class="form-control"/><label>Non</label><br>
<input type="submit" value="Modifier" class="btn btn-danger"/>
<input type="reset" value="Annuler"class="btn btn-danger"/>
</fieldset>
</div>


</div>
<?php require 'footer.php'; ?>
