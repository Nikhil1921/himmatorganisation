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
<div class="map-area section-padding pad-bot-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="map-section">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7347.534466512307!2d72.613589!3d22.958798!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4ebc76107ef85e50!2sHIMMAT!5e0!3m2!1sen!2sin!4v1618994427271!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					<i class="las la-map-marker"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="contact-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-12 col-sm-12">
				<div class="section-title">
					<h6>Contact Us</h6>
					<h2>Find Us Easy Way</h2>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-12 text-center contact-detail">
						<p><i class="las la-map-marker"></i><b>Address</b>
							<span>Himmat, 872/1/2, vohr vasd,
								Behind vatva sub post office,
								near Shraddha dairy,
								Bibi talav, Vatva 
								Ahmadabad, Gujarat, India 
								Pincode 382440
							</span>
						</p>
					</div>
					<div class="col-md-3 col-sm-12 text-center contact-detail">
						<p><i class="las la-mobile"></i><b>Phone</b>
							<span><?= $contact['mobile'] ?></span>
							
						</p>
					</div>
					<div class="col-md-5 col-sm-12 text-center contact-detail">
						<p><i class="las la-envelope"></i><b>Email</b>
							<span><?= $contact['email'] ?></span>
							
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="contact-form">
					<h3>Get in Touch</h3>
					<?php if ($this->session->message): ?>
						<div class="alert alert-<?= $this->session->notify ?>"><?= $this->session->title ?> <?= $this->session->message ?></div>
					<?php endif ?>
					<form name="contact-form" id="contactForm" method="POST">
						<input type="text" name="name" id="name" required="" placeholder="Your Name" value="<?= set_value('name') ?>" />
						<?= form_error('name') ?>
						<input type="email" name="email" id="email" required="" placeholder="Your E-mail" value="<?= set_value('email') ?>" />
						<?= form_error('email') ?>
						<input type="text" name="phone" maxlength="10" id="phone" required="" placeholder="Your Phone" value="<?= set_value('phone') ?>" />
						<?= form_error('phone') ?>
						<textarea name="message" id="message" cols="30" rows="10" placeholder="How can help you?"><?= set_value('message') ?></textarea>
						<button type="submit" name="submit">Send Message</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>