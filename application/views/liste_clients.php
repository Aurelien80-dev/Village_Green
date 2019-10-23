<?php require 'header.php'?>
<?php if($this->session->personnel || $this->session->personnel->service == 'Service commerciale')
{ ?>

<h1>Liste des clients</h1>
 <table class="table  table-bordered ">
  <thead>
  <tr>
  
  <th scope='col'>N°</th>
  <th scope='col'>Reference clients</th>
  <th scope='col'>Nom</th> 
  <th scope='col'>Prénom</th>
  <th scope='col' class=''>Adresse</th>
  <th scope='col'>Ville</th>
  <th scope='col'>Pays</th> 
  <th scope='col'>Mobile</th>
  <th scope='col'>Fixe</th>
</tr></thead>
 <?php foreach($clients as $a)   {?>

  <tbody class='text-light'>
  <tr>
  <th scope="row"><?php  echo $a->cli_id?></th>
  <td><?php echo $a->cli_ref;?></td>
  <td><?php echo $a->nom?></td>
  <td><?php echo $a->prenom?></td>
  <td><?php echo $a->adresse?></td>
  <td><?php echo $a->ville?></td>
  <td><?php echo $a->pays?></td>
  <td><?php echo $a->mobile?></td>
  <td><?php echo $a->fixe?></td>
  
  </tr>
  
  
  
  
  
  
  </tbody>
  

<?php }?>
</table>
<?php } else { echo '<div class="tex-danger">Connecter vous ou vous n avez l autorisation de consulter cette page </div>'; }?>






<?php require 'footer.php'?> 
