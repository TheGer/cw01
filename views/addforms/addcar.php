<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form method="get" action="<?=SITE_ROOT?>">
    <input type="hidden" name="page" value="content"/>
    <input type="hidden" name="action" value="add"/>
  
   <label class="left inline">Name:</label> 
    <input type="text" class="error" name="name" />
    <small class="error">Missing name</small>
    <label class="left inline">Model:</label> 
    <input type="text" class="error" name="model" />
     <small class="error">Missing model</small>
    <label class="left inline">Engine Size:</label> 
    <input type="text" class="error" name="enginesize" />
     <small class="error">Missing engine size</small>
    <label class="left inline">Mileage:</label> 
    <input type="text" class="error" name="mileage" />
     <small class="error">Missing mileage</small>
      <label class=left inline">Date added:</label> 
    <input type="text" class="error" id="datepicker" name="dateadded" />
     <small class="error">Missing date</small>
    <label class="left inline">Notes:</label> 
    <textarea name="notes" class="error"></textarea>
     <small class="error">Missing notes</small>
    <label for="checkbox1">Featured car?
        <input type="checkbox" id="checkbox1">  
        <span class="custom checkbox"></span>  
      </label>
    <input type="submit" class="success button" value="Add new car"> 
</form>