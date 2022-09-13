<?php
	session_start();
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	    header("Location: ../login.php");
	    exit();
	}
	include "connect.php";
	include("PantallaErrorCrearUsiaro.php");
    include("consultas.php");

    if(empty($_POST['matricula']) || 
    	empty($_POST['tipomovilidad']) || 
    	empty($_POST['paisreceptor']) || 
    	empty($_POST['unidadreceptora']) || 
    	empty($_POST['entidadreceptora']) || 
    	empty($_POST['idiomasdominados']) || 
    	empty($_POST['periodoescolar']) || 
    	empty($_POST['campusemiso']) || 
    	empty($_POST['unidademisora']) ||
	empty($_POST['fecha_solicitud'])){
    	mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Uno o más campos del formulario no fueron completados, para solicitar la movilidad es necesario llenar todos los campos del formulario",0);
        exit();
    }

    //comprobamos que el usuario exista en la bd
    $sql = "SELECT * FROM academicos_salida WHERE EMPLEADO_ID=${id}";
	if (!($result = mysqli_query($con, $sql))) {
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Se produjo un error al momento de procesar su solicitud, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial". mysqli_error($con),0);
        exit();
   	}

   	//si no hay exactamente un usuario cerramos la consulta
    if(mysqli_num_rows($result) !== 1){
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","El usuario que intenta realizar la solicitud no existe. Si cree que esto es un error contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial.",0);
        exit();
    }
 	
 	//limpieza de la inffromacion de los formularios
    $campus_code = "'" . mysqli_real_escape_string($con, $_POST['campusemisor']) . "'";
    $unit_code = "'" . mysqli_real_escape_string($con, $_POST['unidademisora']) . "'";
    $period = "'" . mysqli_real_escape_string($con, $_POST['periodoescolar']) . "'";
    $unit_receiving_name = "'" . mysqli_real_escape_string($con, $_POST['unidadreceptora']) . "'";
    $unit_receiving_country =  "'" . mysqli_real_escape_string($con, $_POST['paisreceptor']) . "'";
    $unit_receiving_state = "'" . mysqli_real_escape_string($con, $_POST['entidadreceptora']) . "'";
    $unit_receiving_language = "'" . mysqli_real_escape_string($con, $_POST['idiomasdominados']) . "'";
    $date_solicitud = "'" . mysqli_real_escape_string($con, $_POST['fecha_solicitud']) . "'";
    $type = "'" . mysqli_real_escape_string($con, $_POST['tipomovilidad']) . "'";


    $sql = "INSERT INTO movilidad_academica_salida_temporal (EMPLEADO_ID, PERIODO, CAMPUS_ID, UNIDAD_ID, UR, UR_PAIS, UR_ENTIDAD, 
    UR_IDIOMA, TMA_ID, ESTADO) VALUES (${id}, ${period}, ${campus_code}, ${unit_code}, ${unit_receiving_name}, ${unit_receiving_country}, ${unit_receiving_state}, 
    ${unit_receiving_language}, ${date_solicitud}, ${type}, 1)";

    if(mysqli_query($con, $sql)) {
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","OPERACIÓN EXITOSA","Su solicitud fue agregada de manera exitosa. Si su solicitud es aprobada aparecerá en sus movilidades autorizadas, de lo contrario se le notificará si sigue en espera o no fue aprobada tas la revisión.",0);
        exit();
    } else {
        //si hay un error tambien avisamos al uusuario
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Se produjo un error al momento de procesar su solicitud, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial". mysqli_error($con),0);
        exit();
    }
?>
