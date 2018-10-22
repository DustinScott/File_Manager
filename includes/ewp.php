<?php session_start();

	$s = "localhost";
	$d = "leavirtual";
	$u = "root";
	$p = "onlineschool";
	
	$website = "";
	
	$con = mysqli_connect($s,$u,$p,$d);
	//mysqli_set_charset( $con, 'utf8');
		//phpmyadmin 
		//onlineS17 | server root
	$phpMYAD = "";
	mysqli_set_charset($con,'utf8');
	
	
?>



