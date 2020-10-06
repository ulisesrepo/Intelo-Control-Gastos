<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url();?>/assets/img/intelo_ico.ico" />
	<title><?=$titulo;?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- Custom fonts for this template-->
	<link href="<?=base_url();?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="<?=base_url();?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
	<!-- data table -->
	<link href="<?=base_url();?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="<?=base_url();?>static/css/roboto-font.css"> -->
	<link rel="stylesheet" type="text/css"
		href="<?=base_url();?>static/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>static/css/jquery-ui.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="<?=base_url();?>static/css/style.css" />
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" />

	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/spinner.css">

</head>
<style>
	.bg-gradient-primary {
		background-color: #4e73dff2 !important;
		background-image: linear-gradient(180deg, #0f684873 10%, #77d1f4 100%) !important;
		background-size: cover !important;
	}

	.wizard-v3-content {
		width: 110% !important;
		;
	}

	.btn {
		color: aliceblue !important;
		;
	}

</style>
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<?=$side_bar;?>
		<!-- End of Sidebar -->
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<?=$top_bar;?>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<?=$work_area;?>
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->
			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Intelo WEB 2020</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->
		</div>
		<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->
	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
					<a class="btn btn-primary" href="<?=base_url();?>Inicio">Cerrar Sesion</a>
				</div>
			</div>
		</div>
	</div>




	<!-- Bootstrap core JavaScript-->
	<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 

	<script src="https://momentjs.com/downloads/moment.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="<?=base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="<?=base_url();?>assets/js/sb-admin-2.min.js"></script>
	<!-- Page level plugins -->
	<script src="<?=base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<!-- my_jquerys the app -->
	<!-- wizar -->
	<script src="<?=base_url();?>static/js/jquery.steps.js"></script>
	<script src="<?=base_url();?>static/js/main.js"></script>

	<!-- mi jq -->
	<script src="<?=base_url();?>static/my_jquerys/<?=$my_jquery;?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!--Graficas-->
	<!-- Page level plugins -->
	<!-- <script src="<?=base_url();?>assets/vendor/chart.js/Chart.min.js"></script> -->
	<!-- Page level custom scripts -->
	<!-- <script src="<?=base_url();?>assets/js/demo/chart-area-demo.js"></script>
	<script src="<?=base_url();?>assets/js/demo/chart-pie-demo.js"></script>
	<script src="<?=base_url();?>assets/js/demo/chart-bar-demo.js"></script> -->
	<!--Graficas-->
	<!--Tablas-->
	<!-- Page level plugins -->
	<!-- <script src="<?=base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

	<!-- Page level custom scripts -->
	<script src="<?=base_url();?>assets/js/demo/datatables-demo.js"></script>
	<!--Tablas-->

	<script>
		$(document).on('click', '#btn_imprimir', function () {
			el = 'ImprimirC'
			printContent(el)
			
		});
		function printContent(el) {

			document.getElementById('btn_imprimir').style.display = 'none';
			var restorepage = $('body').html();
			var printcontent = $('#' + el).clone();
			$('body').empty().html(printcontent);
			window.print();
			
			$('body').html(restorepage);
			document.getElementById('btn_imprimir').style.display = '';
		}
	</script>
	

</body>

</html>
