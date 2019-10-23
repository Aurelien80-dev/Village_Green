    <!DOCTYPE html>
  <html lang='fr'>
  <head>

  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Village_Green un site e-commerce de ventes d'instruments de musique et accessoires divers"> 	
<meta name="robots" content="index, follow">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Ubuntu:400,400i,500,500i,700,700i" rel="stylesheet"> 
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/footer_style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/listes.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/formulaires.css'); ?>">  
  <link rel="icon"  href="<?php echo base_url('assets/images/guitar-icon.gif'); ?>" >
  <title>Village Green</title>
  </head>
  <body>
   
        <div class="container">
  <header class='row' id='fonds'>
  			 <a class=" col-4" href="<?php echo site_url('Village_green')?>" ><img src="<?php echo base_url('assets/images/header/logo.png')?>" class='img-fluid logo' alt='responsive' style="width: 300px; length:0px;"></a>	
  			<div class="col-8">  		
  			<nav class="navbar navbar-expand-lg-md-sm-xl col-12 ml-3 d-flex" id='menu1'>
            <a tabindex="0" class="nav-item menu1 ml-1" data-toggle="popover2" role="button" data-container="body" data-placement="bottom" data-trigger="focus">Infos</a>                 
  			<div id="popover2-content" class="row" style="display: none">
  			 <div class="popForm infos">
  			 <p>Les villageois</p>
                <ul><li><a class="info" href="">Ils vous conseillent</a></li>
                      <li><a class="info" href="">A votre agenda</a></li>
                      <li><a class="info" href="">On parle de nous</a></li>                                 
                </ul>            
  			</div>  			  			
  			</div>					   
  			<?php if($this->session->connected == false)
  			{  
  			    
  			    ?>
  			 
  			 <a tabindex="0" class="btn btn-default navbar-btn nav-item mr-4 menu1 " data-toggle="popover" role="button" data-container="body" data-placement="bottom" data-trigger="click">Espace client</a>
                            <?php }    if($this->session->clients == true) {     ?>
                            
                            
    			    <div class="navbar-item  navbar-expand-md col-sm-3 d-flex" style='color: #060a67;'><a href='<?php echo site_url('Customers/details_clients')?>'> <?php echo  $this->session->clients->prenom?></a></div>
    	             <a class="nav-link col-sm-3  d-flex" href="<?= base_url("Customers/logout") ?>" style='color: #060a67;'>Déconnexion </a>
    		<?php 	} elseif ($this->session->personnel == true) {
    		              ?>
    			        	  		    <div class="navbar-text  navbar-expand-md col-sm-3 d-flex" style='color: #060a67;'><a href='<?php echo site_url('menu')?>'> <?php echo  $this->session->personnel->nom?></a></div>
    			                         <a class="nav-link col-sm-3  d-flex" href="<?= base_url("Customers/logout") ?>" style='color: #060a67;'>Déconnexion </a>
                            <?php }  ?>
                            
                                                    <div id="popover-content" class="row" style="display: none">
                                <div class="popForm popLeft">
                                    <span>Etes-vous déjà client chez nous ?</span>
                                  <?php 
                                   echo form_open('Customers/connexion'); 
								   	
                                   ?>
                                   
                                  
                                 
                                    <div class="form-group">
                                        <label for="user"></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Adresse E-mail">
                                        <label for="mdp"></label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Rester connecté</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Se connecter maintenant</button>
                                    Vous avez oublié votre mot de passe ?
  									
                                    <?php echo form_close();?>
                                </div>
                                <div class="popForm popRight">
                                    <span>Vous n'êtes pas client chez nous ?</span>

                                    <p>En tant que client Village Green
                                        vous pouvez suivre vos envois,
                                        lire des tests produits exclusifs,

                                        évaluer des produits, déposer
                                        des petites annonces, gérer
                                        vos chèques-cadeaux, devenir
                                        partenaire et bien plus encore.</p>
                                    <a type="button" class="btn btn-danger" href="<?php echo site_url('Customers/inscription_clients')?>">S'inscrire</a>
                                    Plus d'informations
                         </div>       </div>
                         
                          
                            
                           
                            
                            
                            
                            <?php                                       
                            
                            if ($this->session->panier == NULL) 
                            {
                                $count = 0;
                            } else {
                                $count = count($this->session->panier);
                               
                            }
                            ?>
  							  
  							<a href='<?php echo site_url('Produits/affiche')?>' class="nav-item ml-4" id='panier'><i class="fa fa-shopping-cart" aria-hidden="true" style='font-size: 30px;'></i>(<?php echo $count; ?>)</a>
  							
  							<a href='' class ='nav-item mx-4'><img src="<?php echo base_url('assets/images/header/picto pays.png')?>" class='img-fluid menu1' id='drapeau' alt='responsive'></a>
  					
  					<?php if($this->session->personnel) {echo 'salut';}  ?>
  				
  			</nav>
  							
  	
  				
  				<nav class="navbar navbar-expand-lg col-12" id='menu2'>
  			
  				<button class="navbar-toggler toggler-example button2" type="button" data-toggle="collapse" data-target="#collapsibleNavbar2"  aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"><i class="fa fa-chevron-down" aria-hidden="true"></i>
        </span></button>
  			
  				
  			<div class="collapse navbar-collapse col-12 ml-2" id="collapsibleNavbar2">
  				<a href='<?php echo site_url('Village_green/boutique')?>' class="nav-item">Produits</a>
  				
  				<a href='' class='nav-item'>Service</a>
  				<a href='' class='nav-item'>Aide</a>
  				<a href='' class='nav-item'>A propos</a>
  			</div>
  			
  				
  				</nav>
  				
  				
  			
  				
  				 <nav class="navbar navbar-expand-lg" id='menu3'>
  			 <button class="navbar-toggler toggler-example button3" type="button" data-toggle="collapse" data-target="#collapsibleNavbar3"  aria-controls="navbarSupportedContent3" aria-expanded="false" aria-label="Toggle navigation" id='button3'>
  			 <span class="navbar-toggler-icon"><i class="fa fa-chevron-down" aria-hidden="true"></i>
        </span></button>
  			<div class="collapse navbar-collapse" id="collapsibleNavbar3">
  			
  			
  			 
  			 
  			 <div class="bottom-header d-none d-md-block col-sm-10">
                    <ul>
                        <li class="nav-item dropdown ml-auto">
  			 <a tabindex="0" class="nav-item ml-4 menu3 text-light " data-toggle="dropdown" href="" role="button" data-container="body" data-placement="bottom" data-trigger="click">Guit/bass</a>
                                      
  			 <div class="nav-item dropdown-menu">
                                    <a class="dropdown-item" name='11' href="<?php echo site_url('Produits/produits_souscategorie/'. $cat_id = 11)?>" >Guitares classiques</a>
                                    <a class="dropdown-item"  name='12' href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 12)?>">Guitares électriques</a>
                                    <a class="dropdown-item"  name='cat_id' href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 13)?>">Guitares Acoustiques</a>
                                    <a class="dropdown-item"  name='cat_id' href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 14)?>">Basses Electriques</a>
                                    <a class="dropdown-item"  name='cat_id' href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 15)?>">Guitares Semi-Acoustiques</a>
                                    <a class="dropdown-item"  name='cat_id' href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 16)?>">Ukulélés</a>
                                    <a class="dropdown-item"  name='cat_id' href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 17)?>">Autres instruments <br>à cordes pincées</a>
                                </div>
  			  			</li>
  			  			
  			  			  <li class="nav-item dropdown" >
  			  			  <a class="nav-item ml-4 dropdown-toggle menu3  text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Batterie</a>
  			 <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 18)?>">Batteries accoustiques</a>
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 19)?>">Batteries Electroniques</a>
                
                                </div></li>
                                
                                  <li class="nav-item dropdown">
          <a class="nav-item ml-4 dropdown-toggle menu3  text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Claviers</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 20)?>">Claviers arrangeurs</a>
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 21)?>">Claviers maîtres</a>
                                </div>
                                </li>
                                
                            <li class="nav-item dropdown">
          <a class="nav-item ml-4 dropdown-toggle menu3  text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Studio</a>
                                <div class="dropdown-menu ">
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 22)?>">Consoles de mixage Analogique</a>
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 23)?>">Consoles de mixage Numerique</a>
                                    
                                </div>
                                </li> 
                                       
                                   <li class="nav-item dropdown ">
          <a class="nav-item ml-3 dropdown-toggle menu3  text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Sono</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 24)?>">Enceinte Bluetooth</a>
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 25)?>">Enceinte Amplifié</a>
                                    
                                </div>
                                </li>        
                                   <li class="nav-item dropdown">
          <a class="nav-item ml-4 dropdown-toggle menu3  text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Eclairage</a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 26)?>">Projecteur a LED</a>
                                <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 27)?>">Contrôleur de lumiers</a>
                                    
                                </div>
                                </li>        
                                   <li class="nav-item dropdown">
          <a class="nav-item ml-4 dropdown-toggle menu3  text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                   DJ</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_categorie/'.$cat_id = 28)?>">Table de mixage</a>
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_categorie/'.$cat_id = 29)?>">Table de mixage DJ</a>
                                    
                                </div>
                                </li>        
                                   <li class="nav-item dropdown  text-light">
          <a class="nav-item ml-4 dropdown-toggle menu3  text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Case</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 30)?>">Flight case ABS 19"</a>
                                     <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 31)?>">Flight case DJ"</a>
                                   
                                </div>
                                </li>        
                                   <li class="nav-item dropdown">
          <a class="nav-item ml-4 dropdown-toggle menu3  text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Accessoires</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 32)?>">Câble Audio/studio</a>
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 33)?>">Micro
                                    </a>
                                    
                                </div>
                                </li>        
                                   <li class="nav-item dropdown">
          <a class="nav-item ml-4 dropdown-toggle menu3  text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Instruments</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 34)?>">Cuivre</a>
                                    <a class="dropdown-item" href="<?php echo site_url('Produits/produits_souscategorie/'.$cat_id = 35)?>">Bois</a>
                                    
                                </div>
                                </li>   
                                
                                
                                </ul>
          
          
          
          
          
          
           </div></div></nav>
           
           </div>
      
            </header>