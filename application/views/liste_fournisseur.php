<?php require 'header.php'?>
<?php if($this->session->personnel || $this->session->personnel->service == 'Service commerciale')
{ ?>

<h1>Liste des clients</h1>
 <table class="table  table-bordered table-responsive ">
  <thead>
  <tr>
  
  <th scope='col'>N°</th>
  <th scope='col'>Reference clients</th>
  <th scope='col'>Nom</th> 
  <th scope='col'>Prénom</th>
  <th scope='col'>Adresse</th>
  <th scope='col'>Ville</th>

 
</tr></thead>
 <?php foreach($fournisseur as $a)   {?>

  <tbody class='text-light'>
  <tr>
  <th scope="row"><?php  echo $a->id_fou?></th>
  <td><?php echo $a->fou_ref;?></td>
  <td><a href='<?php echo site_url('details/'.$a->id_fou)?>' class='text-light'><?php echo $a->nom?></a></td>
  <td><?php echo $a->email?></td>
  <td><?php echo $a->adresse?></td>
  <td><?php echo $a->ville?></td>
  
  </tr>
  </tbody>
 

<?php }?>
</table>
  
  
  
  
<a href='<?php echo site_url('menu')?>' class='btn btn-danger'>Retour au Menu</a>  
  
  
  

<?php } else { echo '<div class="tex-danger">Connecter vous ou vous n avez l autorisation de consulter cette page </div>'; }?>






<?php require 'footer.php'?> 
