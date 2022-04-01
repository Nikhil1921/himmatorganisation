<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-sm-12">
	<div class="card">
		<div class="card-header">
			<h5><?= ucwords($operation . ' ' . $title) ?></h5>
		</div>
		<div class="card-block">
			<?= form_open_multipart('', '', ['image' => isset($data['img']) ? $data['img'] : '']) ?>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<?= form_input('name', (set_value('name')) ? set_value('name') : (isset($data['name']) ? $data['name'] : ''), 'class="form-control form-control-round" id="name" placeholder="Program name"') ?>
						<?= form_error('name') ?>
					</div>
				</div>
				<div class="col-8">
					<div class="form-group">
						<?= form_input([
							'type' => 'file',
							'name' => 'image',
							'class' => 'form-control form-control-round'
						]) ?>
					</div>
				</div>
				<?php if(isset($data['img'])): ?>
				<div class="col-4">
					<?= img(['src' => $data['img'], 'width' => '100%']) ?>
				</div>
				<?php endif ?>
				<div class="col-12">
					<?= form_button([
					'content' => 'Save',
					'type'  => 'submit',
					'class' => 'btn btn-outline-info btn-round col-3'
					]) ?>
					<?= anchor($url, 'Cancel', ['class' => 'btn btn-outline-danger btn-round col-3']) ?>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>