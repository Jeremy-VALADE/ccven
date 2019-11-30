<h2>Formulaire de changement de mot de passe</h2>
<div class ="formChange">
<?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
    <?php echo form_open('Adherent/changePassword'); ?>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="adh_password">
    </div>  
    <div class="form-group">
        <label for="password">Nouveau mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div> 
    <div class="form-group">
        <label for="confirmPassword">Confirmation de votre nouveau mot de passe</label>
        <input type="password" class="form-control" id="password" name="confirmPassword">
    </div> 
    <input class = "button" type="submit" name="submit" value="Valider" />
</form>
</div>