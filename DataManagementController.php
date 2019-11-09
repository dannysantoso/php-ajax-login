<?php
session_start();
require_once('DataManagementModel.php');

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['email'])){

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$confirmpassword = md5($_POST['confirmpassword']);
	$email = $_POST['email'];

	//print_r($username.$password.$confirmpassword.$email);die();

	
	$DataManagement = new DataManagement();
	$result = $DataManagement->addUser($username, $password, $email);

	echo $result;
}

if(isset($_POST['usernamelogin']) && isset($_POST['passwordlogin'])){

	$username = $_POST['usernamelogin'];
	$password = md5($_POST['passwordlogin']);

	
	$DataManagement = new DataManagement();
	$result = $DataManagement->loginUser($username, $password);

	echo $result;
}

?>