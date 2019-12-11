
<div>
    <h2>Vos réservations</h2>
</div>
<?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
<?php echo form_open('Reservations/toto'); ?>
<div>
    <?php
    $i = 1;
    foreach ($reservations as $r):
        ?> 
        <div>
            <input type="hidden" id = "delete" name = "resid[<?php echo $r['res_id']; ?>][id]" value = "<?php echo $r['res_id']; ?>"/> 
        </div>
        <div class="card card-body">
            <table class = "table table-bordered">       
                <caption class = "element">Description de la Réservation</caption> 
                <thead class = "thead-dark">
                    <tr>       
                        <th scope = "col">Date Réservation</th>
                        <th scope = "col">Validation de la réservation </th>
                        <th scope = "col">Date de début du séjour</th>
                        <th scope = "col">Date de fin du séjour</th>
                        <th scope = "col">Tarif de la réservation</th>
                        <th scope = "col">Ménage ?</th>
                        <th scope = "col">Type de pension</th>                        
                    </tr> 
                </thead>                  
                <tr>
                    <td><?php echo $r['res_date_reserv']; ?></td>                             
                    <td>                       
                        <?php echo $r['res_valide']; ?>   
                    </td>
                    <td>
                        <input type ="date" name ="resid[<?php echo $r['res_id']; ?>][dateDebut]" value ="<?php echo $r['res_datedebut']; ?>">                           
                    </td>            
                    <td><?php echo $r['res_datefin']; ?></td>
                    <td><?php echo $r['res_tarif']; ?></td>

                    <td>
                        <?php
                        if ($r['res_menage'] == 1)
                            echo "Ménage fait par le personnel";
                        else
                            echo "Ménage fait par vous";
                        ?>
                    </td>

                    <td>
                        <?php
                        if ($r['res_pension'] == 1)
                            echo "Pension complète";
                        else
                            echo "Demi Pension";
                        ?>
                    </td>     
                </tr>
            </table>
            <button type ="submit" name ="Valider" value ="<?php echo $r['res_id']; ?>">Valider</button>
            <button type ="submit" name ="Archiver" value ="<?php echo $r['res_id']; ?>">Archiver</button>
            <button type ="submit" name ="Supprimer" value ="<?php echo $r['res_id']; ?>">Supprimer</button>           
            
            
            <table class ="table table-bordered">
                <caption class = "element">Description de l'Hébgergement</caption> 
                <thead class ="thead-dark">                
                <th scope = "col">Description de la chambre</th>
                <th scope = "col">Logement adapté ?</th>
                <th scope = "col">Type de lit</th>
                <th scope = "col">Nombre de lit</th>
                <th scope = "col">Balcon ?</th>
                <th scope = "col">Tarif hebgergement</th>
                </thead>
                <td><?php echo $r['typeheb_description']; ?></td>          
                <td>
                    <?php
                    if ($r['typeheb_logementadapt'] == 1)
                        echo "Oui";
                    else
                        echo "Non";
                    ?>
                </td>
                <td><?php echo $r['typeheb_typelit']; ?></td>            
                <td><?php echo $r['typeheb_nbrelit']; ?></td>
                <td>
                    <?php
                    if ($r['typeheb_balcon'] == 1)
                        echo "Oui";
                    else
                        echo "Non";
                    ?>
                </td>
                <td><?php echo $r['typeheb_tarif']; ?></td>                  
                </tr>          
            </table>         
        </div>
    </div>
    <?php
    $i++;
endforeach;
?>

<div class = "button">
    <input class="btn btn-outline-warning" type="submit" name="submit" value="Modifier les réservations" />   
</div>
</form>   

