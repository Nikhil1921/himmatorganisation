<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h5><?= ucwords($operation . ' ' . $title) ?></h5>
        </div>
        <div class="card-block">
            <?= form_open_multipart($url.'/upload/'.$id, 'id = imageUploadForm') ?>
            <div class="row">
                <input type="hidden" id="upload-id" value="<?= $id ?>" />
                <div class="col-12">
                    <div class="form-group">
                        <input type="file" name="image[]" multiple="multiple" onchange="script.uploadImage()" class="form-control form-control-round" />
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <h6 class="sub-title">Uploaded Images</h6>
                    <ul class="basic-list list-icons-img row" id="uploaded-images">
                        <li class="col-3">
                            <img src="<?= base_url('assets/images/logo.png') ?>" class="img-fluid p-absolute d-block text-center">
                            <p><a href="" class="float-right"><i class="fa fa-remove"></i></a></p>
                        </li>
                    </ul>
                </div>
                <div class="col-12 mt-3">
                    <?= anchor($url, 'Go back', ['class' => 'btn btn-outline-danger btn-round col-3']) ?>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    script.showImages('<?= $id ?>');
});
</script>