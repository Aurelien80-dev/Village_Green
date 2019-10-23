<?php require 'header.php'  ?><br><br><br>
<?php 
if($this->session->personnel) 
{
?>
<table class="table  table-bordered table-dark">
    <tr>
    <th scope='col'>Numero de commande</th>
     <th scope='col'>Valeur de la commande</th>
    <th scope='col'>observation</th>
     <th scope='col'>Regler</th>
    </tr>
 <?php foreach($commande as $p) {?>
 
    <tr>
 <th scope="row"><?php echo $p->numcom?></th>
<td><?php echo $p->prix_total?></td>
<td><?php echo $p->obscom?></td>
<td><?php  if($p->payer == 0) { echo 'oui'; } else { echo 'veuillez vous adresser au service commerciale';} ?></td>



<?php }?>
</tr></table>
<a href='<?php echo site_url('menu')?>' class='btn btn-danger'>Retour au Menu</a>  

    <?php require 'footer.php'?>       














<?php }?>