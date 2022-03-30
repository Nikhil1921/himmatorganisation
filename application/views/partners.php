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
<div class="client-area section-padding padding-top-0">
    <div class="container">
        <div class="row">
            <?php if ($partners): ?>
            <?php foreach ($partners as $p): ?>
            <div class="col-lg-4">
                <div class="logo-container">
                    <?= img(['src' => $p['image']]) ?>
                </div>
            </div>
            <?php endforeach ?>
            <?php else: ?>
            <h4>No partner(s) avalable</h4>
            <?php endif ?>
        </div>
    </div>
</div>