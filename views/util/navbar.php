<?php 
	error_reporting(0);
	$current = $_SERVER['PHP_SELF']; 
	$includeBase = $_SERVER['DOCUMENT_ROOT'];
	include_once($includeBase.'/model/pdoUtility.php');

	if($current == '/index.php') $page = 0;
	else if($current == '/classmenu.php') $page = 1;
	else if($current == '/learningprofile.php') $page = 2;
	else if($current == '/lesson.php') $page = 3;
?>

<script type="text/javascript" src="/scripts/loginValidation.js"></script>

<!--  THIS IS TEST CODE DELETE WHEN DONE  -->
<script type="text/javascript">

</script>

<div class="navbar navbar-default">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Coach Challenges</a>
	</div>
	<div class="navbar-collapse collapse navbar-responsive-collapse">
		<ul class="nav navbar-nav">
			<li <?php if($page == 0) print('class="active"');?>><a href="index.php">Home</a></li>
			<?php if(UserAccess::status() != 0){ ?>
			<li <?php if($page == 1) print('class="active"');?>><a href="classmenu.php">Class Menu</a></li>
			<li <?php if($page == 2) print('class="active"');?>><a href="learningprofile.php">Learning Profile</a></li>
			<li <?php if($page == 3) print('class="active"');?>><a href="lesson.php">Lesson</a></li>
			<?php } ?>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php if(UserAccess::status() == 0){ ?>
			<li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
			<li><a href="#" data-toggle="modal" data-target="#register">Register</a></li>
			<?php }else{ ?>
			<li><a onclick="xajax_logout()">Logout</a></li>
			<?php } ?>
		</ul>
	</div>
</div> 

<div class="modal fade" id="login">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
				<label class="control-label" for="inputDefault">Username</label>
					<input type="text" class="form-control" id="usernamelogin">
				</div>
				<div class="form-group">
					<label class="control-label" for="inputDefault">Password</label>
					<input type="password" class="form-control" id="passwordlogin">
				</div>
				<div id="loginResponse" class="form-group has-errors"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="xajax_login(document.getElementById('usernamelogin').value, document.getElementById('passwordlogin').value)">Login</button>
			</div>
		</div>
	</div>
</div>

<!--
<div class="modal fade" id="register">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h4 class="modal-title">Register</h4>
			</div>
			<div class="modal-body">
				<div id="registerStatus">
				</div>
				<div class="form-group" id="usernameGroup">
				<label class="control-label" for="inputDefault">Username</label>
					<input type="text" class="form-control" id="username" onkeyup="validate()">
				</div>
				<div class="form-group" id="passwordGroup">
					<label class="control-label" for="inputDefault">Password</label>
					<input type="password" class="form-control" id="password" onkeyup="validate()">
				</div>
				<div class="form-group" id="passwordConfirmGroup">
					<label class="control-label" for="inputDefault">Confirm Password</label>
					<input type="password" class="form-control" id="passwordConfirm" onkeyup="validate()">
				</div>
				<div class="form-group" id="nameGroup">
					<label class="control-label" for="inputDefault">Name</label>
					<input type="text" class="form-control" id="name" onkeyup="validate()">
				</div>
				<div class="form-group" id="emailGroup">
					<label class="control-label" for="inputDefault">Email</label>
					<input type="text" class="form-control" id="email" onkeyup="validate()">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary disabled" id="registerButton" onclick="xajax_addUser(document.getElementById('username').value, document.getElementById('password').value, document.getElementById('name').value, document.getElementById('email').value)">Register</button>
			</div>
		</div>
	</div>
</div>
-->

<div class="modal fade" id="register">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h4 class="modal-title">Register</h4>
			</div>
			<div class="modal-body">
				<p>
					Registration for this website is controlled by the coaches. Speak to one of us and we will
					assist you with the process. 
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
validate();
</script>