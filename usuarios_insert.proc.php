<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	
	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//imagen avatar
			$foto=$_FILES["foto"]["name"];
			$ruta=$_FILES["foto"]["tmp_name"];
			$destino="img/".$foto;
			copy($ruta, $destino);

			echo "AAAAAAAAAAAAAAA";
			echo $foto;
			echo $ruta;
			echo $destino;
			//
			$sql = "INSERT INTO usuario (nom, pass, rol, img) VALUES ('$_REQUEST[nombre]', '$_REQUEST[pass]', $_REQUEST[rol], '$foto')";

			echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: abc_usuarios.php")
		?>
	</body>
</html>
<?php  
	include 'footer.php';
?>