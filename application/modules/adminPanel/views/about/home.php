<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h5 class="title">Update About</h5>
		</div>
		<div class="card-body">
			<?= form_open_multipart($url) ?>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<?= form_label('Title', 'title') ?>
						<?= form_input('title', $data['title'], [
						'class' => "form-control form-control-round",
						'placeholder' => "Title",
						'id' => "title",
						'required' => "true",
						'maxLength' => "255"
						]) ?>
						<?= form_error('title') ?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<?= form_label('Sub Title', 'sub_title') ?>
						<?= form_input('sub_title', $data['sub_title'], [
						'class' => "form-control form-control-round",
						'placeholder' => "Sub Title",
						'id' => "sub_title",
						'required' => "true",
						'maxLength' => "255"
						]) ?>
						<?= form_error('sub_title') ?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<?= form_label('Image', 'image') ?>
						<?= form_input([
						'class' => "form-control form-control-round",
						'id' => "image",
						'type' => "file",
						'name' => "image"
						]) ?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<?= form_label('About', 'details') ?>
						<?= form_textarea('details', $data['details'], 'class="form-control form-control-round ckeditor" id="details" placeholder="About"') ?>
						<?= form_error('details') ?>
					</div>
				</div>
				<div class="col-12">
					<?= form_button([ 'content' => 'Update About',
					'type'  => 'submit',
					'class' => 'btn btn-outline-info btn-round col-3']) ?>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>