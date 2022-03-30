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
<div class="choose-us-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="choose-us-bg about-left">
					<?= img(['src' => $trustee['image']]) ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="choose-us-content">
					<h5><?= $trustee['name'] ?></h5>
					<?= $trustee['description'] ?>
				</div>
			</div>
		</div>
	</div>
</div>