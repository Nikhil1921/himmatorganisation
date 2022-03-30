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
<div class="portfolio-area section-padding">
	<div class="container">
		<?php if ($gallery): ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h6><?= $banner['title'] ?></h6>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($gallery as $g): ?>
			<div class="col-lg-12">
				<div class="portfolio-list">
					<h2><?= $g['title'] ?></h2><br>
					<?php foreach (explode(',', $g['images']) as $img): ?>
					<div class="single-portfolio-item ">
						<?= img(['src' => $path.$img]) ?>
						<div class="details">
							<div class="info">
								<?= anchor($path.$img, '<i class="las la-search-plus"></i>', ['class' => 'img']) ?>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			<?php endforeach ?>
		</div>
		<?php else: ?>
		<h4>No gallery images avalable</h4>
		<?php endif ?>
	</div>
</div>