<div class="row  mr-2 ml-2">
	<div class="col-sm-12">
		<div class="inner">
			<div class="section">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h5 class="m-0 font-weight-bold text-dark">Registro Usuarios</h5>
					</div>
					<div class="card-body">
						<form id="form_empleados">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nombre">Nombre(s):</label>
									<input type="text" class="form-control required" id="nombre" name="nombre"
										minlength="3" pattern="[a-z]">
								</div>
								<div class="form-group col-md-6">
									<label for="apellidos">Apellidos</label>
									<input type="text" class="form-control required" id="apellidos" name="apellidos"
										minlength="3">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="email">E-mail:</label>
									<input type="email" class="form-control required email" id="email" name="email"
										minlength="3">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="password">Contraseña:</label>
									<input type="password" name="password" class="form-control password1 required"
										value="" minlength="6"/>
									<span id="show-password"> <i class="fa fa-fw fa-eye password-icon show-password"
											id="eye"></i></span>
								</div>
								<div class="form-group col-md-4">
									<label for="sucursal">Sucursal</label>
									<select id="sucursal" name="sucursal" class="form-control" required>
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
									<label for="id_usuario">Tipo usuario</label>
									<select id="id_usuario" name="id_usuario" class="form-control required" required>
									<option selected disabled value="">Elige uno...</option>
										<option value="1">Administrador</option>
										<option value="2">Empleado</option>

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
			</div>
		</div>
	</div>
</div>
