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

include "../../php-partials/connect.php";
$sql = "SELECT * FROM movilidad_academica_entrada WHERE ID = ${_GET["id"]}";
//$query = mysqli_query($con, $sql);
//$res = mysqli_fetch_array($query);
if ($query = mysqli_query($con, $sql)) {
	$res = mysqli_fetch_array($query);
} else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);
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
	<style> 
		#btn_activar_edicion, #btn_aplicarCambios1{
			color: white;
			background: #00723e;
			font-weight: 500;
			box-shadow: 0px 6px 6px #b6b6b6;
		}
	</style>
</head>

<body>

	<div class="wrapper d-flex align-items-stretch">
		<!-- SUBMENU COLAPSABLE -->	
		<?php include("lateralAcademicosEntrada.php") ?>

		<!-- Page Content -->
		<div id="content" class="p-2 p-md-5 pt-5">

			<!-- NAV BAR  -->
			<?php
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Académicos > Visitantes > Actualizar Movilidad","../../public/assets/UABC_crop.png")
		    ?>

			<h5 class="mb-4 text-center">Actualizar Movilidad (Entrada)</h5>
			<form id="formulario" action="../../php-partials/update.php" method="post" autocomplete="off">

				<!-- <hr />

						el id del intercambio esta oculto -->
				<div class="row mb-3" style="display: none;">
					<label for="id" class="col-sm-3 col-form-label" style="text-align: right;">ID de la movilidad</label>
					<div class="col-sm-6">
						<input type="number" class="form-control border border-secondary" name="id" id="id" value="<?php echo $res["ID"]; ?>" readonly>
					</div>
				</div>

				<div class="row mb-3">
					<label for="identificador" class="col-sm-3 col-form-label" style="text-align: right;">Clave de Identificación</label>
					<div class="col-sm-6">
						<input type="number" min="0" max="999999" class="form-control border border-secondary" name="identificador" id="identificador" value="<?php echo $res["VISITANTE_ID"]; ?>" readonly>
					</div>
				</div>

				<div class="row mb-3">
					<label for="tipomovilidad" class="col-sm-3 col-form-label" style="text-align: right;">Tipo de Movilidad</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="tipomovilidad" id="tipomovilidad" disabled>
							<option value="" <?php if ($res["TMA_ID"] == "") echo "selected"; ?>>
								--Seleccionar Nivel--
							</option>
							<option value="1" <?php if ($res["TMA_ID"] == "1") echo "selected"; ?>>
								Docencia
							</option>
							<option value="2" <?php if ($res["TMA_ID"] == "2") echo "selected"; ?>>
								Estancia Sabática
							</option>
							<option value="3" <?php if ($res["TMA_ID"] == "3") echo "selected"; ?>>
								Estancia de Investigación
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="paisorigen" class="col-sm-3 col-form-label" style="text-align: right;">País de Origen</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Pais Origen" name="paisorigen" id="paisorigen" value="<?php echo $res["UE_PAIS"]; ?>" disabled>
					</div>
				</div>

				<div class="row mb-3">
					<label for="unidademisora" class="col-sm-3 col-form-label" style="text-align: right;">Unidad Emisora</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Unidad Emisora" name="unidademisora" id="unidademisora" value="<?php echo $res["UE"]; ?>" disabled>
					</div>
				</div>

				<div class="row mb-3">
					<label for="entidademisora" class="col-sm-3 col-form-label" style="text-align: right;">Entidad Emisora</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Entidad Emisora" name="entidademisora" id="entidademisora" value="<?php echo $res["UE_ENTIDAD"]; ?>" disabled>
					</div>
				</div>

				<div class="row mb-3">
					<label for="idiomasdominados" class="col-sm-3 col-form-label" style="text-align: right;">Idiomas Dominados</label>
					<div class="col-sm-6">
						<input type="text" class="form-control border border-secondary" placeholder="Idiomas Dominados" name="idiomasdominados" id="idiomasdominados" value="<?php echo $res["UE_IDIOMA"]; ?>" disabled>
					</div>
				</div>

				<div class="row mb-3">
					<label for="periodoescolar" class="col-sm-3 col-form-label" style="text-align: right;">Periodo Escolar</label>
					<div class="col-sm-6">
						<input type="number" min="0" max="99999" class="form-control border border-secondary" name="periodoescolar" id="periodoescolar" value="<?php echo $res["PERIODO_ID"]; ?>" disabled>
					</div>
				</div>

				<div class="row mb-3">
					<label for="campusreceptor" class="col-sm-3 col-form-label" style="text-align: right;">Campus Receptor</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="campusreceptor" id="campusreceptor" disabled>
							<option value="" <?php if ($res["CAMPUS_ID"] == "") echo "selected"; ?>>
								--Seleccionar Campus--
							</option>
							<option value="1" <?php if ($res["CAMPUS_ID"] == "1") echo "selected"; ?>>
								Campus Mexicali
							</option>
							<option value="2" <?php if ($res["CAMPUS_ID"] == "2") echo "selected"; ?>>
								Campus Tijuana
							</option>
							<option value="3" <?php if ($res["CAMPUS_ID"] == "3") echo "selected"; ?>>
								Campus Ensenada
							</option>
						</select>
					</div>
				</div>

				<div class="row mb-3">
					<label for="unidadreceptora" class="col-sm-3 col-form-label" style="text-align: right;">Unidad Receptora</label>
					<div class="col-sm-6">
						<select class="form-control border border-secondary" name="unidadreceptora" id="unidadreceptora" disabled>
							<option value="" <?php if ($res["UNIDAD_ID"] == "") echo "selected"; ?>>
								--Seleccionar Unidad--
							</option>
							<option value="1" <?php if ($res["UNIDAD_ID"] == "1") echo "selected"; ?>>
								Facultad de Ciencias
							</option>
							<option value="2" <?php if ($res["UNIDAD_ID"] == "2") echo "selected"; ?>>
								Facultad de Ingeniería
							</option>
							<option value="3" <?php if ($res["UNIDAD_ID"] == "3") echo "selected"; ?>>
								Facultad de Artes
							</option>
						</select>
					</div>
				</div>
				<?php if($_SESSION['admin']!=4){?>
					<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-0">
						<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
							<button type="submit" class="btn btn-outline-primary" name="btn_aplicarCambios_movilidad_entrada" id="btn_aplicarCambios1" onclick="return confirmarAplicarCambios()">Aplicar Cambios</button>
						</div>					
					</div>

					<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-0">
						<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
							<button type="reset" class="btn btn-danger" id="btn_eliminar" onclick="return confirmarBorrar()" <?php if (!$_SESSION["admin"] == 4) echo "disabled"; ?>>Eliminar</button>
						</div>					
					</div>
					
				<?php } ?>
			</form>
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
		const btn_activar_edicion = document.getElementById("btn_activar_edicion");

		btn_activar_edicion.addEventListener("click", () => {

			if (document.getElementById("paisorigen").disabled === true) {

				//document.getElementById("identificador").disabled = false;
				document.getElementById("tipomovilidad").disabled = false;
				document.getElementById("paisorigen").disabled = false;
				document.getElementById("unidademisora").disabled = false;
				document.getElementById("entidademisora").disabled = false;
				document.getElementById("idiomasdominados").disabled = false;
				document.getElementById("periodoescolar").disabled = false;
				document.getElementById("campusreceptor").disabled = false;
				document.getElementById("unidadreceptora").disabled = false;

				document.getElementById("btn_aplicarCambios1").style.display = 'block';
				document.getElementById("btn_aplicarCambios2").style.display = 'block';

				btn_activar_edicion.classList = "btn btn-outline-dark";
				btn_activar_edicion.innerHTML = "Descartar Cambios";

			} else {
				if (confirm('¿Estás seguro que quieres descartar los cambios que se han hecho?')) {
					location.reload();
				}
			}
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
			var idVisitante = document.getElementById("identificador").value;
			var id = document.getElementById("id").value;
			if (confirm('¿Estás seguro que quieres eliminar la movilidad del académico de id ' + idVisitante + '?')) {
				window.location.href = "../../php-partials/delete.php?tabla=movilidad_academica_entrada&id=" + id;
			} else {
				return false;
			}
		}
	</script>

</body>

</html>
