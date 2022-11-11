<?php
	require_once "../php-partials/authN1.php";

	if($_SESSION['admin'] < 7 || $_SESSION['admin'] > 10){
		include("../Pantalla_Error.php");
		if($_SESSION['admin']>=1&&$_SESSION['admin']<=5){
			PantallaError("../public/assets/UABC_crop.png","LO SENTIMOS, PERO USTED NO PUEDE ESTAR EN ESTA PAGINA","Este es el perfil de estudiantes, para acceder al perfil de administrativos solo dele clic a su nombre que aparece en el menú lateral de la izquierda.",1);
		}else{
			PantallaError("../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",1);
		}
		exit();	
	}
	require("../php-partials/consultas.php");
?>


<!doctype html>
	<html lang="en">

	<head>
		<title>Mi perfil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script type="text/javascript" src="../javascript/consultas.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../public/css/style.css">
		<link rel="stylesheet" href="../public/css/coloresOficiales.css">
		<link rel="stylesheet" href="../public/css/perfilUsuario.css">
	</head>

	<body>
		<div class="d-flex justify-content-center mb-4 pt-4 pb-4 ps-2 pe-2 shadow" id="EncabezadoPerfilEstudiante">
			<img src="../public/assets/UABC_crop.png" alt="" width=100px height="138px" class="d-inline-block align-text-top mr-2 ml-2">
			<div class="column pr-2 pl-2">
				<h6 class="text-white text-center">
					<?php 
						if( $_SESSION['admin'] === 7 ){ echo "Académico visitante"; }
						else if( $_SESSION['admin'] === 8 ){ echo "Académico de UABC"; }
						else if( $_SESSION['admin'] === 9 ){ echo "Estudiante visitante"; }
						else { echo "Estudiante de UABC"; }
					?>	
				</h6>
				<hr class="ms-5 me-5 ps-5 pe-5" />
				<h5 class="text-white text-center"><?php echo  $_SESSION['nombre'];?> <?php echo  $_SESSION['paterno'] ;?> <?php echo  $_SESSION['materno'] ;?> </h5>
				<p id="correo" class="text-white text-center"><?php echo  $_SESSION['email'];?>
			</div>
		</div>

		<!-- TABLAS -->
		<?php 
			if($_SESSION["admin"] == 7) {include "tablas_academico_entrada.php";}
			else if($_SESSION["admin"] == 8) {include "tablas_academico_salida.php";}
			else if($_SESSION["admin"] == 9) {include "tablas_estudiante_entrada.php";}
			else if ($_SESSION["admin"]==10){include "tablas_estudiante_salida.php";}

		?>

		<div class="d-flex justify-content-center mb-5 mt-4">
			<a href="SolicitudMovilidad.php">
				<button id="btnExportar" class="btn btn-success">
					Solicitar movilidad 
				</button>
			</a>
		</div>

		<div class="d-flex justify-content-center mb-5 mt-4">
			<a href="../php-partials/logout.php" class="h5" style="color:#00723e;">CERRRAR SESIÓN</a>
		</div>

	</body>
	</html>