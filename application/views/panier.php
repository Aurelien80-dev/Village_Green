<?php require 'header.php'?>


	
	
	
    <h1>Ma Commande</h1>
    <hr>
    <?php 
    if (isset($erreur)) 
    {
        echo $erreur;
    }
    if ($this->session->panier!=null){ ?>
    <div class="row">
    <div class="col">
   
   
   
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
            		
            }?>
    	
    	
    	</tbody>
    </table>
    </div>
                
        <div class="card col-sm-5 col-md-3 col-lg-3 m-3 pl-1 blocProd"  style="width: 10rem">
    <div class="col">
            <div class="card-body">
           
         <?php 	   if($total >= 1000)
        {
           
            $totalht = $total * $this->session->clients->taux_remise;
            $totalttc = $totalht * 1.2; 
          
       
            
        }
           ?>
                <h1 class="card-text" name='prix_total'>TOTAL : <?= str_replace('.',',',$totalttc) ?> <sup>€</sup></h1>
            
            
            
                <?php  echo form_open('commande/ajout');?>
         	<?php  foreach ($this->session->panier as $produit){  ?>
                
                
                <input type='hidden' name='pro_id' value='<?= $produit['pro_id']; ?>'>  
                <input type='hidden' name='pro_qte' value='<?= $produit['pro_qte']?>'>
                <input type='hidden' name='priuni' value='<?= $produit['pro_prix']?>'>
   <input type='hidden' name='cli_id' value='<?php echo $this->session->clients->cli_id;?>'>
    <?php }  ?>
         	
         	 
                <input type='hidden' name='prix_total' value='<?= $totalttc ?>'>
         	<div class="form-group"><input class="btn btn-danger btn-sm" type="submit" value="Payer ma commande"></div>
           
           
           
           <?php echo form_close()?>
               
                <a href="<?= site_url("produits/efface/") ?>" class="btn btn-danger">Supprimer le panier</a>
           
            </div>
        </div>
    </div>

    
    <?php } else { ?>
    
    <div class="alert alert-danger">Votre panier est vide. Pour le remplir, vous pouvez visiter notre <a href="<?= site_url("Produits/listes/") ?>">Liste de  Produits</a>.</div>
    
    <?php } ?>
    </div>
    
   
<?php require 'footer.php'; ?>
    	