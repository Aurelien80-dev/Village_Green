<?php require 'header.php';?>
<?php $title='Ajout d\'un produit'; ?>
    
    <?php ob_start(); ?>
 <center class="position-relative">

         
<h1>Voulez-vous supprimer ce produit ?</h1>
<hr>





 <div class="container">
  <?php foreach ($listes as $row)
            {
              
                $photo= "assets/images/produits/".$row->pro_id.".".$row->pro_photo;
            }
                ?>
   
  
	
	<center>
   <h1><?php echo $row->pro_libelle;?></h1>
	 <img src="<?php echo base_url($photo);?>"  height="400px" width="400px" alt="reponsive">
  <div class='text-info description_detail'>
   <?php echo '<h1>Description :</h1> '.'<br>'.'<strong>'.$row->pro_description.'</strong>';?>
  </div>
   <div class=' prix_detail'>
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
        			
   </div>
	</center>
<?php echo form_open(); ?>
<input type="submit" value="Supprimer" name="Supprimer" class="btn btn-danger"><br>



            


<?php require 'footer.php'; ?>