<?php 
headerTienda($data);

$subtotal = 0;
$total = 0;

foreach ($_SESSION['arrCarrito'] as $producto) {
    $subtotal = $producto['precio'] * $producto['cantidad']; 
    }
    $total = $subtotal + COSTOENVIO;
?>

<!-- Modal TERMINOS Y CONDICIONES -->
<div class="modal fade" id="modalTerminos" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Términos y Condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
            <li>No se aceptan cambios ni devoluciones</li>
        </ul>
        <br>
        <p>Team MaddsGT.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

 <br><br><br>
<hr>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?= base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
				Inicio
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				<?= $data['page_title'] ?>
			</span>
		</div>
	</div>
	
    <br>
	<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-l-25 m-r--38 m-lr-0-xl">
						<div class="list">
                            <?php 
                                //VERIFICANDO SI EXISTE VARIABLE DE SESION
                                if(isset($_SESSION['login'])){
                            ?>
                            <div>
                                <label for="tipopago">Dirección de envío</label>
                                <div class="bor8 bg0 m-b-12">
                                    <input id="txtDireccion" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Dirección de envío">
                                </div>
                                <div class="bor8 bg0 m-b-22">
                                    <input id="txtCiudad" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Ciudad / Estado">
                                </div>
                            </div>
                            <?php }else{ ?>
                                <!-- FORMULARIOS DE REGISTRO Y LOGIN -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Iniciar Sesión</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="profile" aria-selected="false">Crear cuenta</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
                                    <br>
                                    <form id="formLogin">
                                        <div class="form-group">
                                            <label for="txtEmail">Usuario</label>
                                            <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtPassword">Contraseña</label>
                                            <input type="password" class="form-control" id="txtPassword" name="txtPassword">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                    </form>
                                    </div>

                                    <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="profile-tab">
                                        <br>
                                        <form id="formRegister"> 
                                            <p>Recuerda, por seguridad y para validar tu cuenta la contraseña se genera automatica y te estara llegando a tu correo electronico, puedes cambiarla despues en tu perfil.</p>
                                            <div class="row">
                                                <div class="col col-md-6 form-group">
                                                    <label for="txtNombre">Nombres</label>
                                                    <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
                                                </div>
                                                <div class="col col-md-6 form-group">
                                                    <label for="txtApellido">Apellidos</label>
                                                    <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-md-6 form-group">
                                                    <label for="txtTelefono">Teléfono</label>
                                                    <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
                                                </div>
                                                <div class="col col-md-6 form-group">
                                                    <label for="txtEmailCliente">Email</label>
                                                    <input type="email" class="form-control valid validEmail" id="txtEmailCliente" name="txtEmailCliente" required="">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Regístrate</button>
                                        </form>
                                    </div>
                                </div>

                            <?php } ?>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Resumen
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span id="subTotalCompra" class="mtext-110 cl2">
									<?= SMONEY.formatMoney($subtotal) ?>
								</span>
							</div>

							<div class="size-208">
								<span class="stext-110 cl2">
									Envío:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?= SMONEY.formatMoney(COSTOENVIO) ?>
								</span>
							</div>
						</div>
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span id="totalCompra" class="mtext-110 cl2">
									<?= SMONEY.formatMoney($total) ?>
								</span>
							</div>
						</div>
						<!-- <a href="<?= base_url() ?>/carrito/procesarpago" id="btnComprar" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Procesar pago
						</a> -->

                    <?php 
                        //VERIFICANDO SI EXISTE VARIABLE DE SESION
                        if(isset($_SESSION['login'])){
                    ?>
                        <div id="divMetodoPago" class="notblock">
                            <div id="divCondiciones">
                                <input type="checkbox" id="condiciones" >
                                <label for="condiciones"> Aceptar </label>
                                <a href="#" data-toggle="modal" data-target="#modalTerminos" > Términos y Condiciones </a>
                            </div>

                            <!-- <div id="divtipocostos">
                                <br>
                                        <label for="listtipocostos">Zonas</label>
                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                            <select id="listtipocostos" class="js-select2" name="listtipocostos">
                                            <?php 
                                            if(count($data['costoszona']) > 0){ 
                                                foreach ($data['costoszona'] as $tipocostos) {
                                                    //condicional para mostrar tipos de pago
                                            ?>
                                            <option value="<?= $tipocostos['idzona']?>"><?= $tipocostos['zona']?></option>
                                        <?php                                                   
                                                }
                                        } ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <br>
                            </div> -->

                            <div id="optMetodoPago" class="notblock">   
                                <hr>                         
                                <h4 class="mtext-109 cl2 p-b-30">
                                    Método de pago
                                </h4>
                                <div class="divmetodpago">
                                    <!-- METODO DE PAGO PAYPAL -->
                                    <!-- <div>
                                        <label for="paypal">
                                            <input type="radio" id="paypal" class="methodpago" name="payment-method" checked="" value="Paypal">
                                            <img src="<?= media()?>/images/img-paypal.jpg" alt="Icono de PayPal" class="ml-space-sm" width="74" height="20">
                                        </label>
                                    </div> -->

                                    <!-- PAGO CONTRA ENTREGA -->
                                    <div>
                                        <label for="contraentrega">
                                            <input type="radio" id="contraentrega" class="methodpago" name="payment-method" value="CT">
                                            <span>Contra Entrega</span>
                                        </label>
                                    </div>

                                    <div id="divtipopago" class="notblock">
                                        <label for="listtipopago">Tipo de pago</label>
                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                            <select id="listtipopago" class="js-select2" name="listtipopago">
                                            <?php 
                                            if(count($data['tiposPago']) > 0){ 
                                                foreach ($data['tiposPago'] as $tipopago) {
                                                    //condicional para mostrar tipos de pago
                                                    if($tipopago['idtipopago'] != 1 && $tipopago['idtipopago'] != 3 && $tipopago['idtipopago'] != 4 && $tipopago['idtipopago'] != 5){
                                            ?>
                                            <option value="<?= $tipopago['idtipopago']?>"><?= $tipopago['tipopago']?></option>
                                        <?php
                                                    }
                                                }
                                        } ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <br>
                                        <button type="submit" id="btnComprar" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                        Procesar Pedido</button>
                                    </div>
                                    <!-- <div id="msgpaypal">
                                        <p>Para completar la transacción, te enviaremos a los servidores seguros de PayPal.</p>
                                    </div> -->
                                </div>
                            </div>	
                        </div>
                    <?php } ?>
					</div>
				</div>
			</div>
	</div>


<?php 
	footerTienda($data);
 ?>
	