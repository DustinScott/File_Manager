<?php include 'includes/head.php';?>
	
<!-- <div style="min-height: 1000px">	 -->
<div class="fixed">
	<nav class="top-bar" data-topbar role="navigation">
	  <ul class="title-area">
	    <li class="name">
	      <h1><a href="../index.php">LeaVirtual</a></h1>
	    </li>
	     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
	    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	  </ul>
	
	  <section class="top-bar-section">
	    <!-- Right Nav Section -->
	    <ul class="right" id="therightnavs">
	     <li class="active">
	      <a href="#" id="changeMatUni" class="right-off-canvas-toggle">Imagenes</a>
	      
	      </li>
	      
	      
	    </ul>
	
	    <!-- Left Nav Section -->
	    <ul class="left">
	      <li><a href="#">Bienvenido <i><?php echo $who;?></i></a></li>
	    </ul>
	  </section>
	</nav>
</div>	

<div id="newPicPlace" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Subir imagen</h2>
  <p class="lead">
   
  </p>
  <hr />
  <div id="pictureplace" class="large-2 columns dropzone" ></div>

  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>



<div class="off-canvas-wrap" data-offcanvas >
 

  <div class="inner-wrap">

<!--
  <div id="loading">
  <p><img src="loading.gif" /> Please Wait</p>
</div>
 
-->   

    <!-- Off Canvas Menu -->
    <aside class="right-off-canvas-menu" style="background:#efefef;">
	<br />
	<h4 class="text-center"> Materias y Unidades </h4>
	<p class="text-center">Escoge Materia y Unidad para ver imagenes</p>
<!-- 	<img src="http://leavirtual.com/assets/img/LeavVirtualLogo_web.png"> -->
<hr >
 
    <ul class="accordion" data-accordion="myAccordionGroup" >
	    
	   		<?php
	
	   		$globalUnidaddata = '';
		   
		    $getMaterias = mysqli_query($con,"SELECT * FROM materias");
		    
		    while($mats = mysqli_fetch_array($getMaterias)){
			   
			   echo '<li id="listofmats" class="accordion-navigation">
			   
				        <a class="materias" href="#materia_'.$mats['materia_id'].'">'.$mats['materia_nombre'].'</a>
				        <div id="materia_'.$mats['materia_id'].'" class="content" style="padding-top:25px; padding-bottom:-15px;">
				          
				        </div>
				      </li>';
			}
	   		
	   		?> 
	  
          </ul>
	
	
	
  	</aside>


  	<div class="large-12 columns" style="min-height:1000px;">
	
<!-- <div id="pictureplace" class="large-2 columns dropzone" ></div>	 -->
    
    <div class="large-12 columns" id="displayStoredImages" style="padding:0px;">
	    
	    	<div class="large-4 large-centered columns text-center" style="padding-top:200px;">

			<img src="img/LeaImages.png">
	
	<hr />
	
	<a href="#" class="right-off-canvas-toggle button secondary">Explorar Imagenes</a>


	</div>
	    
							
	</div>
		
	
	
<a href="#" class="confirmDeleteimage" data-reveal-id="confirmDeleteimage"></a>

<div id="confirmDeleteimage" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Confirmar Borrar</h2>
  <p class="lead">
	  
	  Confirmar que deseams borrar la imagen No.
	  
	  <span class="p_confirm_delete_image"></span>
  </p>
  <hr />
  <img id="imgx_to_delete" src="">
  <hr / >
  <div class="large-12 columns">
  
  <a href="#" id="finalConfirmDeleteImg" class="button secondary alert tiny right">CONFIRMAR BORRAR</a>
  
  </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
	
	</div>
	
  <a class="exit-off-canvas"></a>

  </div>
</div>	


	<script src="js/vendor/jquery.js"></script>
	<script src="js/dropzone.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/jquery.truncate.js"></script>
    
    
    <script src="js/custom.js"></script>
    
    <script>
      $(document).foundation();
    </script>
    
    <script>
	var matID = [];    
    $(document).on('click','.materias',function(){
	    
	   var digit = $(this).attr("href").split("_").pop();
	   var unidadesHome = $(this).siblings('#materia_'+digit+'');
	   
	   matID = digit;
	   
	   $.post('includes/requests.php',{materia_id:digit},function(data){
	   
	   $(unidadesHome).html(data);	
	   
	   });
	   
	   
	   
    });
    
    
    </script>
    
    <script>
	    
    var unID = [];
    
/*
    	$(document).ajaxStart(function(){
	    	
		    $('#loading').show();
		 
		 }).ajaxStop(function(){
		 
		    $('#loading').hide();
		 
		 });
 
*/
		$(document).on('click','.chop', function(){
				    
				var unidad = $(this).attr('id');
				var unidaddatax = $(this).html(); 
				
				unID = unidad;
				
				$.post('pictureplace.php',{unID:unID},function(data){
					
					$('#displayStoredImages').html(data);
					
				});
				
				$('li#newSubir').remove();
				$('#therightnavs').append('<li id="newSubir"><a href="#"  data-reveal-id="newPicPlace">SUBIR</a></li>');
				

	    });
	
	$(document).on('click','#newSubir',function(e){
		
		 e.preventDefault();
		
	});
	
	borraresteimg = [ ];
	borraresteimg_parent = [ ];
	
	
	$(document).on('click','.borraresteimg',function(e){
		
		e.preventDefault();
		
		borraresteimg = $(this).attr('id');
		
		borraresteimg_parent = $(this).parent().children('img').attr('src');
		
		$('.confirmDeleteimage').click();
		
		$('.p_confirm_delete_image').html(borraresteimg);
		
		$('#imgx_to_delete').attr('src', borraresteimg_parent);

		
	});
	
	
	$(document).on('click','#finalConfirmDeleteImg',function(){
		
		$.post('del_image.php',{borraresteimg:borraresteimg,borraresteimg_parent:borraresteimg_parent},function(datax){
			
			alert(datax);
			
		});
		
		$.post('pictureplace.php',{unID:unID},function(data){
					
			$('#displayStoredImages').html(data);
					
		});
		
	});

	</script>
    
   
    
  
    
    
  </body>
</html>