<?php
//implement add/delete functionality for images
//
//
//list car images with a delete option
if ($handle = opendir(SERVER_ROOT . '/uploads/' . $data['idtoedit'] . '/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "$entry\n";
            ?>
            <a href="<?= SITE_ROOT ?>?page=car&action=deleteimage&id=<?=$data['idtoedit']?>&path=<?= $entry ?>">Delete</a><br/>
            <?php
        }
    }
}
?>
<form method="post" action="<?= SITE_ROOT ?>?page=car&id=<?=$data['idtoedit']?>&action=addimage" enctype="multipart/form-data">
    <label for="file">image filename:</label>
    <input type="file" name="file" id="file"/><br/>
    <input type="submit" name="submit" value="Submit"/>
</form>
