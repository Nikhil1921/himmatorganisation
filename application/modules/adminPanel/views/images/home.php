<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h5 class="title">Update Images</h5>
		</div>
		<div class="card-body">
			<?php $images = ['Contact US' => 'contact', 'Compliance' => 'compliance', 'Media Links' => 'media', 'Report' => 'report', 'Partners' => 'partners', 'Donate' => 'donate', 'About US' => 'about', 'Gallery' => 'gallery', 'Trustee' => 'trustee']; asort($images); ?>
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
			<?= form_open_multipart($url.'/upload', 'class = "mt-5"', ['image' => $image, 'page' => $v]) ?>
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