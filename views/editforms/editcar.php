<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form method="get" action="<?=SITE_ROOT?>">
    <input type="hidden" name="page" value="content"/>
    <input type="hidden" name="action" value="edit"/>
    <input type="hidden" name="id" value="<?=$data['idtoedit']?>"/>
   <label class="right inline">Name:</label> 
    <input type="text" class="error" name="name" value="<?=$data['nametoedit']?>" />
    <small class="error">Missing name</small>
    <label class="right inline">Model:</label> 
    <input type="text" class="error" name="model" value="<?=$data['modeltoedit']?>" />
     <small class="error">Missing model</small>
    <label class="right inline">Engine Size:</label> 
    <input type="text" class="error" name="enginesize" value="<?=$data['enginesizetoedit']?>" />
     <small class="error">Missing engine size</small>
    <label class="right inline">Mileage:</label> 
    <input type="text" class="error" name="mileage" value="<?=$data['mileagetoedit']?>" />
     <small class="error">Missing mileage</small>
      <label class="right inline">Date added:</label> 
    <input type="text" class="error" name="dateadded" id="datepicker" value="<?=$data['dateaddedtoedit']?>" />
     <small class="error">Missing date</small>
    <label class="right inline">Notes:</label> 
    <textarea name="notes" class="error">value="<?=$data['notestoedit']?>"</textarea>
     <small class="error">Missing notes</small>
    <label for="checkbox1">  
        <?php if ($data['featurestoedit'] == 0) { ?>
            <input type="checkbox" id="checkbox1" style="display: none;">  
            <span class="custom checkbox"></span> Featured car?
        <?php } else { ?>
            <input type="checkbox" id="checkbox1" checked="checked" style="display: none;">  
            <span class="custom checkbox"></span> Featured car?
        <?php } ?>    
    </label>  
    <input type="submit" class="success button" value="Add new car"> 
</form>