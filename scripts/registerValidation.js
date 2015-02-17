function register(){
	var pass = document.getElementById("registerPassword").value;
	var username = document.getElementById("registerUsername").value;
	if(username.length <= 4){
		document.getElementById("error").innerHTML = "Usernames must be at least 5 characters long.";
		document.getElementById("error").className = "alert alert-danger";
	}
	if(pass.length < 6){
		//window.alert("Passwords must be at least 6 characters long.");
		document.getElementById("error").innerHTML = "Passwords must be at least 6 characters long.";
		document.getElementById("error").className = "alert alert-danger";
		return;
	}
	if(pass != document.getElementById("registerPasswordConfirm").value){
		document.getElementById("error").innerHTML = "Password and confirm password must match.";
		document.getElementById("error").className = "alert alert-danger";
	}
}