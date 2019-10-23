<?php
require 'header.php'?>
	
	
	<body>
	<?php 
	if (isset($erreur))
	{
	   echo $erreur;
	}
	?>
    <div class="container">
   <center>
   <h1>Commander vos produits</h1>
   </center> 
    	<p id="haut_page"></p>
	<p><a href="#bas_page" class="btn btn-danger">Bas de page</a></p>
	
	
	
	<hr>
      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
        Trier par 
      	<div class="dropdown">
</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= site_url('Commande/listeCommande/') ?>">Catégorie</a>
        <a class="dropdown-item" href="<?= site_url('Commande/listePrixCroissants/') ?>">Prix croissants</a>
        <a class="dropdown-item" href="<?= site_url('Commande/listePrixDecroissants/') ?>">Prix décroissants</a>
      </div>
    </div> 
	<table class="table table-bordered bg bg-dark">
		<thead>
    		<tr>
    			<th>Photos</th>
    			<th>Prix</th>
    			<th>Référence</th>
    			<th>Description</th>
    			<th>Achats</th>
    		</tr>
    	</thead>
	<?php 
	foreach ($listes as $valeur)
	{ ?>
	    <tr>
	    	<td class="tableau_photo"><img class="produit_photo" src="<?= base_url('assets/images/produits/')?><?= $valeur->pro_id ?>.<?= $valeur->pro_photo ?>"  alt="photo du produit <?= $valeur->pro_libelle ?>" title="photo du produit <?= $valeur->pro_libelle ?>" height="75"></td>
	    	<td class="tableau_prix"><?= str_replace('.',',',$valeur->pro_prix) ?> <sup>€</sup></td>
	    	<td><?= $valeur->pro_ref ?></td>
	    	<td><?= $valeur->pro_description ?></td>
	    	<td>
    	    	<?php echo form_open(); ?>
        	    	<label for="pro_qte">Quantité: </label>
                    	<select class="form-control" name="pro_qte" id="pro_qte">
                            <?php 
                            for ($i=1;$i<=$valeur->pro_stock;$i++) 
                            { ?>
                                <option value=<?= $i ?>><?= $i ?></option>
                            <?php    
                            }
                			?>
                		</select>
                	<input type="hidden" name="pro_prix" value="<?= $valeur->pro_prix ?>">
                	<input type="hidden" name="pro_id" value="<?= $valeur->pro_id ?>">
                	<input type="hidden" name="pro_libelle" value="<?= $valeur->pro_libelle ?>">
                	<div class="form-group"><input class="btn btn-danger btn-sm" type="submit" value="commande"></div>
                </form>
	    	</td>
	    </tr>
	<?php   
	}
	?>
	</table>
	
	<p id="bas_page"></p>
	<p><a href="#haut_page" class="btn btn-danger">Haut de page</a></p>
    </div>
    
<?php require 'footer.php'; ?>