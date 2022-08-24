<?php 
	require 'Libraries/html2pdf/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;

	class Factura extends Controllers{
		public function __construct()
		{
			//sessionStart();
			parent::__construct();
			session_start();

			//valida si el usuario esta logiado
			if(empty($_SESSION['login'])){
				//redirreciona al login
				header('Location: '.base_url().'/login');
				die();
			}
			//obtiene los permisos del modulo indicado
			getPermisos(MPEDIDOS);
		}

		public function generarFactura($idpedido)
		{
			if($_SESSION['permisosMod']['r']){				
				if(is_numeric($idpedido)){
					$idpersona = "";
					//VALIDANDO PERMISOS DE LECTURA
					if($_SESSION['permisosMod']['r'] and $_SESSION['userData']['idrol'] == RCLIENTES){
						$idpersona = $_SESSION['userData']['idpersona'];//enviando el id del cliente
					}
					$data = $this->model->selectPedido($idpedido,$idpersona);
					if(empty($data)){
						echo "Datos no encontrados";
					}else{
						$idpedido = $data['orden']['idpedido'];
						
						ob_end_clean();//elimina buffer de salida
						$html = getFile("Template/Modals/comprobantePDF",$data);
						$html2pdf = new Html2Pdf('p','A4','es','true','UTF-8');
						$html2pdf->writeHTML($html);
						$html2pdf->output('factura-'.$idpedido.'.pdf');
					}
				}else{
					echo "Dato no válido";
				}
			}else{
				//redirreciona a login, si esta logeado al dashboard
				header('Location: '.base_url().'/login');
				die();
			}
		}

	}
 ?>