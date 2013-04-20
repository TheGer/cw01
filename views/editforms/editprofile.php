<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="twelve columns">
    <span></span>

    <form id="edituser" method="get" action="<?= SITE_ROOT ?>">
        <input type="hidden" name="page" value="users"/>
        <input type="hidden" name="action" value="edit"/>
        <input type="hidden" name="id" value="<?= $data['idtoedit'] ?>"/>
        <label class="left inline">Username:</label> 
        <input type="text" name="username" value="<?= $data['usernametoedit'] ?>"/>
        <label class="left inline">Name:</label> 
        <input type="text" name="firstname" value="<?= $data['firstnametoedit'] ?>"/>
        <label class="left inline">Surname:</label> 
        <input type="text" name="secondname" value="<?= $data['secondnametoedit'] ?>"/>
        <label class="left inline">Address:</label> 
        <input type="text" name="address" value="<?= $data['addresstoedit'] ?>"/>
        <label class="left inline">Password:</label> 
        <input type="text" name="password" id="password1" />
        <label class="left inline">Confirm Password:</label> 
        <input type="text" name="pword2" id="password2" />
       
        <input type="submit" value="update profile"/>
    </form>
</div>
<script>
    $(document).ready(function() {

        $("#edituser").submit(function() {
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
            else {
                return true;
            }

        });

    });

</script>