<?php
	include 'conexion.php';
	include 'header_admin.php';

	//creamos la sesion
	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	$consulta_reservas = ("SELECT * FROM reserva");
	$result_reservas = mysqli_query($con, $consulta_reservas);

?>
		<form action="reservar_recurso_admin.proc.php?id_recurso=<?php echo $_REQUEST['id_recurso']; ?>" method="post" enctype="multipart/form-data">

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
	<input id="boton" type="submit" value="Reservar">

<?php  
	include 'footer.php';
?>
 