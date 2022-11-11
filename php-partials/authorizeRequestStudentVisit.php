<?php
//Este archivo inserta una solicitud de movlidad de alumno visitante en la tabla se solicitudes autorizadas.
    //Verificar que el formulario no tiene campos vacios
    if(empty($_POST['identificador']) ||
    	empty($_POST['paterno']) ||
    	empty($_POST['materno']) ||
    	empty($_POST['nombre']) ||
    	empty($_POST['sexo']) ||
    	empty($_POST['discapacidad']) ||
    	empty($_POST['lengua_indigena']) ||
    	empty($_POST['origen_indigena']) ||
    	empty($_POST['campus_clave']) ||
    	empty($_POST['campus_nombre']) ||
    	empty($_POST['unidad_clave']) ||
    	empty($_POST['unidad_nombre'])||
    	empty($_POST['periodo']) ||
    	empty($_POST['nivel']) ||
    	empty($_POST['unidad_emisora_nombre']) ||
    	empty($_POST['unidad_emisora_pais']) ||
    	empty($_POST['unidad_emisora_entidad']) ||
    	empty($_POST['unidad_emisora_idioma']) ||
    	empty($_POST['programa_clave']) ||
    	empty($_POST['programa_nombre']) ||
    	empty($_POST['area_clave']) ||
    	empty($_POST['area_nombre']) ||
    	empty($_POST['finan_recibio']) ||
    	empty($_POST['finan_monto']) ||
    	empty($_POST['fecha_inicial']) ||
    	empty($_POST['fecha_terminal'])){
    		include("PantallaErrorCrearUsiaro.php");
    		PantallaError("../public/assets/UABC_crop.png","ERROR AL AUTORIZAR LA MOVILIDAD","Uno o más campos del formulario no fueron completados, para autorizar la movilidad es necesario llenar todos los campos del formulario ".$_POST['programa_nombre'],0);
        exit();
    }

    //Verificamos que el estudiante realmente existe
	include "../querys/querysAdmins.php";
	include "connect.php";
	$id = mysqli_real_escape_string($con,$_POST['identificador']);
	$sql = "SELECT * FROM perfil_estudiantes_entrada WHERE VISITANTE_ID = ${id}";
    
	//En caso de error o que no haya registros o que existan mas de uno
    if(!$result = mysqli_query($con, $sql)){
    	mysqli_close($con);
    	include("PantallaErrorCrearUsiaro.php");
    	PantallaError("../public/assets/UABC_crop.png","ERROR AL AUTORIZAR LA MOVILIDAD","Se produjo un error al momento de procesar la autorización, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial". mysqli_error($con),0);
    	exit();
    }

    //Si existen mas o menos de un solo registro algo esta mal alli y negamos la autorización
    if(mysqli_num_rows($result) !== 1){
    	mysqli_close($con);
    	include("PantallaErrorCrearUsiaro.php");
        PantallaError("../public/assets/UABC_crop.png","ERROR AL AUTORIZAR LA MOVILIDAD","El usuario de la solicitud no existe. Si cree que esto es un error contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial.",0);
        exit();
    }


    //Preparamos las variables que utilizaremos para la insercion del registro
    $periodo = "'".mysqli_real_escape_string($con, $_POST['periodo'])."'";
    $periodo_id = strlen($_POST['periodo']) === 6? substr($_POST['periodo'], 5,6):'0';
    $campus_id = mysqli_real_escape_string($con,$_POST['campus_clave']);
    $campus_desc = "'".mysqli_real_escape_string($con,$_POST['campus_nombre'])."'";
    $unidad_id = mysqli_real_escape_string($con,$_POST['unidad_clave']);
    $unidad = "'".mysqli_real_escape_string($con,$_POST['unidad_nombre'])."'";
    $nivel_id = mysqli_real_escape_string($con,$_POST['nivel']);
     //Esto se debe separar en una función aparte
    $nivel;
    if($nivel_id == 1) $nivel = "'Licenciatura'";
    else if($nivel_id == 2) $nivel = "'Especialidad'";
    else if($nivel_id == 3) $nivel = "'Maestría'";
    else if($nivel_id == 4) $nivel = "'Doctorado'";
    else $nivel = "NULL"; //esto hara que la base de datos no acepte la entrada

    $programa_id = mysqli_real_escape_string($con,$_POST['programa_clave']);
    $programa_desc = "'".mysqli_real_escape_string($con,$_POST['programa_nombre'])."'";
    $area_id = mysqli_real_escape_string($con,$_POST['area_clave']);
    $area = "'".mysqli_real_escape_string($con,$_POST['area_nombre'])."'";
    $estudiante = "'".mysqli_real_escape_string($con,$_POST['nombre'])."'";
    $estudiante_apellido1 = "'".mysqli_real_escape_string($con,$_POST['paterno'])."'";
    $estudiante_apellido2 = "'".mysqli_real_escape_string($con,$_POST['materno'])."'";
    $sexo_id = mysqli_real_escape_string($con,$_POST['sexo']);

    //Esto se debe separa en una funcion aparte
    $sexo;
    if($sexo_id == 1) $sexo ="'Masculino'";
    else if($sexo_id == 2) $sexo ="'Femenino'";
    else $sexo = "'Otro'";

    $discapacidad = mysqli_real_escape_string($con,$_POST['discapacidad']);
    $hablante_indigena = mysqli_real_escape_string($con,$_POST['lengua_indigena']);
    $origen_indigena = mysqli_real_escape_string($con,$_POST['origen_indigena']);
    $ue = "'".mysqli_real_escape_string($con,$_POST['unidad_emisora_nombre'])."'";
    $ue_pais = "'".mysqli_real_escape_string($con,$_POST['unidad_emisora_pais'])."'";
    $ue_entidad = "'".mysqli_real_escape_string($con,$_POST['unidad_emisora_entidad'])."'";
    $ue_idioma = "'".mysqli_real_escape_string($con,$_POST['unidad_emisora_idioma'])."'";
    $finan_id = mysqli_real_escape_string($con,$_POST['finan_recibio']);
    $finan_val = mysqli_real_escape_string($con,$_POST['finan_monto']);
    $date_start =  "'".mysqli_real_escape_string($con,$_POST['fecha_inicial'])."'";
    $date_end = "'".mysqli_real_escape_string($con,$_POST['fecha_terminal'])."'";

    //Preparamos la sentencia sql para la inserción
    $sql = "INSERT INTO intercambio_estudiantil_entrada (
    	PERIODO_ID, PERIODO, CAMPUS_ID, CAMPUS_DESC, UNIDAD_ID, UNIDAD, NIVEL_ID, NIVEL, 
    	PROGRAMA_ID, PROGRAMA_DESC, AREA_ID, AREA, ESTUDIANTE_ID, ESTUDIANTE, ESTUDIANTE_APELLIDO1, ESTUDIANTE_APELLIDO2,
    	SEXO_ID, SEXO, DISCAPACIDAD, HABLANTE_INDIGENA, ORIGEN_INDIGENA,
    	UE, UE_PAIS, UE_ENTIDAD, UE_IDIOMA, FINAN_ID, FINAN_VAL, DATE_START, DATE_END) VALUES(
    	${periodo_id}, ${periodo}, ${campus_id}, ${campus_desc}, ${unidad_id}, ${unidad}, ${nivel_id}, ${nivel},
    	${programa_id}, ${programa_desc}, ${area_id}, ${area}, ${id}, ${estudiante}, ${estudiante_apellido1}, ${estudiante_apellido2},
    	${sexo_id}, ${sexo}, ${discapacidad}, ${hablante_indigena}, ${origen_indigena},
    	${ue}, ${ue_pais}, ${ue_entidad}, ${ue_idioma}, ${finan_id}, ${finan_val}, ${date_start}, ${date_end})";

    //Ejecutamos la sentencia sql
    if (mysqli_query($con, $sql)) {
    	//si se realiza de manera exitosa, borramos el registro temporal
    	deleteRegister('intercambio_estudiantil_entrada_temporal','ESTUDIANTE_ID',$id);

    	//cerramos la conexion conla base de datos y volvemos a la pagina de consulta de estudiantes
    	mysqli_close($con);
    	header("location: ../estudiantes/entrada/consulta_estudiantes.php");
    	exit();
    }

    //Si la ejecucion fue incorrecta, cerramos la conexion y avisamos al usuario 
    mysqli_close($con);
    include("PantallaErrorCrearUsiaro.php");
    PantallaError("../public/assets/UABC_crop.png","ERROR AL AUTORIZAR LA MOVILIDAD","Ocurrió un error al autorizar la movilidad, si el problema persiste, contactenos. Encontrará los teléfonos y correos para contactarnos en la página inicial.",0);
        exit()
 	
	
?>