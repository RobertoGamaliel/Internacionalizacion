<form action="../php-partials/ST_mov_NA_Academico_entrada.php" method="POST" autocomplete="off">
	<div class="row mb-3">
		<label for="identificador" class="col-sm-3 col-form-label" style="text-align: right;">Clave de Identificación</label>
		<div class="col-sm-6">
			<input type="number" min="0" max="4294967295" class="form-control border border-secondary bg-light" placeholder="<?php echo $_SESSION['matricula']?>" name="identificador" id="identificador" value="<?php echo $_SESSION['matricula']?>" readonly required/>
		</div>
	</div>
	
	<div class="row mb-3">
		<label for="tipomovilidad" class="col-sm-3 col-form-label" style="text-align: right;">Tipo de Movilidad</label>
		<div class="col-sm-6">
			<select class="form-control border border-secondary bg-light" name="tipomovilidad" id="tipomovilidad" required>
				<option value="">
					- Seleccionar -
				</option>
				<option value="1">
					Docencia
				</option>
				<option value="2">
					Estancia Sabática
				</option>
				<option value="3">
					Estancia de Investigación
				</option>
			</select>
		</div>
	</div>

	<div class="row mb-3">
		<label for="paisorigen" class="col-sm-3 col-form-label" style="text-align: right;">País de Origen</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" placeholder="Pais Origen" name="paisorigen" id="paisorigen" required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="unidademisora" class="col-sm-3 col-form-label" style="text-align: right;">Unidad Emisora</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" placeholder="Unidad Emisora" name="unidademisora" id="unidademisora" required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="entidademisora" class="col-sm-3 col-form-label" style="text-align: right;">Entidad Emisora</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" placeholder="Entidad Emisora" name="entidademisora" id="entidademisora" required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="idiomasdominados" class="col-sm-3 col-form-label" style="text-align: right;">Idiomas Dominados</label>
		<div class="col-sm-6">
			<input type="text" class="form-control border border-secondary bg-light" placeholder="Idiomas Dominados" name="idiomasdominados" id="idiomasdominados" required/>
		</div>
	</div>

	<div class="row mb-3">
		<label for="periodoescolar" class="col-sm-3 col-form-label" style="text-align: right;">Periodo Escolar</label>
		<div class="col-sm-6">
			<select class="form-control border border-secondary bg-light" name="periodoescolar" id="periodoescolar" required>
				
			</select>
		</div>
	</div> 

	<div class="row mb-3">
		<label for="campusreceptor" class="col-sm-3 col-form-label" style="text-align: right;">Campus Receptor</label>
		<div class="col-sm-6">
			<select class="form-control border border-secondary bg-light" name="campusreceptor" id="campusreceptor" onchange="addfacultades(7);" required>
				<option value="">
					--Seleccionar Campus--
				</option>
				<option value="1">
					Campus Mexicali
				</option>
				<option value="2">
					Campus Tijuana
				</option>
				<option value="3">
					Campus Ensenada
				</option>
			</select>
		</div>
	</div>

	<div class="row mb-3">
		<label for="unidadreceptora" class="col-sm-3 col-form-label" style="text-align: right;">Unidad Receptora</label>
		<div class="col-sm-6">
			<select class="form-control border border-secondary bg-light" name="unidadreceptora" id="unidadreceptora" required>
				<option value="">
					-- Seleccione primero un campus --
				</option>
			</select>
		</div>
	</div>

	<div class="d-flex flex-row justify-content-center align-items-center  align-self-stretch m-0 p-0 mb-3 mt-5">
		<div class="d-flex flex-column col-12 justify-content-center d-flex align-items-center m-2 p-0">
		<input type="submit" value="Solicitar movilidad" class="btn btn-outline-success mb-2" name="btn_agregarMovilidad_entrada" id="btnExportar">
		</div>					
	</div>
</form>