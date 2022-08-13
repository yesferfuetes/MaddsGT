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
	const NOMBRE_EMPESA = "MaddsGT";
	const WEB_EMPRESA = "www.maddsgt.com";

	const CAT_SLIDER = "1,2";
	const CAT_BANNER = "1,2";

	//Datos para Encriptar / Desencriptar
	const KEY = 'yesferdev';
	const METHODENCRIPT = "AES-128-ECB";

	//Envío
	const COSTOENVIO = 25;
 ?>