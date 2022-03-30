<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="homepage-slides owl-carousel">
	<?php foreach ($banners as $banner): ?>
	<div class="single-slide-item">
		<?= img(['src' => $banner['banner']]) ?>
	</div>
	<?php endforeach ?>
</div>
<!-- About Area-->
<div class="about-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="about-left">
					<?= img(['src' => $about['image'], 'class' => "lazy-image loaded"]) ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-content">
					<div class="section-title">
						<h6><?= $about['title'] ?></h6>
						<h2><?= $about['sub_title'] ?></h2>
					</div>
					<?= $about['details'] ?>  <span><a href="<?= base_url('about') ?>"> Read More</a></span></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Service Area-->
<div class="service-area gray-bg section-padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 ">
				<div class="section-title text-center">
					<h6><?= $prog['title'] ?></h6>
					<h2><?= $prog['image'] ?></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($programs as $k => $prog): ?>
			<?php if ($k < 6): ?>
			<div class="col-lg-4 col-md-6 col-sm-12" onclick="window.location = '<?= base_url('programs/'.$prog['slug']) ?>'">
				<div class="single-service-item active">
					<?= img(['src' => $prog['image']]) ?>
					<h5><?= $prog['title'] ?></h5>
				</div>
			</div>
			<?php endif ?>
			<?php endforeach ?>
		</div>
	</div>
</div>
<div class="portfolio-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h6>Gallery</h6>
					<h2><?= $gallery['title'] ?></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="portfolio-list">
					<?php foreach (explode(',', $gallery['images']) as $img): ?>
					<div class="single-portfolio-item ">
						<?= img(['src' => $gallery['path'].$img]) ?>
						<div class="details">
							<div class="info">
								<?= anchor($gallery['path'].$img, '<i class="las la-search-plus"></i>', ['class' => 'img']) ?>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="myAdvertise" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?= img(['src' => 'assets/images/'.$this->main->check('images', ['page'  => 'advertise'], 'image')]) ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default main-btn" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myAdvertise').modal('show');
    });
</script>