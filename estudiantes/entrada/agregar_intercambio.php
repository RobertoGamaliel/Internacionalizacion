<?php
require_once "../../php-partials/auth.php";

if($_SESSION['admin']===10  || $_SESSION['admin']===4){
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO USTED NO PUEDE ESTAR EN ESTA PAGINA","No cuenta con los permisos necesarios para acceder a esta página.",2);
    exit();
} else if($_SESSION['admin']<=0||$_SESSION['admin']>=6){
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",2);
    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
	<title>Sistema Internacionalización</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../public/css/style.css">
	<link rel="stylesheet" href="../../public/css/coloresOficiales.css">
</head>

<body>

	<div class="wrapper d-flex align-items-stretch" id="fondo_principal">
		<!-- SUBMENU COLAPSABLE -->	
		<?php include("lateralEstudiantesEntrada.php") ?>

		<!-- Page Content  -->
		<div id="content" class="p-2 p-md-5 pt-5">

			<!-- NAV BAR  -->
		    <?php
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Estudiantes > Visitantes > Agregar Intercambio","../../public/assets/UABC_crop.png")
		    ?>
			
			<!--ZONA DEL FORMULARIO -->
			<div class="container">
				
				<form action="../../php-partials/add.php" method="POST" autocomplete="off">

					<div class="row mb-3 justify-content-md-center">
						<h6>Datos del Estudiante</h6>
					</div>

					<div class="row mb-3">
						<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">ID</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999999" class="form-control border border-secondary" name="matricula" id="matricula" value="<?php if (isset($_GET["id"])) echo $_GET["id"]; ?>">
						</div>
					</div>

					<hr />

					<!--

					<div class="row mb-3 justify-content-md-center">
						<h6>Campus</h6>
					</div>

					<div class="row mb-3">
						<label for="campus_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="campus_clave" id="campus_clave">
								<option value="">----------</option>
								<option value="1">MEXICALI</option>
								<option value="2">TIJUANA</option>
								<option value="3">ENSENADA</option>
							</select>
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Unidad Académica</h6>
					</div>

					<div class="row mb-3">
						<label for="unidad_clave" class="col-sm-3 col-form-label" style="text-align: right;"></label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="unidad_clave" id="unidad_clave">
								<option value="">----------</option>
							</select>
						</div>

					</div>

					<hr />

					-->

					<!--


					<div class="row mb-3 justify-content-md-center">
						<h6>Programa Educativo de llegada</h6>
					</div>

					<div class="row mb-3">
						<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="999" class="form-control border border-secondary" name="programa_clave" id="programa_clave">
						</div>
					</div>

					<div class="row mb-3">
						<label for="programa_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="programa_nombre" id="programa_nombre">
						</div>
					</div>

					<div class="row mb-3 justify-content-md-center">
						Área de conocimiento
					</div>

					<div class="row mb-3">
						<label for="area_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="9" class="form-control border border-secondary" name="area_clave" id="area_clave">
						</div>
					</div>

					

					<div class="row mb-3">
						<label for="area_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="area_nombre" id="area_nombre">
						</div>
					</div>

					<hr />

					-->

					<div class="row mb-3">
						<label for="periodo" class="col-sm-3 col-form-label" style="text-align: right;">Periodo Escolar</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="99999" class="form-control border border-secondary" name="periodo" id="periodo">
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Unidad Emisora</h6>
					</div>

					<div class="row mb-3">
						<label for="unidad_emisora_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_emisora_nombre" id="unidad_emisora_nombre">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_emisora_pais" class="col-sm-3 col-form-label" style="text-align: right;">País</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_emisora_pais" id="unidad_emisora_pais">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_emisora_entidad" class="col-sm-3 col-form-label" style="text-align: right;">Entidad</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_emisora_entidad" id="unidad_emisora_entidad">
						</div>
					</div>

					<div class="row mb-3">
						<label for="unidad_emisora_idioma" class="col-sm-3 col-form-label" style="text-align: right;">Idioma</label>
						<div class="col-sm-6">
							<input type="text" class="form-control border border-secondary" name="unidad_emisora_idioma" id="unidad_emisora_idioma">
						</div>
					</div>


					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Financiamiento</h6>
					</div>

					<div class="row mb-3">
						<label for="finan_recibio" class="col-sm-3 col-form-label" style="text-align: right;">¿Recibió?</label>
						<div class="col-sm-6">
							<select class="form-control border border-secondary" name="finan_recibio" id="finan_recibio">
								<option value="" selected>----------</option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="finan_monto" class="col-sm-3 col-form-label" style="text-align: right;">Monto</label>
						<div class="col-sm-6">
							<input type="number" min="0" max="99999" class="form-control border border-secondary" name="finan_monto" id="finan_monto">
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<h6>Fecha del Intercambio </h6>
					</div>

					<div class="row mb-3">
						<label for="fecha_inicial" class="col-sm-3 col-form-label" style="text-align: right;">Inicial</label>
						<div class="col-sm-6">
							<input type="date" class="form-control border border-secondary" name="fecha_inicial" id="fecha_inicial">
						</div>
					</div>

					<div class="row mb-3">
						<label for="fecha_terminal" class="col-sm-3 col-form-label" style="text-align: right;">Terminal</label>
						<div class="col-sm-6">
							<input type="date" class="form-control border border-secondary" name="fecha_terminal" id="fecha_terminal">
						</div>
					</div>

					<hr />

					<div class="row mb-3 justify-content-md-center">
						<button type="submit" class="btn btn-outline-primary" name="btn_agregarIntercambio_entrada" id="btnExportar">Agregar</button>
					</div>
				</form>

			</div>

		</div>
	</div>

	<script src="../../public/js/jquery.min.js"></script>
	<script src="../../public/js/popper.js"></script>
	<script src="../../public/js/bootstrap.min.js"></script>
	<script src="../../public/js/main.js"></script>

	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


</body>

</html>