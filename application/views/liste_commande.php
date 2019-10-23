<?php require 'header.php' ?>
<?php if($this->session->personnel == true || $this->session->personnel->service == 'service commerciale')
{  ?>
    <table class="table  table-bordered-reponsive">
  <thead>
  <tr>
  
  <th scope='col'>Clients</th>
  <th scope='col'>Reference</th>
  <th scope='col'>Produits</th> 
  <th scope='col'>Prix unitaire</th>
  <th scope='col'>Qte</th>
  <th scope='col'>Total</th>
  </tr>
  </thead>
  
  <?php
    foreach($commande as $a)
    {
    ?>
  <tbody class='text-light'>
  <tr>
  <th scope="row"><?php  echo $a->cli_ref?></th>
  <th><?php echo $a->pro_ref?></th>
  <td><?php echo $a->pro_libelle?></td>
  <td><?php  echo $a->priuni.'€'?></td>
  <td><?php echo $a->pro_qte?></td>
  <td><?php  $total = $a->priuni * $a->pro_qte; echo $total.',00'.'€'; ?></td>
  
  </tr>
<?php }?>
  
     	
 <a href='<?php echo site_url('menu')?>' class='btn btn-danger'>Retour au menu</a>
 
  
  
  
  
  
  
  </tbody>
  
  




  </table>
<?php  }?>
<?php require 'footer.php'?>
