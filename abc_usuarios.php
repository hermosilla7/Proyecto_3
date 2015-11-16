<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	  
	$consulta_usuarios = ("SELECT * FROM usuario");
	$result_usuarios = mysqli_query($con, $consulta_usuarios);

	while($usuario = mysqli_fetch_array($result_usuarios)){
		echo "<div class='contendor3'>";
		echo"<div class='textseccion3'><b>Nombre:</b>";
		echo utf8_encode($usuario['nom']);
		echo "<br/>";
		echo "<b>Contraseña:</b> ";
		echo utf8_encode($usuario['pass']);
		echo "<br/>";
		echo "<b>Rol:</b> ";
		echo utf8_encode($usuario['rol']);
		echo "<br/>";
		echo "<b>Avatar:</b> ";
		$fichero="img/$usuario[img]";
                if(file_exists($fichero)&&(($user_id) != '')){
                  echo "<img src='$fichero' width='50' heigth='50' ></div>";
                }
                else{
                  echo "<img src ='img/no_disponible.jpg'width='50' heigth='50'/></div>";
                }
		echo "</div>";
		echo"</div>";
	}


	include 'footer.php';

	
?>