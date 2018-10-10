<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= $title; ?></title>
	</head>
	<body class="hold-transition skin-green sidebar-mini">
		<div class="wrapper" style="height: auto;">
			<section id="container">
				<section id="main-content">
					<div class="content-wrapper" style="min-height: 394px; padding:15px;">
						<!-- page start-->
						<?php $this->load->view($view);?>
						<!-- page end-->
					</div>
				</section>
			</section>
		</div>
	</body>
</html>