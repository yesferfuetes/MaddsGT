<?php 
	require_once("Models/TCategoria.php");
	require_once("Models/TProducto.php");
	require_once("Models/TCliente.php");
	require_once("Models/LoginModel.php");

	class Tienda extends Controllers{
		use TCategoria, TProducto, TCliente;
		public $login;

		public function __construct()
		{
			session_start();
			parent::__construct();
			$this->login = new LoginModel();
		}

		public function tienda()
		{
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = "Tienda Online";
			$data['page_name'] = "tienda";
			//$data['productos'] = $this->getProductosT();
			$pagina = 1;
			$cantProductos = $this->cantProductos();
			$total_registro = $cantProductos['total_registro'];

			//PAGINADOR
			$desde = ($pagina-1) * PROPORPAGINA;
			$total_paginas = ceil($total_registro / PROPORPAGINA);
			
			$data['productos'] = $this->getProductosPage($desde,PROPORPAGINA);
			$data['pagina'] = $pagina;
			$data['total_paginas'] = $total_paginas;
			$data['categorias'] = $this->getCategorias();
			$this->views->getView($this,"tienda",$data);			
		}

        public function categoria($params){
			if(empty($params)){
				header("Location:".base_url());
			}else{
				//Proceso para Rutas
				$arrParams = explode(",",$params);
				$idcategoria = intval($arrParams[0]);
				$ruta = strClean($arrParams[1]);
				$pagina = 1;
				if(count($arrParams) > 2 AND is_numeric($arrParams[2])){
					$pagina = $arrParams[2];
				}

				$cantProductos = $this->cantProductos($idcategoria);
				$total_registro = $cantProductos['total_registro'];

				//PAGINADOR
				$desde = ($pagina-1) * PROCATEGORIA;
				$total_paginas = ceil($total_registro / PROCATEGORIA);

				$infoCategoria = $this->getProductosCategoriaT($idcategoria,$ruta,$desde,PROCATEGORIA);

				$categoria = strClean($params);
                $data['page_tag'] = NOMBRE_EMPESA." - ".$infoCategoria['categoria'];
                $data['page_title'] = $infoCategoria['categoria'];
                $data['page_name'] = "categoria";
                $data['productos'] = $infoCategoria['productos'];
				$data['infoCategoria'] = $infoCategoria;
				$data['pagina'] = $pagina;
				$data['total_paginas'] = $total_paginas;
				$data['categorias'] = $this->getCategorias();
                $this->views->getView($this,"categoria",$data);
				
			}
		}

		public function producto($params){
			if(empty($params)){
				header("Location:".base_url());
			}else{
				//Proceso para Rutas
				$arrParams = explode(",",$params);
				$idproducto = intval($arrParams[0]);
				$ruta = strClean($arrParams[1]);
				$infoProducto = $this->getProductoT($idproducto,$ruta);
				if (empty($infoProducto)) {
					header("Location:".base_url());
				}

				$data['page_tag'] = NOMBRE_EMPESA." - ".$infoProducto['nombre'];
				$data['page_title'] = $infoProducto['nombre'];
				$data['page_name'] = "producto";
				$data['producto'] = $infoProducto;
				$data['productos'] = $this->getProductosRandom($infoProducto['categoriaid'],8,"r");
				$this->views->getView($this,"producto",$data);
			}
		}

		/* AGREGANDO LOS PRODUCTOS AL CARRITO-arrCarrito / REQUIERE DEL MODELO TPRODUCTO */
		public function addCarrito(){
			if($_POST){
				//unset($_SESSION['arrCarrito']);exit;
				$arrCarrito = array();
				$cantCarrito = 0;
				$idproducto = openssl_decrypt($_POST['id'], METHODENCRIPT, KEY);
				$cantidad = $_POST['cant'];

				if(is_numeric($idproducto) and is_numeric($cantidad)){
					$arrInfoProducto = $this->getProductoIDT($idproducto);

					if(!empty($arrInfoProducto)){
						$arrProducto = array('idproducto' => $idproducto,
											'producto' => $arrInfoProducto['nombre'],
											'cantidad' => $cantidad,
											'precio' => $arrInfoProducto['precio'],
											'imagen' => $arrInfoProducto['images'][0]['url_image'],
											'stock' => $arrInfoProducto['stock']
										);
						if(isset($_SESSION['arrCarrito'])){
							$on = true;
							$arrCarrito = $_SESSION['arrCarrito'];

							for ($pr=0; $pr < count($arrCarrito); $pr++) {
								if($arrCarrito[$pr]['idproducto'] == $idproducto){
									//$arrCarrito[$pr]['cantidad'] += $cantidad; //Suma la cantidad del producto para no duplicarlo en el modal
									$on = false; //es un indicador para ver si el product se agrega al carrito
								}
							}
							if($on){
								array_push($arrCarrito,$arrProducto);
							}
							$_SESSION['arrCarrito'] = $arrCarrito;
						}else{
							array_push($arrCarrito, $arrProducto);
							$_SESSION['arrCarrito'] = $arrCarrito;
						}

						//ciclo para contar elementos del carrito
						foreach ($_SESSION['arrCarrito'] as $pro) {
							$cantCarrito += $pro['cantidad'];
						}
						
						$htmlCarrito ="";
						$htmlCarrito = getFile('Template/Modals/modalCarrito',$_SESSION['arrCarrito']);
						$arrResponse = array("status" => true, 
											"msg" => '¡Se agrego al carrito!',
											"cantCarrito" => $cantCarrito,
											"htmlCarrito" => $htmlCarrito
										);

					}else{
						$arrResponse = array("status" => false, "msg" => 'Producto no existente.');
					}
				}else{
					$arrResponse = array("status" => false, "msg" => 'Dato incorrecto.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function delCarrito(){
			if($_POST){
				$arrCarrito = array();
				$cantCarrito = 0;
				$subtotal = 0;
				$idproducto = openssl_decrypt($_POST['id'], METHODENCRIPT, KEY);
				$option = $_POST['option'];

				if(is_numeric($idproducto) and ($option == 1 or $option == 2)){
					$arrCarrito = $_SESSION['arrCarrito'];
					for ($pr=0; $pr < count($arrCarrito); $pr++) {
						if($arrCarrito[$pr]['idproducto'] == $idproducto){
							unset($arrCarrito[$pr]);
						}
					}
					sort($arrCarrito);
					$_SESSION['arrCarrito'] = $arrCarrito;
					foreach ($_SESSION['arrCarrito'] as $pro) {
						$cantCarrito += $pro['cantidad'];
						$subtotal += $pro['cantidad'] * $pro['precio'];
					}

					$htmlCarrito = "";
					if($option == 1){
						$htmlCarrito = getFile('Template/Modals/modalCarrito',$_SESSION['arrCarrito']);
					}
					$arrResponse = array("status" => true, 
											"msg" => '¡Producto eliminado!',
											"cantCarrito" => $cantCarrito,
											"htmlCarrito" => $htmlCarrito,
											"subTotal" => SMONEY.formatMoney($subtotal),
											"total" => SMONEY.formatMoney($subtotal + COSTOENVIO)
										);
				}else{
					$arrResponse = array("status" => false, "msg" => 'Dato incorrecto.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		/* public function updCarrito(){
			if($_POST){
				$arrCarrito = array();
				$totalProducto = 0;
				$subtotal = 0;
				$total = 0;
				$idproducto = openssl_decrypt($_POST['id'], METHODENCRIPT, KEY);
				$cantidad = intval($_POST['cantidad']);

				if(is_numeric($idproducto) and $cantidad > 0){
					$arrCarrito = $_SESSION['arrCarrito'];
					
					for ($p=0; $p < count($arrCarrito); $p++) { 
						if($arrCarrito[$p]['idproducto'] == $idproducto){
							$arrCarrito[$p]['cantidad'] = $cantidad;
							$totalProducto = $arrCarrito[$p]['precio'] * $cantidad;
							break;
						}
					}
					$_SESSION['arrCarrito'] = $arrCarrito;
					foreach ($_SESSION['arrCarrito'] as $pro) {
						$subtotal += $pro['cantidad'] * $pro['precio']; 
					}
					$arrResponse = array("status" => true, 
										"msg" => '¡Producto actualizado!',
										"totalProducto" => SMONEY.formatMoney($totalProducto),
										"subTotal" => SMONEY.formatMoney($subtotal),
										"total" => SMONEY.formatMoney($subtotal + COSTOENVIO)
									);

				}else{
					$arrResponse = array("status" => false, "msg" => 'Dato incorrecto.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		} */

		public function registro(){
			error_reporting(0);
			if($_POST){
				/* RECIBIENDO DATOS POR POST */
				if(empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmailCliente']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strApellido = ucwords(strClean($_POST['txtApellido']));
					$intTelefono = intval(strClean($_POST['txtTelefono']));
					$strEmail = strtolower(strClean($_POST['txtEmailCliente']));
					$intTipoId = 7; //ID en BD correspondiente a CLientes
					$request_user = "";
					
					/* GENERANDO PASSWORD A CLIENTE */
					$strPassword =  passGenerator();
					$strPasswordEncript = hash("SHA256",$strPassword);
					/* ENVIANDO DATOS A TRAIT */
					$request_user = $this->insertCliente($strNombre, 
														$strApellido, 
														$intTelefono, 
														$strEmail,
														$strPasswordEncript,
														$intTipoId );
					if($request_user > 0 )
					{
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						$nombreUsuario = $strNombre.' '.$strApellido;
						$dataUsuario = array('nombreUsuario' => $nombreUsuario,
											 'email' => $strEmail,
											 'password' => $strPassword,
											 'asunto' => 'Bienvenido a tu tienda en línea');
						
						/* requiriendo funcion de Login.php */					 
						$_SESSION['idUser'] = $request_user;
						$_SESSION['login'] = true;

						/* requiriendo funcion de LoginModel para crear variable de sesion */
						$this->login->sessionLogin($request_user);

						//Descomentar cuando este en produccion
						//sendEmail($dataUsuario,'email_bienvenida');

					}else if($request_user == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el email ya existe, ingrese otro.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function procesarVenta(){
			
			if($_POST){
				$idtransaccionpaypal = NULL;
				$datospaypal = NULL;
				$personaid = $_SESSION['idUser'];
				$monto = 0;
				$tipopagoid = intval($_POST['inttipopago']);
				$tipocostoid = intval($_POST['inttiposcostos']);
				$direccionenvio = strClean($_POST['direccion']).', '.strClean($_POST['ciudad']);
				$status = "Pendiente";
				$subtotal = 0;
				$costo_envio = COSTOENVIO;
				$existencia = 0;
				$stock = 0;
				
				/* if($tipocostoid == 1 and $tipocostoid == 2 and $tipocostoid == 4 and $tipocostoid == 5 and $tipocostoid == 7 and $tipocostoid == 9 and $tipocostoid == 10 and $tipocostoid == 11 ){
					$costo_envio = 25;
				}else if($tipocostoid == 3){
					$costo_envio = 0;
				}
				dep($costo_envio);
				exit; */
				if(!empty($_SESSION['arrCarrito'])){

					foreach ($_SESSION['arrCarrito'] as $pro) {
						$subtotal += $pro['cantidad'] * $pro['precio']; 
					}

					$monto = $subtotal + COSTOENVIO;

					//PAGO CONTRA ENTREGA
					if(empty($_POST['datapay'])){

						//Crear pedido
						$request_pedido = $this->insertPedido($idtransaccionpaypal, 
															$datospaypal, 
															$personaid,
															$costo_envio,
															$monto, 
															$tipopagoid,
															$direccionenvio, 
															$status);
							//CICLO PARA CONTROL DE STOCK
							foreach ($_SESSION['arrCarrito'] as $producto){
								$productoid = $producto['idproducto'];
								$precio = $producto['precio'];
								$cantidad = $producto['cantidad'];
								$existencia = $producto['stock'];
								$stock += $existencia - $cantidad;
								$request_producto = $this->updateProducto($productoid,$stock);											
							}
						
						if($request_pedido > 0 ){

							//Insertamos detalle
							foreach ($_SESSION['arrCarrito'] as $producto) {
								$productoid = $producto['idproducto'];
								$precio = $producto['precio'];
								$cantidad = $producto['cantidad'];
								$this->insertDetalle($request_pedido,$productoid,$precio,$cantidad);
							}

							//ENVIAMOS EL CORREO DE NOTIFICACION DE VENTA AL CLIENTE Y A LA TIENDA
							/* DESCOMENTAR CUANDO ESTE EN PRODUCCION HOSTING */
							$infoOrden = $this->getPedido($request_pedido);
							$dataEmailOrden = array('asunto' => "Se ha creado la orden No.".$request_pedido,
													'email' => $_SESSION['userData']['email_user'], 
													'emailCopia' => EMAIL_PEDIDOS,
													'pedido' => $infoOrden );
							/* sendEmail($dataEmailOrden,"email_notificacion_orden"); */

							$orden = openssl_encrypt($request_pedido, METHODENCRIPT, KEY);
							$transaccion = openssl_encrypt($idtransaccionpaypal, METHODENCRIPT, KEY);
							$arrResponse = array("status" => true, 
											"orden" => $orden, 
											"transaccion" =>$transaccion,
											"msg" => 'Pedido realizado'
										);
							$_SESSION['dataorden'] = $arrResponse;
							unset($_SESSION['arrCarrito']);
							session_regenerate_id(true);
						}
					}else{ //Pago con PayPal
						$jsonPaypal = $_POST['datapay'];
						$objPaypal = json_decode($jsonPaypal);
						$status = "Aprobado";
						if(is_object($objPaypal)){
							$datospaypal = $jsonPaypal;
							$idtransaccionpaypal = $objPaypal->purchase_units[0]->payments->captures[0]->id;
							if($objPaypal->status == "COMPLETED"){
								$totalPaypal = formatMoney($objPaypal->purchase_units[0]->amount->value);
								if($monto == $totalPaypal){
									$status = "Completo";
								}
								//Crear pedido
								$request_pedido = $this->insertPedido($idtransaccionpaypal, 
																	$datospaypal, 
																	$personaid,
																	$costo_envio,
																	$monto, 
																	$tipopagoid,
																	$direccionenvio, 
																	$status);
								if($request_pedido > 0 ){
									//Insertamos detalle
									foreach ($_SESSION['arrCarrito'] as $producto) {
										$productoid = $producto['idproducto'];
										$precio = $producto['precio'];
										$cantidad = $producto['cantidad'];
										$this->insertDetalle($request_pedido,$productoid,$precio,$cantidad);
									}
									$infoOrden = $this->getPedido($request_pedido);
									$dataEmailOrden = array('asunto' => "Se ha creado la orden No.".$request_pedido,
													'email' => $_SESSION['userData']['email_user'], 
													'emailCopia' => EMAIL_PEDIDOS,
													'pedido' => $infoOrden );

									sendEmail($dataEmailOrden,"email_notificacion_orden");

									$orden = openssl_encrypt($request_pedido, METHODENCRIPT, KEY);
									$transaccion = openssl_encrypt($idtransaccionpaypal, METHODENCRIPT, KEY);
									$arrResponse = array("status" => true, 
													"orden" => $orden, 
													"transaccion" =>$transaccion,
													"msg" => 'Pedido realizado'
												);
									$_SESSION['dataorden'] = $arrResponse;
									unset($_SESSION['arrCarrito']);
									session_regenerate_id(true);
								}else{
									$arrResponse = array("status" => false, "msg" => 'No es posible procesar el pedido.');
								}
							}else{
								$arrResponse = array("status" => false, "msg" => 'No es posible completar el pago con PayPal.');
							}
						}else{
							$arrResponse = array("status" => false, "msg" => 'Hubo un error en la transacción.');
						}
					}
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible procesar el pedido.');
				}
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible procesar el pedido.');
			}

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

		/* MANDANDO A LLAMAR A LA VISTA CONFIRMAR PEDIDO */
		public function confirmarpedido(){
			if(empty($_SESSION['dataorden'])){
				header("Location: ".base_url());
			}else{
				$dataorden = $_SESSION['dataorden'];
				$idpedido = openssl_decrypt($dataorden['orden'], METHODENCRIPT, KEY);
				$transaccion = openssl_decrypt($dataorden['transaccion'], METHODENCRIPT, KEY);
				$data['page_tag'] = "Confirmar Pedido";
				$data['page_title'] = "Confirmar Pedido";
				$data['page_name'] = "confirmarpedido";
				$data['orden'] = $idpedido;
				$data['transaccion'] = $transaccion;
				$this->views->getView($this,"confirmarpedido",$data);
			}
			unset($_SESSION['dataorden']);
		}

		public function page($pagina = null){

			$pagina = is_numeric($pagina) ? $pagina : 1;
			$cantProductos = $this->cantProductos();
			$total_registro = $cantProductos['total_registro'];
			$desde = ($pagina-1) * PROPORPAGINA;
			$total_paginas = ceil($total_registro / PROPORPAGINA);
			$data['productos'] = $this->getProductosPage($desde,PROPORPAGINA);
			//dep($data['productos']);exit;
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = "Tienda Virtual";
			$data['page_name'] = "tienda";
			$data['pagina'] = $pagina;
			$data['total_paginas'] = $total_paginas;
			$data['categorias'] = $this->getCategorias();
			$this->views->getView($this,"tienda",$data);
		}

		public function search(){
			if(empty($_REQUEST['s'])){
				header("Location: ".base_url());
			}else{
				$busqueda = strClean($_REQUEST['s']);
			}

			$pagina = empty($_REQUEST['p']) ? 1 : intval($_REQUEST['p']);
			$cantProductos = $this->cantProdSearch($busqueda);

			//PAGINADOR
			$total_registro = $cantProductos['total_registro'];
			$desde = ($pagina-1) * PROBUSCAR;
			$total_paginas = ceil($total_registro / PROBUSCAR);

			$data['productos'] = $this->getProdSearch($busqueda,$desde,PROBUSCAR);

			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = "Resultado de: ".$busqueda;
			$data['page_name'] = "tienda";
			$data['pagina'] = $pagina;
			$data['total_paginas'] = $total_paginas;
			$data['busqueda'] = $busqueda;
			/* $data['categorias'] = $this->getCategorias(); */
			$this->views->getView($this,"search",$data);

		}

		public function suscripcion(){
			if($_POST){
				$nombre = ucwords(strtolower(strClean($_POST['nombreSuscripcion'])));
				$email  = strtolower(strClean($_POST['emailSuscripcion']));

				$suscripcion = $this->setSuscripcion($nombre,$email);

				if($suscripcion > 0){
					//creando array de respuesta
					$arrResponse = array('status' => true, 'msg' => "Gracias por tu suscripción.");
					//Enviar correo - descomentar en produccion
					$dataUsuario = array('asunto' => "Nueva suscripción",
										'email' => EMAIL_SUSCRIPCION,
										'nombreSuscriptor' => $nombre,
										'emailSuscriptor' => $email );
					/* sendEmail($dataUsuario,"email_suscripcion"); */
				}else{
					$arrResponse = array('status' => false, 'msg' => "El email ya fue registrado.");
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

			}
			die();
		}

		public function contacto(){
			if($_POST){
				//dep($_POST);
				$nombre = ucwords(strtolower(strClean($_POST['nombreContacto'])));
				$email  = strtolower(strClean($_POST['emailContacto']));
				$mensaje  = strClean($_POST['mensaje']);
				$useragent = $_SERVER['HTTP_USER_AGENT'];
				$ip        = $_SERVER['REMOTE_ADDR'];
				$dispositivo= "PC";

				if(preg_match("/mobile/i",$useragent)){
					$dispositivo = "Movil";
				}else if(preg_match("/tablet/i",$useragent)){
					$dispositivo = "Tablet";
				}else if(preg_match("/iPhone/i",$useragent)){
					$dispositivo = "iPhone";
				}else if(preg_match("/iPad/i",$useragent)){
					$dispositivo = "iPad";
				}

				$userContact = $this->setContacto($nombre,$email,$mensaje,$ip,$dispositivo,$useragent);
				
				if($userContact > 0){
					//creando array de respuesta
					$arrResponse = array('status' => true, 'msg' => "Su mensaje fue enviado correctamente.");
					//Enviar correo
					//DESCOMENTAR EN PRODUCCION
					/* $dataUsuario = array('asunto' => "Nueva Usuario en contacto",
										'email' => EMAIL_CONTACTO,
										'nombreContacto' => $nombre,
										'emailContacto' => $email,
										'mensaje' => $mensaje ); */
					/* sendEmail($dataUsuario,"email_contacto"); */
				}else{
					$arrResponse = array('status' => false, 'msg' => "No es posible enviar el mensaje.");
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

			}
			die();
		}

	}
 ?>