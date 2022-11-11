<?php
//Este archivo realiza consultas a la base de datos para revisr las solictudes temporales y aceptadas de acuerdo al tipo de usuario. Cada funcion hace un tipo de consulta exclusiva para
//usuarios de orden administrativos con admin = 1, 2, 3, 4 y 5


	///CONSULTAS A SOLICITUDES DE MOVILIDAD HECHAS POR NO ADMINISTRATIVOS ///

	//Consulta las solicitudes de movilidad hechas por estuddiantes que desean visitar UABC
	function requestStudentVisitor(){
		$table= 'intercambio_estudiantil_entrada_temporal';
		$queryResult = queryTable($table);
		return $queryResult;
		
	}

	//Consulta las solicitudes de movilidad hechas por estuddiantes de UABC para ir a otra universidad
	function requestStudentUABC(){
		$table= 'intercambio_estudiantil_salida_temporal';
		$queryResult = queryTable($table);
		return $queryResult;
		
	}

	//Consulta las solicitudes de movilidad hechas por académicos que desan viisitar UABC
	function requestAcadVisitor(){
		$table= 'movilidad_academica_entrada_temporal';
		$queryResult = queryTable($table);
		return $queryResult;
		
	}

	//Consulta las solicitudes de movilidad hechas por académicos de UABC para ir a otra universidad
	function requestAcadUABC(){
		$table= 'movilidad_academica_salida_temporal';
		$queryResult = queryTable($table);
		return $queryResult;
		
	}

	//CONSULTAS A MOVILIDADES APROBADAS///

	//Consulta las solicitudes de movilidad aprobadas para estuddiantes que desean visitar UABC
	function studentsVisitors(){
		$table= 'intercambio_estudiantil_entrada';
		$queryResult = queryRegister($table,'CAMPUS_ID',$_SESSION['admin']);
		return $queryResult;
		
	}

	//Consulta las solicitudes de movilidad aprobadas para estuddiantes de UABC para ir a otra universidad
	function studentsUABC(){
		$table= 'intercambio_estudiantil_salida';
		$queryResult = queryRegister($table,'CAMPUS_ID',$_SESSION['admin']);
		return $queryResult;
		
	}

	//Consulta las solicitudes de movilidad aprobadas para académicos que desan viisitar UABC
	function academicsVisitors(){
		$table= 'movilidad_academica_entrada';
		$queryResult = queryRegister($table,'CAMPUS_ID',$_SESSION['admin']);
		return $queryResult;
		
	}

	//Consulta las solicitudes de movilidad aprobadas para académicos de UABC para ir a otra universidad
	function academicsUABC(){
		$table= 'movilidad_academica_salida';
		$queryResult = queryRegister($table,'CAMPUS_ID',$_SESSION['admin']);
		return $queryResult;
		
	}

	//Esta funcion recibe el nombre de la tabla que se desea consultar, evalua si el usuario es administrativo
	//Si lo es verifica el tipo deadministrativo para hacer la consulta adecuada y retornaa el resultado
	function queryTable($table){
		//Evaluamos que el usuario es administrativo
		if($_SESSION['admin'] < 1 || $_SESSION['admin'] > 5) return;

		//Si el usuario es administrativo abrimos la conexión a la BD
		include "../../php-partials/connect.php";
		$query;

		//Consulta para administrador del campus
		if( $_SESSION['admin']<=3 ){
			$sql = "SELECT * FROM ${table} WHERE CAMPUS_ID = ${_SESSION['admin']} AND ESTADO = 1";
			$query = mysqli_query($con, $sql);
		}
		//Consulta para administrdor general y super usuario
		else if( $_SESSION['admin']>=4 ){
			$sql = "SELECT * FROM ${table} WHERE  ESTADO = 1";
			$query = mysqli_query($con, $sql);
		}

		//Cerramos la conexion a la base de datos y retornamos el resultado de la consulta
		mysqli_close($con);
		return $query;
	}

    //Consulta una entrada especifica de una tabla
	function queryRegister($table,$column,$value){
		//Evaluamos que el usuario es administrativo
		if($_SESSION['admin'] < 1 || $_SESSION['admin'] > 5) return;

		//Si el usuario es administrativo abrimos la conexión a la BD
		include "../../php-partials/connect.php";
		$query;

		$sql = "SELECT * FROM ${table} WHERE ${column} = ${value}";
		$query = mysqli_query($con, $sql);
		

		//Cerramos la conexion a la base de datos y retornamos el resultado de la consulta
		mysqli_close($con);
		return $query;
	}

	function deleteRegister($table,$column,$value){
		//Evaluamos que el usuario es administrativo y que pueda alterar registros
		if($_SESSION['admin']!=4 || $_SESSION['admin'] < 1 || $_SESSION['admin'] > 5) return;

		//Si el usuario es administrativo abrimos la conexión a la BD
		include "../../php-partials/connect.php";
		$query;

		$sql = "DELETE FROM ${table} WHERE ${column} = ${value}";
		mysqli_query($con, $sql);
		mysqli_close($con);
		retrun;
	}

?>