<?php include 'includes/ewp.php';
	
$who = $_SESSION['username'];
$unidad = $_POST['unidad_id'];
$materia = $_POST['materia_id'];
	
//$_FILES['images'];
	
if(!empty($_FILES['images'])){
			//$files = array_filter($_FILES['upload']['name']); something like that to be used before processing files.
			// Count # of uploaded files in array
			
			
			
			  $tmpFilePath = $_FILES['images']['tmp_name'];
			  $l_fN = $_FILES['images']['name'];
			  
			  $path = $l_fN;
			  $ext = pathinfo($path, PATHINFO_EXTENSION);
	
			  $filename = 'img/'.$l_fN;

	                  if (file_exists($filename)) {
						
					  echo "Hola ".$who. ", The file " .$filename. " ya existe, favor de cambiar el nombre del archivo y probar otra vez";
					  
					  //header("Location:https://www.google.com");
						
					  } else {
						
					  
					  //Make sure we have a filepath
					  if ($tmpFilePath != ""){
					  
					  //Setup our new file path
					  $newFilePath = "img/".$l_fN."" ;
					
					  //Upload the file into the temp dir
					  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					  
					  $uploadL = mysqli_query($con, "INSERT INTO clase_images(file_type,file_name,uploader,unidad,materia) VALUES('$ext','$l_fN','$who','$unidad','$materia')");
					  //Handle other code here
					  
					 
					    }
					  }
			  }
			  
}
	

//header("Location:http://leavirtual.com.mx/actividades/archivos");
	
?>

