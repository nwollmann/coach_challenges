<?php
$includeBase = $_SERVER['DOCUMENT_ROOT'];
require_once($includeBase."/xajax_core/xajax.inc.php");
require_once($includeBase."/model/pdoUtility.php");

$xajax = new xajax();
$xajax->register(XAJAX_FUNCTION, "test");
$xajax->register(XAJAX_FUNCTION, "login");
$xajax->processRequest();

function test(){
	$response = new xajaxResponse();
	$response->alert("hello");
	return $response;
}

function login($username, $password){

}

 ?>