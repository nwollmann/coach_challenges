<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<?php require_once("/model/ajaxLibrary.php"); ?>
	<title>Coach Challenges</title>
</head>
<body>	
	<?php include_once("views/util/navbar.php"); ?>

	<div class="container">

		<div class="jumbotron" id="banner">
			<h1>Welcome!</h1>
			<p>
				Welcome to the coach challenge site! This site is designed to provide challenges which may not quite
				fit into the scope of class. None of the challenges here are tied to your performance in the class and
				participation in these challenges are completely optional.

				<br><br>
				-Coaches Wollmann & Reilly
			</p>
		</div>

	</div>

	<script type="text/javascript">
		//xajax_login("nwollmann", "password");
		//alert("well I called it");
	</script>

</body>
</html>

<?php 
//some test stuff
//$password = password_hash("password", PASSWORD_DEFAULT);
//echo password_verify("password", $password);

//echo password_hash("password", 	PASSWORD_DEFAULT);
?>