<?php
	require_once("xajax_core/xajax.inc.php");
	require_once("model/pdoUtility.php");
	require_once("model/dataAccess.php");
	

	if(session_status() == PHP_SESSION_NONE) session_start();

	//ini_set('display_errors',1); 
 	//error_reporting(E_ALL);
 	//$status = UserAccess::status();
 	//echo $_SESSION['userid']."<br>".$status;

 	//echo mail("nwollmann@comcast.net", "test email", "Did this send correctly? http://www.youtube.com");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<title>Coach Challengess</title>

	<?php $xajax->printJavascript(); ?>
</head>
<body>
<?php $variable = "testVariable"; ?>

	<?php include_once("views/util/navbar.php"); ?>

	<div class="container">

		<div class="jumbotron" id="banner">
			<h1>Welcome!</h1>
			<p>
				This website provides challenges extending beyond the scope of your class. These challenges are not in any way tied to your
				performance in the class and are completely optional. 

				<br><br>
				-Coaches Nicholas & Rickie
			</p>
		</div>

	</div>

</body>
</html>