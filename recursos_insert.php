<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	  
	$consulta_usuarios = ("SELECT * FROM recurso");
	$result_usuarios = mysqli_query($con, $consulta_usuarios);
	$consulta_categoria = ("SELECT * FROM categoria");
	$result_categoria = mysqli_query($con, $consulta_categoria);

?>
		<form action="recursos_insert.proc.php" method="post" enctype="multipart/form-data">
		Nombre:
		<input type="text" name="nombre"><br>
		Descripción:<br/>
		<textarea name="contenido" id="textarea_insert" cols="20" rows="5" maxlength="255"></textarea><br>
		Categoría:	
		<select id="selects" name="categoria">
				<option value="">Seleccionar</option>
				<?php
				while($fila=mysqli_fetch_array($result_categoria)){
					echo utf8_encode("<option value=\"$fila[id]\">$fila[nombre]</option>");
				}
	        	?>
		Imagen:
		<input type="file" name="foto" id="foto"></br><br>

		<input id="boton" type="submit" value="Registrar">

<?php  
	include 'footer.php';
?>