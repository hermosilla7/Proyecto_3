
		<?php
			include_once 'conexion.php';
			include_once 'header_admin.php';
			include 'resultados_admin.php';
			  
			$consulta_recurso = ("SELECT * FROM recurso");
			$consulta_categoria = ("SELECT * FROM categoria");
			$result_recurso = mysqli_query($con, $consulta_recurso);
			$result_categoria = mysqli_query($con, $consulta_categoria);

			

			$nomUsuari = $_SESSION['nom'];
			$user_id = $_SESSION['id_user'];

		?>
		<div class="container" style="margin-top:10px">
			<!-- <div class="row " style="width:75%;margin-top:20px"> -->
			
			<h1 align="center">Bienvenido al panel de control</h1>
			<div class='contenedor_panel_admin'>
			<ul>Puedes:
				<li>Consultar/modificar reservas</li>
				<li>Gestión del SAT</li>
				<li>Gestión de recursos</li>
				<li>Gestión de usuarios</li>
			</ul>
			</div>
			<div class="row " style="width:75%;margin-bottom:317px">
			</div>
				</div>
				
				<!-- </div> -->
<?php  
	include "footer.php";
?>