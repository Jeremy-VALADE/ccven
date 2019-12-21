<h2>Liste des réservations</h2>
<?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
<?php echo form_open('Reservations/setReservation'); ?>
<div>
    <table class = "table table-bordered">       
        <thead class = "thead-dark">
            <tr>       
                <th scope="col">Identifiant</th>
                <th scope = "col">Validation de la réservation </th>
                <th scope = "col">Date de début du séjour</th>
                <th scope = "col">Date de fin du séjour</th>
                <th scope = "col">Modifier</th>    
                <th scope = "col">Supprimer</th>    
            </tr> 
        </thead>                

        <?php
        $i = 1;
        foreach ($reservations as $r):
            ?> 
            <tr>
                <td><?php echo $r['adh_email']; ?></td>                      
                <td><?php echo $r['res_valide']; ?></td>
                <td> <?php echo $r['res_datedebut']; ?></td>            
                <td><?php echo $r['res_datefin']; ?></td>                    
                <td><button class="btn btn-outline-primary"  type ="submit" name ="modifier" value ="<?php echo $r['res_id']; ?>">Modifier</button></td>
                <td><button class="btn btn-outline-danger"  type ="submit" name ="supprimer" value ="<?php echo $r['res_id']; ?>">Supprimer</button></td>           
            </tr> 
            <?php
            $i++;
        endforeach;
        ?>
    </table>
</div>

