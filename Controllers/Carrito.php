<?php 
	require_once("Models/TCategoria.php");
	require_once("Models/TProducto.php");
	require_once("Models/TTipoPago.php");
	require_once("Models/TCliente.php");
	require_once("Models/TTiposcostos.php");

	class Carrito extends Controllers{
		use TCategoria, TProducto, TTipoPago, TCliente, TTiposcostos;
		
		public function __construct()
		{
			//sessionStart();
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
			//dep($_SESSION);
			//dep($mail);

			$data['page_tag'] = NOMBRE_EMPESA.' - Procesar Pago';
			$data['page_title'] = 'Procesar Pago';
			$data['page_name'] = "procesarpago";

			/* OBTENIENDO LOS DATOS DE TIPO DE PAGO */
			$data['tiposPago'] = $this->getTiposPagoT();
			//$data['costoszona'] = $this->getTiposcostosT();
			$this->views->getView($this,"procesarpago",$data); 
		}
	}
 ?>
