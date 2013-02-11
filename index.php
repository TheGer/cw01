<?php 
    session_start();
    if ($_POST)
    {
        $uname = $_POST["uname"];
        $pword = $_POST["pword"];
        
        if (($uname == "gerrys") && ($pword == "123"))
        {
            $_SESSION["user"] = $uname;
        }
    }
     
    if (isset($_GET["page"]))
      {
         $page = $_GET["page"];
      }
      else {
          $page = 0;
             
      }
      
       
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
      <p>This is a high fidelity prototype of the online car showroom to be developed for CW01</p>
      <hr />
    </div>
  </div>
    <div class="row">
       <!-- Entire Navbar Code -->
       <div class="twelve columns">
           <nav class="top-bar">
       <section> 
        <ul class="left">
            <li class="active"><a href="index.php?page=0">Home</a></li>
            <li><a href="index.php?page=1">Contact</a></li>
            <li><a href="index.php?page=2">Search</a></li>
            <li><a href="index.php?page=3">Catalogue</a></li>
            <?php if (!isset($_SESSION["user"])) { ?>
            <li><a href="index.php?page=4">Register</a></li> 
            <?php } ?>
        </ul>
       
           <ul class="right">
            <?php if (isset($_SESSION["user"])) { ?>
              <li><a href="index.php?page=7">Profile</a></li>  
              <li><a href="index.php?page=5">Logout</a></li> 
            <?php } else { ?>
            <li><a href="index.php?page=5">Login</a></li> 
            <?php } ?>
        </ul>
       
       
       </section>
           
      
</nav>
       
       </div>

    </div>
    
  <div class="row">

    <div class="twelve columns">
      <div id="featured">
          <img src="code_images/slide1.jpg" alt="slide image">
        <img src="code_images/slide2.jpg" alt="slide image">
        <img src="code_images/slide3.jpg" alt="slide image">
          
       <!-- <img src="holder.js/1200x250/text:Slide_1" alt="slide image">
        <img src="holder.js/1200x250/text:Slide_2" alt="slide image">
        <img src="holder.js/1200x250/text:Slide_3" alt="slide image">-->
      </div>
    </div>
  </div>
    <div class="row">
        <div class="twelve columns">
        <?php
           
            if($page == 1)
            {
                require "contact.php";
            }
            else if ($page == 2)
            {
                require "search.php";
            }
            else if ($page == 3)
            {
                require "catalogue.php";
            }
            else if ($page == 4)
            {
                require "register.php";
        
            }
            else if ($page == 5)
            {
                
                require "login.php";
        
            }
            else if ($page == 6)
            {
                if(isset($_GET["carid"]))
                {
                    $carid = $_GET["carid"];
                    require "details.php";
                }
                
            }
            else if ($page == 7)
            {
                require "profile.php";
            }
            else if ($page == 8)
            {
                if(isset($_SESSION["user"]))
                {
                require "booking.php";
                }
                else
                {
                    echo "not logged in";
                }
            }
    
            else{
             ?>
            <!--content area -->     
         <dl class="tabs contained">
            <dd class="active"><a href="#simple1">Latest cars</a></dd>
            <dd><a href="#simple2">Upcoming deliveries</a></dd>
            <dd><a href="#simple3">Special Offers</a></dd>
         </dl>
        <ul class="tabs-content contained">
            <li class="active" id="simple1Tab">The latest three cars to be delivered.  The active tab is selected randomly</li>
            <li id="simple2Tab">Upcoming cars will be listed here</li>
            <li id="simple3Tab">Special offers to be listed here.</li>
        </ul>
      <!-- end of content area --> 
      <?php
            }
      ?>
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
