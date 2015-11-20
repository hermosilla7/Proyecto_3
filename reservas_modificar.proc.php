<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];


	echo $_REQUEST['id_anterior'];

	$sql = "UPDATE reserva SET id_recurso='$_REQUEST[recurso]' WHERE id_reserva='$_REQUEST[id_anterior]'";
	// $sql = "UPDATE reserva SET id_recurso='$_REQUEST[recurso]', dateini='$_REQUEST[descr]', datefi='$foto_new' WHERE id_reserva='$_REQUEST[id_reserva_seleccionada]'";
	
	

	echo $sql;

	//lanzamos la sentencia sql
	$datos = mysqli_query($con, $sql);

	//header("location: abc_recursos.php")

?>

<?php  
	include 'footer.php';
?>