<div class="row">
	<div class="col-sm-12">
		<div class="page-content" style="background-image:">
			<div class="wizard-v3-content mt-0">
				<div class="wizard-form">
					<div class="wizard-header">
						<h3 class="heading">Control de Gastos</h3>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<form class="form-register" action="#" method="post">
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
																<label class="mr-1" for="empresas">Empresa:</label>

																<select id="empresas" for="empresas"
																	class="form-control" required>
																	<option selected disabled value="">Elige una...
																	</option>
																	<option value="L23R">L23R</option>
																	<option value="Logistorage">Logistorage</option>
																	<option value="Securintelo">Securintelo</option>
																</select>
															</div>

															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="dia_gasto">Dia del
																	Gasto:       
																</label>
																<input type="date" class="form-control" id="dia_gasto"
																	placeholder="">
															</div>


															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="mes">Mes:         </label>
																<select for="mes" class="form-control" id="Mes"
																	placeholder="">
																	<option value="Enero">Enero</option>
																	<option value="Febrero">Febrero</option>
																	<option value="Marzo">Marzo</option>
																	<option value="Abril">Abril</option>
																	<option value="Mayo">Mayo</option>
																	<option value="Junio">Junio</option>
																	<option value="Julio">Julio</option>
																	<option value="Agosto">Agosto</option>
																	<option value="Septiembre">Septiembre</option>
																	<option value="Octubre">Octubre</option>
																	<option value="Noviembre">Noviembre</option>
																	<option value="Diciembre">Diciembre</option>
																</select>
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1"
																	for="plaza">Plaza:                     </label>
																<select for="plaza" class="form-control" id="Plaza"
																	placeholder="">
																	<option value="Colima">Colima</option>
																	<option value="Guadalajara">Guadalajara</option>
																	<option value="Irapuato">Irapuato</option>
																	<option value="Leon">Leon</option>
																	<option value="Monterrey">Monterrey</option>
																	<option value="Querétaro">Querétaro</option>
																	<option value="Potosi">San Luis Potosi</option>
																	<option value="Tepic">Tepic</option>
																</select>
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="cliente">Cliente:    </label>
																<select for="cliente" class="form-control" id="cliente"
																	placeholder="">
																	<option value="Administrativo">Administrativo
																	</option>
																	<option value="Asturiano">Asturiano</option>
																	<option value="AT&T">AT&T</option>
																	<option value="Colgate">Colgate</option>
																	<option value="Guvelink">Guvelink</option>
																	<option value="Magnalogic">Magnalogic</option>
																	<option value="Operativo">Operativo</option>
																	<option value="Quinto">Quinto Sol</option>
																	<option value="Supercomercial">Supercomercial
																	</option>

																</select>
															</div>

															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="fecha_cap">Fecha de Captura:
																</label>
																<input type="date" class="form-control" id="fecha_cap"
																	name="fecha_cap" value="<?php echo date("Y-m-d");?>"
																	disabled>
															</div>
															<div
																class="form-group p-2 col-sm-12 justify-content-sm-end">
																<a id="btn_datos_general" class="btn btn-info"> <i
																		class="far fa-save"></i>  Guardar</a>
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
															<label class="mr-1" for="unidad">Unidad:                
															</label>
															<input type="text" class="form-control" id="unidad"
																placeholder="">
														</div>


														<div class="form-group p-2 col-sm-6">
															<label class="mr-1" for="km_inicial">KM Inicial:    
															</label>
															<input class="form-control" type="number" id="km_inicial" />
														</div>
														<div class="form-group p-2 col-sm-6">
															<label class="mr-1" for="km_final">KM Final:             
															</label>
															<input class="form-control" type="number" id="km_final" />
														</div>
														<div class="form-group p-2 col-sm-6">
															<label class="mr-1" for="km_total">KM Total:      
															</label>
															<input class="form-control" type="number" id="km_total"
																disabled /></div>

														<div class="form-group p-2 col-sm-6">
															<label class="mr-1" for="lts_consumidos">Lts Consumidos: 
															</label>
															<input class="form-control" type="number"
																id="lts_consumidos" /></div>

														<div class="form-group p-2 col-sm-6">
															<label class="mr-1" for="rendimiento">Rendimiento:
															</label>
															<input class="form-control" type="number" id="rendimiento"
																disabled /></div>

														<div class="form-group p-2 col-sm-6">
															<label class="mr-1" for="combustible">Combustible:       
															</label>
															<div class="input-group mb-3">
																<input type="text" class="form-control"
																	aria-describedby="basic-addon2" disabled
																	id="inputcombustible">

																<div class="input-group-append">
																	<a class="btn btn-success btn_agregar_costos"
																		data-value="combustible">
																		<i class="fas fa-plus"></i>
																	</a>
																</div>
															</div>
														</div>
														<div class="form-group p-2 col-sm-6">
															<label class="mr-1" for="casetas">Casetas:
																      </label>
															<!-- <input type="text" class="form-control" id="casetas"
																	placeholder=""> -->
															<div class="input-group mb-3">
																<input type="text" class="form-control"
																	aria-describedby="basic-addon2" disabled
																	id="inputcasetas">
																<div class="input-group-append">
																	<a class="btn btn-success btn_agregar_costos"
																		data-value="casetas">
																		<i class="fa fa-plus" aria-hidden="true"></i>
																	</a>
																</div>
															</div>
														</div>

														<div class="form-group p-2 col-sm-6">
															<label class="mr-1" for="noDeduVehi">No
																deducibles:   </label>
															<input type="number" class="form-control" id="noDeduVehi">
														</div>

														<div class="form-group p-2 col-sm-6">
															<label class="mr-1"
																for="serviunidades">Ser.Unidades/Refacciones:</label>
															<div class="input-group mb-3">
																<input type="number" class="form-control"
																	aria-describedby="basic-addon2" disabled
																	id="inputserviunidades">
																<div class="input-group-append">
																	<a class="btn btn-success btn_agregar_costos"
																		data-value="serviunidades">
																		<i class="fa fa-plus" aria-hidden="true"></i>
																	</a>
																</div>
															</div>

														</div>


														<div class="form-group p-2 col-sm-12 justify-content-sm-end">
															<a id="btn_datos_vehiculo" class="btn btn-info"> <i
																	class="far fa-save"></i>  Guardar</a>
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
																		id="inputestacionamientoViaticos">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
																			data-value="estacionamientoViaticos">
																			<i class="fa fa-plus"
																				aria-hidden="true"></i>
																		</a>
																	</div>
																</div>
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="alimentos">Alimentos:       
																</label>
																<!--	<input type="text" class="form-control" id="alimentos"
																	placeholder="">-->
																<div class="input-group mb-3">
																	<input type="number" class="form-control"
																		aria-describedby="basic-addon2" disabled
																		id="inputalimentos">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
																			data-value="alimentos">
																			<i class="fa fa-plus"
																				aria-hidden="true"></i>
																		</a>
																	</div>
																</div>
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="hospedaje">Hospedaje:         
																</label>
																<!--	<input type="text" class="form-control" id="hospedaje"
																	placeholder="">-->
																<div class="input-group mb-3">
																	<input type="number" class="form-control"
																		aria-describedby="basic-addon2" disabled
																		id="inputhospedaje">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
																			data-value="hospedaje">
																			<i class="fa fa-plus"
																				aria-hidden="true"></i>
																		</a>
																	</div>
																</div>
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="taxis">Taxis:               
																</label>
																<input type="number" class="form-control" id="taxis"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="pasajes">Pasajes:             
																</label>
																<!--	<input type="text" class="form-control" id="pasajes"
																	placeholder="">-->
																<div class="input-group mb-3">
																	<input type="number" class="form-control"
																		aria-describedby="basic-addon2" disabled
																		id="inputpasajes">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																<input type="number" class="form-control" id="noDeduVia"
																	placeholder="">
															</div>
															<div
																class="form-group p-2 col-sm-12 justify-content-sm-end">
																<a id="btn_datos_viaticos" class="btn btn-info"> <i
																		class="far fa-save"></i>  Guardar</a>
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
																		id="inputpapeleria">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																<input type="number" class="form-control" id="empaque"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="equipoSeguridad">Equipo de
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
																	for="plomeria">Plomeria:                    </label>
																<input type="number" class="form-control" id="plomeria"
																	placeholder="">
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
																		id="inputimpuestos">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																		id="inputsistemas">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																		id="inputcaja">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																<input type="number" class="form-control" id="asesoria"
																	placeholder="">

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
																		id="inputarreunidades">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																		id="inputcomputo">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																<a id="btn_datos_gastosUDN" class="btn btn-info"> <i
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
																		id="inputfletes">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																		id="inputpaqueteria">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																<a id="btn_datos_fletes" class="btn btn-info"> <i
																		class="far fa-save"></i>  Guardar</a>
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
																<input type="number" class="form-control" id="gas"
																	placeholder="">
															</div>

															<div class="form-group p-2 col-sm-6">
																<label class="mr-1"
																	for="arrendamientoinmuebles">Arrendam.
																	inmuebles:  </label>
																<div class="input-group mb-3">
																	<input type="number" class="form-control"
																		aria-describedby="basic-addon2" disabled
																		id="inputarrendamientoinmuebles">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																		id="inputServiciosAGL">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
																			data-value="ServiciosAGL">
																			<i class="fa fa-plus"
																				aria-hidden="true"></i>
																		</a>
																	</div>
																</div>

															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="manttoGRAL"> Mantenimiento
																	general:</label>
																<input type="number" class="form-control"
																	id="manttoGRAL" placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="ManttoAlmacen"> Mantenimiento
																	Almacen:  </label>
																<input type="number" class="form-control"
																	id="ManttoAlmacen" placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="Internet">Telefonia e
																	internet:      </label>
																<div class="input-group mb-3">
																	<input type="number" class="form-control"
																		aria-describedby="basic-addon2" disabled
																		id="inputInternet">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
																			data-value="Internet">
																			<i class="fa fa-plus"
																				aria-hidden="true"></i>
																		</a>
																	</div>
																</div>
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="limpieza"> Articulos
																	Limpieza:            </label>
																<input type="number" class="form-control" id="limpieza"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="seguros"> Polizas de seguro:
																	       </label>
																<input type="number" class="form-control" id="seguros"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="seguridad"> Seguridad
																	Privada:            </label>
																<input type="number" class="form-control" id="seguridad"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="monitoreo"> Servicio Monitoreo:
																	      </label>
																<div class="input-group mb-3">
																	<input type="number" class="form-control"
																		aria-describedby="basic-addon2" disabled
																		id="inputmonitoreo">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																<input type="number" class="form-control" id="plagas"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="basura"> Recoleccion
																	Basura:      </label>
																<input type="number" class="form-control" id="basura"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="higiene"> Seguridad e higiene:
																	       </label>
																<input type="number" class="form-control" id="higiene"
																	placeholder="">
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
																	Fianzas:                            </label>
																<div class="input-group mb-3">
																	<input type="number" class="form-control"
																		aria-describedby="basic-addon2" disabled
																		id="inputfianzas">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																	Facturacion:                      </label>
																<div class="input-group mb-3">
																	<input type="number" class="form-control"
																		aria-describedby="basic-addon2" disabled
																		id="inputfacturacion">
																	<div class="input-group-append">
																		<a class="btn btn-success btn_agregar_costos"
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
																<a id="btn_datos_serviciosUDN" class="btn btn-info"> <i
																		class="far fa-save"></i>  Guardar</a>
															</div>

														</div>
													</form>
												</div>
											</div>
										</div>
									</section>
									<!-- SECTION 7 
										<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
										<span class="step-text">    RH</span>
									</h2>
									<section>
										<div class="inner">
											<h3>RH:</h3>
											<div class="row">
												<div class="col-sm-12">
												
													<form>
														<div class="form-inline">

															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="estacionamiento2"> PRESTAMOS
																	INTERCOMPAÑIAS : </label>
																<input type="text" class="form-control"
																	id="estacionamiento2" placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="alimentos"> INFONAVIT: </label>
																<input type="text" class="form-control" id="alimentos"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="hospedaje"> Nominas :</label>
																<input type="text" class="form-control" id="hospedaje"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="taxis"> GASTO DE RECLUTAMIENTO
																	:</label>
																<input type="text" class="form-control" id="taxis"
																	placeholder="">
															</div>
															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="traslado"> GASTO ADMINISTRATIVO
																	:</label>
																<input type="text" class="form-control" id="traslado"
																	placeholder="">
															</div>

														</div>
													</form>
												</div>
											</div>
										</div>
									</section> -->
									<!-- SECTION 8 -->
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
																<label class="mr-1" for="merma">
																	Merma:           </label>
																<input type="number" class="form-control" id="merma"
																	placeholder="">
															</div>


															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="sistemasAlm"> Sistemas:</label>
																<input type="number" class="form-control"
																	id="sistemasAlm" placeholder="">
															</div>

															<div class="form-group p-2 col-sm-6">
																<label class="mr-1" for="noDeduAlm"> No deducibles:
																</label>
																<input type="number" class="form-control" id="noDeduAlm"
																	placeholder="">
															</div>
															<div
																class="form-group p-2 col-sm-12 justify-content-sm-end">
																<a id="btn_datos_almacen" class="btn btn-info"> <i
																		class="far fa-save"></i>  Guardar
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
</div>
<div class="modal fade" id="modal_costos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
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


						<input id="input_modal" type="text" class="d-none">

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
						<table class="table table-bordered table-striped rounded table-sm" id="data_table_costos"
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
				<a class="btn btn-info" id="btn_guardar_tabla">
					<i class="far fa-save"></i>  Guardar</a>
			</div>
		</div>
	</div>
</div>
