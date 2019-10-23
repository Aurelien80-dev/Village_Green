<?php require 'header.php'?>
<?php if($this->session->personnel == true){?>
<h1>Que voulez-vous faire ?</h1>

<?php if($this->session->personnel->service == 'Service gestion de produit')
      { ?>
  
        <div class='row m-1 p-1'>
      
       <a href='<?php echo site_url('pe/inscription')?>' class='btn btn-danger'>Inscrire un Nouveau membre du personnel du <?php  echo $this->session->service ;?> </a>
         </div> <div class='row m-1 p-1'>
       <a href='<?php echo site_url('Village_green/boutique')?>' class='btn btn-danger'>Consulter la liste de produits</a>
        </div>
           <div class='row m-1 p-1'>
        <a href='<?php echo site_url('Produits/ajout') ?>' class='btn btn-danger'>Ajouter un produits</a>
        </div>
   <div class='m-1 p-1'>
    <a href='<?php echo site_url('add/provider')?>' class='btn btn-danger'>Ajouter un nouveau fournisseurs</a>
    </div>
     
<?php }?>
       <?php if($this->session->personnel->service == 'Service commerciale')
      { ?>
  
    <div class='row m-1 p-1'>
    <a href='<?php echo site_url('pe/inscription')?>' class='btn btn-danger'>Inscrire un Nouveaux membre du personnel  du <?php  echo $this->session->service ;?></a>
    </div>
    <div class='m-1 p-1'>
    <a href='<?php echo site_url('com/listing')?>' class='btn btn-danger'>Consulter la liste des commandes</a>
    </div>
    
   <div class='m-1 p-1'>
    <a href='<?php echo site_url('add/provider')?>' class='btn btn-danger'>Ajouter un nouveau fournisseurs</a>
    </div>
    <div class='m-1 p-1'>
    <a href='<?php echo site_url('provider/listing')?>' class='btn btn-danger'>Consulter la listes des fournisseurs</a>
    </div>
    
    <div class=' m-1 p-1'>
    <a href='<?php echo site_url('listing');?>' class='btn btn-danger'>Consulter la listes des clients</a>
    </div>
     <?php }  if($this->session->personnel->service == 'Service comptable')
     {?>
           <div class='row m-1 p-1'>
      
       <a href='<?php echo site_url('pe/inscription')?>' class='btn btn-danger'>Inscrire un Nouveau membre du personnel du <?php  echo $this->session->service ;?> </a> 
    </div>
    <div class='row m-1 p-1'>
    <a href='<?php echo site_url('com/listing')?>' class='btn btn-danger'>Consulter la liste des commandes</a>
    </div>
    <div class='row m-1 p-1'>
    <a href='<?php echo site_url('com/listingcom')?>' class='btn btn-danger'>Consulter les commandes valider</a>
     </div>
    <div class='row m-1 p-1'>
    <a href='<?php echo site_url('CA')?>' class='btn btn-danger'>Consulter le Total des ventes</a>
    </div>
  <?php     }?>
     
   
<?php }  else {?>
<div class="text-danger">Vous n'avez pas l'autorisation d'acceder au contenu de cette page </div>

<?php   }?>
<?php require 'footer.php'?>