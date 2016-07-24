<?php

function printMain($user) {
    ?>
        
        <div id='main'>
        <div id='popup_main'>
            <div id='block'>
                <div id='close_popup_main' onclick ='div_hide()'></div>

                <form id='register_form' name='register_form' action='' method='post' onsubmit='return validateFormSaiddit("register_form", "username_new", "password_new", "verify_password")'>
                    <div class='title'>CREATE A NEW ACCOUNT</div>
                    <input type='text' id='username_new' name='username_new' placeholder='choose a username'>
                    <div class='valid' id='valid_name' style='top:45px; left:340px;'> </div>

                    <input type='text' id='password_new' name='password_new' placeholder='password'>
                    <div class='valid' id='valid_password' style='top:97px; left:340px;'> </div>

                    <input type='text' id='verify_password' name='verify_password' placeholder='verify password'>
                    <div class='valid' id='valid_verpass' style='top:150px; left:340px;'> </div>

                    <input type='text' id='email' name='email' placeholder='email (optional)'>
                    <br>
                    <br>
                    <input type='checkbox' id='remember_new'> remember me
                    <br>
                    <br>
                    <input type='checkbox' id='subscribe'> get the best of saiddit emailed to you once a week <a onclick=''>learn more</a>
                    <br>
                    <br>
                    <input type='submit' id='submit_reg' name='submit_reg' value='SIGN UP'>

                    <div class='error' id='error_reg' style='bottom:80px; left:30px'></div>
                </form>

                <div id='disclaimer'>By signing up, you agree to our <a>Terms</a> and that you have read our <a>Privacy Policy</a> and <a>Content Policy.</a> </div>
                <div class='vr' style='top: 30px; right:50%; height:450px;'></div>

                <form id='login_form' name='login_form' action='' method='post' onsubmit='return validateFormSaiddit("login_form", "username", "password", 1)'>
                    <div class='title'>LOG IN</div>

                    <input type='text' id='username' name='username' placeholder='username'>
                    <div class='valid' id='valid_user' style='top:45px; right:20px;'> </div>

                    <input type='text' id='password' name='password' placeholder='password'>
                    <div class='valid' id='valid_pass' style='top:95px; right:20px'> </div>

                    <br>
                    <br>
                    <input type='checkbox' id='remember_new'> remember me <t> <a onclick='' style='position:absolute; right:30px;'>reset password</a>
                    <br>
                    <br>
                    <input type='submit' id='submit_login' name='submit_login' value='LOG IN'>

                    <div class='error' id='error_login' style='bottom:250px; right:150px'></div>
                </form>
            </div>
        </div>

        <div id='popup_settings'>
            <li id='current_user' value=''></li>
            <div id='block_settings'>
                <div id='close_popup_settings' onclick ='div_hide_settings()'></div>

                <form id='settings_form' name='settings_form' action='../connect/settings.php' method='post' onsubmit='return validateFormSettings("settings_form", "username_change", "old_password", "password_change", "verify_password_change")'>
                    <input type='hidden' value='' id='c_user' name='c_user'>
                    <div class='title'>SETTINGS</div><br>
                    Change Username:<br>
                    <input type='text' id='username_change' name='username_change' placeholder='choose a username'>
                    <div class='valid' id='valid_name_change' style='top:90px; right:10px; z-index:-1;'> </div>

                    <br>
                    <br>
                    <br>
                    Change Password:<br>
                   
                    <input type='text' id='old_password' name='old_password' placeholder='old password'>
                    <div class='valid' id='valid_old_password' style='top:190px; right:10px; z-index:-1;'> </div>
                    <br>
                    <input type='text' id='password_change' name='password_change' placeholder='new password'>
                    <div class='valid' id='valid_password_change' style='top:255px; right:10px; z-index:-1;'> </div>

                    <input type='text' id='verify_password_change' name='verify_password_change' placeholder='verify password'>
                    <div class='valid' id='valid_verpass_change' style='top:300px; right:10px; z-index:-1;'> </div>
                    <br>
                    <div class='error' id='error_settings' style='left:35px; width:400px;'></div>
                    <br>
                    <input type='submit' id='submit_changes' name='submit_changes' value='SUBMIT CHANGES'>
                    <br>
                    <br>    
                </form>
                <form id='delete_form' name='delete_form' action='../connect/delete_user.php' method='post' onsubmit='return confirm("Are you sure you want to delete your account? Your entire history will be deleted as well.")'>
                    <input type='submit' id='delete_account' name='delete_account' value='DELETE ACCOUNT'>
                </form>
            </div>
        </div>
    </div>
    <?php
    echo "<script> 
        document.getElementById('current_user').setAttribute('value', '".$user."');
    </script>";
}
?>


