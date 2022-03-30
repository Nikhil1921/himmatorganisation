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
<section class="donate-page-area mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 ml-auto mr-auto">
                <div class="donate-content">
                    <div class="donate-form-container">
                        <div class="section-title">
                            <h2>Donation Details</h2>
                        </div>
                        <div class="donation-form quick-donation-section donate-page">
                            <form name="donate-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Enter name: </p>
                                        <input type="text" name="name" id="name" maxlength="100" />
                                    </div>
                                    <div class="col-md-6">
                                        <p>Enter email: </p>
                                        <input type="text" name="email" id="email" maxlength="100" />
                                    </div>
                                    <div class="col-md-6">
                                        <p>Enter mobile: </p>
                                        <input type="text" name="mobile" id="mobile" maxlength="10" />
                                    </div>
                                    <div class="col-md-6">
                                        <p>Enter amount: </p>
                                        <input type="text" name="amount" id="amount" maxlength="15" />
                                    </div>
                                </div>
                                <button type="submit">Donate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>