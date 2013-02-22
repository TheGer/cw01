<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to Foundation</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>

  
</head>
<body>

  <div class="row">
    <div class="twelve columns">
      <h2>Online Car Showroom</h2>
      <hr />
    </div>
  </div>
    <div class="row">
       <!-- Entire Navbar Code -->
       <div class="twelve columns">
           <?=$data['navigation'];?>
       </div>
    </div>
  <div class="row">
    <div class="twelve columns">
      <div id="featured">
        <img src="code_images/slide1.jpg" alt="slide image">
        <img src="code_images/slide2.jpg" alt="slide image">
        <img src="code_images/slide3.jpg" alt="slide image">
      </div>
    </div>
  </div>
 <div class="row">
        <div class="twelve columns">
      <?=$data['articlecount']; ?>   
        <br/>
        
        <?=$data['editform'];?>
          <?php
          
                foreach($data['articleslist'] as $article)
                {
                    echo $article->content;
                    echo "<br/>";
                ?>
        <?php
                }

               

// print_r($data['articleslist']); ?>
      

     
            
            <!--content area -->     
       <!--  <dl class="tabs contained">
            <dd class="active"><a href="#simple1">Latest cars</a></dd>
            <dd><a href="#simple2">Upcoming deliveries</a></dd>
            <dd><a href="#simple3">Special Offers</a></dd>
         </dl>
        <ul class="tabs-content contained">
            <li class="active" id="simple1Tab">
                 
          
            </li>
            <li id="simple2Tab">Upcoming cars will be listed here</li>
            <li id="simple3Tab">Special offers to be listed here.</li>
        </ul> -->
        </div>
    </div>
      
  
  <!-- Included JS Files (Uncompressed) -->
  <!--
  <script src="javascripts/jquery.js"></script><script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script><script src="javascripts/jquery.foundation.forms.js"></script><script src="javascripts/jquery.foundation.reveal.js"></script><script src="javascripts/jquery.foundation.orbit.js"></script><script src="javascripts/jquery.foundation.navigation.js"></script><script src="javascripts/jquery.foundation.buttons.js"></script><script src="javascripts/jquery.foundation.tabs.js"></script><script src="javascripts/jquery.foundation.tooltips.js"></script><script src="javascripts/jquery.foundation.accordion.js"></script><script src="javascripts/jquery.placeholder.js"></script><script src="javascripts/jquery.foundation.alerts.js"></script><script src="javascripts/jquery.foundation.topbar.js"></script><script src="javascripts/jquery.foundation.joyride.js"></script><script src="javascripts/jquery.foundation.clearing.js"></script><script src="javascripts/jquery.foundation.magellan.js"></script>
  -->
  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/jquery-ui.js"></script>
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>

  
    <script>
    $(window).load(function(){
      $("#detailimages").orbit();  
      $("#featured").orbit();
    });
    </script> 
  
</body>
</html>
