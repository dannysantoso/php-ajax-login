<?php

	$Username = "root";
	$Password = "";
	$Conn = mysqli_connect('localhost', $Username, $Password, 'cake_store');

	if(!$Conn){
		die("Not Connected".mysqli_error($Conn));
	}










?>	