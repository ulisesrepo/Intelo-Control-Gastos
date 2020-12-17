<div class="row mr-2 ml-2">
	<div class="col-sm-12">
		<div class="section">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-dark">Concentrado de Gastos</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" id="dataTable_visualizacion" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th class="center">Nombre</th>
									<th class="center">Descripcion</th>
									<th class="center">Visualizar </th>
								</tr>
							</thead>

							<tbody>

								<tr>
									<td>Vehiculos</td>
									<td>Concentrado de gastos de Vehiculos</td>
									<td>
										<a class="btn btn-dark" id="btn_visualizar_vehiculos">
											<i class="fa fa-eye"></i>
										</a>

									</td>
								</tr>
								<tr>
									<td>Viaticos</td>
									<td>Concentrado de gastos de Viaticos</td>
									<td>

										<a class="btn btn-dark" id="btn_visualizar_viaticos">
											<i class="fa fa-eye"></i>
										</a>

									</td>
								</tr>
								<tr>
									<td>Gastos UDN</td>
									<td>Concentrado de gastos de Gastos UDN</td>
									<td>
										<a class="btn btn-dark" id='btn_visualizar_gastosudn'>
											<i class="fa fa-eye"></i>
										</a>

									</td>
								</tr>
								<tr>
									<td>Fletes</td>
									<td>Concentrado de gastos de Fletes</td>
									<td>

										<a class="btn btn-dark" id="btn_visualizar_fletes">
											<i class="fa fa-eye"></i>
										</a>

									</td>
								</tr>
								<tr>
									<td>Servicios UDN</td>
									<td>Concentrado de gastos de Servicios UDN</td>
									<td>

										<a class="btn btn-dark" id="btn_visualizar_servudn">
											<i class="fa fa-eye"></i>
										</a>

									</td>
								</tr>
								<tr>
									<td>Almacen</td>
									<td>Concentrado de gastos de Almacen</td>
									<td>

										<a class="btn btn-dark" id="btn_visualizar_almacen">
											<i class="fa fa-eye"></i>
										</a>

									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_visualizacion_vehiculos" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">Tabla Vehiculos</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped rounded table-sm "
						id="data_table_vizualizar_vehiculos" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th class="center"></th>
								<th class="center">id</th>
								<th class="center">Nombre</th>
								<th class="center">Empresa</th>
								<th class="center">Dia del Gasto</th>
								<th class="center">Plaza</th>
								<th class="center">Fecha de Captura</th>
								<th class="center">Unidad</th>
								<th class="center">Km inicial</th>
								<th class="center">Km final</th>
								<th class="center">Km total</th>
								<th class="center">Lts. Consumidos</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_visualizacion_viaticos" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">Tabla Viaticos</div>
			<div class="modal-body">

				<div class="table-responsive">
					<table class="table table-bordered table-striped rounded table-sm "
						id="data_table_vizualizar_viaticos" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th class="center">Nombre</th>
								<th class="center">Empresa</th>
								<th class="center">Dia del Gasto</th>
								<th class="center">Plaza</th>
								<th class="center">Fecha de Captura</th>
								<th class="center">Estacionamientos</th>
								<th class="center">Alimentos</th>
								<th class="center">Hospedaje</th>
								<th class="center">Taxis</th>
								<th class="center">Pasajes</th>
								<th class="center">No deducibles</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_visualizacion_gastosudn" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">Tabla Gastos UDN</div>
			<div class="modal-body">

				<div class="table-responsive">
					<table class="table table-bordered table-striped rounded table-sm "
						id="data_table_vizualizar_gastosudn" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>

								<th class="center"></th>
								<th class="center">id</th>
								<th class="center">Nombre</th>
								<th class="center">Empresa</th>
								<th class="center">Dia del Gasto</th>
								<th class="center">Plaza</th>
								<th class="center">Fecha de Captura</th>
								<th class="center">Papeleria</th>
								<th class="center">Mat.Empaque</th>
								<th class="center">Equi.Seguridad</th>
								<th class="center">Infracciones</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_visualizacion_fletes" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">Tabla Fletes</div>
			<div class="modal-body">

				<div class="table-responsive">
					<table class="table table-bordered table-striped rounded table-sm "
						id="data_table_vizualizar_fletes" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>


								<th class="center">id</th>
								<th class="center">Nombre</th>
								<th class="center">Empresa</th>
								<th class="center">Dia del Gasto</th>
								<th class="center">Plaza</th>
								<th class="center">Fecha de Captura</th>
								<th class="center">Maniobras</th>
								<th class="center">Infracciones</th>
								<th class="center">Fletes</th>
								<th class="center">Paqueteria</th>
								<th class="center">No deducibles</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_visualizacion_servudn" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">Tabla Servicios UDN</div>
			<div class="modal-body">

				<div class="table-responsive">
					<table class="table table-bordered table-striped rounded table-sm "
						id="data_table_vizualizar_servudn" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>

								<th class="center"></th>
								<th class="center">id</th>
								<th class="center">Nombre</th>
								<th class="center">Empresa</th>
								<th class="center">Dia del Gasto</th>
								<th class="center">Plaza</th>
								<th class="center">Fecha de Captura</th>
								<th class="center">Gas</th>
								<th class="center">Arren. Inmuebles</th>
								<th class="center">Servicios AGL</th>
								<th class="center">Mantto. Gral</th>
								<th class="center">Mantto. Almacen</th>
								<th class="center">Internet</th>
								<th class="center">Limpieza</th>
								

							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_visualizacion_almacen" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">Tabla Almacen</div>
			<div class="modal-body">

				<div class="table-responsive">
					<table class="table table-bordered table-striped rounded table-sm "
						id="data_table_vizualizar_almacen" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>

								
								<th class="center">id</th>
								<th class="center">Nombre</th>
								<th class="center">Empresa</th>
								<th class="center">Dia del Gasto</th>
								<th class="center">Plaza</th>
								<th class="center">Fecha de Captura</th>
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
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>


<!--

<div class="section">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Tabla Almacen</h5>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="dataTable_almacen" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class="center">Empresa</th>
							<th class="center">Dia del Gasto</th>
							<th class="center">Mes</th>
							<th class="center">Plaza</th>
							<th class="center">Cliente</th>
							<th class="center">Fecha de Captura</th>

						</tr>
					</thead>

					<tbody>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div> -->
