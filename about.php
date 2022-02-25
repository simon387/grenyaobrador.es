<?php include_once "util/constants.php"; ?>
<!DOCTYPE html>
<html lang="es">
<?php include "components/head.php"; ?>

<body class="sub_page">
<div class="hero_area">
	<div class="bg-box">
		<img src="images/hero-bg.jpg" alt="">
	</div>
	<?php include "components/header.php"; ?>
</div>

<section class="about_section layout_padding">
	<div class="container">

		<div class="row">
			<div class="col-md-6 ">
				<div class="img-box">
					<img src="images/about-img.png" alt="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="detail-box">
					<div class="heading_container">
						<h2>We Are <?= TITLE ?></h2>
					</div>
					<p>
						Elaboracion y venta de productos de panaderia y pasteleria 📍<?= LOCATION ?>
					</p>
					<p>
						<?= PHONE ?>
					</p>
					<a href="#">
						Read More
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include "components/footer.php"; ?>
<?php include "components/scripts.php"; ?>
</body>
</html>