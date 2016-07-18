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
                        message_login += 'Password is incorrect';
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
