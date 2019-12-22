<h2>Formulaire de connexion</h2>
<div class = "form">
    <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>    
    <?php echo form_open('Adherent/connexion'); ?>  
    <div class="form-group">
        <label for="exampleInputEmail1">Votre adresse mail</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "adh_email">
        <small id="emailHelp" class="form-text text-muted">Ne partager jamais votre adresse mail</small>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="adh_password">
    </div>
    <input class ="btn btn-outline-success" type="submit" name="submit" value="Connexion" />
</div>
