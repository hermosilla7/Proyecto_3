<?php
	include 'conexion.php';
	include 'header_admin.php';

	//creamos la sesion
	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

	$fecha = date("Y-m-d H:i:s");
	?>
<?php
	
	// $dia_reserva = $_REQUEST['fecha_reserva'];
	// echo $dia_reserva;
	// $reserva_ini = $_REQUEST['hora_ini'];
	// echo $reserva_ini;
	// $reserva_fin = $_REQUEST['hora_fin'];
	// echo $reserva_fin;

	$insert_reserva_ini = $_REQUEST['fecha_reserva'] ." ".$_REQUEST['hora_ini'].":00";

	$insert_reserva_fin = $_REQUEST['fecha_reserva']. " ".$_REQUEST['hora_fin'].":00";

function validateDates($ini, $fin, $con) {
	$ini = new \DateTime($ini);
	$fin = new \DateTime($fin);

	if ($ini->getTimestamp() >= $fin->getTimestamp()) {
		return false;
	}
	$consulta_reservas = "SELECT * FROM reserva where id_recurso = $_REQUEST[id_recurso]";
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
	echo 'no validas';
} else {

	echo $insert_reserva_ini;

	echo $insert_reserva_fin;
	


	$sql_insert="insert into reserva(id_user, id_recurso, dateini, datefi) values 
		                       ('$user_id','$_REQUEST[id_recurso]', '$insert_reserva_ini', '$insert_reserva_fin')";

		                       
		mysqli_query($con,$sql_insert)
		  or die("Problemas en el select".mysqli_error($con));
}
		mysqli_close($con);


	//header("Location: abc_recursos.php");
?>
 <?php  
	include 'footer.php';
?>