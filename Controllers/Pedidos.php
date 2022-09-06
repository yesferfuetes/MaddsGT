<?php 
require_once("Models/TTipoPago.php");

class Pedidos extends Controllers{
	use TTipoPago;

    public function __construct()
    {
		//sessionStart();
        parent::__construct();
        session_start();//inicializando sesion
        if(empty($_SESSION['login']))
        {
            header('Location: '.base_url().'/login');
            die();
        }
        getPermisos(MPEDIDOS);
    }

    public function Pedidos()
    {
        //verificando si la variable viene vacia
        if(empty($_SESSION['permisosMod']['r'])){
            header("Location:".base_url().'/dashboard');
        }
        $data['page_tag'] = "Pedidos";
        $data['page_title'] = "PEDIDOS";
        $data['page_name'] = "pedidos";
        $data['page_functions_js'] = "functions_pedidos.js";
        $this->views->getView($this,"pedidos",$data);
    }

    public function getPedidos(){
        //verificando si tiene permisos de lectura
		if($_SESSION['permisosMod']['r']){

			$idpersona = "";
            //validando si es un cliente para mostrar sus pedidos
			if( $_SESSION['userData']['idrol'] == RCLIENTES ){
				$idpersona = $_SESSION['userData']['idpersona'];
			}
			//envia el id de persona para mostrar solo sus pedidos en la vista pedidos
			$arrData = $this->model->selectPedidos($idpersona);
			//dep($arrData);
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['transaccion'] = $arrData[$i]['referenciacobro'];

				if($arrData[$i]['idtransaccionpaypal'] != ""){
					$arrData[$i]['transaccion'] = $arrData[$i]['idtransaccionpaypal'];
				}

				$arrData[$i]['monto'] = SMONEY.formatMoney($arrData[$i]['monto']);

				
				if($_SESSION['permisosMod']['r']){
					
					$btnView .= ' <a title="Ver Detalle" href="'.base_url().'/pedidos/orden/'.$arrData[$i]['idpedido'].'" target="_blanck" class="btn btn-info btn-sm"> <i class="far fa-eye"></i> </a>

						<a title="Generar PDF" href="'.base_url().'/factura/generarFactura/'.$arrData[$i]['idpedido'].'" target="_blanck" class="btn btn-danger btn-sm"> <i class="fas fa-file-pdf"></i> </a> ';

					if($arrData[$i]['idtipopago'] == 1){
						$btnView .= '<a title="Ver Transacción" href="'.base_url().'/pedidos/transaccion/'.$arrData[$i]['idtransaccionpaypal'].'" target="_blanck" class="btn btn-info btn-sm"> <i class="fa fa-paypal" aria-hidden="true"></i> </a> ';
					}else{
						$btnView .= '<button class="btn btn-secondary btn-sm" disabled=""><i class="fa fa-paypal" aria-hidden="true"></i></button> ';
					}
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idpedido'].')" title="Editar pedido"><i class="fas fa-pencil-alt"></i></button>';
				}
				/* if($_SESSION['permisosMod']['d']){
					$btnDelete = '<button class="btn btn-primary  btn-sm" onClick="fntDelInfo('.$arrData[$i]['idpedido'].')" title="Eliminar pedido"><i class="fas fa-trash-alt"></i></button>';
				} */
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function orden($idpedido){
		if(!is_numeric($idpedido)){
			header("Location:".base_url().'/pedidos');
		}
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}

		$idpersona = "";
		if( $_SESSION['userData']['idrol'] == RCLIENTES ){
			$idpersona = $_SESSION['userData']['idpersona'];
		}
		
		$data['page_tag'] = "Pedido - Tienda Virtual";
		$data['page_title'] = "PEDIDO <small>Tienda Virtual</small>";
		$data['page_name'] = "pedido";
		$data['arrPedido'] = $this->model->selectPedido($idpedido,$idpersona);
		$this->views->getView($this,"orden",$data);
	}

	public function getPedido(string $pedido){
		if($_SESSION['permisosMod']['u'] and $_SESSION['userData']['idrol'] != RCLIENTES){
			if($pedido == ""){
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{
				$requestPedido = $this->model->selectPedido($pedido,"");
				if(empty($requestPedido)){
					$arrResponse = array("status" => false, "msg" => "Datos no disponibles.");
				}else{
					$requestPedido['tipospago'] = $this->getTiposPagoT();
					$htmlModal = getFile("Template/Modals/modalPedido",$requestPedido);
					$arrResponse = array("status" => true, "html" => $htmlModal);
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);//convirtiendo el array en formato json
		}
		die();
	}

	public function setPedido(){
		if($_POST){
			if($_SESSION['permisosMod']['u'] and $_SESSION['userData']['idrol'] != RCLIENTES){

				$idpedido = !empty($_POST['idpedido']) ? intval($_POST['idpedido']) : "";
				$estado = !empty($_POST['listEstado']) ? strClean($_POST['listEstado']) : "";
				$idtipopago =  !empty($_POST['listTipopago']) ? intval($_POST['listTipopago']) : "";
				$transaccion = !empty($_POST['txtTransaccion']) ? strClean($_POST['txtTransaccion']) : "";

				if($idpedido == ""){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					//PAGO CON PAYPAL
					if($idtipopago == ""){
						if($estado == ""){
							$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
						}else{
							$requestPedido = $this->model->updatePedido($idpedido,"","",$estado);
							if($requestPedido){
								$arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente");
							}else{
								$arrResponse = array("status" => false, "msg" => "No es posible actualizar la información.");
							}
						}
					//PAGO CONTRA ENTREGA
					}else{
						if($transaccion == "" or $idtipopago =="" or $estado == ""){
							$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
						}else{
							$requestPedido = $this->model->updatePedido($idpedido,$transaccion,$idtipopago,$estado);
							if($requestPedido){
								$arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente");
							}else{
								$arrResponse = array("status" => false, "msg" => "No es posible actualizar la información.");
							}
						}
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
	
}
?>