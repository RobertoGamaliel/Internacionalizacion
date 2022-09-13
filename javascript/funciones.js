function campus(campus) {
    if (campus == 1) return "Mexicali";
    if (campus == 2) return "Tijuana";
    if (campus == 3) return "Ensenada";
    return "";
}

function campusById(code) {

    if (code == '1') return 1;
    if (code == '10') return 1;
    if (code == '40') return 1;
    if (code == '80') return 1;
    if (code == '90') return 1;
    if (code == '110') return 1;
    if (code == '111') return 1;
    if (code == '123') return 1;
    if (code == '124') return 1;
    if (code == '140') return 1;
    if (code == '160') return 1;
    if (code == '200') return 1;
    if (code == '220') return 1;
    if (code == '260') return 1;
    if (code == '300') return 1;
    if (code == '310') return 1;
    if (code == '335') return 1;
    if (code == '605') return 1;
    if (code == '625') return 1;
    if (code == '2') return 1;
    if (code == '125') return 1;
    if (code == '126') return 1;


    if (code == '100') return 2;
    if (code == '120') return 2;
    if (code == '130') return 2;
    if (code == '150') return 2;
    if (code == '180') return 2;
    if (code == '500') return 2;
    if (code == '190') return 2;
    if (code == '240') return 2;
    if (code == '280') return 2;
    if (code == '311') return 2;
    if (code == '313') return 2;
    if (code == '626') return 2;
    if (code == '790') return 2;
    if (code == '400') return 2;
    if (code == '332') return 2;
    if (code == '334') return 2;

    if (code == '20') return 3;
    if (code == '30') return 3;
    if (code == '50') return 3;
    if (code == '170') return 3;
    if (code == '290') return 3;
    if (code == '312') return 3;
    if (code == '320') return 3;
    if (code == '330') return 3;
    if (code == '615') return 3;
    if (code == '620') return 3;
    if (code == '795') return 3;
    if (code == '700') return 3;



}

function facultad(campus, code) {
    if (campus == 1) {
        if (code == "1") return "FACULTAD DE ARQUITECTURA Y DISEÑO";
        if (code == '10') return 'INSTITUTO DE CIENCIAS AGRÍCOLAS';
        if (code == '40') return 'FACULTAD DE CIENCIAS HUMANAS';
        if (code == '80') return 'FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS';
        if (code == '90') return 'FACULTAD DE CIENCIAS ADMINISTRATIVAS';
        if (code == '110') return 'FACULTAD DE DERECHO';
        if (code == '111') return 'INSTITUTO DE INGENIERÍA';
        if (code == '123') return 'FACULTAD DE DEPORTES';
        if (code == '124') return 'FACULTAD DE ARTES';
        if (code == '140') return 'FACULTAD DE INGENIERÍA';
        if (code == '160') return 'FACULTAD DE MEDICINA';
        if (code == '200') return 'INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS';
        if (code == '220') return 'FACULTAD DE ODONTOLOGÍA';
        if (code == '260') return 'FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA';
        if (code == '300') return 'FACULTAD DE ENFERMERÍA';
        if (code == '310') return 'FACULTAD DE IDIOMAS';
        if (code == '335') return 'UNIDAD CIENCIAS DE LA SALUD';
        if (code == '605') return 'INSTITUTO DE INVESTIGACIONES SOCIALES';
        if (code == '625') return 'INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO';
        if (code == '2') return 'FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA';
        if (code == '125') return 'FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)';
        if (code == '126') return 'FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)';
        return 'FACULTAD DE DEPORTES';
    } else if (campus == 2) {
        if (code == '70') return 'FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA';
        if (code == '100') return 'FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN';
        if (code == '120') return 'FACULTAD DE DERECHO';
        if (code == '130') return 'FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES';
        if (code == '150') return 'FACULTAD DE DEPORTES';
        if (code == '180') return 'FACULTAD DE MEDICINA Y PSICOLOGÍA';
        if (code == '500') return '>UNIDAD UNIVERSITARIA EN ROSARITO';
        if (code == '190') return 'FACULTAD DE ARTES';
        if (code == '240') return 'FACULTAD DE ODONTOLOGÍA';
        if (code == '280') return 'FACULTAD DE TURISMO Y MERCADOTECNIA';
        if (code == '311') return 'FACULTAD DE IDIOMAS';
        if (code == '313') return 'FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)';
        if (code == '626') return 'INSTITUTO DE INVESTIGACIONES HISTÓRICAS';
        if (code == '790') return 'FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES';
        if (code == '400') return 'FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES';
        if (code == '332') return 'FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA';
        if (code == '334') return 'FACULTAD DE CIENCIAS DE LA SALUD';
        return '';
    } else if (campus == 3) {
        if (code == '20') return 'FACULTAD DE ARTES';
        if (code == '30') return 'FACULTAD DE CIENCIAS';
        if (code == '50') return 'FACULTAD DE CIENCIAS MARINAS';
        if (code == '170') return 'FACULTAD DE DEPORTES';
        if (code == '290') return 'FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO';
        if (code == '312') return 'FACULTAD DE IDIOMAS';
        if (code == '320') return 'ESCUELA DE CIENCIAS DE LA SALUD';
        if (code == '330') return 'FACULTAD DE ENOLOGÍA Y GASTRONOMÍA';
        if (code == '615') return 'INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO';
        if (code == '620') return 'INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS';
        if (code == '795') return 'FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES';
        if (code == '700') return 'FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN';
        return '';
    }
    return '';
}

