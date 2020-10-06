<!DOCTYPE html>
<html>
<head>

	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url();?>/assets/img/intelo_ico.ico" />
	<title><?=$titulo;?></title>

	
	<!-- Custom styles for this template-->
	<link href="<?=base_url();?>/assets/css/login.css" rel="stylesheet">

</head>

<body>
	<div class="login">

	<img src="assets/img/intelo123.png" width="300"
       height="150">
	   
		<h1>Login</h1>  
		
		<form method="post" action="<?=base_url();?>Principal">
			<input type="text" name="u" placeholder="Username" required="required" />
			<input type="password" name="p" placeholder="Password" required="required" />
			<button type="submit" class="btn btn-primary btn-block btn-large">Dejame Entrar.</button>
		</form>
	</div>
</body>


<!-- <script src="<?=base_url();?>static/js/login.js"></script> -->

</html>
