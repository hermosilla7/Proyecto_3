<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	// imagen nueva
	$foto_new=$_FILES["foto"]["name"];
			$ruta_new=$_FILES["foto"]["tmp_name"];
			$destino_new="img/".$foto_new;
			copy($ruta_new, $destino_new);
			echo $foto_new;
			echo $ruta_new;
			echo $destino_new;
	// 

	if ($foto_new != "") {
		$sql = "UPDATE usuario SET nom='$_REQUEST[nombre]', pass='$_REQUEST[pass]', rol=$_REQUEST[rol], img='$foto_new' WHERE id_user=$_REQUEST[id_usuario_seleccionado]";
	}
	else{
		$sql = "UPDATE usuario SET nom='$_REQUEST[nombre]', pass='$_REQUEST[pass]', rol=$_REQUEST[rol] WHERE id_user=$_REQUEST[id_usuario_seleccionado]";
	}
	

	//lanzamos la sentencia sql
	$datos = mysqli_query($con, $sql);

	header("location: abc_usuarios.php")

?>

<?php  
	include 'footer.php';
?>