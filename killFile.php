<?php include '../includes/ewp.php';
	
echo $cii = $_POST['clase_images_id'];

$delrow = mysqli_query($con,"DELETE FROM clase_images WHERE clase_images_id=".$cii."");

if($delrow){
	echo 'file deleted';
}else{
	echo mysqli_error($con);
}