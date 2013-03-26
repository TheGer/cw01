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
            
            <?php
              if (isset($data['addform'])) {
                echo $data['addform'];
            }


            if (isset($data['editform'])) {
                echo $data['editform'];
              
            }
            
            ?>
            
            
            
            <!-- table with all the cars as well as a link to the details page --> 
            <div class="two columns">
               <a href="<?= SITE_ROOT ?>/index.php?page=content&action=showadd">Add new page</a></td>
                  
            </div>
            <div class="nine columns">
                <table class="nine">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($data['articleslist'] as $content) {
                            ?>
                            <tr>     
                                <td><?= $content->id ?></td>
                                <td><?= $content->name ?></td>
                                <td><?= $content->date ?></td>
                                <td><a href="<?= SITE_ROOT ?>/index.php?page=content&action=delete&id=<?= $content->id ?>">Delete</a></td>
                                <td><a href="<?= SITE_ROOT ?>/index.php?page=content&action=showedit&id=<?= $content->id ?>">Edit</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

       

        <script>
            $(window).load(function() {
                $("#detailimages").orbit();
                $("#featured").orbit();
            });
        </script> 

    </body>
</html>
