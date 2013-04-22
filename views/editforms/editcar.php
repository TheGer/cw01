<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>

    $(document).ready(function() {
        $("#dpicker").datepicker();

        $("#addcar").submit(function() {
            //implement validation here
            return true;
        });

    });

</script>
<div class="twelve columns">
    <h3>Edit car</h3>
    <form method="get" action="<?= SITE_ROOT ?>">
        <input type="hidden" name="page" value="car"/>
        <input type="hidden" name="action" value="edit"/>
        <input type="hidden" name="id" value="<?= $data['idtoedit'] ?>"/>
        <label class="left inline">Name:</label> 
        <input type="text" name="name" value="<?= $data['nametoedit'] ?>" />
        <label class="left inline">Model:</label> 
        <input type="text" name="model" value="<?= $data['modeltoedit'] ?>" />
        <label class="left inline">Engine Size:</label> 
        <input type="text" name="enginesize" value="<?= $data['enginesizetoedit'] ?>" />
        <label class="left inline">Mileage:</label> 
        <input type="text" name="mileage" value="<?= $data['mileagetoedit'] ?>" />
        <label class="left inline">Date added:</label> 
        <input type="text" name="dateadded" id="datepicker" value="<?= $data['dateaddedtoedit'] ?>" />
        <label class="left inline">Color:</label>
        <input type="text" name="color" value="<?= $data['color'] ?>"/>
        <label class="left inline">Notes:</label> 
        <textarea name="notes"><?= $data['notestoedit'] ?>"</textarea>
        <label for="checkbox1">  
            <?php if ($data['featurestoedit'] == 0) { ?>
                <input type="checkbox" id="checkbox1" style="display: none;">  
                <span class="custom checkbox"></span> Featured car?
            <?php } else { ?>
                <input type="checkbox" id="checkbox1" checked="checked" style="display: none;">  
                <span class="custom checkbox"></span> Featured car?
            <?php } ?>    
        </label>  
        <input type="submit" class="success button" value="Update car values"> 
    </form>
</div>