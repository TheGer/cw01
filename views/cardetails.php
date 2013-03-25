
           <p>Name: <?=$data['carname']; ?></p>
           <p>Model: <?=$data['carmodel']; ?></p>
           <p>Engine Size: <?=$data['carenginesize']; ?></p>
           <p>Mileage: <?=$data['carmileage']; ?></p>
           <p>Notes: <?=$data['carnotes']; ?></p>
           <p>Date Added: <?=$data['cardateadded']; ?></p>
           <fieldset>Images:
           <p>
           <?php 
           if(isset($data['carimages']))
           {
            foreach ($data['carimages'] as $image)
            {
           ?>
                <img src="<?=$image?>"/>
           <?php
            }
           }
           ?>
           </p>
           </fieldset>