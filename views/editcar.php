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
    <textarea name="content">
        <?=$data['texttoedit']?>
    </textarea>
    <input type="submit" value="edit content"/>
</form>