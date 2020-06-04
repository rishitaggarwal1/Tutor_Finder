<!-- Copyright (c) Rishit Aggarwal -->
<?php
	/*
		database variables
	*/
	$server_name="localhost";
	$user_name="root";
	$password="";
	$database_name="tutor_finder";
	/*
		Database connectivity
	*/
	$con =mysqli_connect($server_name, $user_name, $password) or die("Server not connected");
	mysqli_select_db($con,"$database_name");
?>