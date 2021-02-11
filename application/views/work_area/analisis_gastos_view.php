<div class="row mr-2 ml-2">
	<div class="col-sm-12">
		<div class="section">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-dark">Analisis de Gastos</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">

						<table class="table table-bordered table-striped rounded table-xl"
							id="dataTable_analisis_gastos" width="100%" cellspacing="0">
							<thead class="thead-light">

								<tr>
									<th class="center">Acciones</th>
									<th class="center">Estatus</th>
									<th class="center">id</th>
									<th class="center">Nombre</th>
									<th class="center">Empresa</th>
									<th class="center">Dia del Gasto</th>
									<th class="center">Mes</th>
									<th class="center">Plaza</th>
									<th class="center">Cliente</th>
									<th class="center">Fecha de Captura</th>
									<th class="center">Unidad</th>
									<th class="center">Km inicial</th>
									<th class="center">Km final</th>
									<th class="center">Km total</th>
									<th class="center">Lts. Consumidos</th>
									<th class="center">Rendimiento</th>
									<th class="center">Combustible</th>
									<th class="center">Casetas</th>
									<th class="center">Serv.unidades</th>
									<th class="center">No deducibles</th>
									<th class="center">Estacionamientos</th>
									<th class="center">Alimentos</th>
									<th class="center">Hospedaje</th>
									<th class="center">Taxis</th>
									<th class="center">Pasajes</th>
									<th class="center">No deducibles</th>
									<th class="center">Papeleria</th>
									<th class="center">Mat.Empaque</th>
									<th class="center">Equi.Seguridad</th>
									<th class="center">Infracciones</th>
									<th class="center">Plomeria</th>
									<th class="center">Ferreteria</th>
									<th class="center">Impuestos</th>
									<th class="center">Sistemas</th>
									<th class="center">Caja Chica</th>
									<th class="center">Asesoria</th>
									<th class="center">Arre.Unidades</th>
									<th class="center">Serv.Computo</th>
									<th class="center">No deducibles</th>
									<th class="center">Maniobras</th>
									<th class="center">Infracciones</th>
									<th class="center">Fletes</th>
									<th class="center">Paqueteria</th>
									<th class="center">No deducibles</th>
									<th class="center">Gas</th>
									<th class="center">Arre.Inmuebles</th>
									<th class="center">Servicios AGL</th>
									<th class="center">Mantto.Gral</th>
									<th class="center">Mantto.Almacen</th>
									<th class="center">Internet</th>
									<th class="center">Limpieza</th>
									<th class="center">Seguros</th>
									<th class="center">Seguridad</th>
									<th class="center">Monitoreo</th>
									<th class="center">Plagas</th>
									<th class="center">Basura</th>
									<th class="center">Higiene</th>
									<th class="center">Publicidad</th>
									<th class="center">Fianzas</th>
									<th class="center">Almacenaje</th>
									<th class="center">Facturacion</th>
									<th class="center">Gasto Legal</th>
									<th class="center">No deducibles</th>
									<th class="center">Merma</th>
									<th class="center">Sistemas</th>
									<th class="center">No deducibles</th>
								</tr>
							</thead>

							<tbody>


							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.form-register .steps li a .title .step-icon {
		width: 60px;
		margin-right: 122px;
		margin-left: -32px;
	}

	.form-register .steps li a .step-text {
		margin-left: -32px;
	}



</style>

