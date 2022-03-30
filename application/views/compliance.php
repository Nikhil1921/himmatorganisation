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
			<ul>
				<?php if ($compliance): ?>
				<?php foreach ($compliance as $c): ?>
				<li><?= anchor($c['image'], $c['title'], 'download') ?></li>
				<?php endforeach ?>
				<?php else: ?>
				<li><h4>No compliance avalable</h4></li>
				<?php endif ?>
			</ul>
		</div>
	</div>
</div>