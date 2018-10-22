/*
$('.fa-share').click(function(){
	
	var link = $(this).parent().siblings('.shareLink').children('textarea').slideToggle();
	
});
*/

$('.killFile').click(function(){
	
	var clase_images_id  = $(this).attr('id');
	
	$.post('killFile.php',{clase_images_id:clase_images_id},function(delFile){
		
		
		$('#delete_'+clase_images_id).foundation('reveal', 'close');
		$('.deletedFile').html('Archivo Borrado');
		
		setTimeout( function(){ 
		
			location.reload();
  		}  , 2000 );
		
	});
	
});

     
