<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="twelve columns">
    <span></span>
    
    <form id="adduser" method="get" action="<?= SITE_ROOT ?>">
        <input type="hidden" name="page" value="users"/>
        <input type="hidden" name="action" value="add"/>
        <label class="left inline">Username:</label> 
        <input type="text" name="username" />
        <label class="left inline">Name:</label> 
        <input type="text" name="firstname" />
         <label class="left inline">Surname:</label> 
        <input type="text" name="secondname" />
        <label class="left inline">Address:</label> 
        <input type="text" name="address" />
        <label class="left inline">Password:</label> 
        <input type="text" name="pword1" id="password1" />
        <label class="left inline">Confirm Password:</label> 
        <input type="text" name="pword2" id="password2" />
        <input type="submit" value="register"/>
    </form>
</div>
<script>
$(document).ready(function(){

$("#adduser").submit(function(){
    //implement validation here
    return true;
});
    
});
        
</script>