
    <?php require 'header.php'?>
  
  <?php 
	if (isset($erreur))
	{
	   echo $erreur;
	}
	?>
  
     <center><h1 id="titre" >Produits disponibles à l'achat</h1></center>
	

 <p id="haut_page"></p>
	<p><a href="#bas_page" class='btn btn-danger'>Bas de page</a></p>
 
<div class="row">
            <?php foreach ($listes as $row)
            {
              
                $photo= "assets/images/produits/".$row->pro_id.".".$row->pro_photo;
            ?>
	
        <div class="card col-sm-6 col-md-4 col-lg-3 blocProd" style="width: 10rem;">
                     
                <a href="<?php echo site_url('produits/details/'.$row->pro_id) ?>"> <img src="<?php echo base_url($photo);?>" class="card-img-top" height="210px" width="285px" alt="Card image cap"></a>
               <div class="card-body"><h2 class="card-title"><?php echo $row->pro_libelle; ?></h2></div><hr>
                
                     <div class="prix">
                     
                      <p class="card-text"><?php echo $row->pro_prix.' '."€"; ?></p>
        			</div>
        			 <?php  if ($row->pro_stock == 0 || $row->pro_bloque == 1)
        			{   
        			    ?>
        				<h1><strong class="rouge">.</strong> indisponible</h1>
        			<?php } 
        			else {?>
        			
        			        				<h1><strong class="vert">.</strong> disponible</h1>
        			
        			<?php }?>
        			
        			
        				<?php echo form_open("produits/commander"); ?>
        	    	<label for="pro_qte">Quantité: </label>
                    	<input type="number" name="pro_qte" value="1">
                	<input type="hidden" name="pro_prix" value="<?= $row->pro_prix ?>">
                	<input type="hidden" name="pro_id" value="<?= $row->pro_id ?>">
                	<input type="hidden" name="pro_libelle" value="<?= $row->pro_libelle ?>">
                	<div class="form-group"><input class="btn btn-danger btn-sm" type="submit" value="Commander"></div>
               
	    	<?php echo form_close()?>
        				
        </div>
       <?php } ?>
        
 


</div>
   
          <?php if ($this->session->service == 'service gestion de produit' )
               {
                ?>

<a href="<?php echo site_url('produits/ajout');?>" class="btn btn-danger">Ajouter un produit</a>

<?php }?>

<p id="bas_page"></p>
	<p><a href="#haut_page" class='btn btn-danger'>Haut de page</a></p>
</div>	 

<?php require 'footer.php'; ?>