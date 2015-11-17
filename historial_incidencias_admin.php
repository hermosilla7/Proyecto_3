<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	  
	$consulta_incidencias = ("SELECT * FROM incidencia order by incidencia.id_incidencia DESC");
	$result_incidencias = mysqli_query($con, $consulta_incidencias);

	?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
	<h6 color=black align="center"><a href="incidencias_admin.php" type="button" class="fa fa-plus-circle fa-5x" style="color:#444444">Nueva incidencia</a></h6>
	
	<!-- <i class="fa fa-plus-circle fa-5x" ></i> -->
	<?php

	while($incidencia = mysqli_fetch_array($result_incidencias)){
		$sql_recurso = "SELECT * FROM recurso, reserva WHERE $incidencia[id_recurso] = recurso.id_recurso";
		$sql_usuario = "SELECT * FROM usuario WHERE $incidencia[id_usuario] = usuario.id_user";
		$datos_recurso = mysqli_query($con, $sql_recurso);
		$datos_usuario = mysqli_query($con, $sql_usuario);
		$recurso = mysqli_fetch_array($datos_recurso);
		$usuario = mysqli_fetch_array($datos_usuario);
		echo "<div class='contendor3'>";
		echo"<div class='textseccion3'><b>Nombre:</b>";
		echo utf8_encode($incidencia['titulo']);
		echo "<br/>";
		echo "<b>Descripción:</b> ";
		echo utf8_encode($incidencia['descripcion']);
		echo "<br/>";
		echo "<b>Recurso:</b> ";
		echo utf8_encode($recurso['nombre']);
		echo "<br/>";
		echo "<b>Usuario:</b> ";
		echo utf8_encode($usuario['nom']);
		echo "<br/>";
		echo "<b>Fecha:</b> ";
		echo utf8_encode($incidencia['fecha']);
		echo "<br></br>";
		echo "</div>";
			echo"</div>";
	}


	include 'footer.php';

	
?>