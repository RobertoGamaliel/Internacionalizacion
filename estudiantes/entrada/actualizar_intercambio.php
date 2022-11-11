<?php
require_once "../../php-partials/auth.php";

if($_SESSION['admin']<= 10 && $_SESSION['admin']>=7 || $_SESSION['admin'] === 4){
	include("../../Pantalla_Error.php");
	PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO USTED NO PUEDE ESTAR EN ESTA PAGINA","No cuenta con los permisos necesarios para acceder a esta página.",2);
	exit();
} else if($_SESSION['admin']<=0||$_SESSION['admin']>=6){
	include("../../Pantalla_Error.php");
	PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",2);
	exit();
}

include "../../querys/querysAdmins.php";
$query = queryRegister(
	'intercambio_estudiantil_entrada',
	'ID',
	$_GET["id"]);
$res = mysqli_fetch_array($query);

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

		<!-- SUBMENU COLAPSABLE -->
		<div class="wrapper d-flex align-items-stretch">
			<?php include("lateralEstudiantesEntrada.php") ?>

			<!-- Page Content  -->
			<div id="content" class="p-4 p-md-5 pt-5">

				<!-- NAV BAR  -->
				<?php
				require("../../Estaticos.php");
				navVar("Sistema de Internacionalización > Estudiantes > Visitantes > Actualizar Intercambio","../../public/assets/UABC_crop.png")
				?>
				
				<!--Campos-->
				<div id="Page1">

					<div class="container">

						<form id="formulario" action="../../php-partials/updateStudentVisitMovility.php" method="post" autocomplete="off">

							<div class="d-flex row align-items-centeer align-self-stretch ">
								<div class="col-sm-6">
									<div class="d-flex justify-content-center p-1">
										<button type="submit" class="btn btn-outline-primary" name="btn_aplicarCambios_intercambio_entrada" id="btnExportar" onclick="return confirmarAplicarCambios()">Aplicar Cambios</button>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="d-flex justify-content-center p-1">
										<button type="button" class="btn btn-danger" name="btn_eliminar" id="btn_eliminar" onclick="return confirmarBorrar()" <?php if ($_SESSION["admin"] == 4) echo "disabled"; ?>>Eliminar</button>
									</div>
								</div>
							</div>

						<!-- <hr />

							el id del intercambio esta oculto -->
							<div class="row mb-3" style="display: none;">
								<label for="id" class="col-sm-3 col-form-label" style="text-align: right;">ID del Intercambio</label>
								<div class="col-sm-6">
									<input type="number" class="form-control border border-secondary" name="id" id="id" value="<?php echo $res["ID"]; ?>" readonly>
								</div>
							</div>

							<hr />

							<div class="row mb-3 justify-content-md-center">
								<h6>Datos del Estudiante</h6>
							</div>

							<div class="row mb-3">
								<label for="registro" class="col-sm-3 col-form-label" style="text-align: right;">Registro</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary" name="registro" id="registro" value="<?php echo $res["ID"]; ?>" readonly>
								</div>
							</div>

							<div class="row mb-3">
								<label for="matricula" class="col-sm-3 col-form-label" style="text-align: right;">ID / Matricula</label>
								<div class="col-sm-6">
									<input type="number" min="0" max="999999" class="form-control border border-secondary" name="matricula" id="matricula" value="<?php echo $res["ESTUDIANTE_ID"]; ?>" readonly>
								</div>
								<div class="col-sm-2">
									<a class="btn btn-outline-secondary" href="actualizar_estudiante.php?id=<?php echo $res["ESTUDIANTE_ID"]; ?>" role="button">VER PERFIL DEL ESTUDIANTE</a>
								</div>
							</div>

							<div class="row mb-3">
								<label for="nivel" class="col-sm-3 col-form-label" style="text-align: right;">Nivel académico</label>
								<div class="col-sm-6">
									<select class="form-control border border-secondary bg-light" name="nivel" id="nivel" selected="<?php echo $res["NIVEL_ID"]; ?>" required>
										<?php if($res["NIVEL_ID"] == 1 ){?>
											<option value="1">Licenciatura</option>
											<option value="2">Especialidad</option>
											<option value="3">Maestría</option>
											<option value="4">Doctorado</option>
										<?php } else if($res["NIVEL_ID"] == 2){ ?> 
											<option value="2">Especialidad</option>
											<option value="3">Maestría</option>
											<option value="4">Doctorado</option>
											<option value="1">Licenciatura</option>
										<?php } else if($res["NIVEL_ID"] == 3){ ?> 
											<option value="3">Maestría</option>
											<option value="4">Doctorado</option>
											<option value="1">Licenciatura</option>
											<option value="2">Especialidad</option>
										<?php } else if($res["NIVEL_ID"] == 4){ ?> 
											<option value="4">Doctorado</option>
											<option value="1">Licenciatura</option>
											<option value="2">Especialidad</option>
											<option value="3">Maestría</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<hr />

							<div class="row mb-1 mt-3 justify-content-md-center">
								<h6>Unidad Emisora</h6>
							</div>

							<div class="row mb-3">
								<label for="unidad_emisora_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary bg-light" name="unidad_emisora_nombre" id="unidad_emisora_nombre" value="<?php echo $res["UE"]; ?>" >
								</div>
							</div>

							<div class="row mb-3">
								<label for="unidad_emisora_pais" class="col-sm-3 col-form-label" style="text-align: right;">País</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary bg-light" name="unidad_emisora_pais" id="unidad_emisora_pais" value="<?php echo $res["UE_PAIS"]; ?>" >
								</div>
							</div>

							<div class="row mb-3">
								<label for="unidad_emisora_entidad" class="col-sm-3 col-form-label" style="text-align: right;">Entidad</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary bg-light" name="unidad_emisora_entidad" id="unidad_emisora_entidad" value="<?php echo $res["UE_ENTIDAD"]; ?>" >
								</div>
							</div>

							<div class="row mb-3">
								<label for="unidad_emisora_idioma" class="col-sm-3 col-form-label" style="text-align: right;">Idioma</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary bg-light" name="unidad_emisora_idioma" id="unidad_emisora_idioma" value="<?php echo $res["UE_IDIOMA"]; ?>" >
								</div>
							</div>


							<hr />

							<div class="row mb-3 justify-content-md-center">
								<h6>Financiamiento</h6>
							</div>

							<div class="row mb-3">
								<label for="finan_recibio" class="col-sm-3 col-form-label" style="text-align: right;">¿Recibió?</label>
								<div class="col-sm-6">
									<select class="form-control border border-secondary bg-light" name="finan_recibio" id="finan_recibio" >
										<option value="" <?php if ($res["FINAN_ID"] == "") echo "selected"; ?>>----------</option>
										<option value="1" <?php if ($res["FINAN_VAL"] > "1") echo "selected"; ?>>Sí</option>
										<option value="2" <?php if ($res["FINAN_VAL"] == "1") echo "selected"; ?>>No</option>
									</select>
								</div>
							</div>

							<div class="row mb-3">
								<label for="finan_monto" class="col-sm-3 col-form-label" style="text-align: right;">Monto</label>
								<div class="col-sm-6">
									<input type="number" min="0" max="99999" class="form-control border border-secondary bg-light" name="finan_monto" id="finan_monto" value="<?php echo $res["FINAN_VAL"]; ?>" >
								</div>
							</div>

							<hr />

							<div class="row mb-3 justify-content-md-center">
								<h6>Fecha del Intercambio </h6>
							</div>

							<div class="row mb-3">
								<label for="fecha_inicial" class="col-sm-3 col-form-label" style="text-align: right;">Inicial</label>
								<div class="col-sm-6">
									<input type="date" class="form-control border border-secondary bg-light" name="fecha_inicial" id="fecha_inicial" value="<?php echo $res["DATE_START"]; ?>" >
								</div>
							</div>

							<div class="row mb-3">
								<label for="fecha_terminal" class="col-sm-3 col-form-label" style="text-align: right;">Terminal</label>
								<div class="col-sm-6">
									<input type="date" class="form-control border border-secondary bg-light" name="fecha_terminal" id="fecha_terminal" value="<?php echo $res["DATE_END"]; ?>" >
								</div>
							</div>
							<div class="row mb-3">
								<label for="periodo" class="col-sm-3 col-form-label" style="text-align: right;">Periodo Escolar</label>
								<div class="col-sm-6">
									<input class="form-control border border-secondary bg-light" name="periodo" placeholder="seleccione primero las fechas" value="<?php echo $res['PERIODO']; ?>" id="periodo" required>
								</div>
							</div>
							<div class="row mb-3 mt-5 justify-content-md-center">
								<h6>Datos del receptor</h6>
							</div>

							<div class="row mb-3">
								<label for="unidad_emisora" class="col-sm-3 col-form-label" style="text-align: right;">Campus</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary" name="unidad_receptora" id="unidad_receptora" value="<?php  echo $res["CAMPUS_DESC"]; ?>" readonly>
								</div>
							</div>
							<div class="row mb-3">
								<label for="facultad_receptora" class="col-sm-3 col-form-label" style="text-align: right;">Facultad</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary" name="facultad_receptora" id="facultad_receptora" value="<?php  echo $res["UNIDAD"]; ?>" readonly>
								</div>
							</div>
							<div class="row mb-3 justify-content-md-center">
								<h6 class="p-0 m-0 mt-5">Programa Educativo de llegada</h6>
							</div>

							<div class="row mb-3">
								<label for="programa_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
								<div class="col-sm-6">
									<input type="number" min="1" max="999" value="<?php  echo $res["PROGRAMA_ID"]; ?>" class="form-control border border-secondary bg-light" name="programa_clave" id="programa_clave" required>
								</div>
							</div>

							<div class="row mb-3">
								<label for="programa_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary bg-light" value="<?php echo $res["PROGRAMA_DESC"]; ?>" name="programa_nombre" id="programa_nombre" required>
								</div>
							</div>

							<div class="row mb-3 justify-content-md-center">
								<h6 class="p-0 m-0 mt-5"> Área de conocimiento </h6>
							</div>

							<div class="row mb-3">
								<label for="area_clave" class="col-sm-3 col-form-label" style="text-align: right;">Clave</label>
								<div class="col-sm-6">
									<input type="number" min="1" max="9" class="form-control border border-secondary bg-light" name="area_clave" id="area_clave" value="<?php echo $res["AREA_ID"]; ?>" required>
								</div>
							</div>

							<div class="row mb-3">
								<label for="area_nombre" class="col-sm-3 col-form-label" style="text-align: right;">Nombre</label>
								<div class="col-sm-6">
									<input type="text" class="form-control border border-secondary bg-light" name="area_nombre" id="area_nombre" value="<?php  echo $res["AREA"]; ?>" required>
								</div>
							</div>
							<hr />

							<div class="row mb-3 justify-content-md-center">
								<button type="submit" class="btn btn-outline-primary" name="btn_aplicarCambios_intercambio_entrada" id="btnExportar" onclick="return confirmarAplicarCambios()">Aplicar Cambios</button>
							</div>


						</form>
						

					</div>
				</div>

				<div id="Page2" style="display: none;">
					<div class="container">
						<div class="row">
							<div class="col align-self-start">
								One of three columns
							</div>
							<div class="col align-self-center">
								One of three columns
							</div>
							<div class="col align-self-end">
								<a href="#" onclick="return show('Page1','Page2');">Show page 1</a>
							</div>
						</div>
					</div>
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

		<script>
			$(document).ready(function() {
				$("#campus_clave").change(function() {
					var val = $(this).val();
					if (val == "") {
						$("#unidad_clave").html("<option value=''>----------</option>");

					//Mexicali
				} else if (val == "1") {
					$("#unidad_clave").html(`<option value=''>----------</option>
						<option value='1'>FACULTAD DE ARQUITECTURA Y DISEÑO</option>
						<option value='10'>INSTITUTO DE CIENCIAS AGRÍCOLAS</option>
						<option value='40'>FACULTAD DE CIENCIAS HUMANAS</option>
						<option value='80'>FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS</option>
						<option value='90'>FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
						<option value="110">FACULTAD DE DERECHO</option>
						<option value='111'>INSTITUTO DE INGENIERÍA</option>
						<option value="123">FACULTAD DE DEPORTES</option>
						<option value='124'>FACULTAD DE ARTES</option>
						<option value="140">FACULTAD DE INGENIERÍA</option>
						<option value="160">FACULTAD DE MEDICINA</option>
						<!--<option value='165'>CENTRO DE EDUCACIÓN ABIERTA Y A DISTANCIA</option>-->
						<option value='200'>INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS</option>
						<option value='220'>FACULTAD DE ODONTOLOGÍA<!--MEXICALI--></option>
						<option value='260'>FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>
						<option value='300'>FACULTAD DE ENFERMERÍA</option>
						<option value='310'>FACULTAD DE IDIOMAS</option>
						<option value='335'>UNIDAD CIENCIAS DE LA SALUD<!--MEXICALI--></option>
						<!--<option value='600'>DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS</option>-->
						<option value='605'>INSTITUTO DE INVESTIGACIONES SOCIALES</option>
						<option value='625'>INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO</option>
						<option value='2'>FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA</option>
						<option value='125'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)<!--TRONCOS COMUNES (CIUDAD MORELOS)--></option>
						<option value='126'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)<!--TRONCOS COMUNES (SAN FELIPE)--></option>`);
					//Tijuana
				} else if (val == "2") {
					$("#unidad_clave").html(`<option value=''>----------</option>
						<option value='70'>FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA</option>
						<option value='100'>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</option>
						<option value='120'>FACULTAD DE DERECHO</option>
						<option value='130'>FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES</option>
						<option value='150'>FACULTAD DE DEPORTES<!-- EXTENSION CAMPUS TIJUANA --></option>
						<option value='180'>FACULTAD DE MEDICINA Y PSICOLOGÍA</option>
						<option value='500'>UNIDAD UNIVERSITARIA EN ROSARITO<!-- TRONCOS COMUNES (ROSARITO) --></option>
						<option value='190'>FACULTAD DE ARTES</option>
						<option value="240">FACULTAD DE ODONTOLOGÍA</option>
						<option value='280'>FACULTAD DE TURISMO Y MERCADOTECNIA</option>
						<option value="311">FACULTAD DE IDIOMAS</option>
						<option value="313">FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)</option>
						<!--<option value="333">FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>-->
						<!--<option value="336">CENTRO UNIVERSITARIO DE EDUCACIÓN EN SALUD</option>-->
						<option value='626'>INSTITUTO DE INVESTIGACIONES HISTÓRICAS</option>
						<option value='790'>FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES</option>
						<option value='400'>FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES</option>
						<option value='332'>FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA<!--VALLE DE LAS PALMAS--></option>
						<option value='334'>FACULTAD DE CIENCIAS DE LA SALUD<!--VALLE DE LAS PALMAS--></option>`);

					//Ensenada
				} else if (val == "3") {
					$("#unidad_clave").html(`<option value=''>----------</option>
						<option value='20'>FACULTAD DE ARTES</option>
						<option value='30'>FACULTAD DE CIENCIAS</option>
						<option value="50">FACULTAD DE CIENCIAS MARINAS</option>
						<option value='170'>FACULTAD DE DEPORTES</option>
						<option value='290'>FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO</option>
						<option value='312'>FACULTAD DE IDIOMAS</option>
						<option value='320'>ESCUELA DE CIENCIAS DE LA SALUD</option>
						<option value="330">FACULTAD DE ENOLOGÍA Y GASTRONOMÍA</option>
						<!--<option value='331'>FACULTAD DE ARQUITECTURA Y DISEÑO ENSENADA</option>-->
						<option value="615">INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO</option>
						<option value="620">INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS</option>
						<option value='795'>FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES</option>
						<!--<option value='801'>ESCUELA DE ENFERMERÍA MIGUEL SERVET</option>-->
						<option value='700'>FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN</option>`);
				}
			});

			/*
			$("#unidad_clave").change(function() {
				var val = $(this).val();
				if (val == "") {
					$("#programa_clave").html("<option value=''>----------</option>");

				//FACULTAD DE CIENCIAS
				} else if (val == "30") {
					$("#programa_clave").html(`<option value=''>----------</option>
								<option value="3001">BIÓLOGO</option>
								<option value="3002">FÍSICO</option>
								<option value="3003">LICENCIADO EN MATEMÁTICAS APLICADAS</option>
								<option value="3004">LICENCIADO EN CIENCIAS COMPUTACIONALES</option>
								<option value="3005">PROGRAMADOR DE SISTEMAS COMPUTACIONALES</option>
								<option value="3053">TRONCO COMUN CIENCIAS NATURALES Y EXACTAS</option>
								<option value="3067">TRONCO COMUN DE CIENCIAS EXACTAS</option>
								<option value="3068">TRONCO COMUN DE CIENCIAS NATURALES</option>`);

				//FACULTAD DE CIENCIAS MARINAS
				} else if (val == "50") {
					$("#programa_clave").html(`<option value=''>----------</option>
								<option value="5001">OCEANOLOGO</option>
								<option value="5005">LICENCIADO EN CIENCIAS AMBIENTALES</option>
								<option value="5006">LICENCIADO EN BIOTECNOLOGIA EN ACUACULTURA</option>
								<option value="5054">TRONCO COMUN DE CIENCIAS NATURALES</option>`);

				//FACULTAD DE INGENIERIA, ARQUITECTURA Y DISEÑO
				} else if (val == "290") {
					$("#programa_clave").html(`<option value=''>----------</option>
								<option value="29002">INGENIERO CIVIL</option>
								<option value="29003">INGENIERO EN ELECTRONICA</option>
								<option value="29004">INGENIERO EN COMPUTACION</option>
								<option value="29007">INGENIERO EN NANOTECNOLOGIA</option>`);
				}
			});
			*/



		});



function show(shown, hidden) {
	document.getElementById(shown).style.display = 'block';
	document.getElementById(hidden).style.display = 'none';
	return false;
}

function confirmarAplicarCambios() {
	if (confirm('¿Estás seguro que quieres aplicar los cambios que se han hecho?')) {
				//document.getElementById("formulario").submit();
			} else {
				return false;
			}
		}

		function confirmarBorrar() {
			var mat = document.getElementById("matricula").value;
			var id = document.getElementById("id").value;
			if (confirm('¿Estás seguro que quieres eliminar el registro del intercambio del estudiante de matrícula ' + mat + '?')) {
				window.location.href = "../../php-partials/delete.php?tabla=intercambio_entrada&id=" + id;
			} else {
				return false;
			}
		}
	</script>


</body>

</html>