function clearFormSaiddit() {
	var valid_names = ['valid_name', 'valid_password', 'valid_verpass', 'valid_user', 'valid_pass', 'error_login', 'error_reg'];
	for (i=0;i<valid_names.length;i++){
	    document.getElementById(valid_names[i]).innerHTML = '';
	}
}