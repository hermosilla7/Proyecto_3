<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	  
	echo $_REQUEST['id_usuario_seleccionado'];
	$sql = "UPDATE usuario SET nom='$_REQUEST[nombre]', pass='$_REQUEST[pass]', rol=$_REQUEST[rol], img='$_REQUEST[foto_usuario]' WHERE id_user=$_REQUEST[id_usuario_seleccionado]";

	echo $sql;

	//lanzamos la sentencia sql
	$datos = mysqli_query($con, $sql);

	//header("location: abc_usuarios.php")

?>

<?php  
	include 'footer.php';
?>