function periodos(form) {
    //Agrega los periodos disposnibles en los proximos 7 años

    const fecha = new Date();
    const anio = fecha.getFullYear();

    var form = document.getElementById("periodoescolar");

    if (fecha.getMonth() >= 5) {
        //Este periodo es cuando se termina el primer semestre del año
        var childs = `<option value="${anio}-2"> ${anio}-2 </option>`;

        for (var i = 1; i < 7; i++) {
            childs += `<option value="${anio + i}-1"> ${anio + i}-1 </option>`;
            childs += `<option value="${anio + i}-2"> ${anio + i}-2 </option>`;
        }
        form.innerHTML = childs;
    } else {
        //Este se ejecuta en caso de estar dentro del primero semestre del año
        var childs = ``;
        for (var i = 0; i < 7; i++) {
            childs += `<option value="${anio + i}-1"> ${anio + i}-1 </option>`;
            childs += `<option value="${anio + i}-2"> ${anio + i}-2 </option>`;
        }
        form.innerHTML = childs;
    }
}

function addfacultades(form) {
    console.log(form);
    var campus;
    var facultades;
    if (form == 7) {
        campus = document.getElementById("campusreceptor").value;
        facultades = document.getElementById("unidadreceptora");
    } else if (form == 8) {
        campus = document.getElementById("campusemisor").value;
        facultades = document.getElementById("unidademisora");
    } else if (form == 9) {
        campus = document.getElementById("campus_clave").value;
        facultades = document.getElementById("unidad_clave");
    }


    if (campus == 1) {
        facultades.innerHTML = `
		<option value=''>-Seleccione una opción-</option>
		<option value='1'>FACULTAD DE ARQUITECTURA Y DISEÑO</option>
		<option value='10'>INSTITUTO DE CIENCIAS AGRÍCOLAS</option> 
		<option value='40'>FACULTAD DE CIENCIAS HUMANAS</option>
		<option value='80'>FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS</option>
		<option value='90'>FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
		<option value="110">FACULTAD DE DERECHO</option>
		<option value='111'>INSTITUTO DE INGENIERÍA</option>
		<option value="123">FACULTAD DE DEPORTES</option>
		<option value='124'>FACULTAD DE ARTES</option>
		<option value="140">FACULTAD DE INGENIERÍA</option>
		<option value="160">FACULTAD DE MEDICINA</option>
		<!--<option value='165'>CENTRO DE EDUCACIÓN ABIERTA Y A DISTANCIA</option>-->
		<option value='200'>INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS</option>
		<option value='220'>FACULTAD DE ODONTOLOGÍA
			<!--MEXICALI-->
		</option>
		<option value='260'>FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>
		<option value='300'>FACULTAD DE ENFERMERÍA</option>
		<option value='310'>FACULTAD DE IDIOMAS</option>
		<option value='335'>UNIDAD CIENCIAS DE LA SALUD
			<!--MEXICALI-->
		</option>
		<!--<option value='600'>DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS</option>-->
		<option value='605'>INSTITUTO DE INVESTIGACIONES SOCIALES</option>
		<option value='625'>INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO</option>
		<option value='2'>FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA</option>
		<option value='125'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)
			<!--TRONCOS COMUNES (CIUDAD MORELOS)-->
		</option>
		<option value='126'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)
			<!--TRONCOS COMUNES (SAN FELIPE)-->
		</option>
		`;
    } else if (campus == 2) {
        facultades.innerHTML = `
		<option value=''>-Seleccione una opción-</option>
		<option value='70'>FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA</option>
		<option value='100'>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</option>
		<option value='120'>FACULTAD DE DERECHO</option>
		<option value='130'>FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES</option>
		<option value='150'>FACULTAD DE DEPORTES
			<!-- EXTENSION CAMPUS TIJUANA -->
		</option>
		<option value='180'>FACULTAD DE MEDICINA Y PSICOLOGÍA</option>
		<option value='500'>UNIDAD UNIVERSITARIA EN ROSARITO
			<!-- TRONCOS COMUNES (ROSARITO) -->
		</option>
		<option value='190'>FACULTAD DE ARTES</option>
		<option value="240">FACULTAD DE ODONTOLOGÍA</option>
		<option value='280'>FACULTAD DE TURISMO Y MERCADOTECNIA</option>
		<option value="311">FACULTAD DE IDIOMAS</option>
		<option value="313">FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)</option>
		<!--<option value="333">FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>-->
		<!--<option value="336">CENTRO UNIVERSITARIO DE EDUCACIÓN EN SALUD</option>-->
		<option value='626'>INSTITUTO DE INVESTIGACIONES HISTÓRICAS</option>
		<option value='790'>FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES</option>
		<option value='400'>FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES</option>
		<option value='332'>FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA
			<!--VALLE DE LAS PALMAS-->
		</option>
		<option value='334'>FACULTAD DE CIENCIAS DE LA SALUD
			<!--VALLE DE LAS PALMAS-->
		</option>
		`;
    } else if (campus == 3) {
        facultades.innerHTML = `
		<option value=''>-Seleccione una opción-</option>
		<option value='20'>FACULTAD DE ARTES</option>
		<option value='30'>FACULTAD DE CIENCIAS</option>
		<option value="50">FACULTAD DE CIENCIAS MARINAS</option>
		<option value='170'>FACULTAD DE DEPORTES</option>
		<option value='290'>FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO</option>
		<option value='312'>FACULTAD DE IDIOMAS</option>
		<option value='320'>ESCUELA DE CIENCIAS DE LA SALUD</option>
		<option value="330">FACULTAD DE ENOLOGÍA Y GASTRONOMÍA</option>
		<!--<option value='331'>FACULTAD DE ARQUITECTURA Y DISEÑO ENSENADA</option>-->
		<option value="615">INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO</option>
		<option value="620">INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS</option>
		<option value='795'>FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES</option>
		<!--<option value='801'>ESCUELA DE ENFERMERÍA MIGUEL SERVET</option>-->
		<option value='700'>FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN</option>
		`;
    } else {
        facultades.innerHTML = `<option value="">-- Seleccione primero un campus --</option>`;
    }
}

