<?php

require_once "../../php-partials/auth.php";

if($_SESSION['admin'] >= 7 && $_SESSION['admin'] <= 10){
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO USTED NO PUEDE ESTAR EN ESTA PAGINA","No cuenta con los permisos necesarios para acceder a esta página.",2);
    exit();
} else if($_SESSION['admin']<=0||$_SESSION['admin']>=6){
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",2);
    exit();
}

include "../../querys/querysAdmins.php";
if (!$query = studentsVisitors()) {
    PantallaError("../../public/assets/UABC_crop.png","OCURRIÓ UN PROBLEMA","No fue posible acceder a los archivos.",2);
    exit();
} 


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
    <link rel="stylesheet" href="../../public/css/coloresOficiales.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.css" />
</head>

<body>

	<div class="wrapper d-flex align-items-stretch" id="fondo_principal">
        <!-- SUBMENU COLAPSABLE -->
		<?php include("lateralEstudiantesEntrada.php") ?>
		
		<!-- Page Content  -->
		<div id="content" class="p-2 p-md-5 pt-5">

			<!-- NAV BAR  -->
            <?php
              require("../../Estaticos.php");
              navVar("Sistema de Internacionalización > Estudiantes > Visitantes > Consultar Intercambios","../../public/assets/UABC_crop.png")
            ?>

            <!-- zona scrollable par dispositivos de pantallas pequeñas -->
            <div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-5">
                <div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
                    <div class="overflow-auto align-self-stretch  m-0 p-0 ">
                        <!-- Tablas de Datos  -->
                        <table id="tabla" class="table table-bordered table-hover" style="width:max-content;">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">MATRICULA</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">APELLIDO PATERNO</th>
                                    <th scope="col">APELLIDO MATERNO</th>
                                    <th scope="col">FECHA INICIO</th>
                                    <th scope="col">FECHA FINAL</th>
                                    <th scope="col">PERIODO</th>
                                    <th scope="col">NIVEL DE ESTUDIOS</th>
                                    <th scope="col">PAIS EMISOR</th>
                                    <th scope="col">UNIDAD EMISORA</th>
                                    <th scope="col">ENTIDAD EMISORA</th>
                                    <th scope="col">IDIOMA</th>
                                    <th scope="col">CAMPUS RECEPTOR</th>
                                    <th scope="col">FACULTAD RECEPTORA</th>
                                    <th scope="col">PROGRAMA EDUCATIVO</th>
                                    <th scope="col">ÁREA DE CONOCIMIENTO</th>
                                    <th scope="col">MONTO FINANCIACIÓN</th>
                                    <th scope="col">SEXO</th>
                                    <th scope="col">DISCAPACIDAD</th>
                                    <th scope="col">LENGUA INDIGENA</th>
                                    <th scope="col">ORIGEN INDIGENA</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($qq = mysqli_fetch_array($query)) {?>
                                    <tr>
                                        <th> <?php echo $qq["ID"]; ?> </th>
                                        <th> <?php echo $qq["ESTUDIANTE_ID"]; ?> </th>
                                        <td> <?php echo $qq["ESTUDIANTE"]; ?> </td>
                                        <td> <?php echo $qq["ESTUDIANTE_APELLIDO1"]; ?> </td>
                                        <td> <?php echo $qq["ESTUDIANTE_APELLIDO2"]; ?> </td>
                                        <td> <?php echo $qq["DATE_START"]; ?> </td>
                                        <td> <?php echo $qq["DATE_END"]; ?> </td>
                                        <td> <?php echo $qq["PERIODO"]; ?> </td>
                                            <!--Nivel de estudios-->
                                        <td>   
                                            <?php if ($qq["NIVEL_ID"] == 1) echo "Licenciatura"; 
                                             else if ($qq["NIVEL_ID"] == 2) echo "Especialidad"; 
                                             else if ($qq["NIVEL_ID"] == 3) echo "Maestría"; 
                                             else if ($qq["NIVEL_ID"] == 4) echo "Doctorado"; ?>
                                        <td> <?php echo $qq["UE_PAIS"]; ?> </td>
                                        <td> <?php echo $qq["UE"]; ?> </td>
                                        <td> <?php echo $qq["UE_ENTIDAD"]; ?> </td>
                                        <td> <?php echo $qq["UE_IDIOMA"]; ?> </td>
                                        <td> <?php echo $qq["CAMPUS_DESC"]; ?> </td>
                                        <td> <?php echo $qq["UNIDAD"]; ?> </td>
                                        <td> <?php echo $qq["PROGRAMA_DESC"]; ?> </td>
                                        <td> <?php echo $qq["AREA"]; ?> </td>
                                        <td> <?php echo ($qq["FINAN_VAL"] > 1)? "$" . $qq["FINAN_VAL"] : "Sin financiación" ?> </td>
                                        <td> <?php echo $qq["SEXO"]; ?> </td>
                                        <td> <?php echo ($qq["DISCAPACIDAD"] == 1)? 'SI':'NO'; ?> </td>
                                        <td> <?php echo ($qq["HABLANTE_INDIGENA"] == 1)? 'SI':'NO'; ?> </td>
                                        <td> <?php echo ($qq["ORIGEN_INDIGENA"] == 1)? 'SI':'NO'; ?> </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">MATRICULA</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">APELLIDO PATERNO</th>
                                    <th scope="col">APELLIDO MATERNO</th>
                                    <th scope="col">FECHA INICIO</th>
                                    <th scope="col">FECHA FINAL</th>
                                    <th scope="col">PERIODO</th>
                                    <th scope="col">NIVEL DE ESTUDIOS</th>
                                    <th scope="col">PAIS EMISOR</th>
                                    <th scope="col">UNIDAD EMISORA</th>
                                    <th scope="col">ENTIDAD EMISORA</th>
                                    <th scope="col">IDIOMA</th>
                                    <th scope="col">CAMPUS RECEPTOR</th>
                                    <th scope="col">FACULTAD RECEPTORA</th>
                                    <th scope="col">PROGRAMA EDUCATIVO</th>
                                    <th scope="col">PROGRAMA EDUCATIVO</th>
                                    <th scope="col">MONTO FINANCIACIÓN</th>
                                    <th scope="col">SEXO</th>
                                    <th scope="col">DISCAPACIDAD</th>
                                    <th scope="col">LENGUA INDIGENA</th>
                                    <th scope="col">ORIGEN INDIGENA</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

                        
            <button id="btnExportar" class="btn btn-success">
                <i class="fas fa-file-excel fa-sm fa-fw mr-2 "></i> Exportar registros a Excel
            </button>

        </div>
    </div>

    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/popper.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/main.js"></script>


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- datatables jquery -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <!--datatables javascript Bootstrap 5 -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
    
    <!--links para exportar a excel -->
    <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>

    <!-- script para exportar a excel -->
    <script>
        const $btnExportar = document.querySelector("#btnExportar"),
            $tabla = document.querySelector("#tabla");

        $btnExportar.addEventListener("click", function() {
            let tableExport = new TableExport($tabla, {
                exportButtons: false, // No queremos botones
                filename: "Movilidad_estudiantes_visitantes", //Nombre del archivo de Excel
                sheetname: "Movilidad_estudiantes_Visitantes", //Título de la hoja
            });
            let datos = tableExport.getExportData();
            let preferenciasDocumento = datos.tabla.xlsx;
            tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
        });
    </script>


    <script>
        $(document).ready(function() {
            // Se le asigna los diferentes campos en el pie de la tabla para las busquedas
            $('#tabla tfoot th').each(function() {
                var title = $(this).text();
                console.log( `titulo ${title}`);
                if (title == "ID") {
                    $(this).html('<input class="form-control" type="number" min="0" max="999999" placeholder="BUSCAR ' + title + '" />');
                }
                else if (title == "PERIODO") {
                    $(this).html('<input class="form-control" type="number" min="1" max="2" placeholder="BUSCAR' + title + '" />');
                }
                else if (title == "NIVEL DE ESTUDIOS") {
                    $(this).html(`<select class="form-control">
                                    <option value="">--Selecciona Nivel--</option>
                                    <option value="Licenciatura">Licenciatura</option>
                                    <option value="Especialidad">Especialidad</option>
                                    <option value="Maestría">Maestría</option>
                                    <option value="Doctorado">Doctorado</option>
                                </select>`);
                }
                else if (title == "CAMPUS RECEPTOR") {
                    $(this).html(`<select class="form-control" name="campus_clave" id="campus_clave">
								    <option value="">----------</option>
								    <option value="MEXICALI">MEXICALI</option>
								    <option value="TIJUANA">TIJUANA</option>
								    <option value="ENSENADA">ENSENADA</option>
							    </select>`);
                } else if (title == "FACULTAD RECEPTORA") {
                    $(this).html(`<select class="form-control" name="unidad_clave" id="unidad_clave">
								    <option value="">----------</option>
							    </select>`);
                } else if (title == "FECHA INICIO" || title == "FECHA FINAL") {
                    $(this).html('<input type="date" class="form-control" />');
                } else {
                    $(this).html('<input class="form-control" type="text" placeholder="BUSCAR ' + title + '" />');
                }
            });


            //cambiar unidades academicas dependiendo el campus seleccionado
            $("#campus_clave").change(function() {
                var val = $(this).val();
                if (val == "") {
                    $("#unidad_clave").html("<option value='' selected>----------</option>");

                    //Mexicali
                } else if (val == "MEXICALI") {
                    $("#unidad_clave").html(`<option value='' selected>----------</option>
								<option value='FACULTAD DE ARQUITECTURA Y DISEÑO'>FACULTAD DE ARQUITECTURA Y DISEÑO</option>
								<option value='INSTITUTO DE CIENCIAS AGRÍCOLAS'>INSTITUTO DE CIENCIAS AGRÍCOLAS</option>
								<option value='FACULTAD DE CIENCIAS HUMANAS'>FACULTAD DE CIENCIAS HUMANAS</option>
								<option value='FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS'>FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS</option>
								<option value='FACULTAD DE CIENCIAS ADMINISTRATIVAS'>FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
								<option value="FACULTAD DE DERECHO">FACULTAD DE DERECHO</option>
								<option value='INSTITUTO DE INGENIERÍA'>INSTITUTO DE INGENIERÍA</option>
								<option value="FACULTAD DE DEPORTES">FACULTAD DE DEPORTES</option>
								<option value='FACULTAD DE ARTES'>FACULTAD DE ARTES</option>
								<option value="FACULTAD DE INGENIERÍA">FACULTAD DE INGENIERÍA</option>
								<option value="FACULTAD DE MEDICINA">FACULTAD DE MEDICINA</option>
								<!--<option value='165'>CENTRO DE EDUCACIÓN ABIERTA Y A DISTANCIA</option>-->
								<option value='INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS'>INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS</option>
								<option value='FACULTAD DE ODONTOLOGÍA'>FACULTAD DE ODONTOLOGÍA<!--MEXICALI--></option>
								<option value='FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA'>FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>
								<option value='FACULTAD DE ENFERMERÍA'>FACULTAD DE ENFERMERÍA</option>
								<option value='FACULTAD DE IDIOMAS'>FACULTAD DE IDIOMAS</option>
								<option value='UNIDAD CIENCIAS DE LA SALUD'>UNIDAD CIENCIAS DE LA SALUD<!--MEXICALI--></option>
								<!--<option value='600'>DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS</option>-->
								<option value='INSTITUTO DE INVESTIGACIONES SOCIALES'>INSTITUTO DE INVESTIGACIONES SOCIALES</option>
								<option value='INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO'>INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO</option>
								<option value='FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA'>FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA</option>
								<option value='FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)<!--TRONCOS COMUNES (CIUDAD MORELOS)--></option>
								<option value='FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)<!--TRONCOS COMUNES (SAN FELIPE)--></option>`);
                    //Tijuana
                } else if (val == "TIJUANA") {
                    $("#unidad_clave").html(`<option value='' selected>----------</option>
								<option value='FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA'>FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA</option>
								<option value='FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN'>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</option>
								<option value='FACULTAD DE DERECHO'>FACULTAD DE DERECHO</option>
								<option value='FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES'>FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES</option>
								<option value='FACULTAD DE DEPORTES'>FACULTAD DE DEPORTES<!-- EXTENSION CAMPUS TIJUANA --></option>
								<option value='FACULTAD DE MEDICINA Y PSICOLOGÍA'>FACULTAD DE MEDICINA Y PSICOLOGÍA</option>
								<option value='UNIDAD UNIVERSITARIA EN ROSARITO'>UNIDAD UNIVERSITARIA EN ROSARITO<!-- TRONCOS COMUNES (ROSARITO) --></option>
								<option value='FACULTAD DE ARTES'>FACULTAD DE ARTES</option>
								<option value="FACULTAD DE ODONTOLOGÍA">FACULTAD DE ODONTOLOGÍA</option>
								<option value='FACULTAD DE TURISMO Y MERCADOTECNIA'>FACULTAD DE TURISMO Y MERCADOTECNIA</option>
								<option value="FACULTAD DE IDIOMAS">FACULTAD DE IDIOMAS</option>
								<option value="FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)">FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)</option>
								<!--<option value="333">FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>-->
								<!--<option value="336">CENTRO UNIVERSITARIO DE EDUCACIÓN EN SALUD</option>-->
								<option value='INSTITUTO DE INVESTIGACIONES HISTÓRICAS'>INSTITUTO DE INVESTIGACIONES HISTÓRICAS</option>
								<option value='FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES'>FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES</option>
								<option value='FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES'>FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES</option>
								<option value='FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA'>FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA<!--VALLE DE LAS PALMAS--></option>
								<option value='FACULTAD DE CIENCIAS DE LA SALUD'>FACULTAD DE CIENCIAS DE LA SALUD<!--VALLE DE LAS PALMAS--></option>`);

                    //Ensenada
                } else if (val == "ENSENADA") {
                    $("#unidad_clave").html(`<option value='' selected>----------</option>
								<option value='FACULTAD DE ARTES'>FACULTAD DE ARTES</option>
								<option value='FACULTAD DE CIENCIAS'>FACULTAD DE CIENCIAS</option>
								<option value="FACULTAD DE CIENCIAS MARINAS">FACULTAD DE CIENCIAS MARINAS</option>
								<option value='FACULTAD DE DEPORTES'>FACULTAD DE DEPORTES</option>
								<option value='FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO'>FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO</option>
								<option value='FACULTAD DE IDIOMAS'>FACULTAD DE IDIOMAS</option>
								<option value='ESCUELA DE CIENCIAS DE LA SALUD'>ESCUELA DE CIENCIAS DE LA SALUD</option>
								<option value="FACULTAD DE ENOLOGÍA Y GASTRONOMÍA">FACULTAD DE ENOLOGÍA Y GASTRONOMÍA</option>
								<!--<option value='331'>FACULTAD DE ARQUITECTURA Y DISEÑO ENSENADA</option>-->
								<option value="INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO">INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO</option>
								<option value="INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS">INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS</option>
								<option value='FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES'>FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES</option>
								<!--<option value='801'>ESCUELA DE ENFERMERÍA MIGUEL SERVET</option>-->
								<option value='FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN'>FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN</option>`);
                }
            });

            //funcion de busquedas
            var table = $('#tabla').DataTable({
                initComplete: function() {
                    //Se aplica la busqueda
                    this.api().columns().every(function() {
                        var that = this;
                        //Si el campo es un input
                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });

                        //Si el campo es un select
                        $('select', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });

                        //Si el campo es un date
                        $('date', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });

                    });
                },
                //cambiar lenguaje a español del datatable
                "language": {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %ds fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir",
                        "renameState": "Cambiar nombre",
                        "updateState": "Actualizar",
                        "createState": "Crear Estado",
                        "removeAllStates": "Remover Estados",
                        "removeState": "Remover",
                        "savedStates": "Estados Guardados",
                        "stateRestore": "Estado %d"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmentemente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "notEmpty": "No Vacio",
                                "not": "Diferente de"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vacio",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vacío",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de",
                                "notContains": "No Contiene",
                                "notStarts": "No empieza con",
                                "notEnds": "No termina con"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
                        "title": "Filtros Activos - %d",
                        "showMessage": "Mostrar Todo",
                        "collapseMessage": "Colapsar Todo"
                    },
                    "select": {
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "%d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        },
                        "rows": {
                            "1": "1 fila seleccionada",
                            "_": "%d filas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Proximo",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "AM",
                            "PM"
                        ],
                        "months": {
                            "0": "Enero",
                            "1": "Febrero",
                            "10": "Noviembre",
                            "11": "Diciembre",
                            "2": "Marzo",
                            "3": "Abril",
                            "4": "Mayo",
                            "5": "Junio",
                            "6": "Julio",
                            "7": "Agosto",
                            "8": "Septiembre",
                            "9": "Octubre"
                        },
                        "weekdays": [
                            "Dom",
                            "Lun",
                            "Mar",
                            "Mie",
                            "Jue",
                            "Vie",
                            "Sab"
                        ]
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "¿Está seguro que desea eliminar %d filas?",
                                "1": "¿Está seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "stateRestore": {
                        "creationModal": {
                            "button": "Crear",
                            "name": "Nombre:",
                            "order": "Clasificación",
                            "paging": "Paginación",
                            "search": "Busqueda",
                            "select": "Seleccionar",
                            "columns": {
                                "search": "Búsqueda de Columna",
                                "visible": "Visibilidad de Columna"
                            },
                            "title": "Crear Nuevo Estado",
                            "toggleLabel": "Incluir:"
                        },
                        "emptyError": "El nombre no puede estar vacio",
                        "removeConfirm": "¿Seguro que quiere eliminar este %s?",
                        "removeError": "Error al eliminar el registro",
                        "removeJoiner": "y",
                        "removeSubmit": "Eliminar",
                        "renameButton": "Cambiar Nombre",
                        "renameLabel": "Nuevo nombre para %s",
                        "duplicateError": "Ya existe un Estado con este nombre.",
                        "emptyStates": "No hay Estados guardados",
                        "removeTitle": "Remover Estado",
                        "renameTitle": "Cambiar Nombre Estado"
                    }
                },
                //La columna del id del intercambio no aporta información para el usuario,
                //pero se nesesita para actualizar/consultar. entonces se esconde
                "columnDefs": [{
                    "targets": [1],
                    "visible": false
                }]
            });
            <?php if($_SESSION['admin'] ===1 || $_SESSION['admin'] === 2 || $_SESSION['admin'] === 3 || $_SESSION['admin'] === 5){?>
            $('#tabla tbody').on('click', 'tr', function() {
                
                var data = table.row(this).data();
                window.location.href = "actualizar_intercambio.php?id=" + data[0];
                //data[1] es el valor en la segunda columna del renglon, osea el id
                //del intercambio del renglon seleccionado
           
            }); 
            <?php } ?>
        });
    </script>
</body>

</html>