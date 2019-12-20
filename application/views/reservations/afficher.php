
<div>
    <h2>Vos réservations</h2>
    <p>Cocher les cases pour supprimer les réservations</p>
</div>
<?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
<?php echo form_open('Reservations/delectReservation'); ?>
<div>
    <?php
    $i = 1;
    foreach ($reservations as $r):
        ?> 
        <div class="accordion" id="accordionExample">
            <div class= "card">
                <div class="card-header text-center">					
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo $i; ?>" aria-expanded="true" aria-controls="<?php echo $i; ?>">
                        <h5 class = "card-title"><p>Réservation <?php echo $i; ?></p></h5>					
                    </button>
                    <p class="text-center">   
                        <?php if ($r['res_valide'] != "Valide") { ?>   
                        <div class="custom-control custom-checkbox">
                            <label for ="delete">Cocher la case pour supprimer la réservation <?php
                                echo $i;
                                ?></label>
                            <input type="checkbox" id = "delete" name = "resid[]" value = "<?php echo $r['res_id']; ?>"/> 
                        </div>
                    <?php } ?>
                    </p>
                </div>		      

                <div id ="<?php echo $i; ?>" class= "collapse multi-collapse">
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
                                <td><?php echo $r['res_valide']; ?></td>
                                <td><?php echo $r['res_datedebut']; ?></td>            
                                <td><?php echo $r['res_datefin']; ?></td>
                                <td><?php echo $r['res_tarif']; ?></td>

                                <td>
                                    <?php
                                    if ($r['res_menage'] == 't')
                                        echo "Ménage fait par le personnel";
                                    else
                                        echo "Ménage fait par vous";
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($r['res_pension'] == 't')
                                        echo "Pension complète";
                                    else
                                        echo "Demi Pension";
                                    ?>
                                </td>     
                            </tr>
                        </table>

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
                <input class="btn btn-outline-warning" type="submit" name="submit" value="Supprimer les réservations" />   
            </div>
            </form>     
        </div>
