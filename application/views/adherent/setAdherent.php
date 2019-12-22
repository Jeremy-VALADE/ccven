<?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
<?php echo form_open('Adherent/setAdherent'); ?>
<h2>
    Information sur la personne
</h2>
<?php foreach ($adherents as $p): ?>
    <div class="mx-auto text-center form" style="width: 50%;">
        <div class="form-group">
            <label for="adh_email">Email address</label>
            <input type="email" class="form-control" id="email" name ="adh_email" value ="<?php echo $p['adh_email']; ?>">
        </div>
        <div class="form-group">
            <label for="adh_nom">Nom</label>
            <input class="form-control form-control-lg" type="text" name ="adh_nom" value ="<?php echo $p['adh_nom']; ?>">
        </div>
        <div class="form-group">
            <label for="adh_prenom">Prénom</label>
            <input class="form-control form-control-lg" type="text" name ="adh_prenom" value ="<?php echo $p['adh_prenom']; ?>">
        </div>
        <div class="form-group">
            <label for="adh_password">Mot de passe</label>
            <input class="form-control form-control-lg" type="password" name ="adh_password" value ="<?php echo $p['adh_password']; ?>">
        </div>
        <div class="form-group">
            <label for="adh_tel">Numéro de téléphone</label>
            <input class="form-control form-control-lg" type="text" name ="adh_tel" value ="<?php echo $p['adh_tel']; ?>">
        </div>
        <div class="form-group">
            <label for="adh_adresse">Adresse</label>
            <input class="form-control form-control-lg" type="text" name ="adh_adresse" value ="<?php echo $p['adh_adresse']; ?>">
        </div>
        <div class="form-group">
            <label for="adh_ville">Ville</label>
            <input class="form-control form-control-lg" type="text" name ="adh_ville" value ="<?php echo $p['adh_ville']; ?>">
        </div>
        <div class="form-group">
            <label for="adh_codepostal">Code postal</label>
            <input class="form-control form-control-lg" type="text" name ="adh_codepostal" value ="<?php echo $p['adh_codepostal']; ?>">
        </div>
        <div class ="form-group">
            <label for="adh_niveau">Niveau d'agréditation</label>
            <select class="form-control" id="adh_niveau" name = "adh_niveau">
                <option class ="text-center" value = "<?php echo $p['adh_niveau']; ?>"><?php echo $p['adh_niveau']; ?></option>
                <?php
                if ($p['adh_niveau'] == 1)
                    $niveau = 0;
                else
                    $niveau = 1;
                ?>
                <option value = "<?php echo $niveau; ?>"><?php echo $niveau; ?></option>
            </select>
        </div>
        <div class="btn-group pr-1" role="group" aria-label="Basic example" style="width: 100%;">
            <button class="btn btn-outline-primary" type="submit" name="modifier" value ="<?php echo $p['adh_email']; ?>">Modifier</button>
            <button class="btn btn-outline-danger" type="submit" name="supprimer" value ="<?php echo $p['adh_email']; ?>">Supprimer</button>
            <button class="btn btn-outline-secondary" type="submit" name="annuler" value ="<?php echo $p['adh_email']; ?>">Annuler</button>
        </div>
    <?php endforeach; ?>
</div>