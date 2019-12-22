<?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
<?php echo form_open('Adherent/setAdherent'); ?>
<h2>Liste des utilisateurs</h2>
<table class ="table">
    <thead class = "thead-dark">
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>

    <?php foreach ($adherents as $p): ?>
        <tr>
            <td><?php echo $p['adh_email']; ?></td>
            <td><?php echo $p['adh_nom']; ?></td>
            <td><?php echo $p['adh_prenom']; ?></td>
            <td><button class="btn btn-outline-primary" type="submit" name="modifier" value ="<?php echo $p['adh_email']; ?>">Modifier</button></td>
            <td><button class="btn btn-outline-danger" type="submit" name="supprimer" value ="<?php echo $p['adh_email']; ?>" onclick="return verif()">Supprimer</button></td>
        </tr>
    <?php endforeach; ?>
</table>


