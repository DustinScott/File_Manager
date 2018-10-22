<?php include 'ewp.php';
	
	if(!empty($_POST['materia_id'])){
	
	$mat_id = $_POST['materia_id'];
	
	}
	
	$getAllunidades = mysqli_query($con,"SELECT * FROM unidades WHERE materia_numero = '$mat_id' ORDER BY unidad_num");
	
	while($un = mysqli_fetch_array($getAllunidades)){
		
		$globalUnidaddata .= $un['unidad_num'].' - '.$un['unidad_titulo'];
		
		echo '<a class="text-left chop" id="'.$un['unidad_id'].'">'.$un['unidad_num'].' - '.$un['unidad_titulo'].'</a><hr / class="silentHr">';
		
	}
	

	
?>

	<script>
	
	$('a.chop').truncate({
        width: 'auto',
        token: '&hellip;',
        side: 'right',
        addclass: false,
        addtitle: true,
      });
		
	</script>
