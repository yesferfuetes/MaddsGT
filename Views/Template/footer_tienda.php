<!-- Footer -->
<?php
	$catFooter = getCatFooter();
	//dep($catFooter);
?>
<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categorias
					</h4>
					<?php
						if(count($catFooter) > 0){ ?>
					<ul>
					<?php 
						foreach ($catFooter as $cat) { ?>
						<li class="p-b-10">
							<a href="<?= base_url() ?>/tienda/categoria/<?= $cat['idcategoria'].'/'.$cat['ruta'] ?>" class="stext-107 cl7 hov-cl1 trans-04">
								<?= $cat['nombre'] ?>
							</a>
						</li>
						<?php } ?>
					</ul>
					<?php } ?>		
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contacto
					</h4>

					<p class="stext-107 cl7 size-201">
					<i class="fa-solid fa-location-dot"></i> <?= DIRECCION ?> <br>
					<i class="fa-solid fa-phone"></i> Tel: <a class="linkFooter" href="tel:<?= TELEMPRESA ?>"><?= TELEMPRESA ?></a><br>
					<i class="fa-solid fa-envelope"></i> Email: <a class="linkFooter" href="mailto:<?= EMAIL_EMPRESA ?>"><?= EMAIL_EMPRESA ?></a>
					</p>

					<div class="p-t-27">
					<a href="<?= FACEBOOK ?>" target="_blanck" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="<?= INSTAGRAM ?>" target="_blanck"  class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Suscríbete
					</h4>

					<form id="frmSuscripcion" name="frmSuscripcion">
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" id="nombreSuscripcion" name="nombreSuscripcion" placeholder="Nombre Completo" required>
							<div class="focus-input1 trans-04"></div>
						</div>
						<br>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="email" id="emailSuscripcion" name="emailSuscripcion" placeholder="email@example.com" required >
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Suscribirme
							</button>
						</div>
					</form>
				</div>
			</div>

            <!-- ICONOS DE PAGO -->
			<div class="p-t-40">
				<!-- <div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="<?= media()?>/tienda/images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?= media()?>/tienda/images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?= media()?>/tienda/images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?= media()?>/tienda/images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?= media()?>/tienda/images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div> -->

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <?= NOMBRE_EMPESA; ?> | <?= WEB_EMPRESA; ?> | <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	<script>
	    const base_url = "<?= base_url(); ?>";
		const smony = "<?= SMONEY; ?>";
	</script>

<!--===============================================================================================-->	
	<script src="<?= media()?>/tienda/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= media()?>/tienda/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= media()?>/tienda/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/slick/slick.min.js"></script>
	<script src="<?= media()?>/tienda/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/parallax100/parallax100.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media()?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media();?>/js/fontawesome.js"></script>
	<script src="<?= media()?>/tienda/js/main.js"></script>
	<script src="<?= media()?>/js/functions_admin.js"></script>
	<script src="<?= media()?>/js/functions_login.js"></script>
	<script src="<?= media()?>/tienda/js/functions.js"></script>
</body>
</html>