<?php 
    require_once("Models/TCliente.php");
    require_once("Models/LoginModel.php");

class Cuenta extends Controllers{
    use TCliente;
    public $login;

    public function __construct()
    {
        session_start();
        parent::__construct();
        
        //instancia del modelo de login
        $this->login = new LoginModel();        
    }

    public function cuenta()
	{
			$data['page_tag'] = "Crear Cuenta - Tienda Online";
			$data['page_title'] = "MaddsGT";
			$data['page_name'] = "crearcuenta";
			$data['page_functions_js'] = "functions_cuenta.js";
			$this->views->getView($this,"cuenta",$data);
	}

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
                    $arrResponse = array('status' => true, 'msg' => 'Cuenta creada! Favor inicia sesion');

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

}

?>