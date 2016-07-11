function validateForm(form, username, pass, verify) {
    var name = document.forms[form][username].value;
    var password = document.forms[form][pass].value;

    var input_state = [true, true, true];
    var valid_names;
    var message_reg = '';
    var message_login = '';

    //IF REG FORM IS FILLED
    if (verify != 1) {
        var verify_password = document.forms[form][verify].value;
        valid_names = ['valid_name', 'valid_password', 'valid_verpass'];


        if (name == null || name == "") {
            document.getElementById(valid_names[0]).innerHTML = 'X';
            document.getElementById(valid_names[0]).style.color = 'red';
            message_reg = 'Username is required';
            input_state[0] = false;
        }
        else if (message_reg != 'Username is required') {
            $.ajax({
                type: 'POST',
                url: 'userExists.php',
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
        }else {
            document.getElementById(valid_names[0]).innerHTML = '';
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
        for (i=0; i<4; i++) {
            if (input_state[i] == false){
                return false;
            }
        }
    }
    // IF LOGIN FORM IS FILLED
    else {
        valid_names = ['valid_user', 'valid_pass'];
        
        $.ajax({
            type: 'POST',
            url: 'userExists.php',
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
                    message_login = 'username is good';
                }
            }
        });

        $.ajax({
            type: 'POST',
            url: 'correctPass.php',
            data: {pass: password, user: name},
            async: false,
            success: function(data){
                if (data == false){
                    document.getElementById(valid_names[1]).innerHTML = 'X';
                    document.getElementById(valid_names[1]).style.color = 'red';
                    input_state[1] = false;
                    if (message_login == 'username is good'){
                        message_login = 'Password is incorrect';                    
                    }
                }
                else{
                    document.getElementById(valid_names[1]).innerHTML = '';
                    message_login = '';
                }
            }
        });
        document.getElementById('error_login').innerHTML = message_login;                   
    }

    for (i=0; i<4; i++) {
        if (input_state[i] == false){
            return false;
        }
    }
    
    return true;
}