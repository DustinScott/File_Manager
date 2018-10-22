<?php include 'includes/ewp.php';

if(isset($_POST['borraresteimg'])){	
$imgtodel = $_POST['borraresteimg'];
}

if(isset($_POST['borraresteimg_parent'])){	
echo $borraresteimg_parent = $_POST['borraresteimg_parent'];
}


$getAllImages = mysqli_query($con,"DELETE FROM clase_images WHERE clase_images_id=".$imgtodel."");

$killimgonserver = unlink(''.$borraresteimg_parent.'');

if($killimgonserver){
	echo 'Done';
}else{
	echo 'Not Done';
}

if($getAllImages){

	echo 'image deleted';
}else{
	echo 'tweak';
}

?>