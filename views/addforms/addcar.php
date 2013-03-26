<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<script>
    
$(document).ready(function(){
    $("#dpicker").datepicker(); 

$("#addcar").submit(function(){
    //implement validation here
    return true;
});
    
});
        
</script>
<div class="twelve columns">
    <form method="get" id="addcar" action="<?= SITE_ROOT ?>">
        <input type="hidden" name="page" value="car"/>
        <input type="hidden" name="action" value="add"/>

        <label class="left inline">Name:</label> 
        <input type="text" name="name" />
        <label class="left inline">Model:</label> 
        <input type="text" name="model" />
        <label class="left inline">Engine Size:</label> 
        <input type="text" name="enginesize" />
        <label class="left inline">Mileage:</label> 
        <input type="text" name="mileage" />
        <label class="left inline">Color:</label>
        <input type="text" name="color" />
        <label class="left inline">Car type:</label>
        <select name="cartype">
            <option value="saloon">Saloon</option>
            <option value="hatchback">Hatchback</option>
            <option value="van">Van</option>
        </select>
        <label class="left inline">Date added:</label> 
        <input type="text" id="dpicker" name="dateadded" />
        <label class="left inline">Notes:</label> 
        <textarea name="notes"></textarea>
        <label for="checkbox1">Featured car?
            <input type="checkbox" id="checkbox1">  
        </label>
        <input type="submit" class="success button" value="Add new car"> 
    </form>
</div>
