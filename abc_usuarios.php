<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

?>
	<h6 color=black align="center"><a href="usuarios_insert.php" type="button" class="fa fa-plus-circle fa-5x" style="color:#444444">Nuevo usuario</a></h6>
<?php  
	$consulta_usuarios = ("SELECT * FROM usuario");
	$result_usuarios = mysqli_query($con, $consulta_usuarios);

	while($usuario = mysqli_fetch_array($result_usuarios)){
		echo "<div class='contenedor_usuarios'>";
		echo"<div class='textseccion3'><b>Nombre:</b>";
		echo utf8_encode($usuario['nom']);
		echo "<br/>";
		echo "<b>Contraseña:</b> ";
		echo utf8_encode($usuario['pass']);
		echo "<br/>";
		echo "<b>Rol:</b> ";
		if ($usuario['rol'] == 1) {
			echo "Administrador";
		}
		else if ($usuario['rol'] == 0) {
			echo "Usuario";
		}
		echo "<br/>";
		echo "<b>Estado:</b> ";
		if ($usuario['estado'] == 1) {
			echo "Activo";
		}
		else if ($usuario['estado'] == 0) {
			echo "Inactivo";
		}
		// echo utf8_encode($usuario['rol']);
		echo "<br/>";
		echo "<b>Avatar:</b>";
		$fichero="img/$usuario[img]";
                if(file_exists($fichero)&&(($user_id) != '')){
                  echo "<img src='$fichero' width='50' heigth='50' ></div>";
                }
                else{
                  echo "<img src ='img/no_disponible.jpg'width='50' heigth='50'/></div>";
                }
        echo "<a href='usuarios_modificar.php?id=$usuario[id_user]'><i class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar' style='color:#444444'></i></a>";
        echo "<a href='usuarios_activar_desactivar.proc.php?id=$usuario[id_user]'><i class='fa fa-exchange fa-2x fa-pull-left fa-border' title='activar_desactivar' style='color:#444444'></i></a>";

		echo "</div>";
		echo"</div>";
	}


	include 'footer.php';

	
?>