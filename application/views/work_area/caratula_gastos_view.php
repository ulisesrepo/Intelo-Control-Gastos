<div class="row mr-3 ml-3">
	<div class="section" id="ImprimirC">
		<div class="card shadow mb-4">

			<div class="card-body">


				<div class="d-flex justify-content-end col-sm-12"><img src="assets/img/intelo123.png" width="220"
						height="125"></div>
				<br>

				<h4 class="d-flex justify-content-center col-sm-12 m-0 font-weight-bold text-dark">CARATULA DE
					COMPROBACION
					DE GASTOS</h4>
				<br>
				<br>
				<form id="formulario_caratula">
					<div class="form-inline">
						<div class="form-group p-2 col-sm-12">
							<label class="m-0 font-weight-bold text-dark" for="solicitante">
								SOLICITANTE:                                        </label>
							<input type="text" class="form-control col-sm-6 required" readonly id="solicitante"
								name="solicitante" placeholder="" value="<?=$nombre;?> <?=$apellidos;?>" >
						</div>
						<div class="form-group p-2 col-sm-12">
							<label class="m-0 font-weight-bold text-dark" for="Plaza">
								PLAZA:                                                    </label>
							<input type="text" class="form-control col-sm-6 required" id="Plaza"  name="Plaza"
								placeholder="" value="<?=$sucursal;?>" readonly>
						</div>
						<div class="form-group p-2 col-sm-12">
							<label class="m-0 font-weight-bold text-dark" for="Motivo"> MOTIVO DEL
								GASTO:                            </label>
							<input type="text" class="form-control col-sm-6 required" id="Motivo" name="Motivo"
								placeholder="">
						</div>
						<div class="form-group p-2 col-sm-12">
							<label class="m-0 font-weight-bold text-dark" for="Motivo"> FECHA COMPROBACION
								GASTO:       </label>
							<input type="date" class="form-control col-sm-6 required" id="fecha_comprobacion"
								name="fecha_comprobacion" placeholder="">
						</div>
						<div class="form-group p-2 col-sm-12">
							<label class="m-0 font-weight-bold text-dark " for="Empresa">EMPRESA:
								                                              </label>
							<select id="empresa" name="empresa" class="form-control" required>
								<option value="">Seleccione una opción</option>
							</select>
						</div>
					</div>
				</form>
				
				 <br> <br>
		
			</div>

		</div>

	</div>

</div>