<!-- ---------------------------------Modal pasos para editar------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_editar_registros" role="dialog" style="overflow-y: scroll;">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				Editar Registros
			</div>
			<div class="modal-body">
				<div class="card-body">
					<div class="page-content" style="background-image:">

						<div class="wizard-form">
							<div class="wizard-header">

							</div>
							<div class="row">
								<div class="col-sm-12">
									<form class="form-register" id="form_registros_update">
										<input type="text" id="id_general_update" style="display:none">
										<!-- <h6></h6> -->
										<div id="form-total">
											<!-- SECTION 1 -->
											<h2>
												<span class="step-icon"><i class="fas fa-store-alt"></i></span>
												<span class="step-text">General</span>
											</h2>
											<section>
												<div class="inner">
													<h3>General:</h3>
													<div class="row">
														<div class="col-sm-12">
															<!--inicio formulario de inputs boostrap -->
															<form id="form_datos_general">

																<div class="form-inline">
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="empresas_modal">Empresa:</label>
																		<input type="text" class="form-control"
																			id="empresas_modal" placeholder="" disabled>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="dia_gasto_modal">Dia
																			del
																			Gasto:       
																		</label>
																		<input type="text" class="form-control"
																			id="dia_gasto_modal" placeholder=""
																			disabled>
																	</div>


																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="mes_modal">Mes:        
																		</label>
																		<input type="text" class="form-control"
																			id="mes_modal" placeholder="" disabled>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="plaza_modal">Plaza:                     
																		</label>
																		<input type="text" class="form-control"
																			id="plaza_modal" placeholder="" disabled>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="cliente_modal">Cliente:   
																		</label>
																		<input type="text" class="form-control"
																			id="cliente_modal" placeholder="" disabled>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="fecha_cap_modal">Fecha
																			de
																			Captura:
																		</label>
																		<input type="text" class="form-control"
																			id="fecha_cap_modal" placeholder=""
																			disabled>
																	</div>
																
																	
																</div>
															</form>
														</div>
													</div>

												</div>
												<!--fin formulario de inputs boostrap -->
											</section>
											<!-- SECTION 2 -->
											<h2>
												<span class="step-icon"><i class="fa fa-shuttle-van"></i></span>
												<span class="step-text">Vehiculos</span>
											</h2>
											<section>
												<div class="inner">
													<h3>Vehiculos:</h3>
													<div class="row">
														<div class="col-sm-12">
															<!--inicio formulario de inputs boostrap -->
															<!-- <form id="id_form_vehiculo"> -->
															<div class="form-inline">
																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1"
																		for="unidad_modal">Unidad:                
																	</label>
																	<input type="text" class="form-control" id="unidad_modal"
																		placeholder="" disabled>
																</div>


																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1" for="km_inicial_modal">KM
																		Inicial:    
																	</label>
																	<input class="form-control" type="number"
																		id="km_inicial_modal" disabled/>
																</div>
																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1" for="km_final_modal">KM
																		Final:             
																	</label>
																	<input class="form-control" type="number"
																		id="km_final_modal" disabled/>
																</div>
																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1" for="km_total_modal">KM
																		Total:      
																	</label>
																	<input class="form-control" type="number"
																		id="km_total_modal" disabled /></div>

																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1" for="lts_consumidos_modal">Lts
																		Consumidos: 
																	</label>
																	<input class="form-control" type="number"
																		id="lts_consumidos_modal" disabled/></div>

																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1" for="rendimiento_modal">Rendimiento:
																	</label>
																	<input class="form-control" type="number"
																		id="rendimiento_modal" disabled /></div>

																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1"
																		for="combustible">Combustible:       
																	</label>
																	<div class="input-group mb-3">
																		<input type="text" class="form-control"
																			aria-describedby="basic-addon2" disabled
																			id="inputmodalcombustible">

																		<div class="input-group-append">
																			<a class="btn btn-success btn_agregar_costos_modal"
																				data-value="combustible">
																				<i class="fas fa-plus"></i>
																			</a>
																		</div>
																	</div>
																</div>
																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1" for="casetas">Casetas:
																		      </label>
																	<div class="input-group mb-3">
																		<input type="text" class="form-control"
																			aria-describedby="basic-addon2" disabled
																			id="inputmodalcasetas">
																		<div class="input-group-append">
																			<a class="btn btn-success btn_agregar_costos_modal"
																				data-value="casetas">
																				<i class="fa fa-plus"
																					aria-hidden="true"></i>
																			</a>
																		</div>
																	</div>
																</div>

																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1" for="noDeduVehi_modal">No
																		deducibles:   </label>
																	<input type="number" class="form-control"
																		id="noDeduVehi_modal" placeholder="">
																</div>

																<div class="form-group p-2 col-sm-6">
																	<label class="mr-1"
																		for="serviunidades">Ser.Unidades/Refacciones:</label>
																	<div class="input-group mb-3">
																		<input type="number" class="form-control"
																			aria-describedby="basic-addon2" disabled
																			id="inputmodalserviunidades">
																		<div class="input-group-append">
																			<a class="btn btn-success btn_agregar_costos_modal"
																				data-value="serviunidades">
																				<i class="fa fa-plus"
																					aria-hidden="true"></i>
																			</a>
																		</div>
																	</div>

																</div>


																<div
																	class="form-group p-2 col-sm-12 justify-content-sm-end">
																	<a id="btn_datos_vehiculos_modal" class="btn btn-info">
																		<i class="far fa-save"></i>  Guardar</a>
																</div>
															</div>
															<!-- </form> -->
														</div>
													</div>

												</div>
											</section>
											<!-- SECTION 3 -->
											<h2>
												<span class="step-icon"><i class="fas fa-wallet"></i></span>
												<span class="step-text">Viaticos</span>
											</h2>
											<section>
												<div class="inner">
													<h3>Viaticos:</h3>
													<div class="row">
														<div class="col-sm-12">
															<!--inicio formulario de inputs boostrap -->
															<form>
																<div class="form-inline">

																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="estacionamientoViaticos">Estacionamiento:</label>
																		<!--	<input type="text" class="form-control"
																	id="estacionamiento2" placeholder=""> -->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalestacionamientoViaticos">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="estacionamientoViaticos">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="alimentos">Alimentos:       
																		</label>
																		<!--	<input type="text" class="form-control" id="alimentos"
																	placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalalimentos">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="alimentos">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="hospedaje">Hospedaje:         
																		</label>
																		<!--	<input type="text" class="form-control" id="hospedaje"
																	placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalhospedaje">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="hospedaje">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="taxis">Taxis:               
																		</label>
																		<input type="number" class="form-control"
																			id="taxis" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="pasajes">Pasajes:             
																		</label>
																		<!--	<input type="text" class="form-control" id="pasajes"
																	placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalpasajes">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="pasajes">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="noDeduVia"> No
																			deducibles:</label>
																		<input type="number" class="form-control"
																			id="noDeduVia" placeholder="">
																	</div>
																	<div
																		class="form-group p-2 col-sm-12 justify-content-sm-end">
																		<a id="btn_datos_viaticos" class="btn btn-info">
																			<i class="far fa-save"></i>  Guardar</a>
																	</div>

																</div>
															</form>
														</div>
													</div>
												</div>
											</section>
											<!-- SECTION 4 -->
											<h2>
												<span class="step-icon"><i class="zmdi zmdi-card"></i></span>
												<span class="step-text">Gastos UDN</span>
											</h2>
											<section>
												<div class="inner">
													<h3>Gastos UDN:</h3>
													<div class="row">
														<div class="col-sm-12">
															<!--inicio formulario de inputs boostrap -->
															<form>
																<div class="form-inline">


																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="papeleria">
																			Papeleria:                  
																		</label>
																		<!--<input type="text" class="form-control" id="papeleria"
																	placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalpapeleria">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="papeleria">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="empaque">Material
																			empaque:</label>
																		<input type="number" class="form-control"
																			id="empaque" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="equipoSeguridad">Equipo
																			de
																			seguridad:</label>
																		<input type="number" class="form-control"
																			id="inputequipoSeguridad" placeholder="">

																	</div>

																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="infracciones">Infracciones:          </label>
																		<input type="number" class="form-control"
																			id="infracciones" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="plomeria">Plomeria:                   
																		</label>
																		<input type="number" class="form-control"
																			id="plomeria" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="ferreteria">Ferreteria:              </label>
																		<input type="number" class="form-control"
																			id="ferreteria" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="impuestos">
																			Impuestos:                  </label>
																		<!--<input type="text" class="form-control" id="impuestos"
																	placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalimpuestos">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="impuestos">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="sistemas">
																			Sistemas:               </label>
																		<!--<input type="text" class="form-control" id="sistemas"
																	placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalsistemas">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="sistemas">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="caja">Caja chica:
																			                </label>
																		<!--<input type="text" class="form-control" id="caja"
																	placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalcaja">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="caja">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="asesoria">Asesoria:                
																		</label>
																		<input type="number" class="form-control"
																			id="asesoria" placeholder="">

																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="arreunidades">Arrendam.
																			Unidades:
																		</label>
																		<!--	<input type="text" class="form-control"
																	id="arreunidades" placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalarreunidades">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="arreunidades">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="computo">Serv.computo:        </label>
																		<!--	<input type="text" class="form-control"
																	id="computo" placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalcomputo">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="computo">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="noDeduGastos"> No
																			deducibles:           </label>
																		<input type="number" class="form-control"
																			id="noDeduGastos" placeholder="">
																	</div>
																	<div
																		class="form-group p-2 col-sm-12 justify-content-sm-end">
																		<a id="btn_datos_gastosUDN"
																			class="btn btn-info"> <i
																				class="far fa-save"></i>  Guardar</a>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</section>
											<!-- SECTION 5 -->
											<h2>
												<span class="step-icon"><i class="fa fa-shipping-fast"></i></span>
												<span class="step-text">  Fletes</span>
											</h2>
											<section>
												<div class="inner">
													<h3>Fletes:</h3>
													<div class="row">
														<div class="col-sm-12">
															<!--inicio formulario de inputs boostrap -->
															<form>
																<div class="form-inline">

																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="maniobras">
																			Maniobras:      </label>
																		<input type="number" class="form-control"
																			id="inmaniobras" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="infraccionesFletes">
																			Infracciones:       
																		</label>
																		<input type="number" class="form-control"
																			id="infraccionesFletes" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="fletes">
																			Fletes:             </label>
																		<!--	<input type="text" class="form-control" id="fletes"
																	placeholder="">-->
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalfletes">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="fletes">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="paqueteria"> Serv.
																			Paqueteria:</label>
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalpaqueteria">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="paqueteria">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="noDeduFletes"> No
																			deducibles:</label>
																		<input type="number" class="form-control"
																			id="noDeduFletes" placeholder="">
																	</div>

																	<div
																		class="form-group p-2 col-sm-12 justify-content-sm-end">
																		<a id="btn_datos_fletes" class="btn btn-info">
																			<i class="far fa-save"></i>  Guardar</a>
																	</div>

																</div>
															</form>
														</div>
													</div>
												</div>
											</section>
											<!-- SECTION 6 -->
											<h2>
												<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
												<span class="step-text">Serv. UDN</span>
											</h2>
											<section>
												<div class="inner">
													<h3>Servicios UDN:</h3>
													<div class="row">
														<div class="col-sm-12">
															<!--inicio formulario de inputs boostrap -->
															<form>
																<div class="form-inline">
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="gas">Gas
																			LP:                             </label>
																		<input type="number" class="form-control"
																			id="gas" placeholder="">
																	</div>

																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="arrendamientoinmuebles">Arrendam.
																			inmuebles:  </label>
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalarrendamientoinmuebles">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="arrendamientoinmuebles">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1"
																			for="ServiciosAGL">Servicios(Agua,Luz,Gas):
																		</label>
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalServiciosAGL">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="ServiciosAGL">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>

																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="manttoGRAL">
																			Mantenimiento
																			general:</label>
																		<input type="number" class="form-control"
																			id="manttoGRAL" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="ManttoAlmacen">
																			Mantenimiento
																			Almacen:  </label>
																		<input type="number" class="form-control"
																			id="ManttoAlmacen" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="Internet">Telefonia
																			e
																			internet:      </label>
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalInternet">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="Internet">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="limpieza">
																			Articulos
																			Limpieza:            </label>
																		<input type="number" class="form-control"
																			id="limpieza" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="seguros"> Polizas
																			de seguro:
																			       </label>
																		<input type="number" class="form-control"
																			id="seguros" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="seguridad">
																			Seguridad
																			Privada:            </label>
																		<input type="number" class="form-control"
																			id="seguridad" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="monitoreo">
																			Servicio Monitoreo:
																			      </label>
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalmonitoreo">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="monitoreo">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="plagas"> Control
																			Plagas:                  </label>
																		<input type="number" class="form-control"
																			id="plagas" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="basura">
																			Recoleccion
																			Basura:      </label>
																		<input type="number" class="form-control"
																			id="basura" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="higiene"> Seguridad
																			e higiene:
																			       </label>
																		<input type="number" class="form-control"
																			id="higiene" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="publicidad1">
																			Publicidad:                  
																			 </label>
																		<input type="number" class="form-control"
																			id="publicidad1">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="fianzas">
																			Fianzas:                           
																		</label>
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalfianzas">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="fianzas">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="almacenaje">
																			Almacenaje:                   </label>
																		<input type="number" class="form-control"
																			id="almacenaje" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="facturacion">
																			Facturacion:                     
																		</label>
																		<div class="input-group mb-3">
																			<input type="number" class="form-control"
																				aria-describedby="basic-addon2" disabled
																				id="inputmodalfacturacion">
																			<div class="input-group-append">
																				<a class="btn btn-success btn_agregar_costos_modal"
																					data-value="facturacion">
																					<i class="fa fa-plus"
																						aria-hidden="true"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="gastolegal"> Gasto
																			Legal:                   </label>
																		<input type="number" class="form-control"
																			id="gastolegal" placeholder="">
																	</div>
																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="noDeduServ"> No
																			deducibles:                 </label>
																		<input type="number" class="form-control"
																			id="noDeduServ" placeholder="">
																	</div>
																	<div
																		class="form-group p-2 col-sm-12 justify-content-sm-end">
																		<a id="btn_datos_serviciosUDN"
																			class="btn btn-info"> <i
																				class="far fa-save"></i>  Guardar</a>
																	</div>

																</div>
															</form>
														</div>
													</div>
												</div>
											</section>
											<h2>
												<span class="step-icon"><i class="fa fa-warehouse"></i></span>
												<span class="step-text">Almacen</span>
											</h2>
											<section>
												<div class="inner">
													<h3>Almacen:</h3>
													<div class="row">
														<div class="col-sm-12">
															<!--inicio formulario de inputs boostrap -->
															<form>

																<div class="form-inline">

																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="merma_modal">
																			Merma:           </label>
																		<input type="number" class="form-control"
																			id="merma_modal" placeholder="">
																	</div>


																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="sistemasAlm_modal">
																			Sistemas:</label>
																		<input type="number" class="form-control"
																			id="sistemasAlm_modal" placeholder="">
																	</div>

																	<div class="form-group p-2 col-sm-6">
																		<label class="mr-1" for="noDeduAlm_modal"> No
																			deducibles:
																		</label>
																		<input type="number" class="form-control"
																			id="noDeduAlm_modal" placeholder="">
																	</div>
																	<div
																		class="form-group p-2 col-sm-12 justify-content-sm-end">
																		<a id="btn_datos_almacen_modal"
																			class="btn btn-info">
																			<i class="far fa-save"></i>  Guardar
																		</a>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</section>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<!-- -------------------------------------------------------------------------------------------------------------------------------- -->

