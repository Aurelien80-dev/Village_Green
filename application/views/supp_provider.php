

<?php require 'header.php'  ?><br><br><br>
<?php if($this->session->personnel == true)
         {
    
    ?>
  <?php foreach ($fournisseurs as $row)
  { ?>
   <h1>Suppression du fournisseur</h1>
 
  
  	<center>
  	
  <h1><?php echo $row->nom;?></h1>
   <div class='text-info description_detail'>
   <?php echo $row->contact.'<br>';?>
  </div> <h1>Coordoonnees</h1>
  
     <div class='text-info description_detail'>
  <?php echo $row->email?>
  </div>
  
  
     <div class='text-info description_detail'>
  <?php echo $row->adresse?>
  </div>
    <div class='text-info description_detail'>
  <?php  echo $row->cp?>
  </div>
  <div class='text-info description_detail'>
  <?php  echo $row->ville?>
  </div>
  <div class='text-info description_detail'>
  <?php  echo $row->pays?>
  </div>
  <div class='text-info description_detail'>
  <?php  echo $row->tel?>
  </div>
  <h1>Details</h1>
  <div class='text-info description_detail'>
  <?php  echo $row->role?>
  </div>
  <div class='text-info description_detail'>
  <?php  echo $row->d_ajout?>
  </div>
  
  </center>
  
  
  <?php }?>
            
                	<?php if($this->session->service == 'Service commerciale')
                	        { ?>
            
            
               <div class=' m-1 p-1'>
                      <?php echo form_open()?>   			
   			          <input type='submit' name='Supprimer' value='Supprimer' class='btn btn-danger'>
   			          <?php echo form_close()?>
   						<?php }?>
   			</div>
   			
   			   <div class=' m-1 p-1'>
   			<a href="<?php echo site_url('provider/listing');?>" class="btn btn-danger">Retour a la liste des fournisseurs</a>	
  				</div>
  

  <?php } else {echo '<div class="text-danger">Connecter vous ou vous n avez l autorisation de consulter cette page </div>'; }?>
  <?php require 'footer.php'?>