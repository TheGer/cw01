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
        <input type="hidden" name="type" value="4"/>
        <label class="left inline">Username:</label> 
        <input type="text" name="username" />
        <label class="left inline">Name:</label> 
        <input type="text" name="firstname" />
         <label class="left inline">Surname:</label> 
        <input type="text" name="secondname" />
        <label class="left inline">Address:</label> 
        <input type="text" name="address" />
        <label class="left inline">Password:</label> 
        <input type="password" name="password" id="password1" />
        <label class="left inline">Confirm Password:</label> 
        <input type="password" name="pword2" id="password2" />
        
        <input type="submit" value="register"/>
    </form>
</div>
<script>
$(document).ready(function(){

$("#adduser").submit(function(){
       //implement validation here
            var pass1 = $("#password1").val();
            var pass2 = $("#password2").val();

            if (pass1 != '' && pass1 != pass2) {
                //show error
                var error = 'Password confirmation doesn\'t match.';
                $('#password1').next('span').text(error);
                $('#password2').next('span').text(error);
                //           errorCount = errorCount + 1;
                return false
            }
            else
            {
                return true;
            }
        });

});

        
</script>