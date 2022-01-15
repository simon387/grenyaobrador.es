<?php

$f = fopen("changelog.txt", 'r');
$version = fgets($f);
fclose($f);
?>
<footer class="footer_section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 footer-col">
				<div class="footer_contact">
					<h4>Contact Us</h4>
					<div class="contact_link_box">
						<a href="<?= MAPS_URL ?>" target="_blank">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<span>Location</span>
						</a>
						<a href="">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<span>Call +01 1234567890</span>
						</a>
						<a href="mailto:<?= EMAIL ?>" target="_blank">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<span><?= EMAIL ?></span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 footer-col">
				<div class="footer_detail">
					<a href="#" class="footer-logo"><?= TITLE ?></a>
					<p>Elaboracion y venta de productos de panaderia y pasteleria 📍<?= LOCATION ?></p>
					<div class="footer_social">
						<a href="<?= FACEBOOK_URL ?>" target="_blank">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
<!--						<a href="">-->
<!--							<i class="fa fa-twitter" aria-hidden="true"></i>-->
<!--						</a>-->
<!--						<a href="">-->
<!--							<i class="fa fa-linkedin" aria-hidden="true"></i>-->
<!--						</a>-->
						<a href="<?= INSTAGRAM_URL ?>" target="_blank">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
<!--						<a href="">-->
<!--							<i class="fa fa-pinterest" aria-hidden="true"></i>-->
<!--						</a>-->
					</div>
				</div>
			</div>
			<div class="col-md-4 footer-col">
				<h4>Opening Hours</h4>
				<p>Everyday</p>
				<p>10.00 Am -10.00 Pm</p>
			</div>
		</div>
		<div class="footer-info">
			<p>
				&copy; <span id="displayYear"></span> All Rights Reserved By
				<a target="_blank" href="<?= SC_WWW ?>"><?= SC_NAME ?></a><br><br>
				&copy; <span id="displayYear"></span> <?= $version ?>
			</p>
		</div>
	</div>
</footer>
