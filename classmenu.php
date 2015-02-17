<?php
	require_once("xajax_core/xajax.inc.php");
	require_once("model/pdoUtility.php");
	require_once("model/dataAccess.php");
	//if(session_status() == PHP_SESSION_NONE) session_start();
	//ini_set('display_errors',1); 
 	//error_reporting(E_ALL);
 	//$status = UserAccess::status();
 	//echo $_SESSION['userid']."<br>".$status;
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/site.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<title>Virtual Chem Class</title>

	<?php $xajax->printJavascript(); ?>
</head>
<body>
<?php 
	$topic = 0;
	if(isset($_GET['topic'])) $topic = $_GET['topic'];
?>

<?php include_once("views/util/navbar.php"); ?>

<?php if(UserAccess::status() != 0){ ?>

<div class="container">
<div class="row equal">
	<div class="col-sm-4" STYLE="padding-right:0">
		<div class="panel panel-info" STYLE="width: 100%">
			<div class="panel-body" STYLE="padding: 0px">
				<ul class="nav nav-list nav-stacked unitListing">
					<li><button type = "button" class="btn btn-info <?php if($topic == 0) print('disabled'); ?>" STYLE="width: 100%" onclick="window.location.href='classmenu.php'">Introduction</button></li>
					<li><button type = "button" class="btn btn-info <?php if($topic == 1) print('disabled'); ?>" STYLE="width: 100%" onclick="window.location.href='classmenu.php?topic=1'">Energy and Matter</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Atomic Structure</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">The Quantum Atom</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Periodic Trends and the Periodic Table</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Chemical Bonding</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Molecular Geometry</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Chemical Reactions and Chemical Kinetics</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">The Mole</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Stoichiometry</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Thermo Chemistry</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Gases</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Liquids and Solids</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Solutions</button></li>
					<li><button type = "button" class="btn btn-info disabled" STYLE="width: 100%">Acids and Bases</button></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-sm-8" STYLE="padding-left:0">
		<div class="panel panel-info" STYLE = "width: 100%">
			<div class="panel-body">
				<?php 
				switch($topic){
				case 0:
					require_once("views/chemistry/topics/topic_1.php");
					break;
				case 1:
					require_once("views/chemistry/topics/topic_2.php");
					break;

				}
				?>
			</div>
		</div>
	</div>
</div>
</div>


</body>
</html>

<?php } else { ?>
<h1 STYLE="text-align: center">Please login to view this page.</h1>

<?php } ?>