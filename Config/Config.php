<?php 
	
	//define("BASE_URL", "https://www.maddsgt.com");
	const BASE_URL = "http://localhost/tienda_virtual";

	//Zona horaria
	date_default_timezone_set('America/Guatemala');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "db_tiendavirtual";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "Q";

	//Datos envio de correo
	const NOMBRE_REMITENTE = "MaddsGT";
	const EMAIL_REMITENTE = "info@maddsgt.com";
	const NOMBRE_EMPESA = "MaddsGT | Venta de ropa nueva y usada";
	const WEB_EMPRESA = "www.maddsgt.com";

	//Datos de empresa
	const DIRECCION = "Zona 3 Ciudad de Guatemala";
	const TELEMPRESA = "36416799";
	const EMAIL_EMPRESA = "info@maddsgt.com";
	const EMAIL_PEDIDOS = "info@maddsgt.com";

	const CAT_SLIDER = "12,13";
	const CAT_BANNER = "12,13";

	//Datos para Encriptar / Desencriptar
	const KEY = 'yesferdev';
	const METHODENCRIPT = "AES-128-ECB";

	//Envío
	const COSTOENVIO = 25;

	//Modulos
	const MCLIENTES = 3;
	const MPEDIDOS = 5;

	//Roles
	const RADMINISTRADOR = 1;
	const RCLIENTES = 7;

	const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

	//Productos por pagina
	const CANTPORDHOME = 5;

	//Para mostrar cuantos productos en la vista Tienda
	const PROPORPAGINA = 3;
 ?>