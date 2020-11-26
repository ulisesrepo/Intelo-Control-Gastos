<!DOCTYPE html>
<html>

<head>

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
	<link rel="stylesheet" type="text/css"
		href="<?=base_url();?>static/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Custom styles for this template-->
	<link href="<?=base_url();?>/assets/css/login.css" rel="stylesheet">

</head>
<style>
	.password-icon {
		float: right;
		position: relative;
		margin: -35px 10px 0 0;
		cursor: pointer;
	}

	.error {
		color: #dc3545 !important;
		font-size: 15px !important;
		position: relative !important;
		line-height: 1 !important;
		width: 100% !important;
		margin-top: .60rem !important;
	}

</style>

<body>
	<div class="login">

		<img src="assets/img/intelo123.png" width="300" height="150">

		<h1>Inicio Sesion</h1>

		<form id="login">
			<input id="user" name="user" type="email" class="form-control required email" />
			<input type="password" name="password" id="password" class="form-control password1 required" value=""
				minlength="6" />
			<span id="show-password"> <i class="fa fa-fw fa-eye password-icon show-password" id="eye"></i></span>
			<button type="submit" class="btn btn-primary btn-block btn-large">Ingresar.</button>
		</form>
	</div>

	<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?=base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?=base_url();?>static/my_jquerys/<?=$my_jquery;?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<!--Tablas-->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> -->

	<script src="<?=base_url();?>static/vendor/form_validate/jquery.validate.min.js"></script>
	<script src="<?=base_url();?>static/vendor/form_validate/app_charateres.js"></script>
	<script src="<?=base_url();?>static/vendor/form_validate/messages_es.js"></script>
</body>

</html>
