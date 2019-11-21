<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>SIMPEI</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Acme|Baloo+Bhai|Candal|Squada+One&display=swap" rel="stylesheet">

</head>


<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="background-color: #e9ecef;">

	<div class="login-box">
		<a href="" class="brand-link text-center">
			<img src="<?php echo BASE_URL ?>assets/images/logo.png" alt="AdminLTE Logo" class=" img-circle imgLogin" width="80" style="margin-left: 7px;
    text-align: center;
    margin-top: -29px;
    position: absolute;
    z-index: 9999;">
		</a>
		<!-- /.login-logo -->
		<div class="card" style="box-shadow: 5px 10px 8px #888888 !important; ">
			<div class="card-body login-card-body " style="border-radius: 20px !important;">
			<br>
				<p class="login-box-msg">Sistema de Manutenção de Equipamentos Industriais</p>

				<form action="<?php BASE_URL ?>login" method="post">
					<div class="input-group mb-3">
						<input type="text" name="usuario" class="form-control" placeholder="Usuário">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="senha" class="form-control" placeholder="Senha">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">

						</div>
						<!-- /.col -->
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->



	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="<?php echo BASE_URL ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo BASE_URL ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo BASE_URL ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo BASE_URL ?>assets/js/adminlte.js"></script>
	<script src="<?php echo BASE_URL ?>assets/js/script.js"></script>

	<!-- OPTIONAL SCRIPTS -->
	<script src="<?php echo BASE_URL ?>assets/js/demo.js"></script>

	<!-- PAGE <?php echo BASE_URL ?>assets/PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="<?php echo BASE_URL ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="<?php echo BASE_URL ?>assets/plugins/raphael/raphael.min.js"></script>
	<script src="<?php echo BASE_URL ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="<?php echo BASE_URL ?>assets/plugins/jquery-mapael/maps/world_countries.min.js"></script>
	<!-- ChartJS -->
	<script src="<?php echo BASE_URL ?>assets/plugins/chart.js/Chart.min.js"></script>

	<!-- PAGE SCRIPTS -->
	<script src="<?php echo BASE_URL ?>assets/js/pages/dashboard2.js"></script>
</body>

</html>