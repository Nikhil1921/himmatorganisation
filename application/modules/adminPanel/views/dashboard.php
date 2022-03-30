<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-xl-3" onclick="window.location = '<?= base_url(admin('program')) ?>'">
	<div class="card bg-c-yellow text-white">
		<div class="card-block">
			<div class="row align-items-center">
				<div class="col">
					<p class="m-b-5">Programs</p>
					<h4 class="m-b-0"><?= $program ?></h4>
				</div>
				<div class="col col-auto text-right">
					<i class="feather icon-file-minus f-50 text-c-yellow"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3" onclick="window.location = '<?= base_url(admin('gallery')) ?>'">
	<div class="card bg-c-green text-white">
		<div class="card-block">
			<div class="row align-items-center">
				<div class="col">
					<p class="m-b-5">Gallery</p>
					<h4 class="m-b-0"><?= $gallery ?></h4>
				</div>
				<div class="col col-auto text-right">
					<i
					class="feather icon-image f-50 text-c-green"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3" onclick="window.location = '<?= base_url(admin('trustee')) ?>'">
	<div class="card bg-c-pink text-white">
		<div class="card-block">
			<div class="row align-items-center">
				<div class="col">
					<p class="m-b-5">Trustees</p>
					<h4 class="m-b-0"><?= $trustee ?></h4>
				</div>
				<div class="col col-auto text-right">
					<i class="feather icon-users f-50 text-c-pink"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3" onclick="window.location = '<?= base_url(admin('media')) ?>'">
	<div class="card bg-c-blue text-white">
		<div class="card-block">
			<div class="row align-items-center">
				<div class="col">
					<p class="m-b-5">Media Links</p>
					<h4 class="m-b-0"><?= $media ?></h4>
				</div>
				<div class="col col-auto text-right">
					<i
					class="feather icon-globe f-50 text-c-blue"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3" onclick="window.location = '<?= base_url(admin('compliance')) ?>'">
	<div class="card bg-c-yellow text-white">
		<div class="card-block">
			<div class="row align-items-center">
				<div class="col">
					<p class="m-b-5">Compliance</p>
					<h4 class="m-b-0"><?= $compliance ?></h4>
				</div>
				<div class="col col-auto text-right">
					<i class="feather icon-file-minus f-50 text-c-yellow"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3" onclick="window.location = '<?= base_url(admin('report')) ?>'">
	<div class="card bg-c-green text-white">
		<div class="card-block">
			<div class="row align-items-center">
				<div class="col">
					<p class="m-b-5">Report</p>
					<h4 class="m-b-0"><?= $report ?></h4>
				</div>
				<div class="col col-auto text-right">
					<i
					class="feather icon-file-minus f-50 text-c-green"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3" onclick="window.location = '<?= base_url(admin('partner')) ?>'">
	<div class="card bg-c-pink text-white">
		<div class="card-block">
			<div class="row align-items-center">
				<div class="col">
					<p class="m-b-5">Partners</p>
					<h4 class="m-b-0"><?= $partner ?></h4>
				</div>
				<div class="col col-auto text-right">
					<i class="feather icon-users f-50 text-c-pink"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3" onclick="window.location = '<?= base_url(admin('banner')) ?>'">
	<div class="card bg-c-blue text-white">
		<div class="card-block">
			<div class="row align-items-center">
				<div class="col">
					<p class="m-b-5">Banners</p>
					<h4 class="m-b-0"><?= $banner ?></h4>
				</div>
				<div class="col col-auto text-right">
					<i
					class="feather icon-image f-50 text-c-blue"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h5 class="title">Update Images</h5>
		</div>
		<div class="card-body">
			<?php $images = ['Advertisement' => 'advertise']; asort($images); ?>
			<?php foreach ($images as $k => $v): ?>
			<?php if (!$image = $this->main->check('images', ['page'  => $v], 'image')):
			$post = [
			'title' => null,
			'image' => 'default.jpg',
			'page'  => $v
			];
			$this->main->add($post, 'images');
			$image = $this->main->check('images', ['page'  => $v], 'image');
			endif ?>
			<?= form_open_multipart($url.'upload', 'class = "mt-5"', ['image' => $image, 'page' => $v]) ?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?= form_label($k, $v) ?>
						<?= form_input([
						'type' => "file",
						'name' => "image",
						'class' => "form-control form-control-round",
						'id' => $v,
						'accept' => '.png,.jpeg,.jpg,',
						'onchange' => 'this.form.submit()'
						]) ?>
					</div>
				</div>
				<div class="col-md-6">
					<?= img(['src' => 'assets/images/'.$image, 'width' => '100%', 'height' => 100]) ?>
				</div>
			</div>
			<?= form_close() ?>
			<?php endforeach ?>
		</div>
	</div>
</div>