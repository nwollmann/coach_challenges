/*function validate(){
	var valid = true;

	//check username
	/*var value = document.getElementById("username").value;
	//var group = document.getElementById("usernameGroup");
	if(value.match(/[^\w\-]/) || value.length == 0){ 
	 	group.className = "form-group has-error";
	 	valid = false;
	}else
		group.className = "form-group has-success";

	//check password
	value = document.getElementById("password").value;
	group = document.getElementById("passwordGroup");
	if(value.length >= 5 && !value.match(/[^\w\-]/))
		group.className = "form-group has-success";
	else{
		group.className = "form-group has-error";
		valid = false;
	}

	//check confirmed password
	value = document.getElementById("passwordConfirm").value;
	group = document.getElementById('passwordConfirmGroup');
	if(value == document.getElementById("password").value)
		group.className = "form-group has-success";
	else{
		group.className = "form-group has-error";
		valid = false;
	}

	//check name
	value = document.getElementById("name").value;
	group = document.getElementById("nameGroup");
	if(value.match(/^[a-z ,.'-]+$/i) && value.length != 0)
		group.className = "form-group has-success";
	else{
		group.className = "form-group has-error";
		valid = false;
	}

	//check email
	value = document.getElementById("email").value;
	group = document.getElementById("emailGroup");
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(value.length != 0 && re.test(value))
		group.className = "form-group has-success";
	else{
		group.className = "form-group has-error";
		valid = false;
	}

	if(valid){
		document.getElementById('registerButton').className = 'btn btn-primary';
	}else
		document.getElementById('registerButton').className = 'btn btn-primary disabled';*/
//}