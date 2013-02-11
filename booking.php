<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<script>
  $(window).load(function () {
      $("#datepicker").datepicker();
  }  
 
  </script>
<div class="twelve columns">
     <p>Favourite cars</p>
    <table class="twelve">
  <thead>
    <tr>
      <th>Car ID</th>
      <th>Car Thumbnail</th>
      <th>Car Information</th>
      <th>Car Price</th>
      <th>Car Colour</th>
      <th>Details</th>
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td><img src="code_images/thumbs/yaris.jpg"/></td>
      <td>Toyota Yaris</td>
      <td>7500</td>
      <td>Blue</td>
      <td><a href="index.php?page=6&carid=1">View details</a></td>
      <td><a href="index.php?page=6&carid=1">Remove</a></td>
    </tr>
    <tr>
      <td>Content</td>
      <td>This is longer content</td>
      <td>Content</td>
      <td>Content</td>
      <td>Content</td>
      <td>Content</td>
      <td>Content</td>
    </tr>
    <tr>
      <td>Content</td>
      <td>This is longer content</td>
      <td>Content</td>
      <td>Content</td>
      <td>Content</td>
      <td>Content</td>
      <td>Content</td>
    </tr>
    <tr>
      <td>Content</td>
      <td>This is longer content</td>
      <td>Content</td>
      <td>Content</td>
      <td>Content</td>
      <td>Content</td>
      <td>Content</td>
    </tr>
  </tbody>
</table>
<form name="search" method="post" action="<?=$_SERVER["PHP_SELF"] ?>">
    <fieldset>
        <legend>Book viewing for favourite cars</legend>
        <div class="row">
            <div class="four columns">
                <div>
                    <input type="text" id="datepicker" >
                </div>
            </div>
        </div>
        <input type="submit" class="button" value="Book"/>   
    </fieldset>
</form>
</div>