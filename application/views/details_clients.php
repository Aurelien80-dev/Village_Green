<?php require 'header.php'  ?><br><br><br>
<?php 
$this->session->connected ;



?>



<h1>Vos information</h1>
<table class="table table-responsive table-bordered table-dark">
    <tr>
     <th >Nom</th>
     <th>Prénom</th>
   <th >Adresse</th>
    <th >Code postale</th>
    <th>Ville</th>
     <th>Pays</th>
    <th >Portable</th>
     <th>Telephone Fixe</th>
   
    </tr>
   
    <tr>
     <div class='description_detail'>
         <td> <?php echo $this->session->clients->nom ; ?></td>
   	      <td><?php echo $this->session->clients->prenom ;?></td>
          <td><?php echo $this->session->clients->adresse ?></td>
           <td><?php echo $this->session->clients->cp ?></td>
     		<td><?php echo $this->session->clients->ville ?></td>
			  <td><?php echo $this->session->clients->pays ?></td>          
          		 <td><?php echo $this->session->clients->mobile ?></td>
         			 <td><?php echo $this->session->clients->fixe ?></td>
        </tr>
          </div>
</table>
<h1>Mes commandes</h1>

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
<a href="<?php echo site_url('Customers/modif_clients')?>" class='btn btn-danger'>Modifier mes informations</a>
<a href="<?php  echo site_url('Customers/supp_clients')?>" class="btn btn-danger">Supprimer mon compte</a>
<a href="<?php echo site_url('produits/listes')?>" class="btn btn-danger">Commencez mes achats</a>


    <?php require 'footer.php'?>         