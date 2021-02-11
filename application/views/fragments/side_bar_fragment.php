<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="Principal">
		<img src="assets/img/intelo123.png" width="128" height="78">
	</a>
	<hr class="sidebar-divider my-0">
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		Menu
	</div>
	<?php 
    $tipo_empleado = $_SESSION['id_usuario'];
    if($tipo_empleado == 1) {
  ?>
	<li class="nav-item">
		<a class="nav-link" href="Principal">
			<i class="fas fa-tasks"></i>
			<span>Control de Gastos</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="Tablas">
			<i class="fa fa-table"></i>
			<span>Concentrado de Gastos</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="AnalisisGastos">
			<i class="fas fa-folder-open"></i>
			<span>Analisis de Gastos</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="CaratulaGastos">
			<i class="fa fa-file-alt"></i>
			<span>Caratula de Gastos</span></a>
	</li>
	<hr class="sidebar-divider">
	<!-- Heading -->
	<div class="sidebar-heading">
		Catalogos
	</div>
	<!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true"
			aria-controls="collapseTree">
			<i class="fas fa-address-book"></i>
			<span>Gestion Usuarios</span>
		</a>
		<div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">


				<a class="collapse-item" href="Empleados"> <i class="fas fa-id-card"></i> Registro de Usuarios</a>

				<a class="collapse-item" href="ListaEmpleados"> <i class="fa fa-table"></i>  Lista de Usuarios</a>

			</div>
		</div>
	</li>

	<?php  } else if($tipo_empleado == 2) {?>
	<li class="nav-item">
		<a class="nav-link" href="Principal">
			<i class="fas fa-tasks"></i>
			<span>Control de Gastos</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="Tablas">
			<i class="fa fa-table"></i>
			<span>Concentrado de Gastos</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="CaratulaGastos">
			<i class="fa fa-file-alt"></i>
			<span>Caratula de Gastos</span></a>
	</li>

	<?php  } else if($tipo_empleado == 3) {?>

	<li class="nav-item">
		<a class="nav-link" href="AnalisisGastos">
			<i class="fas fa-folder-open"></i>
			<span>Analisis de Gastos</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="CaratulaGastos">
			<i class="fa fa-file-alt"></i>
			<span>Caratula de Gastos</span></a>
	</li>
	<?php  } ?>
	<hr class="sidebar-divider d-none d-md-block">
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>
