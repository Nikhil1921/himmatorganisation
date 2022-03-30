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
                            <div class="tg-donetship">
                                <p>You can donate to HIMMAT trust by online by clicking <a href="<?= base_url('donate-online') ?>">Donate</a></p>
                            </div>
                            <div class="tg-donetship">
                                <p>You can donate to HIMMAT trust by writing a cheque in favour of "HIMMAT"</p><br>
                                <p>or you can donate through NEFT/IMPS/ to bank account below</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>Bank name: </p>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>Bank of India</p>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>Branch:</p>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>Vatva Bazaar</p>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>Account Name:</p>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>Himmat</p>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>Account number:</p>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>210310100021473</p>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>IFSC:</p>
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="single-input mb-30">
                                        <p>BKID0002103</p>
                                    </div>
                                </div>
                            </div>
                            <p>or You can simply scan & pay through any BHIM apps(Google pay, PayTM, Phonepe)</p>
                            <div class="qr-code">
                                <?= img(['src' => 'assets/images/donate.png']) ?>
                            </div>
                            <br>
                            <p>YOUR DONATION MADE TO HIMMAT WILL BE ELIGIBLE TO GET INCOME TAX EXEMPTION UNDER SECTION 80(G).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>