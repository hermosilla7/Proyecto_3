<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	// echo $_REQUEST['id'];
	$consulta_reservas = ("SELECT * FROM reserva where id_reserva = $_REQUEST[id]");
	$result_reservas = mysqli_query($con, $consulta_reservas);
	$id_anterior = $_REQUEST['id'];
	echo $id_anterior;

	if(mysqli_num_rows($result_reservas)>0){
		$reserva=mysqli_fetch_array($result_reservas);

?>
		<form action="reservas_modificar.proc.php" method="post" enctype="multipart/form-data">
		<select id="selects" name="recurso">
		<?php
			$sql_recurso = "SELECT * FROM recurso";
			$tipos = mysqli_query($con, $sql_recurso);
				while ($tipo=mysqli_fetch_array($tipos)){
						echo "<option value='$tipo[id_recurso]'";

						if($tipo['id_recurso']==$recurso['nombre']){
							echo " selected";
						}

						echo ">$tipo[nombre]</option>";
					}
	        	?>
	    <input type="text" id="fecha_reserva" name="fecha_reserva" />
	<script>$(document).ready(function() {
		$('#fecha_reserva').datepicker({
			dateFormat: 'yy-mm-dd',
			minDate: new Date()
		});
	});</script>
	<br></br>
	<input style='width:80px' required name='hora_ini' id='hora_ini' type="time" min="08:00:00" max="20:00:00"/>
	<input style='width:80px' required name='hora_fin' id='hora_fin' type="time" min="08:00:00" max="20:00:00"/><br></br>
	    </select><br>

		<input type="hidden" name="id_anterior" value="<?php echo $id_anterior; ?>">

		<!-- <input type="hidden" name="foto_usuario" value="<?php echo $foto_new; ?>"> -->

		<input id="boton" type="submit" value="Guardar">

		<?php

	}
?>
<?php  
	include 'footer.php';
?>