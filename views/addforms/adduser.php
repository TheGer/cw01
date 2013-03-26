<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="twelve columns">
    <form id="adduser" method="get" action="<?= SITE_ROOT ?>">
        <input type="hidden" name="page" value="users"/>
        <input type="hidden" name="action" value="add"/>
        <label class="left inline">Username:</label> 
        <input type="text" name="username" />
        <label class="left inline">Name:</label> 
        <input type="text" name="firstname" />
        <label class="left inline">Password:</label> 
        <input type="text" name="password1" id="password1" />
        <label class="left inline">Confirm Password:</label> 
        <input type="text" name="password2" id="password2" />
        <!-- to do add user types -->
        <input type="submit" value="add new user"/>
    </form>
</div>
<script>
$(document).ready(function(){
alert("archgfds");
    
});
        
</script>