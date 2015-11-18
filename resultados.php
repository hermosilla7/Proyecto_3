<?php
function mostrarConsulta (){
	include 'conexion.php';

	//VERSION BETA
	//controlar checkbox
	if ($_REQUEST['categoria'] == "") {
		$sql = "SELECT * FROM recurso";
		$datos = mysqli_query($con, $sql);
		//extraemos los productos uno a uno en la variable $anuncio que es un array
		while($recurso = mysqli_fetch_array($datos)){
			echo "<div class='contendor'>";
			echo"<div class='textseccion'><b>Nombre:</b> ";
			echo utf8_encode($recurso['nombre']);
			echo "<br/>";
			echo "<b>Contenido:</b> ";
			echo utf8_encode($recurso['descr']);

			echo "<br/>";


			echo "</div><br/>";
			echo "<div class='botonera'>";
 			              
				echo '<div class="btn btn-success" id="btnReservar'.$recurso['id_recurso'].'" name="btnReservar">';
?>      	
    				<a href="reservar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Reservar</a>
				</div>
<?php                 
            echo"  </div>";


			$fichero="img/$recurso[img]";
			if(file_exists($fichero)&&(($recurso['img']) != '')){
				echo "<div class='contimg'><img src='$fichero' width='250' heigth='250' ></div>";
			}
			else{
				echo "<div class='contimg'><img src ='img/no_disponible.jpg'width='250' heigth='250'/></div>";
			}
			
			echo"</div>";
			echo "<br/><br>";

			if ($recurso["estado"] == "0"){
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);				
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', false);
							});
					    </script>";
			}else if ($recurso["estado"] == "1"){
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			} else {
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			}
		}
	} else {
		$sql = "SELECT * FROM recurso WHERE categoria = $_REQUEST[categoria]";
		$datos = mysqli_query($con, $sql);
		//extraemos los productos uno a uno en la variable $anuncio que es un array
		while($recurso = mysqli_fetch_array($datos)){
			echo "<div class='contendor'>";
			echo"<div class='textseccion'><b>Nombre:</b> ";
			echo utf8_encode($recurso['nombre']);
			echo "<br/>";
			echo "<b>Contenido:</b> ";
			echo utf8_encode($recurso['descr']);
			echo "</div><br/>";
			echo "<div class='botonera'>";
			              
				echo '<div class="btn btn-success" id="btnReservar'.$recurso['id_recurso'].'" name="btnReservar">';
?>      	
    				<a href="reservar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Reservar</a>
				</div>
<?php   
	        echo"</div>";


			$fichero="img/$recurso[img]";
			if(file_exists($fichero)&&(($recurso['img']) != '')){
				echo "<div class='contimg'><img src='$fichero' width='250' heigth='250' ></div>";
			}
			else{
				echo "<div class='contimg'><img src ='img/no_disponible.jpg'width='250' heigth='250'/></div>";
			}
			
			echo"</div>";
			
			echo "<br/><br>";

			if ($recurso["estado"] == "0"){
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);				
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', false);
							});
					    </script>";
			}else if ($recurso["estado"] == "1"){
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			} else {
				echo 	"<script>
					        $(document).ready(function() {
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			}

		}
	}

	//cerramos la conexión con la base de datos
	mysqli_close($con);
}
?>