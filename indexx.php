<?php include '../includes/ewp.php';
	
$who = $_SESSION['username'];

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
    
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
	  
  <div >
	  <div class="deletedFile text-center" style="background:rgb(255,91,55); color:#fff;"></div>
	  <form action="uploadFiles.php" method="post" enctype="multipart/form-data">
		  <div class="large-10 columns" style="padding-left:0px;">
		  <input class="button" type='file' name="images[]" id="" multiple>
		  </div>
		  
		  <div class="large-2 columns right"  style="padding-right:0px;">
		  <input class="button" type="submit" value="Subir">
		  </div>
		  
		  
	  </form>
	  
	  <hr />
	  
	  <?php
	
	  $getImages = mysqli_query($con,"SELECT * FROM clase_images WHERE uploader = '".$who."'");
	  
	  while($img = mysqli_fetch_array($getImages)){
		  
		  $ext = $img['file_type'];
		  $f = substr($img['file_name'], 0, 8);
		  
		  if(($ext == 'png') || ($ext == 'jpg') || ($ext == 'png') || ($ext == 'JPEG') || ($ext == 'jpeg')){
			  
			  $imgview =  '<img src="img/'.$img['file_name'].'">'; 
			  
		  }else{
			  
			  $imgview = 'ARCHIVO';
			  
		  }
		  
		  echo '<div id="imageBank" class="large-2 columns panel" style="background:#fff;">
		  
		  '.$imgview.'
		  
		  <hr />
		  
		  <div class="large-8 columns" style="padding-left:0px;">
		  <img class="left" src="../img/'.$img['file_type'].'.png" width="20px"> 
		  
		  <span class="left"  style="font-size:11px; margin:5px;"> ' .$f.'...<span>
		  </div>
		  
		  <div class="large-2 columns  text-center" style="color:#00B9FB; border-radius:2px; "> 		  <i class="fa fa-share" data-reveal-id="open_'.$img['clase_images_id'].'"></i>
		  </div>
		  
		  <div class="large-2 columns text-center" style=" color:#EB4C42; ">
		  <i class="fa fa-trash " data-reveal-id="delete_'.$img['clase_images_id'].'"></i>
		  </div>
		  
		  
		  <hr/>
		  <select id="category">  
		  <option>Materia</option>
		  </select>
		  
		  <select id="subcategory">  
		  <option>Unidad</option>
		  </select>
		  
		  
<div id="open_'.$img['clase_images_id'].'" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <br />
  <h3>Vinculo</h3>
  <textarea class="text-center" rows="2" style="border:0px;">http://leavirtual.com.mx/actividades/archivos/img/'.$img['file_name'].'</textarea>
  
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="delete_'.$img['clase_images_id'].'" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <br />
  <h3>Borrar</h3>

  Seguro que quieres Borrar :<b> '.$img['file_name'].'</b>
  
  
  
  <hr />
  
  <div class="large-2 columns large-centered">
  <button class="button alert killFile radius" id="'.$img['clase_images_id'].'">Borrar</button>
  </div>
  
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
		  
</div>';
	  }		  
		  
	  ?>
	  
	  
	  </div>
  
  


    
       
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    
    <script src="js/custom.js"></script>
    
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
