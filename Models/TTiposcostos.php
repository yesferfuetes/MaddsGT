<?php 
require_once("Libraries/Core/Mysql.php");

trait TTiposcostos{
	private $con;

    /* EXTRALLENDO DATOS TIPO PAGO */
	public function getTiposcostosT(){
		$this->con = new Mysql();
		$sql = "SELECT * FROM zona";
		$request = $this->con->select_all($sql);
		return $request;
	}
}

 ?>