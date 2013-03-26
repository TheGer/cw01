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
            <div class="twelve columns">
                <?php
                if (isset($data['loginform'])) {
                    echo $data['loginform'];
                }

                if (isset($data['users'])) {
                    ?>
                    <div class="three columns">
                        <a href="<?= SITE_ROOT ?>/index.php?page=users&action=showadd">Add new user</a></td>
                    </div>
                    <table class="nine columns"> 
                        <tr>
                            <th>User id</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Type</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                        foreach ($data['users'] as $user) {
                            ?>
                            <tr> 
                                <td><?= $user->id ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->firstname ?></td>
                                <td><?= $user->secondname ?></td>
                                <td><?= $user->type ?></td>
                                <td><a href="<?= SITE_ROOT ?>/index.php?page=users&action=showedit&id=<?= $car->id ?>">Edit user</a></td>
                                <td><a href="<?= SITE_ROOT ?>/index.php?page=users&action=delete&id=<?= $car->id ?>" onclick="return confirm('Are you sure?')">Delete user</a></td>
                            </tr>                               
                            <?php
                        }
                        ?>

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
