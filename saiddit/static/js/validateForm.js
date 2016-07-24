function validateFormSaiddit(form, username, pass, verify) {
    clearFormSaiddit();
    
    var name = document.forms[form][username].value;
    var password = document.forms[form][pass].value;

    var input_state = [true, true, true];
    var valid_names;
    
    //IF REG FORM IS FILLED
    if (verify != 1) {
        var message_reg = '';
        var verify_password = document.forms[form][verify].value;
        valid_names = ['valid_name', 'valid_password', 'valid_verpass'];

        if (name == null || name == "") {
            document.getElementById(valid_names[0]).innerHTML = 'X';
            document.getElementById(valid_names[0]).style.color = 'red';
            message_reg = 'Username is required';
            input_state[0] = false;
        }
        else {
            $.ajax({
                type: 'POST',
                url: 'db_utils/userExists.php',
                data: {user: name},
                async: false,
                success: function(data){
                    if (data == true){
                        document.getElementById(valid_names[0]).innerHTML = 'X';
                        document.getElementById(valid_names[0]).style.color = 'red';
                        input_state[0] = false;
                        message_reg = 'Username is already taken';
                    }
                    else{
                        document.getElementById(valid_names[0]).innerHTML = '';
                        message_reg = '';
                    }
                }
            });
        }

        if (password == null || password == "") {
            document.getElementById(valid_names[1]).innerHTML = 'X';
            document.getElementById(valid_names[1]).style.color = 'red';
            message_reg += '<br>Password is required';
            input_state[1] = false;
        }
        else {
            document.getElementById(valid_names[1]).innerHTML = '';
        }

        if ((verify_password == null || verify_password == "" || password != verify_password) && verify != 1) {
            document.getElementById(valid_names[2]).innerHTML = 'X';
            document.getElementById(valid_names[2]).style.color = 'red';
            message_reg += '<br>The passwords do not match';
            input_state[2] = false;
        }
        else {
            document.getElementById(valid_names[2]).innerHTML = '';
        }
        document.getElementById('error_reg').innerHTML = message_reg;
    }
    // IF LOGIN FORM IS FILLED
    else {
        var message_login = '';
        valid_names = ['valid_user', 'valid_pass'];

        if (name == null || name == "") {
            document.getElementById(valid_names[0]).innerHTML = 'X';
            document.getElementById(valid_names[0]).style.color = 'red';
            message_login = 'Username is required';
            input_state[0] = false;
        }
        else {
            $.ajax({
                type: 'POST',
                url: 'db_utils/userExists.php',
                data: {user: name},
                async: false,
                success: function(data){
                    if (data == false){
                        document.getElementById(valid_names[0]).innerHTML = 'X';
                        document.getElementById(valid_names[0]).style.color = 'red';
                        input_state[0] = false;
                        message_login = 'Username does not exist';
                    }
                    else{
                        document.getElementById(valid_names[0]).innerHTML = '';
                        message_login = '';
                    }
                }
            });    
        }
        
        if (password == null || password == "") {
            document.getElementById(valid_names[1]).innerHTML = 'X';
            document.getElementById(valid_names[1]).style.color = 'red';
            message_login += '<br>Password is required';
            input_state[1] = false;
        }
        else {
            $.ajax({
                type: 'POST',
                url: 'db_utils/correctPass.php',
                data: {pass: password, user: name},
                async: false,
                success: function(data){
                    if (data == false){
                        document.getElementById(valid_names[1]).innerHTML = 'X';
                        document.getElementById(valid_names[1]).style.color = 'red';
                        input_state[1] = false;                        
                        message_login += '<br>Password is incorrect';
                    }
                    else{
                        document.getElementById(valid_names[1]).innerHTML = '';
                        message_login += '';
                    }
                }
            });
        }        
        document.getElementById('error_login').innerHTML = message_login;
    }

    for (i=0; i<input_state.length; i++) {
        if (input_state[i] == false){
            return false;
        }
    }

    return true;
}

function validateFormSettings(form_name, username_change, old_pass, pass_change, verify_pass_change) {
    var new_name = document.forms[form_name][username_change].value;
    var current_name = document.getElementById('current_user').getAttribute('value');
    var old_password = document.forms[form_name][old_pass].value;
    var new_password = document.forms[form_name][pass_change].value;
    var verify_password = document.forms[form_name][verify_pass_change].value;

    var input_state = [true, true, true, true];
    var valid_names;
    
    var message_settings = '';
    valid_names = ['valid_name_change', 'valid_old_password', 'valid_password_change', 'valid_verpass_change'];

    var filled_in = [];
    
    if (new_name == null || new_name == "") {
        input_state[0] = true;
        filled_in[0] = false;

    }
    else {
        document.forms[form_name]['c_user'].value = current_name;
        filled_in[0] = true;
        $.ajax({
            type: 'POST',
            url: 'db_utils/userExists.php',
            data: {user: new_name},
            async: false,
            success: function(data){
                if (data == true){
                    document.getElementById(valid_names[0]).innerHTML = 'X';
                    document.getElementById(valid_names[0]).style.color = 'red';
                    input_state[0] = false;
                    message_settings = 'Username is already taken';
                }
                else{
                    document.getElementById(valid_names[0]).innerHTML = '';
                    message_settings = '';
                    input_state[0] = true;

                }
            }
        });
    }
    

    if (old_password == null || old_password == "") {
        input_state[1] = true;
        filled_in[1] = false;
    }
    else {
        filled_in[1] = true;
        if (new_password == null || new_password == "") {
            document.getElementById(valid_names[2]).innerHTML = 'X';
            document.getElementById(valid_names[2]).style.color = 'red';
            message_settings += '<br>new password required for password change';
            input_state[2] = false;
            filled_in[2] = false;
        }
        else {
            filled_in[2] = true;
            if ((verify_password == null || verify_password == "" || new_password != verify_password)) {
                document.getElementById(valid_names[3]).innerHTML = 'X';
                document.getElementById(valid_names[3]).style.color = 'red';
                message_settings += '<br>The passwords do not match';
                input_state[3] = false;
                filled_in[3] = false;
            }
            else {
                filled_in[3] = true;
                input_state[2] = true;
                input_state[3] = true;
            }
        }

        $.ajax({
            type: 'POST',
            url: 'db_utils/correctPass.php',
            data: {pass: old_password, user: current_name},
            async: false,
            success: function(data){
                if (data == false){
                    document.getElementById(valid_names[1]).innerHTML = 'X';
                    document.getElementById(valid_names[1]).style.color = 'red';
                    input_state[1] = false;                        
                    message_settings += '<br>Old password is incorrect';
                }
                else{
                    document.getElementById(valid_names[1]).innerHTML = '';
                    message_settings += '';
                }
            }
        });
    }

    document.getElementById('error_settings').innerHTML = message_settings;
    
    if (filled_in[0] == false && filled_in[1] == false){
        alert('Nothing to submit');
        return false;
    }
    return true;
}
