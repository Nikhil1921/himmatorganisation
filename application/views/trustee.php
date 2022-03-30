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
<section class="donate-page-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title text-center">
                    <h2><?= $banner['title']?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="team-area section-padding">
        <div class="container">
            <div class="row">
                <?php if (!$trustee): ?>
                <div class="col-sm-12">
                    <div class="section-title text-center">
                        <h3>No Trustee available</h3>
                    </div>
                </div>
                <?php else: ?>
                <?php foreach ($trustee as $t): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-member mar-bt-50">
                        <div class="team-member-bg">
                            <?= img(['src' => $t['image'], 'width' => 350, 'height' => 368]) ?>
                            <div class="team-content">
                                <div class="team-title">
                                    <?= anchor('trustee/'.$t['slug'], $t['name']) ?>
                                </div>
                                <div class="team-subtitle">
                                    <p><?= $t['designation'] ?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>