<?php require 'header.php'?>
<h1 class='text-center'>Finaliser ma Commande</h1>

     
 
 <?php
  if($this->session->connected)
 {
     if ($this->session->panier!=null){ ?>
    
     
  			
<h1>Ma commande</h1>
<div class="row">




<table class="table table-stripped table-reponsive ">
<thead class="success-color-dark white-text">
<tr>
<th>Produit</th>
<th>Prix</th>

<th>Quantité</th>
<th>Prix total</th>
<th></th>
</tr>
</thead>
<tbody>
<?php
$total = 0;
foreach ($this->session->panier as $produit)
{ ?>
    		<tr>
    		    <td><?= $produit['pro_libelle'] ?></td>
            	<td name='priuni'><?= str_replace('.',',',$produit['pro_prix']) ?> <sup>€</sup></td>
            	<td>
            		<div class="panier_qte">
                    	<button class="panier_qte_bouton btn btn-danger" type="button" role="button">
                    		<a name='pro_id' href="<?= site_url('produits/qtemoins/'.$produit['pro_id']) ?>"><i class="btn btn-danger fas fa-minus"></i></a>
                    	</button>
                    		<div class="panier_qte_valeur"><?= $produit['pro_qte'] ?></div> <!-- affichage de la quantité de chaque produit, blocage à 1 si l'utilisateur essaye d'aller en-dessous de 1 -->
                    	<button class="panier_qte_bouton btn btn-danger" type="button" role="button" >
                    		<a href="<?= site_url('produits/qteplus/'.$produit['pro_id']) ?>"><i class="fas fa-plus"></i></a>
                    	</button>
                	</div>
                </td>
            	<td id=''><?= str_replace('.',',',($produit['pro_qte']*$produit['pro_prix'])) ?> <sup>€</sup></td>
            	<td><a class="corbeille btn btn-danger" href="<?= site_url("produits/effaceProduit/".$produit['pro_id']."/".$this->session->jeton) ?>"><i class="fas fa-trash"></i></a></td>
    		</tr>
            	<?php 
            	$total += $produit['pro_qte']*$produit['pro_prix'];
            	$totalttc = $total *1.2;
            	
                   
            }        ?>
              
    	</tbody>
    </table>
            
            
               
                    
            		  <?php 	  
            		  $totalht = 0;
            		  $totalttc = $total * 1.2;
            	      	  
            		  if($total >= 1000)
        {
           
        $totalht = $total * $this->session->clients->taux_remise;
        $totalttc = $totalht * 1.2; 
       
            
        }
           ?>

</div>
             <h1 class="card-text" name='prix_total'>TOTAL : <?= str_replace('.',',',$totalttc).'€' ?></h1>

<?php 
foreach($commande as $com)
{

?>




<div class="form-group">




<?php } ?>
<h1>Information de paiement</h1>
<fieldset><legend>Type de Paiement</legend>
<?php echo form_open("Commande/valider_commande");?>
<input type='hidden' name='cli_id' value='<?php echo $this->session->clients->cli_id ;?>' class="form-control">
<input type='hidden' name='prix_total' value='<?php echo $totalttc?>'>

<div class='row'>
<div class="form-check">
<div class='row'>
<div class='ml-4'>
 <input type='radio' id='CB' name='CB' class="form-check-input "  value='CB'/>
 <label for='visa'><i class="fab fa-cc-visa CB"></i></i></label>
</div>

<div class='ml-4'>
<input type='radio'  id='mastercard' name='CB' class='form-check-input' value='mastercard'/>
<label for='mastercard'><i class='fab fa-cc-mastercard CB'></i></label>
</div>
<div class='ml-4'>
<input type='radio' id='CBleue' name='CB' class='form-check-input' value='CBleue'/>
<label for='Cbleue'><i class="fas fa-credit-card CB"></i></label>
</div>
<div class='ml-4'>
<input type='radio' id='paypal' name='CB' class='form-check-input' value='Paypal'/>
<label><i class="fab fa-cc-paypal CB"></i></label>
</div>
</div>
<div class='row'>
<label>N° de carte</label> 
<input type='text' placeholder='XXXX XXXX XXXX XXXX' class='form-control'>



<div class='row'>

<div class='mx-3'>
<label>Cryptogramme</label> 
<input type='text' placeholder='XXX' class='form-control'>

<img src='<?php echo base_url('assets\images\formulaire/crypto.jpg')?>' class='float-right' width='110px' alt='responsive'>



</div><!-- fermente de le div pour la marge -->
</div><!-- fermente de le div row N°2 -->
</div>
</div><!-- fermente de le div row N°1 -->

</fieldset>
 <input type='submit' name='Payer' value='Commander' class='btn btn-danger'>
<input type='reset'  name='Annuler' value='Annuler' class='btn btn-danger'>



<?php }?>
<?php echo form_close();  }  else   {?>
                  <div class='text-danger'><p>Pour finalisez votre commande vous devez avoir un compte</p></div>       
    			   <?php }?>



</div>
<?php require 'footer.php'?>