function fechaPeriodo(idInicio, idFinal, idPeriodo) {
    var inicio = document.getElementById(idInicio);
    var fin = document.getElementById(idFinal);
    var nodePeriodo = document.getElementById(idPeriodo);

    if (inicio.value == "") {
        fin.value = "";
        nodePeriodo.value = "";
        alert("Favor de seleccionar primero la fecha inicial");
        return;
    }

    const fechaInicio = new Date(inicio.value);
    const fechaFin = new Date(fin.value);

    if (fechaInicio.getTime() >= fechaFin.getTime()) {
        fin.value = "";
        nodePeriodo.value = "";
        alert("La fecha de inicio debe ser inferior a la fecha de conclución de la movilidad");
        return;
    }

    periodoMovAlumn(fechaInicio, idPeriodo);
}

function fechaInicio(idInicio, idFinal, idPeriodo) {
    var inicio = document.getElementById(idInicio);
    var fin = document.getElementById(idFinal);
    var nodePeriodo = document.getElementById(idPeriodo);
    const fechaInicio = new Date(inicio.value);

    if (new Date().getTime() >= fechaInicio.getTime()) {
        inicio.value = "";
        nodePeriodo.value = "";
        alert("La fecha de inicio debe ser superior a la fecha de hoy");
        return;
    }

    if (fin.value != "") {
        const fechaFin = new Date(fin.value);
        if (fechaInicio.getTime() >= fechaFin.getTime()) {
            fin.value = "";
            periodoMovAlumn(fechaInicio, idPeriodo);
            alert("La fecha de inicio debe ser inferior a la fecha de conclución de la movilidad");
            return;
        }
    }

    periodoMovAlumn(fechaInicio, idPeriodo);
}

function periodoMovAlumn(fechaInicio, idPeriodo) {
    var periodo = "" + fechaInicio.getFullYear();
    if (fechaInicio.getMonth() >= 5) {
        periodo += "-2";
    } else {
        periodo += "-1"
    }

    var nodePeriodo = document.getElementById(idPeriodo);
    nodePeriodo.value = periodo;
}

