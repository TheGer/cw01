<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />

        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=1000" />

        <title>Car Dealership</title>

        <!-- Included CSS Files (Compressed) -->
        <link rel="stylesheet" href="stylesheets/foundation.min.css">
        <link rel="stylesheet" href="stylesheets/app.css">
<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.0.custom.min.css" />
        <script src="javascripts/modernizr.foundation.js"></script>


    </head>
    <body>
        
         <!-- Included JS Files (Compressed) -->
          
         
         <script src="javascripts/jquery.js"></script>
        <script src="javascripts/foundation.min.js"></script>
         <script src="javascripts/jquery-ui.js"></script>
     

        <!-- Initialize JS Plugins -->
        <script src="javascripts/app.js"></script>


        <div class="row">
            <div class="twelve columns">
                <h2>Online Car Showroom</h2>
                <hr />
            </div>
        </div>
        <div class="row">
            <!-- Entire Navbar Code -->
            <div class="twelve columns">
                <?= $data['navigation']; ?>
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
                <?php
                //if logged in, display the editor window like so:
                //echo $data['addform']; 


                foreach ($data['article'] as $article) {
                    ?>

                    <h2><?= $article->title ?></h2>
                    <p><?= $article->content ?></p>

                </div>
                <?php
            }
            ?>
            <hr/>
            
        </div>


       

        <script>
            $(window).load(function() {
                $("#detailimages").orbit();
                $("#featured").orbit();
            });
        </script> 

    </body>
</html>
