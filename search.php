<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="twelve columns">
<form name="search" method="post" action="<?=$_SERVER["PHP_SELF"] ?>">
    <fieldset>
        <legend>Search</legend>
        <div class="row">
            <div class="four columns">
            <label>Search</label>
            <input type="text" name="uname" placeholder="search here"/>
            </div>
            <div class="four columns">
                <label>Price range from</label>
                <input type="text" name="pricefrom" placeholder="0"/>
                <label>To</label>
                <input type="text" name="pricefrom" placeholder="30000"/>
            </div>
        </div>
        <div class="row">
          <label>Other Criteria</label>
          <div class="four columns">
      <label for="checkbox1"><input type="checkbox" id="checkbox1"><span class="custom checkbox"></span>Search in Colour</label>
      <label for="checkbox2"><input type="checkbox" id="checkbox2"><span class="custom checkbox"></span>Search in Description</label>
      
    </div>
        </div>
        <input type="submit" value="Search"/>
    </fieldset>
</form>
</div>



