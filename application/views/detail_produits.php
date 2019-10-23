<?php require 'header.php'  ?><br><br><br>

 
   
  <?php foreach ($listes as $row)
            {
              
                $photo= "assets/images/produits/".$row->pro_id.".".$row->pro_photo;
            }
                ?>
   
  
	
	<center>
   <h1><?php echo $row->pro_libelle;?></h1>
	<img src="<?php echo base_url($photo);?>" height="250px" width="auto" >
  
  <div class='text-info description_detail'>
   <?php echo $row->pro_description.'<br>';?>
  </div>
   <h1>Reference du produit :</h1><p class='text-info description_detail'><?php echo $row->pro_ref ?></p>
   <div class='sticky-top prix_detail'>
   <h1>Prix :</h1><br><p><?php echo $row->pro_prix?></p>
   </div>
   
   
   <?php  if ($row->pro_stock == 0 || $row->pro_bloque == 1)
        			{   
        			    ?>
        				<h1><strong class="rouge">.</strong> indisponible</h1>
        			<?php } 
        			else {?>
        			
        			        				<h1><strong class="vert">.</strong> disponible</h1>
        			
        			<?php }?>
        			
 
	</center>
	
	<?php echo form_open('Produits/commander')?>		
     		<input type="hidden" name="pro_prix" value="<?= $row->pro_prix ?>">
                	<input type="hidden" name="pro_id" value="<?= $row->pro_id ?>">
                	<input type="hidden" name="pro_libelle" value="<?= $row->pro_libelle ?>">
     	<div class="form-group"><input type="submit" class='btn btn-danger' name="commander" value="Commander"></div>
   			<?php echo form_close();?>
            
                	<?php if($this->session->service == 'Service gestion de produit')
                	        { ?>
            
            
            <a href="<?php echo site_url("produits/modif/$row->pro_id")?>" class="btn btn-danger">Modifier le fournisseur</a>
   			 <a href="<?php echo site_url("produits/supp/$row->pro_id")?>" class="btn btn-danger" value='Supprimer'>Supprimer le fournisseur</a>
   			
   			
   						<?php }?>
   			
   			
   			
   			<a href="<?php echo site_url('produits/listes');?>" class="btn btn-danger">Retour au produits</a>	
    <?php require 'footer.php'?>         