
<form method="post" action="<?= SITE_ROOT ?>" enctype="multipart/form-data">
    <input type="hidden" value="<?= $data['carid'] ?>"/>
    <label for="file">image filename:</label>
    <input type="file" name="file" id="file"/><br/>
    <input type="submit" name="submit" value="Submit"/>
</form>
