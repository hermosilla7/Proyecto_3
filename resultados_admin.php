<?php
function mostrarConsultaAdmin (){
	include 'conexion.php';
	// include 'header_admin.php';



	//VERSION BETA
	//controlar checkbox
	if ($_REQUEST['categoria'] == ""){
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
			echo "</div><br/>";
			echo "<div class='botonera'>";

echo "<a href='recursos_modificar.php?id=$recurso[id_recurso]'><i class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar' style='color:#444444'></i></a>";

				echo '<div class="btn btn-success" id="btnReservar'.$recurso['id_recurso'].'" name="btnReservar">';
?>      	
    				<a href="reservar_recurso_admin.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Reservar</a>
				</div>
<?php  

			echo ' <div class="btn btn-primary" id="btnLiberar'.$recurso['id_recurso'].'" name="btnLiberar">';
?>
				<a href="liberar_admin.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Liberar</a>
            </div> 
<?php                
				echo '<div class="btn btn-success" id="btnReparar'.$recurso['id_recurso'].'" name="btnReparar">';
?>      	
    				<a href="reparar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Reparar</a>
				</div>
<?php     

				echo '<div class="btn btn-danger" id="btnEliminar'.$recurso['id_recurso'].'" name="btnEliminar">';
?>      	
    				<a href="reparar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Eliminar</a>
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
					        	$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);				
								$(document.getElementById('btnReparar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnEliminar".$recurso['id_recurso']."')).attr('disabled', false);
							});
					    </script>";
			}else if ($recurso["estado"] == "1"){
				echo 	"<script>
					        $(document).ready(function() {
					        	$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnReparar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnEliminar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			} else {
				echo 	"<script>
					        $(document).ready(function() {
					        	$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnReparar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnEliminar".$recurso['id_recurso']."')).attr('disabled', true);
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

			echo "<a href='recursos_modificar.php?id=$recurso[id_recurso]'><i class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar' style='color:#444444'></i></a>";

			
							echo '<div class="btn btn-success" id="btnReservar'.$recurso['id_recurso'].'" name="btnReservar">';
?>      	
    				<a href="reservar_recurso_admin.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Reservar</a>
				</div>
<?php  
			echo ' <div class="btn btn-primary" id="btnLiberar'.$recurso['id_recurso'].'" name="btnLiberar">';
?>
				<a href="liberar_admin.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Liberar</a>
            </div> 
<?php                
				echo '<div class="btn btn-success" id="btnReparar'.$recurso['id_recurso'].'" name="btnReparar">';
?>      	
    				<a href="reparar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Reparar</a>
				</div>
<?php   

				echo '<div class="btn btn-danger" id="btnEliminar'.$recurso['id_recurso'].'" name="btnEliminar">';
?>      	
    				<a href="reparar.php?id_recurso=<?php echo $recurso['id_recurso']; ?>">Eliminar</a>
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
					        	$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', true);				
								$(document.getElementById('btnReparar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnEliminar".$recurso['id_recurso']."')).attr('disabled', false);
							});
					    </script>";
			}else if ($recurso["estado"] == "1"){
				echo 	"<script>
					        $(document).ready(function() {
					        	$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnReparar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnEliminar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			} else {
				echo 	"<script>
					        $(document).ready(function() {
					        	$(document.getElementById('btnReservar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnLiberar".$recurso['id_recurso']."')).attr('disabled', false);
								$(document.getElementById('btnReparar".$recurso['id_recurso']."')).attr('disabled', true);
								$(document.getElementById('btnEliminar".$recurso['id_recurso']."')).attr('disabled', true);
							});
					    </script>";
			}
		}
	}



	//cerramos la conexión con la base de datos
	mysqli_close($con);
}
?>