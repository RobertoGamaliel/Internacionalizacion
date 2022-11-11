<?php 

function campusKey($campusNamme){
	if($campusNamme === "Mexicali") return '1';
	else if($campusNamme === "Tijuana") return '2';
	else if($campusNamme === "Ensenada") return '3';
	else return 0;
}

function campusName($key){
	if($key === '1') return "Mexicali";
	else if($key === '2') return "Tijuana";
	else if($key === '3') return "Ensenada";
	else return "";
}

function facultadName($compusID,$facID){
	switch($campusID){
		case '1': return facultadMexicali($facID); break;
		case '2': return facultadTijuana($facID); break;
		case '3': return facultadEnsenadaa($facID); break;
	}
	return "";
}

function getPeriod($period){
	if(substr($period, 5,6)==1) return '1';
	else return '2';
}

function nivelName($nivelID){
	switch($nivelID){
		case '1': return "Licenciatura"; break;
		case '2': return "Especialidad"; break;
		case '3': return "Maestría"; break;
		case '4': return "Doctorado"; break;
	}
	return "";
}

function facultadMexicali($idFac){
	switch($idFac){
		case '1': return "FACULTAD DE ARQUITECTURA Y DISEÑO"; break;
		case '10': return "INSTITUTO DE CIENCIAS AGRÍCOLAS"; break;
		case '40': return "FACULTAD DE CIENCIAS HUMANAS"; break;
		case '80': return "FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS"; break;
		case '90': return "FACULTAD DE CIENCIAS ADMINISTRATIVAS"; break;
		case '110': return "FACULTAD DE DERECHO"; break;
		case '111': return "INSTITUTO DE INGENIERÍA"; break;
		case '123': return "FACULTAD DE DEPORTES"; break;
		case '124': return "FACULTAD DE ARTES"; break;
		case '140': return "FACULTAD DE INGENIERÍA"; break;
		case '160': return "FACULTAD DE MEDICINA"; break;
		case '165': return "CENTRO DE EDUCACIÓN ABIERTA Y A DISTANCIA"; break;
		case '200': return "INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS"; break;
		case '220': return "FACULTAD DE ODONTOLOGÍA"; break;
		case '260': return "FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA"; break;
		case '300': return "FACULTAD DE ENFERMERÍA"; break;
		case '310': return "FACULTAD DE IDIOMAS"; break;
		case '335': return "UNIDAD CIENCIAS DE LA SALUD"; break;
		case '600': return "DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS"; break;
		case '605': return "INSTITUTO DE INVESTIGACIONES SOCIALES"; break;
		case '625': return "INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO"; break;
		case '2': return "FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA"; break;
		case '125': return "FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)"; break;
		case '126': return "FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)"; break;
	}
	return "";

}

function facultadTijuana($idFac){
	switch($idFac){
		case '70': return "FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA"; break;
		case '100': return "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN"; break;
		case '120': return "FACULTAD DE DERECHO"; break;
		case '130': return "FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES"; break;
		case '150': return "FACULTAD DE DEPORTES"; break;
		case '180': return "FACULTAD DE MEDICINA Y PSICOLOGÍA"; break;
		case '500': return "UNIDAD UNIVERSITARIA EN ROSARITO"; break;
		case '190': return "FACULTAD DE ARTES"; break;
		case '240': return "FACULTAD DE ODONTOLOGÍA"; break;
		case '280': return "FACULTAD DE TURISMO Y MERCADOTECNIA"; break;
		case '311': return "FACULTAD DE IDIOMAS"; break;
		case '313': return "FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)"; break;
		case '333': return "FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA"; break;
		case '336': return "CENTRO UNIVERSITARIO DE EDUCACIÓN EN SALUD"; break;
		case '626': return "INSTITUTO DE INVESTIGACIONES HISTÓRICAS"; break;
		case '790': return "FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES"; break;
		case '400': return "FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES"; break;
		case '332': return "FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA"; break;
		case '334': return "FACULTAD DE CIENCIAS DE LA SALUD"; break;
	}
	return "";
}

function facultadEnsenadaa($idFac){
	switch($idFac){
		case '20': return "FACULTAD DE ARTES"; break;
		case '30': return "FACULTAD DE CIENCIAS"; break;
		case '50': return "FACULTAD DE CIENCIAS MARINAS"; break;
		case '170': return "FACULTAD DE DEPORTES"; break;
		case '290': return "FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO"; break;
		case '312': return "FACULTAD DE IDIOMAS"; break;
		case '320': return "ESCUELA DE CIENCIAS DE LA SALUD"; break;
		case '330': return "FACULTAD DE ENOLOGÍA Y GASTRONOMÍA"; break;
		case '331': return "FACULTAD DE ARQUITECTURA Y DISEÑO ENSENADA"; break;
		case '615': return "INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO"; break;
		case '620': return "INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS"; break;
		case '795': return "FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES"; break;
		case '801': return "ESCUELA DE ENFERMERÍA MIGUEL SERVET"; break;
		case '700': return "FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN"; break;
	}
	return "";    
}

