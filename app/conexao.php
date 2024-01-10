<?php //if(!isset($_SESSION['APP'])) die('Esta pagina é bloqueada');

class Conexao {

	private static $host;
	private static $port;
	private static $driver;
	private static $schema;
	private static $username;
	private static $password;
	private static $option;
	private static $attribute;
	private static $dsn;
	private static $link = null;

	public static function getConnection() {

		//VERIFICA SE JÁ EXISTE UMA CONEXAO
		if (self::$link) {
			return self::$link;
		}

		//COLETA OS DADOS DO BD_CONFIG.INI
		$parse = parse_ini_file('bd_config.ini',true);
		self::$driver 	= $parse['bd_param']['db_driver'];
		self::$username = $parse['bd_param']['db_user'];
		self::$password = $parse['bd_param']['db_password'];
		self::$host 	= $parse['dsn']['host'];
		self::$port 	= $parse['dsn']['port'];
		self::$schema 	= $parse['dsn']['dbname'];
		self::$dsn = self::$driver.":host=".self::$host.";dbname=".self::$schema;

		//TENTA INSTANCIAR UMA CONEXÃO
		try {
				
			self::$link = new PDO(
					self::$dsn,
					self::$username,
					self::$password,
					array (	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				
			self::$link->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				
		
			return self::$link;
				
		} catch (Exception $e ) {
			echo $e->getMessage();
			//ew AppException ( true, "danger", $e->getMessage () );
		}
	}
}