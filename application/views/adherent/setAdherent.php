<?php 
    foreach($personnes as $p): ?>
        <input type = "text" name = "adh_email">
        <input type = "text" name = "adh_nom">
        <input type = "text" name = "adh_prenom">
        <input type = "text" name = "adh_tel">
        <input type = "text" name = "adh_codePostal">
        <input type = "text" name = "adh_ville">
        
        <select name ="niveau">
            <option value = "<?php echo $p['adh_niveau']; ?>"><?php echo $p['adh_niveau']; ?></option>
            <?php
                if ($p['adh_niveau'] == 1)
                    $niveau = 0;
            ?>
            <option value = "0">0</option>
        </select>
        
        
    <?php endforeach;
?>

