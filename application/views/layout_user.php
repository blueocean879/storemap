<!DOCTYPE html>
<html lang="en">
	<head>
		  <title><?=isset($title)?$title:'AdminLite PHP Admin Panel' ?></title>
		  <!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <meta name = "description" content = "Mappr Dashboard" />
		  <!-- Bootstrap 3.3.6 -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		  <!-- Ionicons -->
			<script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
			<link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
			 <!-- Theme style -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/AdminLTE.min.css">
		  <!-- Datatable style -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
		  <!-- Custom CSS -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/style.css">
		  <!-- AdminLTE Skins. Choose a skin from the css/skins
			   folder instead of downloading all of them to reduce the load. -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/skins/skin-purple.min.css">
		  <!-- jQuery 2.2.3 -->
		  <script src="<?= base_url() ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>

	</head>
	<body class="hold-transition skin-purple sidebar-mini">
		<div class="wrapper" style="height: auto;">
			<?php if($this->session->flashdata('msg') != ''): ?>
			    <div class="alert alert-warning flash-msg alert-dismissible">
			      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			      <h4> Success!</h4>
			      <?= $this->session->flashdata('msg'); ?>
			    </div>
			<?php endif; ?>

			<section id="container">
				<!--header start-->
				<header class="header white-bg">
					<?php include('include/navbar.php'); ?>
				</header>
				<!--header end-->
				<!--sidebar start-->
				<aside>
					<?php include('include/sidebar.php'); ?>
				</aside>
				<!--sidebar end-->
				<!--main content start-->
				<section id="main-content">
					<div class="content-wrapper" style="min-height: 394px; padding:15px;">
						<!-- page start-->
						<?php $this->load->view($view);?>
						<!-- page end-->
					</div>
				</section>
				<!--main content end-->
				<!--footer start-->
				<footer class="main-footer">
					Copyright © 2018 Mappr
				</footer>
				<!--footer end-->
			</section>

			<!-- /.control-sidebar -->
			<?php include('include/control_sidebar.php'); ?>
		</div>


	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?= base_url() ?>public/bootstrap/js/bootstrap.min.js"></script>

	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>public/dist/js/app.min.js"></script>

	<!-- Date Picker -->
	<script src="<?= base_url() ?>public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript">
			$('.hr_datepicker').datepicker({ dateFormat: 'YY-mm-dd'});
	</script>
	<!-- page script -->
	<script type="text/javascript">
	  $(".flash-msg").fadeTo(2000, 500).slideUp(500, function(){
	    $(".flash-msg").slideUp(500);
	});
	</script>

	</body>
</html>
