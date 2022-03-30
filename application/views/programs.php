<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcroumb-area">
                <?= img(['src' => $program['image']]) ?>
            </div>
        </div>
    </div>
</div>
<div class="blog-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="single-blog-wrap">
                    <h3><?= $program['title'] ?></h3>
                    <?= $program['details'] ?>
                </div>
            </div>
        </div>
    </div>
</div>