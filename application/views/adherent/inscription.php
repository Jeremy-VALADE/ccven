<h2>Formulaire d'inscription</h2>

<div class ="inscription">
    <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
    <?php echo form_open('adherent/inscription'); ?>

    <label for="adh_nom">Votre Nom</label>
    <input class ="form-control" type="text" name="adh_nom" /> <br /> 

    <label for="adh_prenom">Votre Prénom</label>
    <input class ="form-control" type="text" name="adh_prenom" /> <br /> 

    <div class="form-group">
        <label for="exampleInputEmail1">Votre adresse mail</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "adh_email">
        <small id="emailHelp" class="form-text text-muted">Ne partager jamais votre adresse mail</small>
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="adh_password">
    </div>
    <div class="form-group">
        <label for="confirmpassword">Confirmer votre mot de passe</label>
        <input type="password" class="form-control" id="confirmpassword" name="confirmmdp">
    </div>

    <label for="adh_tel">Numéro de Téléphone</label>
    <input  class ="form-control" type="tel" name="adh_tel" pattern="[0-9]{10}"/> <br /> 

    <label for="adh_adresse">Adresse</label>
    <input class ="form-control" type="text" name="adh_adresse" /> <br /> 

    <label for="adh_ville">Ville</label>
    <input class ="form-control" type="text" name="adh_ville" /> <br /> 

    <label for="adh_codepostal">Code Postal</label>
    <input class ="form-control" type="text" name="adh_codepostal" /> <br /> 

    <input class ="button" type="submit" name="submit" value="Valider" />
</form>
</div>