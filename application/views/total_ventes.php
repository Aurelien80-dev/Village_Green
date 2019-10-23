<?php require 'header.php'  ?>
<?php ?>

<h1>Total des ventes par année</h1>

<?php foreach($commande as $total)
{?>
<table class="table  table-bordered ">
  <thead>
  <tr class='text-primary'>
  
  <th scope='col'>annee</th>
  <th scope='col'>Total des ventes</th>
  </tr>
  </thead>
  <tbody>
  <tr class='text-light'>
  <th scope='row'><?php echo $total->annee ?></th>
  <th scope='row'><?php  echo $total->total?></th>
  </tr>
  </tbody>
</table>
<?php }?>
  <div class='row m-1 p-1'>
  <?php echo form_open()?>
<input type='hidden' name='annee' value='<?php echo $total->annee ?>'>  
<input type='hidden' name='total' value='<?php echo $total->total ?>'>  
  

  <input type='submit' value='Valider' class='btn btn-danger'>
<?php echo form_close()?></div>
  <div class='row m-1 p-1'>
<a href='<?php  echo site_url('menu');?>' class='btn btn-danger'>Retour au menu</a>
</div>

<?php require 'footer.php'?>