<?php
//ini_set('display_errors',1); 
//error_reporting(E_ALL);
/*
	File: multiply.server.php

	Example which demonstrates a multiplication using xajax.
	


	Please see <copyright.inc.php> for a detailed description, copyright
	and license information.
*/

/*
	Section: Files
	
	- <multiply.php>
	- <multiply.common.php>
	- <multiply.server.php>
*/

/*
	@package xajax
	@version $Id: multiply.server.php 362 2007-05-29 15:32:24Z calltoconstruct $
	@copyright Copyright (c) 2005-2006 by Jared White & J. Max Wilson
	@license http://www.xajaxproject.org/bsd_license.txt BSD License
*/

//sql information
	$username = 'ChemData';
	$pass = '479zXScPR9LbEHAU';
	$host = 'localhost';
	$database = 'virtualchemclass'; 

	//include_once("/xajax_core/xajax.inc.php");
	//require_once('../xajax_core/xajax.inc.php');
	require_once("pdoUtility.php");

	$xajax = new xajax();
	//$xajax->register(XAJAX_FUNCTION, "addBook");
	//$xajax->registerFunction("addBook");
	$xajax->registerFunction("login");
	$xajax->registerFunction("addUser");
	$xajax->registerFunction("logout");
	$xajax->registerFunction("setLesson");


	function setLesson($value){
		$_SESSION['lessonid'] = $value;
	}

	//class DataCalls{
	function deleteUser($userid){
		UserAccess::deleteUser($userid);
		return displayUsers();
	}

	function displayUsers(){
		$response = new xajaxResponse();
		$response->assign('usertable', 'innerHTML', UserAccess::displayUsers());
		return $response;
	}

	function updateUser($name, $email){
		UserAccess::updateUser($name, $email);
		$response = new xajaxResponse();
		return $response;
	}

	function updatePass($password){
		UserAccess::updatePass($password);
		$response = new xajaxResponse();
		return $response;
	}

	function logout(){
		$response = new xajaxResponse();
		//if(session_status() == PHP_SESSION_NONE) session_start();
		//$_SESSION['userid'] = 0;
		session_unset();
		$response->redirect("index.php");
		//$response->alert("called");
		return $response;
	}

	function addUser($username, $password, $name, $email)
	{
		$response = new xajaxResponse();
		if(UserAccess::userExists($username)){
			$response->assign('registerStatus', 'innerHTML', 'That username has already been taken.');
			return $response;
		}
		$data = array('username' => $username, 'password' => $password, 'name' => $name, 'email' => $email);
		UserAccess::addUser($username, $password, $email, $name);
		UserAccess::login($username, $password);
		$response->script("$('#register').modal('hide');");
		$response->redirect('index.php');
		return $response;
	}

	function login($username, $password)
	{
		$response = new xajaxResponse();
		//if(session_status() == PHP_SESSION_NONE)
		//	session_start();

		if(UserAccess::login($username, $password) == 1){
			$response->redirect('?');
		}else{
			//$response->alert("Incorrect Username or Password");
			$response->assign('loginResponse', 'innerHTML', 'Incorrect username or password.');
		}
		return $response;
	} 


	//functions which are going to be called for a lesson 
	function generateQuestion()
	{

	}

	function answer()
	{

	}

	function explanation()
	{
		
	}






	$xajax->processRequest();
	//print(UserAccess::userExists("invalid"));
?>