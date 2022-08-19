<?php 

class Pedidos extends Controllers{

    public function __construct()
    {
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
        $data['page_title'] = "PEDIDOS <small>Tienda Virtual</small>";
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
			$arrData = $this->model->selectPedidos();
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
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
?>