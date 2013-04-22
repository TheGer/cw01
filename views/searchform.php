<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="twelve columns">
    <h3>Search for car</h3>
    <form method="get" id="addcar" action="<?= SITE_ROOT ?>">
        <input type="hidden" name="page" value="car"/>
        <input type="hidden" name="action" value="search"/>
        <label class="left inline">Name:</label> 
        <input type="text" name="searchname" />
        <label class="left inline">Model:</label> 
        <input type="text" name="searchmodel" />
        <label class="left inline">Engine Size:</label> 
        <input type="text" name="searchenginesize" />
        <label class="left inline">Mileage:</label> 
        <input type="text" name="searchmileage" />
        <label class="left inline">Color:</label>
        <input type="text" name="searchcolor" />
        <label class="left inline">Car type:</label>
        <select name="cartype">
            <option value="saloon">Saloon</option>
            <option value="hatchback">Hatchback</option>
            <option value="van">Van</option>
        </select>
        <input type="submit" class="success button" value="Search car"> 
    </form>
</div>



