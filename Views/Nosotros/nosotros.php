<?php 
    headerTienda($data);
    $banner = media()."/tienda/images/bg-01.jpg";
?>

<script>
    document.querySelector('header').classList.add('header-v4');
</script>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?= $banner ?>);">
    <h2 class="ltext-105 cl0 txt-center">
        Nosotros
    </h2>
</section>	

<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							¿Quienes Somos?
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Madds es una página de venta de ropa nueva y de segunda a gran
						variedad. Nació de una pareja de novios cuyo objetivo era llevar a cada
						persona una idea diferente de como utilizar ropa de segunda por un buen
						precio.
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="<?= media() ?>/tienda/images/about-01.jpg" alt="Nosotros MaddsGT">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Nuestra Misión
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Para nosotros como emprendimiento es muy importante brindar a
						nuestros compradores, calidad, exclusividad, y sobre todo precios
						accesibles, que al mismo tiempo tengan la oportunidad de vestir bien
						por un bajo costo, tales como, zapatos, blusas, camisas,
						accesorios, etc.
						</p>

						<!-- <div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
							</p>

							<span class="stext-111 cl8">
								- Steve Job’s 
							</span>
						</div> -->
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="<?= media() ?>/tienda/images/about-02.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	

<?php 
    footerTienda($data);
?>    

