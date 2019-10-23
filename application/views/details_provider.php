<?php require 'header.php'  ?><br><br><br>
<?php if($this->session->personnel == true)
         {
    
    ?>
 
   <h1>Details fournisseur</h1>
  <?php foreach ($fournisseurs as $row)
  { ?>
  
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
  
  
  
            
                	<?php if($this->session->service == 'Service commerciale')
                	        { ?>
            
            
            <a href="<?php echo site_url("modif/pro/$row->id_fou")?>" class="btn btn-danger">Modifier le fournisseur</a>
   			 <a href="<?php echo site_url("supp/pro/$row->id_fou")?>" class="btn btn-danger">Supprimer le fournisseur</a>
   			
   			
   						<?php }?>
   			
   			
   			
   			<a href="<?php echo site_url('provider/listing');?>" class="btn btn-danger">Retour a la liste des fournisseurs</a>	
  
  
  <?php }?>
  <?php } else {echo '<div class="text-danger">Connecter vous ou vous n avez l autorisation de consulter cette page </div>'; }?>
  <?php require 'footer.php'?>