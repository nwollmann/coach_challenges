<?php
	//ini_set('display_errors',1); 
 	//error_reporting(E_ALL);
	require_once("xajax_core/xajax.inc.php");
	require_once("model/pdoUtility.php");
	require_once("model/dataAccess.php");
	require_once("model/lessonDataAccess.php");
	require_once("controllers/lessonManager.php");
	

	if(session_status() == PHP_SESSION_NONE) session_start();

	
 	//$status = UserAccess::status();
 	//echo $_SESSION['userid']."<br>".$status;

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<title>Virtual Chem Class</title>

	<?php $xajax->printJavascript(); ?>
</head>
<body>
<?php include_once("views/util/navbar.php"); ?>

<?php 
if(!isset($_SESSION['lessonid'])){?>
	<h1 STYLE="text-align: center">Please select a lesson from the <a href="classmenu.php">Class Menu</a></h1>
<?php
}else{
$lessonid = $_SESSION['lessonid'];
include_once("views/chemistry/lessons/lesson_".$lessonid.".php");
$classname = 'Lesson'.$lessonid;
$_SESSION['lesson_object'] = new $classname();
include_once("views/util/lessonView.php");
}
?>

</body>
</html>
