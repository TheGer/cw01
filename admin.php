<?php
//administration console
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if($_POST)
{
    $uname = $_POST["uname"];
    $pword = $_POST["pword"];
    
    if (($uname=="admin") && ($pword==123))
    {
        $_SESSION["user"] = $uname;
    }
}

if (isset($_GET["page"]))
{
    $page = $_GET["page"];
    
}
else
{
    $page = "clients";
}

function displayClientList()
{
    ?>
    <div class="nine columns">
        <h4>List of clients</h4>
        <table class="twelve">
        <thead>
            <tr>
                <th>Client ID</th>
                <th>Username</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>Content</td>
              <td>This is longer content</td>
              <td>Content</td>
           </tr>
            <tr>
              <td>Content</td>
              <td>This is longer content</td>
              <td>Content</td>
            </tr>
            <tr>
              <td>Content</td>
              <td>This is longer content</td>
              <td>Content</td>
            </tr>
          </tbody>
    </table>
    </div>

<?php
}


function displayCarList()
{?>
     <div class="nine columns">
        <h4>List of cars</h4>
        <h5>Click <a href="admin.php?page=addcar">here</a> to add a new delivery</h5>
        <table class="twelve">
        <thead>
            <tr>
                <th>Car ID</th>
                <th>Registration Number</th>
                <th>Edit/View Details</th>
                <th>Number of viewings</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>Content</td>
              <td>This is longer content</td>
              <td>Content</td>
              <td>0</td>
           </tr>
            <tr>
              <td>Content</td>
              <td>This is longer content</td>
              <td>Content</td>
              <td>0</td>
            </tr>
            <tr>
              <td>Content</td>
              <td>This is longer content</td>
              <td>Content</td>
              <td>0</td>
            </tr>
          </tbody>
    </table>
    </div>
   
<?php
}

function displayViewingsList()
{?>
     <div class="nine columns">
        <h4>List of viewings</h4>
        <table class="twelve">
        <thead>
            <tr>
                <th>Car ID</th>
                <th>Registration Number</th>
                <th>View Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>Content</td>
              <td>This is longer content</td>
              <td>Content</td>
           </tr>
            <tr>
              <td>Content</td>
              <td>This is longer content</td>
              <td>Content</td>
            </tr>
            <tr>
              <td>Content</td>
              <td>This is longer content</td>
              <td>Content</td>
            </tr>
          </tbody>
    </table>
    </div>
   
<?php
}


function displaySearch()
{
    ?>
    <div class="nine columns">
<form name="search" method="post" action="<?=$_SERVER["PHP_SELF"] ?>">
    <fieldset>
        <legend>Search cars</legend>
        <div class="row">
            <div class="four columns">
            <label>Search registration number</label>
            <input type="text" name="uname" placeholder="search here"/>
            <input type="submit" value="Search"/>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Search clients</legend>
        <div class="row">
            <div class="four columns">
            <label>Search client name</label>
            <input type="text" name="uname" placeholder="search here"/>
            <input type="submit" value="Search"/>
            </div>
        </div>
        </fieldset>
    <fieldset>
        <legend>Search viewings</legend>
        <div class="row">
            <div class="four columns">
            <label>Search client name</label>
            <input type="text" name="uname" placeholder="search here"/>
            <input type="submit" value="Search"/>
            </div>
           
        </div>
  
        </div>
     
    </fieldset>
</form>
</div>
<?php
}


function displayAddCar()
{
    ?>
    <div class="nine columns">
    <form name="addcar" method="post" action="<?=$_SERVER["PHP_SELF"] ?>">
        <fieldset>
            <legend>Add car</legend>    
            <label>Car Registration Number</label>
            <input type="text" name="registration" placeholder="registration number here"/>
            <label>Car model</label>
            <input type="text" name="model" placeholder="model here"/>
            <label>Car type</label>
            <select name="cartype">
                <option value="sports">Sports</option>
                <option value="saloon">Saloon</option>
                <option value="compact">Compact</option>
                <option value="4x4">4x4</option>
            </select>
            <label>Price</label>
            <input type="text" name="price" placeholder="price here"/>
            <label>Description</label>
            <textarea name="description"></textarea>
            <label>Images</label>
             <input id="fileupload" type="file" name="files[]" data-url="server/php/" multiple>
            
            <br/>
            <input type="submit" class="button" value="Add car"/>
            
        </fieldset>
    </form>
    </div>
    <?php
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
<?php
if (isset($_SESSION["user"])){
?>
    <div class="three columns">
        <h4>Options</h4>
        <ul class="four side-nav">
            <li class="active"><a href="admin.php?page=clients">Client list</a></li>
            <li><a href="admin.php?page=cars">Cars list</a></li>
            <li><a href="admin.php?page=viewings">Viewings list</a></li>
            <li><a href="admin.php?page=search">Search</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <?php
        if ($page=="clients")
        {
            displayClientList();
            
        }
        else if ($page=="cars")
        {
            displayCarList();
        }
        else if ($page=="viewings")
        {
            displayViewingsList();
        }
        else if ($page=="search")
        {
            displaySearch();
        }
        else if ($page == "addcar")
        {
            displayAddCar();
        }
    ?>
    
<?php
}
else {
?>
    
<div class="four columns"></div>
<div class="four columns">
<form name="login" method="post" action="<?=$_SERVER["PHP_SELF"] ?>">
    <fieldset>
        <legend>Login</legend>
        <label>Username</label>
        <input type="text" name="uname" placeholder="username"/>
        <label>Password</label>
        <input type="password" name="pword"/>
        <input type="submit" value="Login"/>
    </fieldset>
</form>
</div>
<div class="four columns"></div>
<?php } ?>
<!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/jquery-ui.js"></script>
  
  <script src="javascripts/foundation.min.js"></script>
  <script src="javascripts/jquery.fileupload.js"></script>
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>
  
  


</body>