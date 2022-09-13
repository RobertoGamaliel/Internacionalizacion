<?php
	session_start();
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	    header("Location: ../login.php");
	    exit();
	}
	include "connect.php";
	include("PantallaErrorCrearUsiaro.php");
    include("consultas.php");

    $redirect = false;
   
   //comprobacion de campo vacio del id
   if (empty($_POST['matricula'])){
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Uno o más campos del formulario estan vacíos". mysqli_error($con),0);
        exit();
   }

   if(empty($_POST['matricula']) || 
    	empty($_POST['nivel']) || 
    	empty($_POST['programa_clave']) || 
    	empty($_POST['programa_nombre']) || 
    	empty($_POST['area_clave']) || 
    	empty($_POST['area_nombre']) || 
    	empty($_POST['campus_clave']) || 
    	empty($_POST['unidad_clave']) || 
    	empty($_POST['unidad_emisora_nombre']) || 
    	empty($_POST['unidad_emisora_pais']) || 
    	empty($_POST['unidad_emisora_entidad']) || 
    	empty($_POST['unidad_emisora_idioma']) || 
    	empty($_POST['finan_recibio']) || 
    	empty($_POST['finan_monto']) || 
    	empty($_POST['fecha_inicial']) || 
    	empty($_POST['fecha_terminal']) || 
      	empty($_POST['fecha_solicitud']) ||
    	empty($_POST['periodo'])){
    	mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Uno o más campos del formulario no fueron completados, para solicitar la movilidad es necesario llenar todos los campos del formulario",0);
        exit();
    }

   $id = mysqli_real_escape_string($con, $_POST['matricula']);
   $sql = "SELECT * FROM estudiantes_entrada WHERE ESTUDIANTE_ID=${id}";

   if (!($result = mysqli_query($con, $sql))){
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","Se produjo un error al momento de procesar su solicitud, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial". mysqli_error($con),0);
        exit();
   }

   if(mysqli_num_rows($result) !== 1){
        mysqli_close($con);
        PantallaError("../public/assets/UABC_crop.png","ERROR AL SOLICITAR LA MOVILIDAD","El usuario que intenta realizar la solicitud no existe. Si cree que esto es un error contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial.",0);
        exit();
    }

    //Extraemos los datos del alumno para completar los campos que no viene en el formulario pero si en la solicitud de movilidad
    $misDatos=mysqli_fetch_array($result);

    
    $periodo = !empty($_POST['periodo']) ? "'" . mysqli_real_escape_string($con, $_POST['periodo']) . "'" : "NULL";
    $periodo_id= ($_POST['periodo']!="NULL" && strlen($_POST['periodo']) ===6)? substr($_POST['periodo'], 5,6):'0';
    $nombre = "'".$misDatos["ESTUDIANTE"]."'";
    $apellido1 = "'".$misDatos["ESTUDIANTE_APELLIDO1"]."'";
    $apellido2 = "'".$misDatos["ESTUDIANTE_APELLIDO2"]."'";
    $sexo = $misDatos["SEXO"];
    $discap = $misDatos["DISCAPACIDAD"];
    $hIndigena = $misDatos["HABLANTE_INDIGENA"];
    $oIndigena = $misDatos["ORIGEN_INDIGENA"];
    $campus_id = mysqli_real_escape_string($con, $_POST['campus_clave']);
    $campus = "'".campus($campus_id)."'";
    $facultad_id = mysqli_real_escape_string($con, $_POST['unidad_clave']);
    $facultad = "'".facultad($campus_id,$facultad_id)."'";
    $nivel_id =  mysqli_real_escape_string($con, $_POST['nivel']);
    $programa_id = mysqli_real_escape_string($con, $_POST['programa_clave']);
    $programa = "'" . mysqli_real_escape_string($con, $_POST['programa_nombre']) . "'";
    $area_id = mysqli_real_escape_string($con, $_POST['area_clave']);
    $area = "'" . mysqli_real_escape_string($con, $_POST['area_nombre']) . "'";
    $unid = "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_nombre']) . "'";
    $unid_pais = "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_pais']) . "'";
    $unid_entidad = "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_entidad']) . "'";
    $unid_idioma = "'" . mysqli_real_escape_string($con, $_POST['unidad_emisora_idioma']) . "'";
    $finan_id = mysqli_real_escape_string($con, $_POST['finan_recibio']);
    $finan_val = mysqli_real_escape_string($con, $_POST['finan_monto']);
    $date_start = "'" . mysqli_real_escape_string($con, $_POST['fecha_inicial']) . "'";
    $date_solicitud = "'" . mysqli_real_escape_string($con, $_POST['fecha_solicitud']) . "'";
    $date_end = "'" . mysqli_real_escape_string($con, $_POST['fecha_terminal']) . "'";
    
    //armamos la sentencia sql para insertar la movilidad
    $sql = "INSERT INTO intercambio_estudiantil_entrada_temporal(
        ESTUDIANTE_ID, ESTUDIANTE, ESTUDIANTE_APELLIDO1, ESTUDIANTE_APELLIDO2, SEXO_ID, DISCAPACIDAD, HABLANTE_INDIGENA,
        ORIGEN_INDIGENA, PERIODO_ID, PERIODO, CAMPUS_ID, CAMPUS_DESC, UNIDAD_ID, UNIDAD,
        NIVEL_ID, PROGRAMA_ID, PROGRAMA_DESC, AREA_ID, AREA, UNID, UNID_PAIS,
        UNID_ENTIDAD, UNID_IDIOMA, FINAN_ID, FINAN_VAL, DATE_START, DATE_END) 
        VALUES(
        ${id}, ${nombre}, ${apellido1}, ${apellido2}, ${sexo}, ${discap}, ${hIndigena},
        ${oIndigena}, ${periodo_id}, ${periodo}, ${campus_id}, ${campus}, ${facultad_id}, ${facultad},
        ${nivel_id}, ${programa_id}, ${programa}, ${area_id}, ${area}, ${unid},${unid_pais}, 
        ${unid_entidad}, ${unid_idioma}, ${finan_id}, ${finan_val}, ${date_start}, ${date_end}), ${date_solicitud}";

    if (mysqli_query($con, $sql)) {
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
