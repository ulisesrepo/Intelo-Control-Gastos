<div class="row mr-2 ml-2">
	<div class="col-sm-12">
		<div class="section">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-dark">Lista Usuarios</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped rounded table-sm "
							id="dataTable_listaempleados" width="100%" cellspacing="0">
							<thead class="thead-light">
								<tr>
									<th class="center"></th>
									<th class="center">Nombre</th>
									<th class="center">Email</th>
									<th class="center">Sucursal</th>
									<th class="center">Tipo Usuario</th>
									<th class="center">Estatus</th>
									<th class="center">Acciones</th>
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

<div class="modal fade" id="modal_editar_empleados" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">Editar Empleado</div>
			<div class="modal-body">
				<div class="card-body">
					<form id="form_empleados_update">
						<input type="text" id="id_empleado_update" style="display:none">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="email_modal">E-mail:</label>
								<input type="email" class="form-control required email" id="email_modal"
									name="email_modal" minlength="3">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="password_modal">Contraseña:</label>
								<input type="password" name="password_modal" id="password_modal"
									class="form-control password1 required" value="" minlength="6" />
								<span id="show-password"> <i class="fa fa-fw fa-eye password-icon show-password"
										id="eye"></i></span>
							</div>
							<div class="form-group col-md-4">
								<label for="sucursal_modal">Sucursal</label>
								<select id="sucursal_modal" name="sucursal_modal" class="form-control" required>
									<option selected disabled value="">Elige una...</option>
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
							<div class="form-group col-md-4">
								<label for="id_usuario_modal">Tipo usuario</label>
								<select id="id_usuario_modal" name="id_usuario_modal" class="form-control" required>
									<option selected disabled value="">Elige uno...</option>
									<option value="1">Administrador</option>
									<option value="2">Empleado</option>
									<option value="3">Analista</option>

								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group p-2 col-md-12 justify-content-sm-end">
								<button type="submit" class="btn btn-info">
									<i class="far fa-save"></i>  Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
