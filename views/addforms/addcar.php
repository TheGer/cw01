<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="twelve columns">
    <form method="get" id="addcar" action="<?= SITE_ROOT ?>">
        <input type="hidden" name="page" value="car"/>
        <input type="hidden" name="action" value="add"/>

        <label class="left inline">Name:</label> 
        <input type="text" name="name" />
        <small class="error">Missing name</small>
        <label class="left inline">Model:</label> 
        <input type="text" name="model" />
        <small class="error">Missing model</small>
        <label class="left inline">Engine Size:</label> 
        <input type="text" name="enginesize" />
        <small class="error">Missing engine size</small>
        <label class="left inline">Mileage:</label> 
        <input type="text" name="mileage" />
        <small class="error">Missing mileage</small>
        <label class="left inline">Date added:</label> 
        <input type="text" id="datepicker" name="dateadded" />
        <small class="error">Missing date</small>
        <label class="left inline">Notes:</label> 
        <textarea name="notes"></textarea>
        <small class="error">Missing notes</small>
        <label for="checkbox1">Featured car?
            <input type="checkbox" id="checkbox1">  
            <span class="custom checkbox"></span>  
        </label>
        <input type="submit" class="success button" value="Add new car"> 
    </form>
</div>
<script>
$(document).ready(function(){

$("#addcar").submit(function(){
    //implement validation here
    return true;
});
    
});
        
</script>