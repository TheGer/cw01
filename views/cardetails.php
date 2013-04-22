<h3>Car Details</h3>
<hr/>
<p>Name: <?= $data['carname']; ?></p>
<p>Model: <?= $data['carmodel']; ?></p>
<p>Engine Size: <?= $data['carenginesize']; ?></p>
<p>Mileage: <?= $data['carmileage']; ?></p>
<p>Notes: <?= $data['carnotes']; ?></p>
<p>Date Added: <?= date('Y-m-d',$data['cardateadded']); ?></p>
<p>Color: <?=$data['color']; ?></p>
<p>Car type: <?=$data['cartype'];?></p>
<fieldset>Images:
    <ul class="block-grid three-up" data-clearing>
        <?php
        if (isset($data['carimages'])) {
            foreach ($data['carimages'] as $image) {
                ?>
                <li><a href="<?=SITE_ROOT . '/uploads/' . $data['id']. '/' . $image ?>"><img src="<?=SITE_ROOT . '/uploads/' . $data['id']. '/' . $image ?>"/></a></li>
                <?php
            }
        }
        ?>
    </ul>
</fieldset>