function claveCampus(id1, id2) {
    var campus = document.getElementById(id1).value;
    var facultades = document.getElementById(id2);


    if (campus == 1) {
        facultades.innerHTML = `
		<option value=''>-Seleccione una opción-</option>
		<option value='1'>FACULTAD DE ARQUITECTURA Y DISEÑO</option>
		<option value='10'>INSTITUTO DE CIENCIAS AGRÍCOLAS</option> 
		<option value='40'>FACULTAD DE CIENCIAS HUMANAS</option>
		<option value='80'>FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS</option>
		<option value='90'>FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
		<option value="110">FACULTAD DE DERECHO</option>
		<option value='111'>INSTITUTO DE INGENIERÍA</option>
		<option value="123">FACULTAD DE DEPORTES</option>
		<option value='124'>FACULTAD DE ARTES</option>
		<option value="140">FACULTAD DE INGENIERÍA</option>
		<option value="160">FACULTAD DE MEDICINA</option>
		<!--<option value='165'>CENTRO DE EDUCACIÓN ABIERTA Y A DISTANCIA</option>-->
		<option value='200'>INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS</option>
		<option value='220'>FACULTAD DE ODONTOLOGÍA
			<!--MEXICALI-->
		</option>
		<option value='260'>FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>
		<option value='300'>FACULTAD DE ENFERMERÍA</option>
		<option value='310'>FACULTAD DE IDIOMAS</option>
		<option value='335'>UNIDAD CIENCIAS DE LA SALUD
			<!--MEXICALI-->
		</option>
		<!--<option value='600'>DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS</option>-->
		<option value='605'>INSTITUTO DE INVESTIGACIONES SOCIALES</option>
		<option value='625'>INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO</option>
		<option value='2'>FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA</option>
		<option value='125'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)
			<!--TRONCOS COMUNES (CIUDAD MORELOS)-->
		</option>
		<option value='126'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)
			<!--TRONCOS COMUNES (SAN FELIPE)-->
		</option>
		`;
    } else if (campus == 2) {
        facultades.innerHTML = `
		<option value=''>-Seleccione una opción-</option>
		<option value='70'>FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA</option>
		<option value='100'>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</option>
		<option value='120'>FACULTAD DE DERECHO</option>
		<option value='130'>FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES</option>
		<option value='150'>FACULTAD DE DEPORTES
			<!-- EXTENSION CAMPUS TIJUANA -->
		</option>
		<option value='180'>FACULTAD DE MEDICINA Y PSICOLOGÍA</option>
		<option value='500'>UNIDAD UNIVERSITARIA EN ROSARITO
			<!-- TRONCOS COMUNES (ROSARITO) -->
		</option>
		<option value='190'>FACULTAD DE ARTES</option>
		<option value="240">FACULTAD DE ODONTOLOGÍA</option>
		<option value='280'>FACULTAD DE TURISMO Y MERCADOTECNIA</option>
		<option value="311">FACULTAD DE IDIOMAS</option>
		<option value="313">FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)</option>
		<!--<option value="333">FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>-->
		<!--<option value="336">CENTRO UNIVERSITARIO DE EDUCACIÓN EN SALUD</option>-->
		<option value='626'>INSTITUTO DE INVESTIGACIONES HISTÓRICAS</option>
		<option value='790'>FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES</option>
		<option value='400'>FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES</option>
		<option value='332'>FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA
			<!--VALLE DE LAS PALMAS-->
		</option>
		<option value='334'>FACULTAD DE CIENCIAS DE LA SALUD
			<!--VALLE DE LAS PALMAS-->
		</option>
		`;
    } else if (campus == 3) {
        facultades.innerHTML = `
		<option value=''>-Seleccione una opción-</option>
		<option value='20'>FACULTAD DE ARTES</option>
		<option value='30'>FACULTAD DE CIENCIAS</option>
		<option value="50">FACULTAD DE CIENCIAS MARINAS</option>
		<option value='170'>FACULTAD DE DEPORTES</option>
		<option value='290'>FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO</option>
		<option value='312'>FACULTAD DE IDIOMAS</option>
		<option value='320'>ESCUELA DE CIENCIAS DE LA SALUD</option>
		<option value="330">FACULTAD DE ENOLOGÍA Y GASTRONOMÍA</option>
		<!--<option value='331'>FACULTAD DE ARQUITECTURA Y DISEÑO ENSENADA</option>-->
		<option value="615">INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO</option>
		<option value="620">INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS</option>
		<option value='795'>FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES</option>
		<!--<option value='801'>ESCUELA DE ENFERMERÍA MIGUEL SERVET</option>-->
		<option value='700'>FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN</option>
		`;
    } else {
        facultades.innerHTML = `<option value="">Elegir primero el campus</option>`;
    }

}