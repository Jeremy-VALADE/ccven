<h2>Ajouter une réservation</h2>
<p class="text-center">
    La réservation ne dure qu'une semaine. 
    Vous pouvez réserver que les samedis pendant les vacances scolaires.
</p>

<?php echo validation_errors('<div class="alert alert-warning" role="alert">','</div>' ); ?>


<div>
    <?php echo form_open('Reservations/formulaire'); ?>
    <div class = "formDate">
        <h3>Date disponibles</h3>
        <select name="dateDebut">
            <?php for ($i = 0; $i < count($datesReservations); $i++) {
                ?>
                <option class = "dropdown-item" value = <?php echo $datesReservations[$i]; ?>><?php $date = new DateTime($datesReservations[$i]); echo date_format($date, 'F j Y'); ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <br>
    <table class ="table table-bordered">
        <caption class = "element">Types d'hébergements</caption>
        <thead class ="thead-dark">
        <th scope = "col">Description de la chambre</th>
        <th scope = "col">Logement adapté</th>                
        <th scope = "col">Type de lit</th>
        <th scope = "col">Nombre de lit</th>
        <th scope = "col">Balcon</th>
        <th scope = "col">Tarif hébergement</th>
        <th scope = "col">Cocher un hébergement</th>
        </thead>
        <?php foreach ($hebergements as $h): ?> 
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
                    <input type="radio" name = "type_heb" value = "<?php echo $h['typeheb_id']; ?>"/><br />  
                </td>
            </tr>           
        <?php endforeach; ?>
    </table>     
    <div class ="menage">
        <div class="form-check">  
            <p>
                <input class="form-check-input" type="checkbox" name="menage" id = "menage">
                <label class="form-check-label" for="menage">
                    Cocher la case si vous voulez que le ménage de votre chambre soit fait par nos employés
                </label>
            </p>
        </div>
    </div>
    <div class = "pension">
        <h3>Choisissez le type de pension</h3>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="pension" id="pensionComplete" value="1" checked>
            <label class="form-check-label" for="pensionComplete">
                Pension Complete
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="pension" id="pensionPartielle" value="0" checked>
            <label class="form-check-label" for="pensionPartielle">
                Pension Partielle
            </label>
        </div>
    </div>
    <div class ="buttonReservation">
        <input class = "btn btn-primary" type="submit" name="submit" value="Effectuer une réservation" />
    </div>
</form>
</div>