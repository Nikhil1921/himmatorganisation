<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-sm-12">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-2">
					<h5>List of <?= ucwords($title) ?></h5>
				</div>
				<div class="col-6">
					<?= form_open($url . '/title') ?>
					<div class="row">
						<div class="col-8">
							<div class="form-group">
								<?= form_input('title', $data['title'], 'class="form-control form-control-round" id="title" placeholder="Gallery title"') ?>
								<?= form_error('title') ?>
							</div>
						</div>
						<div class="col-4">
							<?= form_button([
							'content' => 'Save',
							'type'  => 'submit',
							'class' => 'btn btn-outline-info btn-round col-12'
							]) ?>
						</div>
					</div>
					<?= form_close() ?>
				</div>
				<div class="col-4">
					<?= anchor($url.'/add', '<i class="fa fa-plus"></i>', 'class="btn btn-outline-success btn-round btn-block float-right col-6"') ?>
				</div>
			</div>
		</div>
		<div class="card-block">
			<div class="dt-responsive table-responsive">
				<table class="datatable table table-striped table-bordered nowrap">
					<thead>
						<tr>
							<th class="target">Sr.</th>
							<th>Title</th>
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