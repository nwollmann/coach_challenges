
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<script type="text/javascript" src="/scripts/registerValidation.js"></script>
	<title>Coach Challenges</title>
</head>
<body>
	<?php require_once("/views/util/navbar.php"); 
	//echo md5(uniqid())."<br>";
	//echo md5(uniqid())."<br>";
	if(!isset($_GET['token'])){ ?>
	<div class="container">
		<div class="jumbotron" id="banner">
			<p>
				In order to register a valid registration link is required. Contact the coach
				for your section if you have not received one.
			</p>
		</div>
	</div>
	<?php }else{
		$token = $_GET['token'];
		$row = UserAccess::rowFromToken($token);
		if($row == null or $row['username'] != ""){
			?>
			<div class="container">
				<div class="jumbotron" id="banner">
					<p>
						This registration link is either invalid or has already been used.
					</p>
				</div>
			</div>
			<?php
		}else{

			?>
	<!--
	<div class="container">

		<div class="jumbotron" id="banner" style="padding:0">
			<h3>Registration For:</h3>
			<p>
			Name: <?php echo $row['name'] ?><br>
			Email: <?php echo $row['email'] ?><br>
			Section: <?php echo ($row['section'] == 0)? "Morning" : "Afternoon" ?>
			</p>
		</div>

		<div class="input-group">
			<span class="input-group-addon">Desired Username:</span>
			<input type="text" class="form-control">
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon">Password:</span>
			<input type="text" class="form-control">
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon">Confirm Password:</span>
			<input type="text" class="form-control">
		</div>

	</div>
-->


<div class="container">
<form class="form-horizontal">
	<fieldset>
		<legend>Account Registration</legend>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Name</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" placeholder="<?php echo $row['name'] ?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Email</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" placeholder="<?php echo $row['email'] ?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Section</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" placeholder="<?php echo ($row['section'] == 0)? "Morning" : "Afternoon" ?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Username</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" id="registerUsername" placeholder="Username" >
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-lg-2 control-label">Password</label>
			<div class="col-lg-10">
				<input type="password" class="form-control" id="registerPassword" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-lg-2 control-label">Confirm Password</label>
			<div class="col-lg-10">
				<input type="password" class="form-control" id="registerPasswordConfirm" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<!--<button type="reset" class="btn btn-default">Cancel</button>-->
				<button type="button" class="btn btn-primary" onclick="register()">Register</button><br><br>
				<div id="error"></div>
			</div>
		</div>
	</fieldset>
</form>
</div>

<?php }} ?>
</body>
</html>