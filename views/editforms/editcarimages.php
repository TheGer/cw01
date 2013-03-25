<?php
//list car images with a delete option
if ($handle = opendir(SERVER_ROOT . '/uploads/'.$data['idtoedit'].'/')){
    while (false !== ($entry = readdir($handle))) {
        if ($entry !="." && $entry != "..")
        {
            echo "$entry\n";
         ?>
        <a href="<?=SITE_ROOT?>?action=deleteimage&path='<?=$entry?>'">Delete</a>
<?php
        }
    }
}



?>
<form method="post" action="<?=SITE_ROOT?>" enctype="multipart/form-data">
    <input type="hidden" value="<?=$data['carid']?>"/>
    <label for="file">image filename:</label>
    <input type="file" name="file" id="file"/><br/>
    <input type="submit" name="submit" value="Submit"/>
</form>
