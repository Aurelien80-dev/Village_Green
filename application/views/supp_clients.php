<?php require 'header.php'?>

<?php $this->session->connected ;?>
<center>
<h1>Voulez-vous supprimer votre compte ?</h1>
</center>
<div class="container-fluid">
<div class="row">
	 

 <div class="card" style="width: 18rem;">
    <div class="card-body"><h2 class="card-title"><?php  echo $this->session->clients->nom.' '.$this->session->clients->prenom ; ?></h2>
 			 <p class="card-text"><?php echo $this->session->clients->adresse ;?></p>
  			 <p class="card-text"><?php echo $this->session->clients->cp ;?></p>
  			 <p class="card-text"><?php echo $this->session->clients->ville ;?></p>
  			 <p class="card-text"><?php echo $this->session->clients->pays ;?></p>
 
 
 
 </div>
</div></div>
<?php echo form_open()?>
 <input type="submit" value="Supprimer" name="Supprimer" class="btn btn-danger"><br>
 <input type='submit' value="Annuler" name="Annuler" class='btn btn-danger'>
 <?php form_close()?>
 </div>
<?php require 'footer.php'?>
