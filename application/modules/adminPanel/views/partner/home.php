<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-8">
					<h5>List of <?= ucwords($title) ?></h5>
				</div>
				<div class="col-4">
					<?= form_open_multipart($url."/upload") ?>
					<div class="form-group">
						<?= form_input([
						'type' => "file",
						'name' => "image",
						'class' => "form-control form-control-round",
						'id' => 'image',
						'accept' => '.png,.jpeg,.jpg,',
						'onchange' => 'this.form.submit()'
						]) ?>
					</div>
					<?= form_close() ?>
				</div>
			</div>
		</div>
		<div class="card-block">
			<div class="dt-responsive table-responsive">
				<table class="datatable table table-striped table-bordered nowrap">
					<thead>
						<tr>
							<th class="target">Sr.</th>
							<th class="target">Image</th>
							<th class="target">Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>