<div class="row  mr-2 ml-2">
	<div class="col-sm-12">
		<div class="inner">
			<div class="section">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h5 class="m-0 font-weight-bold text-dark">Registro Usuarios</h5>
					</div>
					<div class="card-body">
						<form action="#" method="post">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nombre">Nombre(s):</label>
									<input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
								</div>
								<div class="form-group col-md-6">
									<label for="apellidos">Apellidos</label>
									<input type="text" class="form-control" id="apellidos" name="apellidos"
										placeholder="">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="email">E-mail:</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="password">Contraseña:</label>
									<input type="password" name="password" class="form-control password1"
										value="password" placeholder="" />
									<span id="show-password"> <i class="fa fa-fw fa-eye password-icon show-password"
											id="eye"></i></span>
								</div>
								<div class="form-group col-md-6">
									<label for="sucursal">Sucursal</label>
									<select id="sucursal" name="sucursal" class="form-control">

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
							</div>
							<div class="form-row">
								<div class="form-group p-2 col-md-12 justify-content-sm-end">
									<a id="btn_datos_empleados" class="btn btn-info"> 
									<i class="far fa-save"></i>  Guardar</a>
								</div>
							</div>  
						</form> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
