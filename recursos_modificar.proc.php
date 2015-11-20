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
		$sql = "UPDATE recurso SET nombre='$_REQUEST[nombre]', descr='$_REQUEST[descr]', img='$foto_new', categoria='$_REQUEST[categoria]' WHERE id_recurso='$_REQUEST[id_recurso_seleccionado]'";
	}
	else{
		$sql = "UPDATE recurso SET nombre='$_REQUEST[nombre]', descr='$_REQUEST[descr]', categoria='$_REQUEST[categoria]' WHERE id_recurso='$_REQUEST[id_recurso_seleccionado]'";
	}
	

	//lanzamos la sentencia sql
	$datos = mysqli_query($con, $sql);

	header("location: abc_recursos.php")

?>

<?php  
	include 'footer.php';
?>