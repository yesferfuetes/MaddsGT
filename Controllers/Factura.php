<?php 
	require 'Libraries/html2pdf/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;

	class Factura extends Controllers{
		public function __construct()
		{
			sessionStart();
			parent::__construct();
			//session_start();
		}

		public function generarFactura($idpedido)
		{
			if(is_numeric($idpedido)){
				$idpersona = "";
				if($_SESSION['permisosMod']['r'] and $_SESSION['userData']['idrol'] == RCLIENTES){
					$idpersona = $_SESSION['userData']['idpersona'];
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
		}

	}
 ?>