<!-- --------------------------------Modal atributos hijos--------------------------------------------------------------------------- -->
<div class="modal fade" id="modal_costos_update"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg " role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="titulo"></h5>
				<button class="close btn_cancelar" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="id_Formulario_Modal">
					<div class="form-row">


						<input id="input_modal_update" type="text" class="d-none">

						<label for="recipient-name" class="col-form-label">No de
							Factura</label>
						<input type="text" class="form-control col-sm-2" id="no_factura" name="nombre_editar"
							maxlength="20"
							onKeyUp="document.getElementById(this.id).value = document.getElementById(this.id).value.toUpperCase()">


						<label for="recipient-name" class="col-form-label">Subtotal</label>
						<input type="number" class="form-control col-sm-2" id="sub_total" step="0.01" name="sub_total"
							maxlength="20">

						<label for="recipient-name" class="col-form-label">IVA</label>
						<input type="number" class="form-control col-sm-2" id="iva" name="iva" value="">


					</div>

					<div class="form-row">
						<div class="col-sm-12 d-flex justify-content-end">
							<a class="btn btn-success" id="btn_agregar_datos_tabla">
								<i class="fas fa-plus-circle"></i>
								Agregar
							</a>
						</div>

					</div>
				</form>
				<div class="form-row">
					<div class="table-responsive">
						<table class="table table-bordered table-striped rounded table-sm" id="data_table_costos_update"
							width="100%" cellspacing="0">
							<thead class="thead-light">
								<tr>
									<th class="text-center">No
										Factura</th>
									<th class="text-center">
										Subtotal</th>
									<th class="text-center">IVA
									</th>
									<th class="text-center">
										Total</th>
									<th class="text-center">
										Quitar</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger btn_cancelar" id="btn_cancelar_privada_editar" data-dismiss="modal"
					aria-label="Close"> <i class="fas fa-times"></i>
					Cancelar
				</a>
				<a class="btn btn-info" id="btn_guardar_tabla_update">
					<i class="far fa-save"></i>  Guardar</a>
			</div>
		</div>
	</div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------- -->
