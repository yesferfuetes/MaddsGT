<?php 
	class Nosotros extends Controllers{

		public function __construct()
		{
			parent::__construct();
			session_start();
			/* getPermisos(MDPAGINAS); */
		}

		public function nosotros()
		{
			/* $pageContent = getPageRout('nosotros'); */
			/* if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				 
			} */
            $data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = NOMBRE_EMPESA;/* ." - ".$pageContent['titulo']; */
			$data['page_name'] = "Nosotros";
			$this->views->getView($this,"nosotros",$data); 

		}

	}
 ?>
