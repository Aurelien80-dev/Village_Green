<!-- application/views/ajout.php -->
<!-- application/views/ajout.php -->
<?php require 'header.php'?>
<?php $title='Ajout d\'un produit'; ?>
  
    <?php ob_start(); ?>
    
<?php echo form_open_multipart(); 


?>
<center>
<h1>Ajouter un Produits</h1>
</center>
    <div class="form-group form-primary row ">

   <center>
   <p style='color:red;'>Veuillez Remplir tous les champs pour que l'ajout s'execute</p><br>
   
   </center> 
 
      <div class="col-sm-10 ">
          
<label for='categorie'>Categorie du Produits</label><select name="categories" id="categories" class="form-control">
                <option selected disabled>Categorie du Produit</option>     
               <?php
                foreach ($categories as $key => $a) 
                {
                    echo"<option value='".$a->cat_id."'>".$a->cat_nom."</option>";   
                }
                ?>  
            </select>
            <div class="col-sm-3 ">
  <div class="form-group row">
            <label for="pro_cat_id" class=" form-label text-right"></label>
            <div  class=" form-label text-right">
            <select name="pro_cat_id"class="form-control" id="pro_cat_id">
               <option selected disabled>Sélectionnez</option>     
            </select>
            </div>
       </div> 
	</div>

     <div class="form-group">  
 <label  for="pro_id">ID du produit :</label><input type="text" name="pro_id" class='form-control'/>
 </div>
       <label for="pro_libelle">Libellé du produit: </label><input type="text" name="pro_libelle"  class="form-control "/>
 <div class="form-group">
<label for="pro_ref">Référence du produit: </label><input type="text" name="pro_ref"  class="form-control"/>
</div> <div class="form-group">
<label for="pro_description">Description du produit:</label><br>
</div> <div class="form-group">
<textarea name="pro_description" rows="10" cols="50"  class="form-control"></textarea>
</div> <div class="form-group">
<label for="pro_couleur">Couleur :</label><input type="text" name="pro_couleur"  class="form-control">
</div> <div class="form-group">
<label for="pro_prix">Prix du produit: </label><input type="number" step="0.01" name="pro_prix"  class="form-control"/>
 </div><div class="form-group">
<label for="pro_stock">Stock actuel du produit: </label><input type="number" name="pro_stock"  class="form-control"/>
<label for="pro_photo">Extension de la photo:</label><input type="text"   placeholder="jpg, png, gif"/class="form-control">
<label for="pro_photo">Photo </label><input type="file" name="pro_photo" id="photo" class="form-control"/>
<div class="form-group">
<label>Le produit est-il bloqué à la vente en ce moment?</label><br>
<input type="radio" name="pro_bloque" value="1"  class="form-input"/>Oui<br>
<input type="radio" name="pro_bloque" value="0"  class="form-input"/>Non
</div>
<input type="submit" value="Ajouter"  class=" btn btn-danger"/>
<input type="reset" value="Annuler"class="btn btn-danger"/>

    </div>
</div>
    <div class="form-group">

<script>
var CI_BASE_URL = "<?php echo site_url(); ?>";
</script>


<?php require 'footer.php'; ?>
