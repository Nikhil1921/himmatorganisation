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
<div class="container mt-5 mb-5">
	<div class="download-links">
		<div class="links">
			<?php if ($media): ?>
			<?php foreach ($media as $m): ?>
			<a href="<?= $m['link'] ?>" target="_blank"><?= $m['link'] ?></a>
			<?php endforeach ?>
			<?php else: ?>
			<h4>No link(s) avalable</h4>
			<?php endif ?>
		</div>
	</div>
</div>