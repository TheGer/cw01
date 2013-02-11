<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="four columns"></div>
<div class="four columns">
<form name="register" method="post" action="<?=$_SERVER["PHP_SELF"] ?>">
    <fieldset>
        <legend>Register below</legend>
        <label>Desired Username:</label>
        <input type="text" name="uname" placeholder="username"/>
        <label>Desired Password:</label>
        <input type="password" name="pword1"/>
        <label>Retype Password:</label>
        <input type="password" name="pword2"/>
        <input type="submit" value="Register"/>
    </fieldset>
</form>
</div>
<div class="four columns"></div>
