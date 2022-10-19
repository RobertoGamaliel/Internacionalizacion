<?php

require_once "../../php-partials/auth.php";
if($_SESSION['admin']===10){
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO USTED NO PUEDE ESTAR EN ESTA PAGINA","No cuenta con los permisos necesarios para acceder a esta página.",2);
    exit();
} else if($_SESSION['admin']<=0||$_SESSION['admin']>=6){
    include("../../Pantalla_Error.php");
    PantallaError("../../public/assets/UABC_crop.png","LO SENTIMOS, PERO NO SE RECONOCEN SUS CREDENCIALES","El usuario con el que esta ingresando no tiene autorización para acceder al sistema de internacionalización.",2);
    exit();
}
include "../../php-partials/connect.php";
include "../../querys/querysAdmins,php";

if(!$query  = requestAcadVisitor(){
 PantallaError("../../public/assets/UABC_crop.png","OCURRIÓ UN PROBLEMA.","No fue posible acceder a los archivos.",2);
    exit();
}

$sql = "SELECT * FROM movilidad_academica_entrada";

mysqli_close($con);

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="../../public/css/coloresOficiales.css">
</head>

<body>

	
	<div class="wrapper d-flex align-items-stretch">
		<!-- SUBMENU COLAPSABLE -->	
	    <?php include("lateralAcademicosEntrada.php") ?>

        <!-- Page Content  -->
        <div id="content" class="p-2 p-md-5 pt-5">
            <!-- NAV BAR  -->
		    <?php
		      require("../../Estaticos.php");
		      navVar("Sistema de Internacionalización > Académicos > Visitantes > Consultar Movilidades","../../public/assets/UABC_crop.png")
		    ?>

            <h5 class="mb-4 text-center">Consultar Movilidades (Entrada)</h5>


            <!-- Tablas de Datos  -->
            <div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-5">
                <div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
                    <div class="overflow-auto align-self-stretch  m-0 p-0 ">

                        <table id="tabla" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">MOVILIDAD_ID</th>
                                    <th scope="col">País de Origen</th>
                                    <th scope="col">Unidad Emisora</th>
                                    <th scope="col">Entidad Emisora</th>
                                    <th scope="col">Tipo de Movilidad</th>
                                    <th scope="col">Periodo Escolar</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($qq = mysqli_fetch_array($query)) { ?>

                                    <tr>

                                        <th scope="row"> <?php echo $qq["VISITANTE_ID"]; ?> </th>
                                        <td> <?php echo $qq["ID"]; ?> </td>
                                        <td> <?php echo $qq["UE_PAIS"]; ?> </td>
                                        <td> <?php echo $qq["UE"]; ?> </td>
                                        <td> <?php echo $qq["UE_ENTIDAD"]; ?> </td>
                                        <td>
                                            <!-- Tipo de Movilidad -->
                                            <?php if ($qq["TMA_ID"] == '1') echo "Docencia" ?>
                                            <?php if ($qq["TMA_ID"] == '2') echo "Estancia Sabática"; ?>
                                            <?php if ($qq["TMA_ID"] == '3') echo "Estancia de Investigación"; ?>
                                        </td>
                                        <td> <?php echo $qq["PERIODO_ID"]; ?> </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">MOVILIDAD_ID</th>
                                    <th scope="col">País de Origen</th>
                                    <th scope="col">Unidad Emisora</th>
                                    <th scope="col">Entidad Emisora</th>
                                    <th scope="col">Tipo de Movilidad</th>
                                    <th scope="col">Periodo Escolar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <button id="btnExportar" class="btn btn-success">
                <i class="fas fa-file-excel fa-sm fa-fw mr-2 "></i> Exportar Datos a Excel
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
    <!--datatables javascript Bootstrap 4
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.js"></script>-->

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
                filename: "Academicos_visitantes", //Nombre del archivo de Excel
                sheetname: "Academicos_Visitantes", //Título de la hoja
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
                console.log(title);
                if (title == "NIVEL DE ESTUDIOS") {
                    $(this).html(`<select class="form-control border border-secondary">
                                    <option value="">--Selecciona Nivel--</option>
                                    <option value="Licenciatura">Licenciatura</option>
                                    <option value="Especialidad">Especialidad</option>
                                    <option value="Maestría">Maestría</option>
                                    <option value="Doctorado">Doctorado</option>
                                </select>`);

                } else if (title == "Tipo de Movilidad") {
                    $(this).html(`<select class="form-control border border-secondary">
                                    <option value="">
								        --Seleccionar--
							        </option>
							        <option value="Docencia">
								        Docencia
							        </option>
							        <option value="Estancia Sabática">
								        Estancia Sabática
							        </option>
							        <option value="Estancia de Investigación">
								        Estancia de Investigación
							        </option>
						        </select>`);

                } else if (title == "ID") {
                    $(this).html('<input class="form-control border border-secondary" type="number" min="0" max="999999" placeholder="Search ' + title + '" />');
                    //$(this).html('<input class="form-control border border-secondary" type="number" placeholder="Search ' + title + '" />');
                } else if (title == "FECHA INICIO" || title == "FECHA TERMINAL") {
                    $(this).html('<input type="date" class="form-control border border-secondary" />');
                } else {
                    $(this).html('<input class="form-control border border-secondary" type="text" placeholder="Search ' + title + '" />');
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
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });


                        //Si el campo es un select
                        $('select', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });

                        //Si el campo es un date
                        $('date', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
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
                //La columna del id del intercambio no aporta informacion para el usuario,
                //pero se nesesita para actualizar/consultar. entonces se esconde
                "columnDefs": [{
                    "targets": [1],
                    "visible": false
                }],
                
            });
            //forma previa de esconder la columna
            //table.column(1).visible(false);

            $('#tabla tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                //window.location.replace("update.php?id=" + data[0]);
                window.location.href = "actualizar_movilidad.php?id=" + data[1];
                //data[1] es el valor en la segunda columna del renglon, osea el id
                //del intercambio del renglon seleccionado
            });
        });
    </script>
</body>

</html>
