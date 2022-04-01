<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> <?= APP_NAME ?> | <?= ucwords($title) ?></title>
		<!--Favicon-->
		<link rel="icon" href="<?= base_url('assets/images/logo.png') ?>" type="image/jpg" />
		<!-- Bootstrap CSS -->
		<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<!-- Font Awesome CSS-->
		<link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
		<!-- Line Awesome CSS -->
		<link href="<?= base_url('assets/css/line-awesome.min.css') ?>" rel="stylesheet">
		<!-- Animate CSS-->
		<link href="<?= base_url('assets/css/animate.css') ?>" rel="stylesheet">
		<!-- Bar Filler CSS -->
		<link href="<?= base_url('assets/css/barfiller.css') ?>" rel="stylesheet">
		<!-- Magnific Popup Video -->
		<link href="<?= base_url('assets/css/magnific-popup.css') ?>" rel="stylesheet">
		<!-- Flaticon CSS -->
		<link href="<?= base_url('assets/css/flaticon.css') ?>" rel="stylesheet">
		<!-- Owl Carousel CSS -->
		<link href="<?= base_url('assets/css/owl.carousel.css') ?>" rel="stylesheet">
		<!-- Style CSS -->
		<link href="<?= base_url('assets/css/style.css?v=1.0.1') ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/custom.css?v=1.0.1') ?>" rel="stylesheet">
		<!-- Responsive CSS -->
		<link href="<?= base_url('assets/css/responsive.css?v=1.0.1') ?>" rel="stylesheet">
		<!-- jquery -->
		<script src="<?= base_url('assets/js/jquery-1.12.4.min.js') ?>"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
	</head>
	<body>
		<!-- Pre Loader -->
		<div class="site-preloader-wrap">
			<div class="spinner"></div>
		</div>
		<div class="header-top-area absolate-header">
			<div class="container">
				<!-- <div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12">
								<ul>
										<li><a href="#"><i class="fa fa-map-marker"></i> Vatwa, Ahmedabad</a></li>
										<li><a href="mailto:info@himmatorganisation.org"><i class="fa fa-envelope"></i> info@himmatorganisation.org</a></li>
								</ul>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 text-right">
								<div class="social-icon">
										<a href="#"><i class="lab la-facebook-f"></i></a>
										<a href="#"><i class="lab la-instagram"></i></a>
										<a href="#"><i class="lab la-twitter"></i></a>
										
								</div>
						</div>
				</div> -->
			</div>
		</div>
		<div class="header-area absolate-header theme-3">
			<div class="sticky-area">
				<div class="container" >
					<div class="navigation">
						<div class="row">
							<div class="col-lg-2">
								<div class="logo">
									<a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo.png') ?>" alt=""></a>
								</div>
							</div>
							<div class="col-lg-10">
								<div class="main-menu">
									<nav class="navbar navbar-expand-lg">
										<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
										<span class="navbar-toggler-icon"></span>
										<span class="navbar-toggler-icon"></span>
										</button>
										<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
											<ul class="navbar-nav m-auto nav">
												<li class="nav-item"><a class="nav-link <?= ($name == 'home' ? 'active' : '') ?>" href="<?= base_url() ?>">Home </a></li>
												<li class="nav-item">
													<a class="nav-link <?= ($name == 'about' ? 'active' : '') ?>" href="javascript:void(0);">About +</a>
													<ul class="sub-menu">
														<li><a href="<?= base_url('about') ?>">About us</a></li>
														<li><a href="<?= base_url('trustee') ?>">Board of trustees</a></li>
														<li><a href="<?= base_url('compliance') ?>">Compliance</a></li>
														<li><a href="<?= base_url('media') ?>">Media Links</a></li>
														<li><a href="<?= base_url('reports') ?>">Reports/Financial</a></li>
														<li><a href="<?= base_url('partners') ?>">Partners</a></li>
													</ul>
												</li>
												<li class="nav-item">
													<a class="nav-link <?= ($name == 'programs' ? 'active' : '') ?>" href="javascript:void(0);">Programs +
													</a>
													<ul class="sub-menu">
														<?php foreach ($programs as $prog): ?>
														<li><a href="<?= base_url('programs/'.$prog['slug']) ?>"><?= $prog['title'] ?></a></li>
														<?php endforeach ?>
													</ul>
												</li>
												<li class="nav-item"><a class="nav-link <?= ($name == 'gallery' ? 'active' : '') ?>" href="<?= base_url('gallery') ?>">Gallery</a></li>
												<li class="nav-item"><a class="nav-link <?= ($name == 'contact' ? 'active' : '') ?>" href="<?= base_url('contact') ?>">Contact us</a></li>
												<li class="nav-item main-btn"><a class="nav-link" href="<?= base_url('donate') ?>">Donate</a></li>
											</ul>
										</div>
									</nav>
								</div>
							</div>
							<!-- <div class="col-lg-2 text-center">
								<div class="header-right-content">
									<a href="<?= base_url('donate') ?>" class="main-btn">Donate</a>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- contents -->
		<?= $contents ?>
		<!-- contents end -->
		<footer class="footer-area">
			<div class="container">
				<div class="footer-bottom">
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<p class="copyright-line">© 2021 Himmat. All rights reserved.</p>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<p class="privacy">
								<a href="<?= base_url('privacy-policy') ?>" class="text-white">Privacy Policy</a> | 
								<a href="<?= base_url('refund-policy') ?>" class="text-white">Refund Policy</a> | 
								<a href="<?= base_url('terms-conditions') ?>" class="text-white">Terms &amp; Conditions</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<input type="hidden" id="base_url" value="<?= base_url() ?>" />
		<a href="#top" class="go-top" style="display: block;"><i class="fa fa-angle-up"></i></a>
		<!-- Popper JS -->
		<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
		<!-- Bootstrap JS -->
		<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<!-- Wow JS -->
		<script src="<?= base_url('assets/js/wow.min.js') ?>"></script>
		<!-- Way Points JS -->
		<script src="<?= base_url('assets/js/jquery.waypoints.min.js') ?>"></script>
		<!-- Counter Up JS -->
		<script src="<?= base_url('assets/js/jquery.counterup.min.js') ?>"></script>
		<!-- Owl Carousel JS -->
		<script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>
		<!-- Isotope JS -->
		<script src="<?= base_url('assets/js/isotope-3.0.6-min.js') ?>"></script>
		<!-- Magnific Popup JS -->
		<script src="<?= base_url('assets/js/magnific-popup.min.js') ?>"></script>
		<!-- Sticky JS -->
		<script src="<?= base_url('assets/js/jquery.sticky.js') ?>"></script>
		<!-- Progress Bar JS -->
		<script src="<?= base_url('assets/js/jquery.barfiller.js') ?>"></script>
		<script>
		$('.img').magnificPopup({
			type:'image',
			gallery: {
				enabled: true
			}
		});
		</script>
		<?php if($name == 'donate_online'): ?>
			<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <?php endif ?>
		<!-- Main JS -->
		<script src="<?= base_url('assets/js/main.js?v=1.0.2') ?>"></script>
	</body>
</html>