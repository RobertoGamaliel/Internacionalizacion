<?php
	
	include("../querys/querysNOAdmins.php");
	$resp = queryRegister();
	$pendientes=mysqli_num_rows($resp["request"]);
	$activos=mysqli_num_rows($resp["actual"]);
	$finalizados=mysqli_num_rows($resp["past"]);
?>

<div class="d-flex justify-content-center text-center h4">Movilidades concluidas</div>
<?php if($finalizados  ===0 ) {?>
	<div class="d-flex justify-content-center text-center h6 mb-5">Actualmente no tiene ninguna movilidad concluida</div>
<?php } else{?>
	<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-2 p-0 mb-5">
		<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-0 p-0">
			<div class="overflow-auto align-self-stretch  m-0 p-0 ">
				<table id="tabla" class="table table-bordered table-hover" style="width:max-content;">
					<thead>
						<tr>
							<th scope="col" class="text-center">MATRICULA</th>
							<th scope="col" class="text-center">PERIODO</th>
							<th scope="col" class="text-center">FECHA INICIO</th>
							<th scope="col" class="text-center">FECHA CONCLUCIÓN</th>
							<th scope="col" class="text-center">UNIDAD DE LLEGADA</th>
							<th scope="col" class="text-center">CAMPUS DE LLEGADA</th>
							<th scope="col" class="text-center">NIVEL</th>
							<th scope="col" class="text-center">PROGRAMA EDUCATIVO ID</th>
							<th scope="col" class="text-center">PROGRAMA EDUCATIVO NOMBRE</th>
							<th scope="col" class="text-center">ÁREA DE CONOCIMIENTO ID</th>
							<th scope="col" class="text-center">ÁREA DE CONOCIMIENTO NOMBRE</th>
							<th scope="col" class="text-center">PAÍS EMISOR</th>
							<th scope="col" class="text-center">IDIOMA(S)</th>
							<th scope="col" class="text-center">ENTIDAD EMISORA</th>
							<th scope="col" class="text-center">UNIDAD EMISORA</th>
						</tr>
					</thead>
					<tbody>
		                    <?php while ($qq = mysqli_fetch_array($resp["past"])) { 
							$pendientes++;
						?>
	                        <tr>
	                        	<td class="text-center"> <?php echo $qq["ESTUDIANTE_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["PERIODO"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["DATE_START"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["DATE_END"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["CAMPUS_DESC"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UNIDAD"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["NIVEL"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["PROGRAMA_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["PROGRAMA_DESC"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["AREA_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["AREA"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE_PAIS"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE_IDIOMA"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE_ENTIDAD"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE"]; ?> </td>
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



<div class="d-flex justify-content-center text-center h4 mt-5">Movilidades autorizadas activas</div>
<?php if($activos == 0) {?>
	<div class="d-flex justify-content-center text-center h6 mb-5">Actualmente no tiene ninguna movilidad autorizada activa</div>
<?php } else{?>
	<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-2 p-0 mb-5">
		<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-0 p-0">
			<div class="overflow-auto align-self-stretch  m-0 p-0 ">
				<table id="tabla" class="table table-bordered table-hover" style="width:max-content;">
					<thead>
						<tr>
							<th scope="col" class="text-center">MATRICULA</th>
							<th scope="col" class="text-center">PERIODO</th>
							<th scope="col" class="text-center">FECHA INICIO</th>
							<th scope="col" class="text-center">FECHA CONCLUCIÓN</th>
							<th scope="col" class="text-center">UNIDAD DE LLEGADA</th>
							<th scope="col" class="text-center">CAMPUS DE LLEGADA</th>
							<th scope="col" class="text-center">NIVEL</th>
							<th scope="col" class="text-center">PROGRAMA EDUCATIVO ID</th>
							<th scope="col" class="text-center">PROGRAMA EDUCATIVO NOMBRE</th>
							<th scope="col" class="text-center">ÁREA DE CONOCIMIENTO ID</th>
							<th scope="col" class="text-center">ÁREA DE CONOCIMIENTO NOMBRE</th>
							<th scope="col" class="text-center">PAÍS EMISOR</th>
							<th scope="col" class="text-center">IDIOMA(S)</th>
							<th scope="col" class="text-center">ENTIDAD EMISORA</th>
							<th scope="col" class="text-center">UNIDAD EMISORA</th>
						</tr>
					</thead>
					<tbody>
		                    <?php while ($qq = mysqli_fetch_array($resp["actual"])) { 
							$pendientes++;
						?>
	                        <tr>
	                        	<td class="text-center"> <?php echo $qq["ESTUDIANTE_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["PERIODO"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["DATE_START"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["DATE_END"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["CAMPUS_DESC"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UNIDAD"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["NIVEL"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["PROGRAMA_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["PROGRAMA_DESC"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["AREA_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["AREA"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE_PAIS"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE_IDIOMA"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE_ENTIDAD"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UE"]; ?> </td>
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

<div class="d-flex justify-content-center text-center h4 mt-5">Movilidades pendientes de autorización</div>
<?php if($pendientes == 0) { ?>
	<div class="d-flex justify-content-center text-center h6 mb-5">Actualmente no tiene ninguna movilidad solicitada</div>
<?php } else { ?>
	<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch mb-5 m-2 p-0">
		<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-0 p-0">
			<div class="overflow-auto align-self-stretch  m-0 p-0 ">
				<table id="tabla" class="table table-bordered table-hover" style="width:max-content";>
					<thead>
						<tr>
							<th scope="col" class="text-center">MATRICULA</th>
							<th scope="col" class="text-center">PERIODO</th>
							<th scope="col" class="text-center">FECHA INICIO</th>
							<th scope="col" class="text-center">FECHA CONCLUCIÓN</th>
							<th scope="col" class="text-center">UNIDAD DE LLEGADA</th>
							<th scope="col" class="text-center">CAMPUS DE LLEGADA</th>
							<th scope="col" class="text-center">NIVEL</th>
							<th scope="col" class="text-center">PROGRAMA EDUCATIVO ID</th>
							<th scope="col" class="text-center">PROGRAMA EDUCATIVO NOMBRE</th>
							<th scope="col" class="text-center">ÁREA DE CONOCIMIENTO ID</th>
							<th scope="col" class="text-center">ÁREA DE CONOCIMIENTO NOMBRE</th>
							<th scope="col" class="text-center">PAÍS EMISOR</th>
							<th scope="col" class="text-center">IDIOMA(S)</th>
							<th scope="col" class="text-center">ENTIDAD EMISORA</th>
							<th scope="col" class="text-center">UNIDAD EMISORA</th>
						</tr>
					</thead>
					<tbody>
		                    <?php while ($qq = mysqli_fetch_array($resp["request"])) { 
							$pendientes++;
						?>
	                        <tr>
	                        	<td class="text-center"> <?php echo $qq["ESTUDIANTE_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["PERIODO"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["DATE_START"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["DATE_END"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["CAMPUS_DESC"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UNIDAD"]; ?> </td>
	                            <td class="text-center"> <?php echo nivel($qq["NIVEL_ID"]); ?> </td>
	                            <td class="text-center"> <?php echo $qq["PROGRAMA_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["PROGRAMA_DESC"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["AREA_ID"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["AREA"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UNID_PAIS"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UNID_IDIOMA"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UNID_ENTIDAD"]; ?> </td>
	                            <td class="text-center"> <?php echo $qq["UNID"]; ?> </td>
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