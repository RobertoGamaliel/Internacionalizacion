<?php
	$solicitadas = "SELECT * FROM movilidad_academica_salida_temporal WHERE EMPLEADO_ID = ${_SESSION["matricula"]} ";

	if ($query = mysqli_query($con, $solicitadas)) {
		//$res = mysqli_fetch_array($query);
	} else {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
	mysqli_close($con);
	$pendientes=mysqli_num_rows($query);
	$activos=0;
	$finalizados=1;
?>

<div class="d-flex justify-content-center text-center h4">Movilidades temporales</div>
<?php if($finalizados == 0) {?>
	<div class="d-flex justify-content-center text-center h6 mb-5">Actualmente no tiene ninguna movilidad concluida</div>
<?php } else{?>
	<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-2 p-0 mb-5">
		<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-0 p-0">
			<div class="overflow-auto align-self-stretch  m-0 p-0 ">
				<table id="tabla" class="table table-bordered table-hover" >
					<thead>
						<tr>
							<th scope="col" class="text-center">ID</th>
							<th scope="col" class="text-center">EMPLEADO_ID</th>
							<th scope="col" class="text-center">PERIODO</th>
							<th scope="col" class="text-center">CAMPUS_ID</th>
							<th scope="col" class="text-center">UNIDAD_ID</th>
							<th scope="col" class="text-center">UNIDAD RECEPTORA</th>
							<th scope="col" class="text-center">PAIS</th>
							<th scope="col" class="text-center">ENTIDAD</th>
							<th scope="col" class="text-center">IDIOMA</th>
							<th scope="col" class="text-center">TEMA ID</th>
							<th scope="col" class="text-center">PAÍS DE ORIGEN</th>
							<th scope="col" class="text-center">ESTADO</th>
						</tr>
					</thead>
					<tbody>
					<?php while ($qq = mysqli_fetch_array($query)) { 
							$pendientes++;
						?>
	                        <tr>
	                        	<th scope="row" class="text-center"> <?php echo "REVISIÓN PENDIENTE"; ?> </th>
	                            <td class="text-center"> <?php echo $qq["ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["EMPLEADO_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["PERIODO"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["CAMPUS_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo facultad($qq["CAMPUS_ID"],$qq["UNIDAD_ID"]); ?> </td>
	                            <td class="text-center"> <?php echo nivel($qq["UR"]); ?> </td>
	                            <td class="text-center"> <?php echo $qq["UR_PAIS"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UR_ENTIDAD"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UR_IDIOMA"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["TMA_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["ESTADO"]; ?> </td>
	                        </tr>
		                    <?php } ?>
		            </tbody>
					<tfoot>

					</tfoot>
				</table>
				
			</div>
		</div>
	</div>
<?php } ?>