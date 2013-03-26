
           <p>Name: <?=$data['carname']; ?></p>
           <p>Model: <?=$data['carmodel']; ?></p>
           <p>Engine Size: <?=$data['carenginesize']; ?></p>
           <p>Mileage: <?=$data['carmileage']; ?></p>
           <p>Notes: <?=$data['carnotes']; ?></p>
           <p>Date Added: <?=$data['cardateadded']; ?></p>
           <fieldset>Images:
           <ul class="block-grid three-up" data-clearing>
           <?php 
           if(isset($data['carimages']))
           {
            foreach ($data['carimages'] as $image)
            {
           ?>
               <li><a href="<?=$image?>"><img src="<?=$image?>"/></a></li>
           <?php
            }
           }
           ?>
           </ul>
           </fieldset>