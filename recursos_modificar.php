<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	
	$consulta_recursos = ("SELECT * FROM recurso where id_recurso = $_REQUEST[id]");
	$result_recursos = mysqli_query($con, $consulta_recursos);
	$id_anterior = $_REQUEST['id'];
	echo $id_anterior;

	if(mysqli_num_rows($result_recursos)>0){
		$recurso=mysqli_fetch_array($result_recursos);
		// $id = $usuario['id_user'];
		// echo $id;
?>
		<form action="recursos_modificar.proc.php" method="post" enctype="multipart/form-data">
		Nombre:
		<input type="text" name="nombre" value="<?php echo utf8_encode($recurso['nombre']); ?>"><br>
		Descripción:
		<input type="pass" name="pass" value="<?php echo utf8_encode($recurso['descr']); ?>"><br>
		Categoría:
		<select id="selects" name="categoria">
		<?php
			$sql_categoria = "SELECT * FROM categoria";
			$tipos = mysqli_query($con, $sql_categoria);
				while ($tipo=mysqli_fetch_array($tipos)){
						echo "<option value='$tipo[id]'";

						if($tipo['id']==$recurso['categoria']){
							echo " selected";
						}

						echo ">$tipo[nombre]</option>";
					}
	        	?>
	    </select></br><br>


		Imagen:
		<?php		
		$fichero="img/$recurso[img]";
		$foto = $recurso['img'];
		
		echo $foto;
		echo "<img src='$fichero' width='200' heigth='200' ></div>";
		?>
		
		<input type="file" name="foto" id="foto"></br><br>

		<input type="hidden" name="id_usuario_seleccionado" value="<?php echo $id_anterior; ?>">

		<!-- <input type="hidden" name="foto_usuario" value="<?php echo $foto_new; ?>"> -->

		<input id="boton" type="submit" value="Guardar">

		<?php

	}
?>
<?php  
	include 'footer.php';
?>