<?php 
//Este archivo contiene las funciones para realizar consultas por parte de los usuarios no administrativos

   //Consulta una entrada especifica de una tabla
	function queryRegister(){
		//Evaluamos que el usuario es no administrativo
		if($_SESSION['admin'] < 7 ||
		$_SESSION['admin'] > 10 ||
		!$_SESSION['admin']||
		$_SESSION['admin'] === null){
			return;
		}

		if($_SESSION['admin'] == 9) {
			$resp = students("intercambio_estudiantil_entrada",
				"intercambio_estudiantil_entrada_temporal",
				$_SESSION['matricula']);
			return $resp;
		}else if($_SESSION['admin'] == 10){
			$resp = students("intercambio_estudiantil_salida",
				"intercambio_estudiantil_salida_temporal",
				$_SESSION['matricula']);
			return $resp;
		}

	}


	function students($table,$tableRequest, $id){
		//abrimos la conexión a la BD
		include "../php-partials/connect.php";

		$date_solicitud = "'".date('Y-m-d')."'"; //Fecha del dia de hoy
		
		//Consultas de movilidades autorizadas ya cumplidas o vencidas
		$sqlPast = "SELECT * FROM ${table} WHERE DATE_END < ${date_solicitud} AND ESTUDIANTE_ID = ${id} ORDER BY DATE_START";
		$queryPast = mysqli_query($con, $sqlPast);

		//Consulta de movilidades autorizadas en curso o proximas a comenzar
		$sqlActual = "SELECT * FROM ${table} WHERE DATE_END >= ${date_solicitud} AND ESTUDIANTE_ID = ${id} ORDER BY DATE_START";
		$queryActual = mysqli_query($con, $sqlActual);

		//Consulta de solicitudes 
		$sqlRequest = "SELECT * FROM ${tableRequest} WHERE ESTUDIANTE_ID = ${id} ORDER BY DATE_START";
		$queryRequest = mysqli_query($con, $sqlRequest);

		//Cerramos la conexión 
		mysqli_close($con);

		//Retornamos los resultados
		return ["past" => $queryPast, "actual" => $queryActual, "request" => $queryRequest];
	}

	
?>

    