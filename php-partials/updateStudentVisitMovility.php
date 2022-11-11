<?php //actualizar un intercambio de entrada

//Revisamos que los campos del formulario contengan datos
if(empty($_POST["registro"]) ||
empty($_POST['matricula']) ||
empty($_POST['unidad_emisora_nombre']) ||
empty($_POST['unidad_emisora_pais']) ||
empty($_POST['unidad_emisora_entidad']) ||
empty($_POST['unidad_emisora_idioma']) ||
empty($_POST['finan_recibio']) ||
empty($_POST['finan_monto']) ||
empty($_POST['fecha_inicial']) ||
empty($_POST['fecha_terminal']) ||
empty($_POST['periodo']) ||
empty($_POST['unidad_receptora']) ||
empty($_POST['facultad_receptora']) ||
empty($_POST['programa_clave']) ||
empty($_POST['programa_nombre'])||
empty($_POST['area_clave']) ||
empty($_POST['area_nombre'])){
    //Si uno o más campos estan vacios devovemos la pantalla de error y salimos de la ejecución
    include("PantallaErrorCrearUsiaro.php");
    PantallaError("../public/assets/UABC_crop.png","ERROR AL AUTORIZAR LA MOVILIDAD","Uno o más campos del formulario no fueron completados, para autorizar la movilidad es necesario llenar todos los campos del formulario ".$_POST['programa_nombre'],0);
    exit();
}

//Incluimos el archivo que nos permitirá hacer consultas y conexión con la base de datos
include "../querys/querysAdmins.php";
include "connect.php";
//Obtenemos el id del estudiante desde el formulario
$id = mysqli_real_escape_string($con,$_POST['matricula']);
//Consulaamos si ese estudiante realmente existe
$sql = "SELECT * FROM perfil_estudiantes_entrada WHERE VISITANTE_ID = ${id}";

//En caso de error, cerramos la conexión y retornamos una pantalla de error
if(!$result = mysqli_query($con, $sql)){
    mysqli_close($con);
    include("PantallaErrorCrearUsiaro.php");
    PantallaError("../public/assets/UABC_crop.png","ERROR AL AUTORIZAR LA MOVILIDAD","Se produjo un error al momento de procesar la autorización, si el problema persiste contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial". mysqli_error($con),0);
    exit();
}

//Si existen más, o menos, de un solo registro, algo esta mal alli y negamos la autorización
if(mysqli_num_rows($result) !== 1){
    mysqli_close($con);
    include("PantallaErrorCrearUsiaro.php");
    PantallaError("../public/assets/UABC_crop.png","ERROR AL AUTORIZAR LA MOVILIDAD","El usuario de la solicitud no existe. Si cree que esto es un error contáctenos. Encontrará los teléfonos y correos para contactarnos en la página inicial.",0);
    exit();
}

//En este archivo estan algunas fucniones para mantener aqui el código limpio
include "../querys/querysKeys.php";
//Preparamos las variables que utilizaremos para la insercion del registro
$register = mysqli_real_escape_string($con,$_POST["registro"]);
$periodo = "'".mysqli_real_escape_string($con,$_POST['periodo'])."'";
$perido_id = getPeriod($_POST['periodo']);
$campus_desc = "'".mysqli_real_escape_string($con, $_POST['unidad_receptora'])."'";
$campus_id = campusKey($_POST['unidad_receptora']);
$facultad_name = "'".mysqli_real_escape_string($con,$_POST['facultad_receptora'])."'";
$facultad_id = facultadKey($_POST['facultad_receptora']);
$nivel_id = mysqli_real_escape_string($con,$_POST['nivel']);
$nivel = "'".nivelName($nivel_id)."'";

$programa_id = mysqli_real_escape_string($con,$_POST['programa_clave']);
$programa_desc = "'".mysqli_real_escape_string($con,$_POST['programa_nombre'])."'";
$area_id = mysqli_real_escape_string($con,$_POST['area_clave']);
$area_desc = "'".mysqli_real_escape_string($con,$_POST['area_nombre'])."'";

$UEmisora = "'".mysqli_real_escape_string($con, $_POST['unidad_emisora_nombre'])."'";
$UEPais = "'".mysqli_real_escape_string($con, $_POST['unidad_emisora_pais'])."'";
$UEEntidad = "'".mysqli_real_escape_string($con, $_POST['unidad_emisora_entidad'])."'";
$UEIdioma = "'".mysqli_real_escape_string($con, $_POST['unidad_emisora_idioma'])."'";
$finan_id = mysqli_real_escape_string($con,$_POST['finan_recibio']);
$finan_val = mysqli_real_escape_string($con,$_POST['finan_monto']);
$fecha_inicial = "'".mysqli_real_escape_string($con,$_POST['fecha_inicial'])."'";
$fecha_terminal = "'".mysqli_real_escape_string($con,$_POST['fecha_terminal'])."'";


//Preparamos la sentencia sql para la inserción
$sql = "UPDATE intercambio_estudiantil_entrada SET
    PERIODO_ID=${perido_id},
    PERIODO = ${periodo},
    CAMPUS_ID = ${campus_id},
    CAMPUS_DESC = ${campus_desc},
    UNIDAD_ID = ${facultad_id},
    UNIDAD = ${facultad_name},
    NIVEL_ID = ${nivel_id},
    NIVEL = ${nivel}, 
    PROGRAMA_ID = ${programa_id},
    PROGRAMA_DESC = ${programa_desc},
    AREA_ID = ${area_id},
    AREA = ${area_desc},
    UE = ${UEmisora},
    UE_PAIS = ${UEPais},
    UE_ENTIDAD = ${UEEntidad},
    UE_IDIOMA = ${UEIdioma},
    FINAN_ID = ${finan_id},
    FINAN_VAL = ${finan_val},
    DATE_START = ${fecha_inicial},
    DATE_END = ${fecha_terminal}
    WHERE ID = ${register}";

//Ejecutamos la sentencia sql
if (mysqli_query($con, $sql)) {
    //cerramos la conexion conla base de datos y volvemos a la pagina de consulta de intercambios
    mysqli_close($con);
    header("location: ../estudiantes/entrada/consulta_intercambios.php");
    exit();
}

//Si la ejecucion fue incorrecta, cerramos la conexion y avisamos al usuario 
mysqli_close($con);
include("PantallaErrorCrearUsiaro.php");
PantallaError("../public/assets/UABC_crop.png","ERROR AL MODIFICAR LA MOVILIDAD","Ocurrió un error al modificar la movilidad, si el problema persiste, contactenos. Encontrará los teléfonos y correos para contactarnos en la página inicial.",0);
    exit()
    


?>