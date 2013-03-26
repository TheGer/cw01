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
            if (isset($data['detailsview'])) {
                echo $data['detailsview'];
            } else {
                ?>
                <!-- table with all the cars as well as a link to the details page --> 
                <div class="two columns">

                </div>
                <div class="nine columns">
                    <table class="nine">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Model</th>
                                <th>Mileage</th>
                                <th>Engine Size</th>
                                <th>Date Added</th>
                                <th>View Details</th>     
                            </tr>
                        </thead>
                        <tbody>

    <?php
    foreach ($data['carslist'] as $car) {
        ?>
                                <tr>     
                                    <td><?= $car->id ?></td>
                                    <td><?= $car->name ?></td>
                                    <td><?= $car->model ?></td>
                                    <td><?= $car->mileage ?></td>
                                    <td><?= $car->enginesize ?></td>
                                    <td><?= $car->dateadded ?></td>
                                    <td><a href="<?= SITE_ROOT ?>/index.php?page=car&action=showdetails&id=<?= $car->id ?>">View details</a></td>
                                </tr>
        <?php
    }
    ?>
                        </tbody>
                    </table>
                            <?php
                        }
                        ?>
            </div>

        </div>

        <!-- Included JS Files (Compressed) -->
        <script src="javascripts/jquery.js"></script>
        <script src="javascripts/jquery-ui.js"></script>
        <script src="javascripts/foundation.min.js"></script>

        <!-- Initialize JS Plugins -->
        <script src="javascripts/app.js"></script>


        <script>
            $(window).load(function() {
                $("#detailimages").orbit();
                $("#featured").orbit();
            });
        </script> 

    </body>
</html>
