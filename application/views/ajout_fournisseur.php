
<?php require 'header.php'?>
 	  <div class="inscrip">
    <center>
    <h1>Ajoutez un fournisseur</h1>
    </center>

<?php echo form_open()?>    
<p class="requis">* Ces zones sont obligatoires</p>
     <div class="partTwo">
        <div class="left">
    <div class="form-group row">
                <label for="nom" class="col-sm-4 col-form-label ob">Raison Sociale</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="nom" id="nom" value="">
                </div>
            </div>
            
   <div class="form-group row">
                <label for="adresse" class="col-sm-4 col-form-label ob">Adresse</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="adresse" id="adresse" value="">
                </div>
            </div>
    <div class="form-group row">
                <label for="adresse" class="col-sm-4 col-form-label ob">Contact</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="contact" id="nom" value="">
                </div>
            </div>
            
             <div class="form-group row">

        <label for="email" class="col-sm-4 col-form-label ob">E-mail</label>
        <div class="col-sm-8 champs">
            <input type="email" class="form-control" name="email" id="email" value="">
        </div>
            </div>
    <div class="form-group row">
                <label for="cp" class="col-sm-4 col-form-label ob">Code postal</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="cp" id="cp" value="">
                </div>
            </div>
     <div class="form-group row">
                <label for="ville" class="col-sm-4 col-form-label ob">Ville</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="ville" id="ville" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="pays" class="col-sm-4 col-form-label ob">Pays</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="pays" id="pays" value="" placeholder="France">
                </div>
            </div>
      <div class="form-group row">
                <label for="ville" class="col-sm-4 col-form-label ob">N° de Telephone</label>
                <div class="col-sm-8   champs">
                    <input type="tel" class="form-control bg-light" name="tel"  value="">
                </div>
            </div>
          
     <div class="row" id="validInscrip" >
        <button type="submit" class="btn btn-danger" name="">Valider</button>
    
    <button type="reset" class="btn btn-danger" name="">Annuler</button>
      
    </div>
<?php echo form_close(); ?>
    
    



    
    
    </div></div></div>
<?php require 'footer.php'?> 
