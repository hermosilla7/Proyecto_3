<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	
	$consulta_usuarios = ("SELECT * FROM usuario where id_user = $_REQUEST[id]");
	$result_usuarios = mysqli_query($con, $consulta_usuarios);
	$id_anterior = $_REQUEST['id'];
	echo $id_anterior;

	if(mysqli_num_rows($result_usuarios)>0){
		$user=mysqli_fetch_array($result_usuarios);
		// $id = $usuario['id_user'];
		// echo $id;
?>
		<form action="usuarios_modificar.proc.php" method="post" enctype="multipart/form-data">
		Nombre de usuario:
		<input type="text" name="nombre" value="<?php echo $user['nom']; ?>"><br>
		Contraseña:
		<input type="pass" name="pass" value="<?php echo $user['pass']; ?>"><br>
		Rol:	
		<br>	
		<input id="radio" type="radio" name="rol" <?php if( $user['rol'] == '0' ) { ?>checked="checked"<?php } ?> value='0' >Usuario</br><br>		
		<input id="radio" type="radio" name="rol" <?php if( $user['rol'] == '1' ) { ?>checked="checked"<?php } ?> value='1' >Administrador</br><br>

		Imagen:
		<?php		
		$fichero="img/$user[img]";
		$foto = $user['img'];
		echo "AAAAAAAA";
		echo $foto;
		echo "<img src='$fichero' width='50' heigth='50' ></div>";
		?>
		
		<input type="file" name="foto" id="foto"></br><br>

		<input type="hidden" name="id_usuario_seleccionado" value="<?php echo $id_anterior; ?>">

		<input type="hidden" name="foto_usuario" value="<?php echo $foto; ?>">

		<input id="boton" type="submit" value="Guardar">

		<?php

	}
?>
<?php  
	include 'footer.php';
?>