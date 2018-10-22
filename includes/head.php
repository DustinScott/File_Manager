<?php include 'includes/ewp.php'; 
	
	if(isset($_SESSION['username'])){
	$who = $_SESSION['username'];
	}else{
	header('Location:http://leavirtual.com.mx/actividades/login.php');
	}
	
	
	
?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Leav | Archivos</title>
    
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="../FONTAWESOME/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/dropzone.css"/>
    
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
