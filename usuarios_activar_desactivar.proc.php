<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	  
	$consulta_usuarios = ("SELECT * FROM usuario where id_user = $_REQUEST[id]");
	$result_usuarios = mysqli_query($con, $consulta_usuarios);

	echo $consulta_usuarios;

	if(mysqli_num_rows($result_usuarios)==1){
		echo "ENTRA";
		$user=mysqli_fetch_array($result_usuarios);
		if($user['estado']==1){
			$sql = "UPDATE usuario SET estado=0 WHERE id_user=$_REQUEST[id]";
			} else {
				$sql = "UPDATE usuario SET estado=1 WHERE id_user=$_REQUEST[id]";
			}
			
			$result_usuarios = mysqli_query($con, $sql);
			} else {
				echo "No hay productos que modificar";
			}

			header("location: abc_usuarios.php")
		

?>

<?php  
	include 'footer.php';
?>