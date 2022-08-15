<?php 
	require_once("Models/TCategoria.php");
	require_once("Models/TProducto.php");
	require_once("Models/TTipoPago.php");
	require_once("Models/TCliente.php");

	class Carrito extends Controllers{
		use TCategoria, TProducto, TTipoPago, TCliente;
		
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function carrito()
		{
			$data['page_tag'] = NOMBRE_EMPESA.' - Carrito';
			$data['page_title'] = 'Carrito de compras';
			$data['page_name'] = "carrito";
			$this->views->getView($this,"carrito",$data); 
		}

		public function procesarpago()
		{
			//valida si existe producto en el carrito muestra esta vista
			if(empty($_SESSION['arrCarrito'])){ 
				header("Location: ".base_url());
				die();
			}

			$infoOrden = $this->getPedido(10);
			$dataEmailOrden = array('pedido' => $infoOrden);

			$mail = getFile("Template/Email/email_notificacion_orden",$dataEmailOrden);
			dep($mail);

			/* if(isset($_SESSION['login'])){
				$this->setDetalleTemp();
			} */
			$data['page_tag'] = NOMBRE_EMPESA.' - Procesar Pago';
			$data['page_title'] = 'Procesar Pago';
			$data['page_name'] = "procesarpago";

			/* OBTENIENDO LOS DATOS DE TIPO DE PAGO */
			$data['tiposPago'] = $this->getTiposPagoT();
			$this->views->getView($this,"procesarpago",$data); 
		}

		/* OBTENIENDO DATOS PARA ALMACENARLOS EN TABLA TEMP */
		/* public function setDetalleTemp(){
			$sid = session_id();
			$arrPedido = array('idcliente' => $_SESSION['idUser'],
								'idtransaccion' =>$sid, //variable de sesion
								'productos' => $_SESSION['arrCarrito']
							);
			$this->insertDetalleTemp($arrPedido);
		} */

	}
 ?>
