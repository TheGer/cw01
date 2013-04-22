<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="twelve columns">
    <form method="get" action="<?= SITE_ROOT ?>">
        <input type="hidden" name="page" value="content"/>
        <input type="hidden" name="action" value="add"/>
        <input type="hidden" name="authorid" value="<?=$_SESSION['userid']?>"/>
        Name: <input type="text" name="name" />
        Title: <input type="text" name="title" />
        Text:
        
        <textarea name="content"></textarea>
        <input type="submit" value="add new content"/>
    </form>
</div>