function facultadKey($facultadName){
	$facultadKey="0";
	switch($facultadName){
		case "FACULTAD DE ARQUITECTURA Y DISEÑO": $facultadKey = '1'; break;
		case "INSTITUTO DE CIENCIAS AGRÍCOLAS": $facultadKey = '10'; break;
		case "FACULTAD DE CIENCIAS HUMANAS": $facultadKey = '40'; break;
		case "FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS": $facultadKey = '80'; break;
		case "FACULTAD DE CIENCIAS ADMINISTRATIVAS": $facultadKey = '90'; break;
		case "FACULTAD DE DERECHO": $facultadKey = '110'; break;
		case "INSTITUTO DE INGENIERÍA": $facultadKey = '111'; break;
		case "FACULTAD DE DEPORTES": $facultadKey = '123'; break;
		case "FACULTAD DE ARTES": $facultadKey = '124'; break;
		case "FACULTAD DE INGENIERÍA": $facultadKey = '140'; break;
		case "FACULTAD DE MEDICINA": $facultadKey = '160'; break;
		case "CENTRO DE EDUCACIÓN ABIERTA Y A DISTANCIA": $facultadKey = '165'; break;
		case "INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS": $facultadKey = '200'; break;
		case "FACULTAD DE ODONTOLOGÍA": $facultadKey = '220'; break;
		case "FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA": $facultadKey = '260'; break;
		case "FACULTAD DE ENFERMERÍA": $facultadKey = '300'; break;
		case "FACULTAD DE IDIOMAS": $facultadKey = '310'; break;
		case "UNIDAD CIENCIAS DE LA SALUD": $facultadKey = '335'; break;
		case "DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS": $facultadKey = '600'; break;
		case "INSTITUTO DE INVESTIGACIONES SOCIALES": $facultadKey = '605'; break;
		case "INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO": $facultadKey = '625'; break;
		case "FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA": $facultadKey = '2'; break;
		case "FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)": $facultadKey = '125'; break;
		case "FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)": $facultadKey = '126'; break;
		case "FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA": $facultadKey = '70'; break;
		case "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN": $facultadKey = '100'; break;
		case "FACULTAD DE DERECHO": $facultadKey = '120'; break;
		case "FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES": $facultadKey = '130'; break;
		case "FACULTAD DE DEPORTES": $facultadKey = '150'; break;
		case "FACULTAD DE MEDICINA Y PSICOLOGÍA": $facultadKey = '180'; break;
		case "UNIDAD UNIVERSITARIA EN ROSARITO": $facultadKey = '500'; break;
		case "FACULTAD DE ARTES": $facultadKey = '190'; break;
		case "FACULTAD DE ODONTOLOGÍA": $facultadKey = '240'; break;
		case "FACULTAD DE TURISMO Y MERCADOTECNIA": $facultadKey = '280'; break;
		case "FACULTAD DE IDIOMAS": $facultadKey = '311'; break;
		case "FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)": $facultadKey = '313'; break;
		case "FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA": $facultadKey = '333'; break;
		case "CENTRO UNIVERSITARIO DE EDUCACIÓN EN SALUD": $facultadKey = '336'; break;
		case "INSTITUTO DE INVESTIGACIONES HISTÓRICAS": $facultadKey = '626'; break;
		case "FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES": $facultadKey = '790'; break;
		case "FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES": $facultadKey = '400'; break;
		case "FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA": $facultadKey = '332'; break;
		case "FACULTAD DE CIENCIAS DE LA SALUD": $facultadKey = '334'; break;
		case "FACULTAD DE ARTES": $facultadKey = '20'; break;
		case "FACULTAD DE CIENCIAS": $facultadKey = '30'; break;
		case "FACULTAD DE CIENCIAS MARINAS": $facultadKey = '50'; break;
		case "FACULTAD DE DEPORTES": $facultadKey = '170'; break;
		case "FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO": $facultadKey = '290'; break;
		case "FACULTAD DE IDIOMAS": $facultadKey = '312'; break;
		case "ESCUELA DE CIENCIAS DE LA SALUD": $facultadKey = '320'; break;
		case "FACULTAD DE ENOLOGÍA Y GASTRONOMÍA": $facultadKey = '330'; break;
		case "FACULTAD DE ARQUITECTURA Y DISEÑO ENSENADA": $facultadKey = '331'; break;
		case "INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO": $facultadKey = '615'; break;
		case "INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS": $facultadKey = '620'; break;
		case "FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES": $facultadKey = '795'; break;
		case "ESCUELA DE ENFERMERÍA MIGUEL SERVET": $facultadKey = '801'; break;
		case "FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN": $facultadKey = '700'; break;
	}
	return $facultadKey;
}

?>