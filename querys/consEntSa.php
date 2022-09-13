<?php
require_once "../php-partials/authN1.php";
if($_SESSION['admin'] >= 7 && $_SESSION['admin'] <= 10){
}else{
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",2);
    exit();
}
include "../php-partials/connect.php";
	require("../php-partials/consultas.php");
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.css" />
	<link rel="stylesheet" href="../../public/css/coloresOficiales.css">
</head>
<body>
<div class="wrapper d-flex align-items-stretch">


		<!-- Page Content  -->
		<div id="content" class="p-2 p-md-5 pt-5">

			

		    <!-- zona scrollable par dispositivos de pantallas pequeñas -->
            <div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-5">
                <div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
                    <div class="overflow-auto align-self-stretch  m-0 p-0 ">

					<?php
					switch($_SESSION['admin']){
						case 7:
							include "tabAcaEnTemp.php";
						break;

						case 8:
							include "tabAcaSaTemp.php";
						break;
						case 9:
							include "tabEsEnTemp.php";
						break;
						case 10:
							include "tabEstuSaTemporal.php";
						break;
					}
					?>
                    </div>
                </div>
            </div>
        </div>
</div>
<script src="./consultas.js"></script>
</body>