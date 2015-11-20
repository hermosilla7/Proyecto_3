<?php
	include 'conexion.php';
	include_once 'header_admin.php';

	//creamos la sesion
	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	echo $_REQUEST['id'];

	$consulta_reservas = ("DELETE FROM reserva where id_reserva = $_REQUEST[id]");
	$result_reservas = mysqli_query($con, $consulta_reservas);

	echo $consulta_reservas;

	// 		header("location: busqueda_reservas_admin.php")
		

?>

<?php  
	include 'footer.php';
?>