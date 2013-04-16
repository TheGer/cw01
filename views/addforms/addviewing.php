<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="twelve columns">
    <form method="get" id="addcar" action="<?= SITE_ROOT ?>">
        <input type="hidden" name="page" value="car"/>
        <input type="hidden" name="action" value="confirmviewing"/>
        <input type="hidden" name="carid" value="<?= $data['id'] ?>"/>
        <p>Car name: <?= $data['name'] ?></p>
        <label class="left inline">Date to view:</label> 
        <input type="text" id="dpicker" name="viewingdate" />
        <label class="left inline">Notes:</label> 
        <textarea name="notes"></textarea>
        <input type="submit" class="success button" value="Add new car"> 
    </form>
</div>