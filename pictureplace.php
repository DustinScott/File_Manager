<?php include 'includes/ewp.php';
	
	if(!empty($_POST['unID'])){
		
		$unidad = $_POST['unID'];
		
	}
	
	$getAllImages = mysqli_query($con,"SELECT * FROM clase_images WHERE unidad='$unidad'");
	
	$i = 1;
	

		

	

	while($img = mysqli_fetch_array($getAllImages)){
		
		
			
		echo '<div id="thisisyo" class="large-2 columns panel" style="background:#fff; border:0px;">';

		echo '<span>No. '.$i.'</span><br>Nombre : <span style="color:#16499A; font-size:18px;"><i>'.$img['file_name'].'</i></span>';
		echo '<hr/>';
		echo '<img src="img/'.$img['file_name'].'" width="100%">';
		
		echo '<div class="large-8 columns"  style="padding:0px;">';
		echo '<textarea  id="textareaIMG">http://leavirtual.com.mx/actividades/archivos/img/'.$img['file_name'].'</textarea>';
		echo '</div>';
		
		echo '<a id="'.$img['clase_images_id'].'" href="#" class="large-4 columns button tiny secondary borraresteimg">Borrar</a>';
		
		echo '</div>';
		
		//your code
	    if ($i % 5 == 0)
	        echo '<hr style="border:2px solid #094AB2;">';
	    $i++;
  
		
	}
	
	echo '<hr />';
?>

	<script src="js/vendor/jquery.js"></script>
	<script src="js/dropzone.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/jquery.truncate.js"></script>
    
    
    <script src="js/custom.js"></script>
    
    <script>
      $(document).foundation();
    </script>
    
    <script>
	$("#pictureplace").dropzone({ 
						    
			    url: "uploadFiles.php",
				paramName : "images",
							
					init: function() {
							
				
							this.on("sending", function(file, xhr, formData) {
						      formData.append('unidad_id',unID);
						      formData.append('materia_id',matID);
						      //add another 'formData'..if ya need it bro!! ;)
						    });
						    
						    this.on("queuecomplete", function(){
						    
						     //alert("All files have uploaded ");
						    $('#displayStoredImages').load('pictureplace.php',{unID:unID});
						    });
						    
						    this.on("success", function(file, responseText) {
					            //alert(responseText);
					        });
					        
							
/*
							this.on("complete", function(file) { 
							   this.removeAllFiles(true); 
							});
					        
					        
*/
							
					}			     
				});	
				
				
	</script>