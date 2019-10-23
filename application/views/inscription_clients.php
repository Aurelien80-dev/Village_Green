<?php require 'header.php'; ?>
   
   
       <div class="inscrip">
    <center>
    <h1>Créez vos identifiants</h1>
    </center>

<?php echo form_open()?>    
<p class="requis">* Ces zones sont obligatoires</p>
    <div class="form-group row">

        <label for="email" class="col-sm-2 col-form-label ob">E-mail</label>
        <div class="col-sm-4 champs">
            <input type="email" class="form-control" name="email" id="email" value="">
        </div>
            </div>
    <div class="form-group row deuz">
        <label for="password" class="col-sm-2 col-form-label ob">Créez votre<br> mot de passe</label>
        <div class="col-sm-4 champs">
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <label for="password2" class="col-sm-2 col-form-label ob">Confirmation<br> mot de passe</label>
        <div class="col-sm-4 champs">
            <input type="password" class="form-control" name="password2" id="password2">
        </div>
    </div>
  <center>
  <h1>Vos coordonnées</h1>
  </center>  
    <div class="partTwo">
        <div class="left">
            <div class="form-group row">
                <label for="prenom" class="col-sm-4 col-form-label ob">Prénom</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="prenom" id="prenom" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="nom" class="col-sm-4 col-form-label ob">Nom</label>
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
                <label for="adresseOpt" class="col-sm-4 col-form-label">Complément d'adresse</label>
                <div class="col-sm-8 champs">
                    <input type="text" class="form-control" name="adresseOpt" id="adresseOpt" value="">
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
                    <input type="text" class="form-control" name="pays" id="pays" placeholder="France" >
                </div>
        </div>
</div>        
        
        <div class="right">
             <div class="form-group row">
                <label for="mobile" class="col-sm-9 col-form-label ob">Numéro de Portable :</label>
                <div class="col-sm-6 champs">
                    <input type="tel" class="form-control" name="mobile" id="mobile" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="fixe" class="col-sm-3 col-form-label">Numéro de téléphone fixe :</label>
                <div class="col-sm-9  row champs">
                    <input type="tel" class="form-control" name="fixe" id="fixe" value="">
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row" id="validInscrip" >
        <button type="submit" class="btn btn-danger" name="">Valider</button>
    </div>
<?php echo form_close(); ?>

<div class="bas row">
    <img src="<?php echo base_url('assets/images/formulaire/bas_de_page_pictos.png');?>" alt="bas_page" title="bas de page">
</div>



</div>

























<?php require 'footer.php';?>