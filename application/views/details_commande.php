<?php require 'header.php'?>
	
    <center>
    <h1>Ma Commande</h1>
    </center>
    <hr>
    
    <div class="row">
    <div class="col">
    <table class="table">
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
            	<td><?= str_replace('.',',',$produit['pro_prix']) ?> <sup>€</sup></td>
            	<td>
            		<div class="panier_qte">
                    	<button class="panier_qte_bouton" type="button" role="button">
                    		<a href="<?= site_url('boutique/qtemoins/'.$produit['pro_id']) ?>"><i class="fas fa-minus"></i></a>
                    	</button>
                    		<div class="panier_qte_valeur"><?= $produit['pro_qte'] ?></div> <!-- affichage de la quantité de chaque produit, blocage à 1 si l'utilisateur essaye d'aller en-dessous de 1 -->
                    	<button class="panier_qte_bouton" type="button" role="button">
                    		<a href="<?= site_url('boutique/qteplus/'.$produit['pro_id']) ?>" type="button" role="button"><i class="fas fa-plus"></i></a>
                    	</button>
                	</div>
                </td>
            	<td><?= str_replace('.',',',($produit['pro_qte']*$produit['pro_prix'])) ?> <sup>€</sup></td>
            	<td><a class="corbeille" href="<?= site_url("boutique/effaceProduit/".$produit['pro_id']."/".$this->session->jeton) ?>"><i class="fas fa-trash"></i></a></td>
    		</tr>
            	<?php 
            		$total += $produit['pro_stock']*$produit['pro_prix'];
                }?>
    	</tbody>
    </table>
    </div>
    <div class="col">
        <div class="card">
            <h3 class="card-header light-blue white-text text-center panierrecap">Récapitulatif</h3>
            <div class="card-body">
                <h5 class="deep-orange-text font-weight-bold">TOTAL : <?= str_replace('.',',',$total) ?> <sup>€</sup></h5>
                
                <a href="<?php echo site_url('Commande/ajoute')?>" class="btn btn-danger" role="button">Commander</a>
                <a href="<?= site_url("Commande/efface") ?>" class="blue-grey-text">Supprimer le panier</a>
            </div>
        </div>
    </div>
  
    
  
<?php require 'footer.php'; ?>
    	