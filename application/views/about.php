<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="breadcroumb-area">
				<?= img(['src' => $banner['image']]) ?>
			</div>
		</div>
	</div>
</div>
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
					<?= $about['details'] ?>
				</div>
			</div>
		</div>
	</div>
</div>