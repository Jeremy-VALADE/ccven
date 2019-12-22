
<?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
<?php echo form_open('Reservations/setReservation'); ?>

<div>
    <?php foreach ($reservation as $r): ?>  
        <div>
            <h2>Réservation n°<?php echo $r['res_id']; ?></h2>
        </div>
        <div class="flex">
            <div class = "reservation" style="width: 50%;">
                <div class="card card-body">
                    <label for ="personne">Personne ayant effectué la réservation</label>
                    <input class="form-control" type ="text" name ="personne" value ="<?php echo $r['adh_email']; ?>" readonly>
                    <label for ="etat">Etat de la réservation</label>
                    <input class="form-control" type ="text" name ="etat" value ="<?php echo $r['res_valide']; ?>" readonly>
                    <label for ="dateDebut">Date de début du séjour</label>
                    <input type ="date" name = "dateDebut" value ="<?php echo $r['res_datedebut']; ?>"> 
                    <label for="dateFin">Date de fin de séjour</label>
                    <input class="form-control" type ="text" name = "dateFin" value ="<?php echo $r['res_datefin']; ?>" readonly> 
                    <label for="tarif">Tarif de la réservation</label>
                    <input type ="text" name = "tarif" value ="<?php echo $r['res_tarif']; ?>">

                    <?php
                    $menage = "checked";
                    $menage2 = "";
                    if ($r['res_menage'] == 'f') {
                        $menage = "";
                        $menage2 = "checked";
                    }
                    ?>
                    <p>Le ménage du séjour</p>
                    <div class = "form-check">                
                        <input class = "form-check-input" type = "radio" name = "menage" id = "exampleRadios1" value = "t" <?php echo $menage; ?>>
                        <label class = "form-check-label" for = "exampleRadios1">
                            Ménage fait par les employés
                        </label>
                    </div>
                    <div class = "form-check">
                        <input class = "form-check-input" type = "radio" name = "menage" id = "exampleRadios2" value = "f"  <?php echo $menage2; ?>>
                        <label class = "form-check-label" for = "exampleRadios2">
                            Ménages fait par le personnelle
                        </label>
                    </div>
                    <?php
                    $pensionComplete = "checked";
                    $pensionPartielle = "";

                    if ($r['res_pension'] == 'f') {
                        $pensionComplete = "";
                        $pensionPartielle = "checked";
                    }
                    ?>
                    <p>Type de pension</p>
                    <div class = "form-check">                
                        <input class = "form-check-input" type = "radio" name = "pension" id = "pension1" value = "t" <?php echo $pensionComplete; ?>>
                        <label class = "form-check-label" for = "pension1">
                            Pension complète
                        </label>
                    </div>
                    <div class = "form-check">
                        <input class = "form-check-input" type = "radio" name = "pension" id = "pension2" value = "f"  <?php echo $pensionPartielle; ?>>
                        <label class = "form-check-label" for = "pension2">
                            Pension partielle
                        </label>
                    </div>
                </div>
            </div>

            <div class ="reservation">
                <div class="card card-body">
                    <table class ="table table-bordered table-sm">
                        <caption class = "element">Description des hébergements</caption> 
                        <thead class ="thead-dark">                
                        <th scope = "col">Description de la chambre</th>
                        <th scope = "col">Logement adapté ?</th>
                        <th scope = "col">Type de lit</th>
                        <th scope = "col">Nombre de lit</th>
                        <th scope = "col">Balcon ?</th>
                        <th scope = "col">Tarif hebgergement</th>
                        <th scope = "col">Sélectionner l'hebgergement</th>
                        </thead>
                        <?php
                        foreach ($hebergements as $h):
                            $test = "";
                            if ($h['typeheb_id'] == $r['typeheb_id'])
                                $test = "checked";
                            ?>
                            <tr>
                                <td><?php echo $h['typeheb_description']; ?></td>          
                                <td>
                                    <?php
                                    if ($h['typeheb_logementadapt'] == 1)
                                        echo "Oui";
                                    else
                                        echo "Non";
                                    ?>
                                </td>
                                <td><?php echo $h['typeheb_typelit']; ?></td>            
                                <td><?php echo $h['typeheb_nbrelit']; ?></td>
                                <td>
                                    <?php
                                    if ($h['typeheb_balcon'] == 1)
                                        echo "Oui";
                                    else
                                        echo "Non";
                                    ?>
                                </td>
                                <td><?php echo $h['typeheb_tarif']; ?></td>
                                <td>
                                    <input type="radio" name = "type_heb" value = "<?php echo $h['typeheb_id']; ?>" <?php echo $test; ?>/><br />  
                                </td>
                            </tr>  
                        <?php endforeach; ?>
                    </table>            
                </div>
            </div>
        </div>
        <div class="btn-group pr-1" role="group" aria-label="Basic example" style="width: 100%;">
            <input id="prodId" name="idReservation" type="hidden" value="<?php echo $r['res_id']; ?>">
            <button class = "btn btn-outline-success" type = "submit" name = "modifier"value="<?php echo $r['res_id']; ?>">Modifier la réservation</button>
            <button class = "btn btn-outline-success" type = "submit" name = "valider" value="<?php echo $r['res_id']; ?>">Valider la réservation</button>
            <button class = "btn btn-outline-primary" type = "submit" name = "archiver" value="<?php echo $r['res_id']; ?>">Archiver la réservation</button>
            <button class = "btn btn-outline-danger" type = "submit" name = "supprimer" value="<?php echo $r['res_id']; ?>">Supprimer la réservation</button>
            <button class = "btn btn-outline-secondary" type = "submit" name = "annuler">Annuler</button>
        </div>
    </div>
<?php endforeach; ?>
</form>   
