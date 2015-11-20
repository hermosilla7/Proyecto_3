<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';
	// include 'reservar_recurso_admin.php';
	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];



	$fecha = date("Y-m-d H:i:s");
	?>
<?php

	$insert_reserva_ini = $_REQUEST['fecha_reserva'] ." ".$_REQUEST['hora_ini'].":00";

	$insert_reserva_fin = $_REQUEST['fecha_reserva']. " ".$_REQUEST['hora_fin'].":00";


function validateDates($ini, $fin, $con) {
	$ini = new \DateTime($ini);
	$fin = new \DateTime($fin);

	if ($ini->getTimestamp() >= $fin->getTimestamp()) {
		return false;
	}
	$consulta_reservas = "SELECT * FROM reserva where id_reserva = $_REQUEST[id_reserva]";
	$stmt = mysqli_query($con, $consulta_reservas);
	while($reserva = mysqli_fetch_array($stmt)) {
		$reserva_ini = new \DateTime($reserva['dateini']);
		$reserva_fin = new \DateTime($reserva['datefi']);
		if (
	        $ini->getTimestamp() >= $reserva_ini->getTimestamp()
	        && $ini->getTimestamp() < $reserva_fin->getTimestamp()
	    ) {
	        return false;
	    }

	    if (
	        $fin->getTimestamp() > $reserva_ini->getTimestamp()
	        && $fin->getTimestamp() <= $reserva_fin->getTimestamp()
	    ) {
	        return false;
	    }

	    if (
	        $ini->getTimestamp() <= $reserva_ini->getTimestamp()
	        && $fin->getTimestamp() >= $reserva_fin->getTimestamp()
	    ) {
	        return false;
	    }
	}

	return true;
}

	if (!validateDates($insert_reserva_ini, $insert_reserva_fin, $con)) {
	// echo 'no validas';
	
	$message = 'La hora y/o fecha no son correctas';
	echo "<SCRIPT type='text/javascript'>
        alert('$message');
        window.location.replace(\"http://localhost/Proyecto_3/reservas_modificar.php?id_reserva=$_REQUEST[id_reserva]\");
    </SCRIPT>";
	// header("Location: abc_recursos.php");
} else {


	$sql_update="UPDATE reserva SET id_user = '$user_id', id_recurso = '$_REQUEST[id_recurso]', dateini = '$insert_reserva_ini', datefi = '$insert_reserva_fin' WHERE id_reserva = '$_REQUEST[id_anterior]'";
	
	echo $sql_update;                       
		mysqli_query($con,$sql_update)
		  or die("Problemas en el select".mysqli_error($con));
	$message = 'Reserva realizada';
	echo "<SCRIPT type='text/javascript'>
        alert('$message');
        window.location.replace(\"http://localhost/Proyecto_3/busqueda_reservas_admin.php\");
    </SCRIPT>";
}
		mysqli_close($con);


?>

<?php  
	include 'footer.php';
?>