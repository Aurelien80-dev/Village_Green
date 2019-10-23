<?php require 'header.php'?>
<?php ob_start()?>

  <div class="middle row">
    <div class="col-12 col-lg-9 row pub">
        <a href=""><img src="<?php echo base_url('assets/images/body/info.png');?>" alt="responsive" title="Cliquez ici !" class="img-reponsive" id='cliquez'></a>
      <img src='<?php  echo base_url('assets//images/body/pub_guitare.png')?>' alt="responsive"  class="img-responsive" id='guitare' >
       
        
        <a href=""><img src="<?php echo base_url('assets/images/body/livraison.png'); ?>" alt="responsive" title="livraison gratuite" class="img-fluid " id='promo' ></a>
    </div>
    <div class="pictos row">
        <a href=""><img src="<?php echo base_url('assets/images/body/banniere centre 4 pictos.png');?>" alt="responsive" title="conditions" class='img-fluid float-sm-left'></a>
    </div>
         <div class='categories'>
			<h1>Nos categories</h1>
			<div class="photoCat row">
			
<a class="col-sm-3" href="<?php echo site_url('Produits/produits_categorie/'. $cat_id = 1)?>"><img src="<?php  echo base_url('assets/images/body/guitare.png');?>" alt='responsive' title='guitare' class='img-fluid' onmouseover="this.src='<?php echo base_url('assets/images/body/roll_over_guitare.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/guitare.png')?>';"></a>
<a class="col-sm-3"  href="<?php echo site_url('Produits/produits_categorie/'.$cat_id = 2)?>"><img src="<?php  echo base_url('assets/images/body/batterie.png');?>" alt='responsive' title='batterie' class='img-fluid' onmouseover="this.src='<?php echo base_url('assets/images/body/roll_over_batterie.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/batterie.png')?>';"></a>   
<a class="col-sm-3"  href="<?php echo site_url('Produits/produits_categorie/'.$cat_id = 3)?>"><img src="<?php echo base_url('assets/images/body/piano.png');?>" alt='responsive' title='piano' class='img-fluid' onmouseover="this.src='<?php echo base_url('assets/images/body/roll_over_piano.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/piano.png')?>';"> </a>
<a class="col-sm-3"   href="<?php echo site_url('Produits/produits_categorie/'.$cat_id = 4)?>"><img src="<?php echo base_url('assets/images/body/micro.png');?>" alt='responsive' title='micro' class='img-fluid' onmouseover="this.src='<?php echo base_url('assets/images/body/roll_over_micro.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/micro.png')?>';"> </a>
<a class="col-sm-3"   href="<?php echo site_url('Produits/produits_categorie/'.$cat_id = 5)?>"><img src="<?php echo base_url('assets/images/body/sono.png');?>" alt='responsive' title='sono' class='img-fluid' onmouseover="this.src='<?php echo base_url('assets/images/body/roll_over_sono.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/sono.png')?>';"> </a>
<a class="col-sm-3" href="<?php echo site_url('Produits/produits_categorie/'.$cat_id = 8)?>"><img src="<?php echo base_url('assets/images/body/cases.png');?>" alt='responsive' title='cases' class='img-fluid' onmouseover="this.src='<?php echo base_url('assets/images/body/roll_over_cases.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/cases.png')?>';"> </a>
<a class="col-sm-3" href="<?php echo site_url('Produits/produits_categorie/'.$cat_id = 9)?>"><img src="<?php echo base_url('assets/images/body/cable.png');?>" alt='responsive' title='cable' class='img-fluid' onmouseover="this.src='<?php echo base_url('assets/images/body/roll_over_cable.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/cable.png')?>';"> </a>
<a class="col-sm-3"  href="<?php echo site_url('Produits/produits_categorie/'.$cat_id = 10)?>"><img src="<?php echo base_url('assets/images/body/saxo.png');?>" alt='responsive' title='saxo' class='img-fluid' onmouseover="this.src='<?php echo base_url('assets/images/body/roll_over_saxo.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/saxo.png')?>';"> </a>
</div>
    </div>
    <div class="others d-flex mx-1 p-2">
    <div class="topSales">
<h1>Nos meilleures ventes</h1>
	<div class="photoSales">
<a href="<?php echo site_url('produits/details/'.$pro_id = 4)?>"><img src="<?php echo base_url('assets/images/body/TOP_VENTES_guitare.png');?>" alt='responsive' title='Best' class="img-fluid" onmouseover="this.src='<?php echo base_url('assets/images/body/TOP_VENTES_ROLL_OVER_guitare.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/TOP_VENTES_guitare.png')?>';"></a>
<a href="<?php echo site_url('produits/details/'.$pro_id = 5)?>"><img src="<?php echo base_url('assets/images/body/TOP_VENTES_saxo.png');?>" alt='responsive' title='Best' class="img-fluid" onmouseover="this.src='<?php echo base_url('assets/images/body/TOP_VENTES_ROLL_OVER_saxo.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/TOP_VENTES_saxo.png')?>';"></a>
<a href="<?php echo site_url('produits/details/'.$pro_id = 6)?>"><img src="<?php echo base_url('assets/images/body/TOP_VENTES_piano.png');?>" alt='responsive' title='Best' class="img-fluid" onmouseover="this.src='<?php echo base_url('assets/images/body/TOP_VENTES_ROLL_OVER_piano.png');?>';"  onmouseout="this.src = '<?php echo base_url('assets/images/body/TOP_VENTES_piano.png')?>';"></a>
	</div>
	</div>
	  <div class="partners">
<h1>Nos Partenaires</h1>
 <div class="partnersLogo m-0">
                <a href=""><img src="<?php echo base_url('assets/images/body/partenaires 4 logos.png')?>" alt="partenaires" title="partenaire" class="img-fluid"></a>
            </div>
</div>
</div>
</div>
        

<?php require 'footer.php'?>