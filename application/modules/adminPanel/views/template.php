<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?= link_tag('assets/images/favicon.png', 'png', 'image/x-icon') ?>
		<?= link_tag('assets/images/favicon.png', 'icon', 'image/x-icon') ?>
		<title> <?= APP_NAME . ' | ' . ucfirst($title) ?> </title>
		<!-- Google font-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
		<!-- Required Fremwork -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('bootstrap/dist/css/bootstrap.min.css') ?>">
		<!-- themify-icons line icon -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('icon/themify-icons/themify-icons.css') ?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('icon/font-awesome/css/font-awesome.min.css') ?>">
		<!-- ico font -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('icon/icofont/css/icofont.css') ?>">
		<!-- feather Awesome -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('icon/feather/css/feather.css') ?>">
		<!-- <link rel="stylesheet" type="text/css" href="<?= b_asset('css/component.css') ?>"> -->
		<?php if (isset($dataTable)) : ?>
		<!-- Data Table Css -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= b_asset('pages/data-table/css/buttons.dataTables.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= b_asset('datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>">
		<?php endif ?>
		<!-- Notification.css -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('pages/notification/notification.css') ?>">
		<!-- Animate.css -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('animate.css/animate.css') ?>">
		<!-- sweet alert framework -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('css/sweetalert.css') ?>">
		<!-- Switch component css -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('switchery/dist/switchery.min.css') ?>">
		<!-- Style.css -->
		<link rel="stylesheet" type="text/css" href="<?= b_asset('css/style.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= b_asset('css/jquery.mCustomScrollbar.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= b_asset('datedropper/datedropper.min.css') ?>" />
	</head>
	<body>
		<!-- Pre-loader start -->
		<div class="theme-loader">
			<div class="ball-scale">
				<div class='contain'>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
					<div class="ring">
						<div class="frame"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Pre-loader end -->
		<div id="pcoded" class="pcoded">
			<div class="pcoded-overlay-box"></div>
			<div class="pcoded-container navbar-wrapper">
				<nav class="navbar header-navbar pcoded-header">
					<div class="navbar-wrapper">
						<div class="navbar-logo">
							<a class="mobile-menu" id="mobile-collapse" href="javascript:void(0);">
								<i class="feather icon-menu"></i>
							</a>
							<a class="mobile-options">
								<i class="feather icon-more-horizontal"></i>
							</a>
						</div>
						<div class="navbar-container">
							<ul class="nav-left">
								<li>
									<a href="javascript:void(0);" onclick="javascript:toggleFullScreen()">
										<i class="feather icon-maximize full-screen"></i>
									</a>
								</li>
							</ul>
							<ul class="nav-right">
								<li class="user-profile header-notification">
									<div class="dropdown-primary dropdown">
										<div class="dropdown-toggle" data-toggle="dropdown">
											<?= img(['src' => 'assets/images/profile.jpg', 'class' => "img-radius"]) ?>
											<span><?= $this->session->name ?></span>
											<i class="feather icon-chevron-down"></i>
										</div>
										<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
											<li>
												<?= anchor(admin('profile'), '<i class="feather icon-user"></i> Profile') ?>
											</li>
											<li>
												<?= anchor(admin('logout'), '<i class="feather icon-log-out"></i> Logout', 'onclick="script.logout(); return false;" id="logout"') ?>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- Sidebar inner chat end-->
				<div class="pcoded-main-container">
					<div class="pcoded-wrapper">
						<nav class="pcoded-navbar">
							<div class="pcoded-inner-navbar main-menu">
								<div class="pcoded-navigatio-lavel">Navigation</div>
								<ul class="pcoded-item pcoded-left-item">
									<li class="<?= (in_array($name, ['dashboard'])) ? 'active' : '' ?>">
										<?= anchor(admin(), '<span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span>') ?>
									</li>
									<li class="<?= ($name == 'program') ? 'active' : '' ?>">
										<?= anchor(admin('program'), '<span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Programs</span>') ?>
									</li>
									<li class="<?= ($name == 'gallery') ? 'active' : '' ?>">
										<?= anchor(admin('gallery'), '<span class="pcoded-micon"><i class="feather icon-image"></i></span><span class="pcoded-mtext">Gallery</span>') ?>
									</li>
									<li class="<?= ($name == 'trustee') ? 'active' : '' ?>">
										<?= anchor(admin('trustee'), '<span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Trustees</span>') ?>
									</li>
									<li class="<?= ($name == 'compliance') ? 'active' : '' ?>">
										<?= anchor(admin('compliance'), '<span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Compliance</span>') ?>
									</li>
									<li class="<?= ($name == 'media') ? 'active' : '' ?>">
										<?= anchor(admin('media'), '<span class="pcoded-micon"><i class="feather icon-globe"></i></span><span class="pcoded-mtext">Media Links</span>') ?>
									</li>
									<li class="<?= ($name == 'report') ? 'active' : '' ?>">
										<?= anchor(admin('report'), '<span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Reports</span>') ?>
									</li>
									<li class="<?= ($name == 'partner') ? 'active' : '' ?>">
										<?= anchor(admin('partner'), '<span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Partners</span>') ?>
									</li>
									<li class="<?= ($name == 'banner') ? 'active' : '' ?>">
										<?= anchor(admin('banner'), '<span class="pcoded-micon"><i class="feather icon-image"></i></span><span class="pcoded-mtext">Banners</span>') ?>
									</li>
									<li class="<?= ($name == 'about') ? 'active' : '' ?>">
										<?= anchor(admin('about'), '<span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">About</span>') ?>
									</li>
									<li class="<?= ($name == 'images') ? 'active' : '' ?>">
										<?= anchor(admin('images'), '<span class="pcoded-micon"><i class="feather icon-image"></i></span><span class="pcoded-mtext">Images</span>') ?>
									</li>
								</ul>
							</div>
						</nav>
						<div class="pcoded-content">
							<div class="pcoded-inner-content">
								<!-- Main-body start -->
								<div class="main-body">
									<div class="page-wrapper">
										<!-- Page-header start -->
										<div class="page-body">
											<?php if ($this->session->error): ?>
											<div class="alert alert-danger background-danger">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<i class="icofont icofont-close-line-circled text-white"></i>
												</button>
												<strong>Error !</strong>
												<?= $this->session->error ?>
											</div>
											<?php endif ?>
											<div class="row">
												<?= $contents ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" id="base_url" value="<?= base_url(admin()) ?>" />
		<script src="<?= b_asset('jquery/dist/jquery.min.js') ?>"></script>
		<script src="<?= b_asset('jquery-ui/jquery-ui.min.js') ?>"></script>
		<script src="<?= b_asset('popper.js/dist/umd/popper.min.js') ?>"></script>
		<script src="<?= b_asset('bootstrap/dist/js/bootstrap.min.js') ?>"></script>
		<!-- jquery slimscroll js -->
		<script src="<?= b_asset('jquery-slimscroll/jquery.slimscroll.js') ?>"></script>
		<!-- modernizr js -->
		<script src="<?= b_asset('modernizr/modernizr.js') ?>"></script>
		<script src="<?= b_asset('modernizr/feature-detects/css-scrollbars.js') ?>"></script>
		<?php if (isset($dataTable)) : ?>
		<input type="hidden" id="dataTableUrl" value="<?= base_url($url) ?>" />
		<!-- data-table js -->
		<script src="<?= b_asset('datatables.net/js/jquery.dataTables.min.js') ?>"></script>
		<script src="<?= b_asset('datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
		<script src="<?= b_asset('pages/data-table/js/jszip.min.js') ?>"></script>
		<script src="<?= b_asset('pages/data-table/js/pdfmake.min.js') ?>"></script>
		<script src="<?= b_asset('pages/data-table/js/vfs_fonts.js') ?>"></script>
		<script src="<?= b_asset('datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
		<script src="<?= b_asset('datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
		<script src="<?= b_asset('pages/data-table/js/dataTables.bootstrap4.min.js') ?>"></script>
		<script src="<?= b_asset('datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
		<script src="<?= b_asset('datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
		<script src="<?= b_asset('js/datatable-custom.js') ?>"></script>
		<?php endif ?>
		<script src="<?= b_asset('js/bootstrap-growl.min.js') ?>"></script>
		<script src="<?= b_asset('pages/notification/notification.js') ?>"></script>
		<?php if ($this->session->message) : ?>
		<script>
		notify("<?= $this->session->title ?>", "<?= $this->session->message ?>", 'top', 'center', 'fa fa-check', "<?= $this->session->notify ?>", 'animated flipInY', 'animated flipOutY');
		</script>
		<?php endif ?>
		<!-- sweet alert js -->
		<script src="<?= b_asset('js/sweetalert.js') ?>"></script>
		<!-- Switch component js -->
		<script src="<?= b_asset('switchery/dist/switchery.min.js') ?>"></script>
		<script src="<?= b_asset('datedropper/datedropper.min.js') ?>"></script>
		<script src="<?= b_asset('pages/ckeditor/ckeditor.js') ?>"></script>
		<!-- Custom js -->
		<script src="<?= b_asset('js/pcoded.min.js') ?>"></script>
		<script src="<?= b_asset('js/vartical-layout.min.js') ?>"></script>
		<script src="<?= b_asset('js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
		<script src="<?= b_asset('js/script.js') ?>"></script>
	</body>
</html>