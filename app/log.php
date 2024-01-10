<?php

class Log{
	
	public static function setLog($log){
		
		if (!isset($_SESSION['LOG'])){
			$_SESSION['LOG'] = $log;
		}else{
			$logTmp = $_SESSION['LOG'] ."<br/>".$log." -- ".date("d/m/Y h:m:s");
			$_SESSION['LOG'] = $logTmp;
		}		
	}
	
}
