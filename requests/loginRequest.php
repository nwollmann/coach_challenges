<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/model/pdoUtility.php");

UserAccess::login($_POST['username'], $_POST['password']);

header( 'Location: http://localhost');

?>