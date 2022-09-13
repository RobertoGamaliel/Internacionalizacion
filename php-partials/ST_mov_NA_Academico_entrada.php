<?php
	session_start();
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	    header("Location: ../login.php");
	    exit();
	}
	include "connect.php";
	include("PantallaErrorCrearUsiaro.php");
    include("consultas.php");

    if(	empty($_POST['identificador']) || 
    	empty($_POST['tipomovilidad']) || 
    	empty($_POST['paisorigen']) || 
    	empty($_POST['unidademisora']) || 
    	empty($_POST['entidademisora']) || 
    	empty($_POST['idiomasdominados']) || 
    	empty($_POST['periodoescolar']) || 
    	empty($_POST['campusreceptor']) ||
      	empty($_POST['fecha_solicitud']) || 
    	empty($_POST['unidadreceptora'])){
    	mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Uno o más campos del formulario no fueron completados, para solicitar la movilidad es necesario llenar todos los campos del formulario",0);
        exit();
    }

    //si el campo del id esta vacio
    if (empty($_POST['identificador'])) {
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Se produjo un error al momento de procesar su solicitud, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial". mysqli_error($con),0);
        exit();
    }

    //creamos las sentencias sql
    $id = mysqli_real_escape_string($con, $_POST['identificador']);
    $sql = "SELECT * FROM academicos_entrada WHERE VISITANTE_ID=${id}";

    //Si ocurre un error durante la consulta avisamos
    if (!($result = mysqli_query($con, $sql))){
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Se produjo un error al momento de procesar su solicitud, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial". mysqli_error($con),0);
        exit();
    }

    //Si no hay un solo usuario asociado a esta matricula, significa que no hay ninguno
    if(mysqli_num_rows($result) !== 1){
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","El usuario que intenta realizar la solicitud no existe. Si cree que esto es un error contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial.",0);
        exit();
    }

    //preparamos las variables
    $campus_code = "'" . mysqli_real_escape_string($con, $_POST['campusreceptor']) . "'";
    $unit_code = "'" . mysqli_real_escape_string($con, $_POST['unidadreceptora']) . "'";
    $period = "'" . mysqli_real_escape_string($con, $_POST['periodoescolar']) . "'";
    $unit_sending_name = "'" . mysqli_real_escape_string($con, $_POST['unidademisora']) . "'";
    $unit_sending_country = "'" . mysqli_real_escape_string($con, $_POST['paisorigen']) . "'";
    $unit_sending_state = "'" . mysqli_real_escape_string($con, $_POST['entidademisora']) . "'";
    $unit_sending_language = "'" . mysqli_real_escape_string($con, $_POST['idiomasdominados']) . "'";
    $date_solicitud = "'" . mysqli_real_escape_string($con, $_POST['fecha_solicitud']) . "'";
    $type = "'" . mysqli_real_escape_string($con, $_POST['tipomovilidad']) . "'";

    $sql = "INSERT INTO movilidad_academica_entrada_temporal (VISITANTE_ID, PERIODO, CAMPUS_ID, UNIDAD_ID, UE, UE_PAIS, UE_ENTIDAD, 
    UE_IDIOMA, TMA_ID, ESTADO) VALUES (${id}, ${period}, ${campus_code}, ${unit_code}, ${unit_sending_name}, ${unit_sending_country}, ${unit_sending_state}, 
    ${unit_sending_language}, ${date_solicitud}, ${type}, 1)";

    //si todo sale bien avisamos al usuario del resultado
    if (mysqli_query($con, $sql)) {
        //id del Movilidad que acaba de ser agregado
        $id = mysqli_insert_id($con);
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","OPERACIÓN EXITOSA","Su solicitud fue agregada de manera exitosa. Si su solicitud es aprobada aparecerá en sus movilidades autorizadas, de lo contrario se le notificará si sigue en espera o no fue aprobada tas la revisión.",0);
    } else {
        //si hay un error tambien avisamos al uusuario
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Se produjo un error al momento de procesar su solicitud, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial". mysqli_error($con),0);
        exit();
    }

?>
