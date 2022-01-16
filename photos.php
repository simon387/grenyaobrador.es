<?php

include_once 'util/minify.php';

function generateBox($tag, $text, $img) {
	echo(minify_html('<div class="col-sm-6 col-lg-4 all ' . $tag . '">
		<div class="box">
			<div>
				<div class="img-box">
					<img src="images/tati/' . $img . '.jpg" alt="">
				</div>
				<div class="detail-box">
					<h5>' . $text . '</h5>
					<p>
						Elaboracion y venta de productos de panaderia y pasteleria
					</p>
					<!--div class="options">
						<h6>
							$20
						</h6>
						<a href="">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
								<g>
									<g>
										<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
									</g>
								</g>
								<g>
									<g>
										<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
									</g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
                </svg>
						</a>
					</div-->
				</div>
			</div>
		</div>
	</div>'
	));
}
?>

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

<section class="food_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
			<h2>Photos</h2>
		</div>

		<ul class="filters_menu">
			<li class="active" data-filter="*">All</li>
			<li data-filter=".pan">Pan</li>
			<li data-filter=".croissant">Croissant</li>
		</ul>

		<div class="filters-content">
			<div class="row grid">
				<?=generateBox('pan', 'Pan', '1') ?>
				<?=generateBox('pan', 'Pan', '2') ?>
				<?=generateBox('pan', 'Pan', '3') ?>
				<?=generateBox('croissant', 'Croissant', '4') ?>
				<?=generateBox('pan', 'Pan', '5') ?>
				<?=generateBox('pan', 'Pan', '6') ?>
				<?=generateBox('pan', 'Pan', '7') ?>
				<?=generateBox('pan', 'Pan', '8') ?>
				<?=generateBox('pan', 'Pan', '9') ?>
				<?=generateBox('pan', 'Pan', '10') ?>
				<?=generateBox('pan', 'Pan', '11') ?>
				<?=generateBox('pan', 'Pan', '12') ?>
				<?=generateBox('pan', 'Pan', '13') ?>
				<?=generateBox('pan', 'Pan', '14') ?>
				<?=generateBox('pan', 'Pan', '15') ?>
				<?=generateBox('pan', 'Pan', '16') ?>
				<?=generateBox('pan', 'Pan', '17') ?>
				<?=generateBox('pan', 'Pan', '18') ?>
				<?=generateBox('pan', 'Pan', '19') ?>
				<?=generateBox('pan', 'Pan', '20') ?>
				<?=generateBox('pan', 'Pan', '21') ?>
				<?=generateBox('pan', 'Pan', '22') ?>
				<?=generateBox('pan', 'Pan', '23') ?>
				<?=generateBox('croissant', 'Croissant', '24') ?>
				<?=generateBox('pan', 'Pan', '25') ?>
				<?=generateBox('pan', 'Pan', '26') ?>
				<?=generateBox('pan', 'Pan', '27') ?>
				<?=generateBox('croissant', 'Croissant', '28') ?>
				<?=generateBox('pan', 'Pan', '29') ?>
				<?=generateBox('pan', 'Pan', '30') ?>
				<?=generateBox('croissant', 'Croissant', '31') ?>
				<?=generateBox('pan', 'Pan', '32') ?>
				<?=generateBox('pan', 'Pan', '33') ?>
				<?=generateBox('pan', 'Pan', '34') ?>
				<?=generateBox('pan', 'Pan', '35') ?>
				<?=generateBox('pan', 'Pan', '36') ?>
				<?=generateBox('pan', 'Pan', '37') ?>
				<?=generateBox('pan', 'Pan', '38') ?>
				<?=generateBox('croissant', 'Croissant', '39') ?>
				<?=generateBox('croissant', 'Croissant', '40') ?>
				<?=generateBox('croissant', 'Croissant', '41') ?>
			</div>
		</div>
<!--		<div class="btn-box">-->
<!--			<a href="">-->
<!--				View More-->
<!--			</a>-->
<!--		</div>-->
	</div>
</section>

<?php include "components/footer.php"; ?>
<?php include "components/scripts.php"; ?>
</body>
</html>