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
							 &nbsp;
							<button type="submit" class="btn btn-info" id="btn_imprimir" data-dismiss="modal" aria-label="Close"> <i
									class="fas fa-search"></i>
								Buscar
							</button>
						</div>
						<div class="form-group p-2 col-sm-12">
							<label class="m-0 font-weight-bold text-dark " for="Empresa">EMPRESA:
								                                              </label>
							<input type="text" class="form-control col-sm-6" id="empresas" name="empresas" 
								placeholder="" readonly>
						</div>
					</div>
				</form>
				<br> <br>
				<div class="table-responsive">
					<table class="table table-bordered table-sm" id="dataTable_detalle_gastos" width="100%"
						cellspacing="0">
						<thead>
							<tr class="table-info">
								<th class="center m-0 font-weight-bold text-dark">GRUPO GASTO</th>
								<th class="center m-0 font-weight-bold text-dark">TIPO GASTO</th>
								<th class="center m-0 font-weight-bold text-dark">TOTAL (I.v.a incluido)</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<br> <br>
				<div class="form-inline">
					<div class=" d-flex justify-content-end form-group p-2 col-sm-12">
						<label class="m-0 font-weight-bold text-dark" for="Total">TOTAL GASTADO:    </label>
						<input type="text" class="form-control col-sm-3" id="total" placeholder="">
					</div>
					<div class=" d-flex justify-content-end form-group p-2 col-sm-12">
						<label class="m-0 font-weight-bold text-dark" for="totalAuto">TOTAL AUTORIZADO:    </label>
						<input type="text" class="form-control col-sm-3" id="totalAuto" placeholder="">
					</div>
					<div class=" d-flex justify-content-end form-group p-2 col-sm-12">
						<label class="m-0 font-weight-bold text-dark" for="diferencia">DIF. A. FAVOR L23R:   </label>
						<input type="text" class="form-control col-sm-3" id="diferencia" placeholder="">
					</div>

				</div>
				<br> <br>
				<div class="form-inline d-flex justify-content-end p-2">
					<a class="btn btn-info " id="btn_imprimir" data-dismiss="modal" aria-label="Close"> <i
							class="fas fa-print"></i>
						Imprimir
					</a>
				</div>
				<!-- <div class="d-flex bd-highlight mb-0">
					<div class="mr-auto p-2 bd-highlight m-0 font-weight-bold text-dark">___________________________
					</div>
					<div class="p-2 bd-highlight m-0 font-weight-bold text-dark">___________________________</div>

				</div>
				<div class="d-flex bd-highlight mb-4">
					<div class="mr-auto p-2 bd-highlight m-0 font-weight-bold text-dark"> ENTREGA COMPROBACIÓN</div>
					<div class="p-2 bd-highlight m-0 font-weight-bold text-dark">RECIBE COMPROBACIÓN
						 </div>

				</div> -->



			</div>

		</div>

	</div>


</div>
