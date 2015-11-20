<?php
	include 'conexion.php';
	include 'header.php';

	//creamos la sesion
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
	// echo 'no validas';
	
	$message = 'La hora y/o fecha no son correctas';
	echo "<SCRIPT type='text/javascript'>
        alert('$message');
        window.location.replace(\"http://localhost/Proyecto_3/reservar.php?id_recurso=$_REQUEST[id_recurso]\");
    </SCRIPT>";
	// header("Location: abc_recursos.php");
} else {

	$sql_insert="insert into reserva(id_user, id_recurso, dateini, datefi) values 
		                       ('$user_id','$_REQUEST[id_recurso]', '$insert_reserva_ini', '$insert_reserva_fin')";

		                       
		mysqli_query($con,$sql_insert)
		  or die("Problemas en el select".mysqli_error($con));
	$message = 'Reserva realizada';
	echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"http://localhost/Proyecto_3/user.php\");
    </SCRIPT>";
}
		mysqli_close($con);


	//header("Location: abc_recursos.php");
?>
 <?php  
	include 'footer.php';
?>