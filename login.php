<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="four columns"></div>
<div class="four columns">
    <?php if (isset($_SESSION["user"])) { ?>
    <p><a href="logout.php">Log out</a></p>
        
     <?php   } else{ ?>
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
