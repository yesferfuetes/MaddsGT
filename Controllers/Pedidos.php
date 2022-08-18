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
        getPermisos(5);
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
}
?>