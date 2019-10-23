<?php require 'header.php'?>
<div class="row">
	 
            <?php foreach ($listes as $row)
            {
              
                $photo= "assets/images/produits/".$row->pro_id.".".$row->pro_photo;
            ?>
	
      		
        <div class="card" style="width: 18rem;">
                <a href="<?php echo site_url('produits/details/'.$row->pro_id) ?>"> <img src="<?php echo base_url($photo);?>" class="" height="210px" width="285px" alt="Card image cap"></a>
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
        			
        			
        			<?php echo form_open('Produits/commander'); ?>
        	    	<label for="pro_qte"><h1>Quantité: </h1></label>
                    	<select class="form-control" name="pro_qte" id="pro_qte">
                            <?php 
                            for ($i=1;$i<=$row->pro_stock;$i++) 
                            { ?>
                                <option value=<?= $i ?>><?= $i ?></option>
                            <?php    
                            }
                			?>
                		</select>
     		<input type="hidden" name="pro_prix" value="<?= $row->pro_prix ?>">
                	<input type="hidden" name="pro_id" value="<?= $row->pro_id ?>">
                	<input type="hidden" name="pro_libelle" value="<?= $row->pro_libelle ?>">
        
     	<div class="form-group">
     	<input type="submit" class='btn btn-danger' name="commander" value="Commander">
     	</div>
                	
	    
	
                <?php echo form_close();?>
	    	
        				
        </div>
       <?php } ?>
     	
 


</div>
        <a href='<?php echo site_url('Produits/listes')?>' class='btn btn-danger'>Retour a la liste</a>

<?php require 'footer.php'?>
