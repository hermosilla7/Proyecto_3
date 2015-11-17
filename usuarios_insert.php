<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	  
	$consulta_usuarios = ("SELECT * FROM usuario");
	$result_usuarios = mysqli_query($con, $consulta_usuarios);

?>
		<form action="usuarios_insert.proc.php" method="post" enctype="multipart/form-data">
		Nombre de usuario:
		<input type="text" name="nombre"><br>
		Contraseña:
		<input type="pass" name="pass"><br>
		Rol:	
		<br>	
		<input id="checkbox" type="radio" name="rol" value="0">Usuario</br><br>		
		<input id="checkbox" type="radio" name="rol" value="1">Administrador</br><br>
		Imagen:
		<input type="file" name="foto" id="foto"></br><br>

		<input id="boton" type="submit" value="Registrar">

<?php  
	include 'footer.php';
?>