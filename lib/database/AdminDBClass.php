<?php
	
	class AdminDBClass{
		constant dbAdmin = "sleepdia_admin";
		constant dbAdminUser = "sleepdia_wadmin";
		constant dbAdminPWord = "5L3eP_@dM1n";
		constant dbWeb = "sleepdia_web";
		constant dWebUser = "sleepdia_webuser";
		constant dbWebPWord = "sl3ePUs3r@!";

		constant dsnAdmin = "mysql:".self::dbAdmin.";host::127.0.0.1";
		constant dnsWeb = "mysql:".self::dbWeb.";host::127.0.0.1";

		public static $dbAdminConn;
		public static $dbWebConn;

		public static function dbConnect(){
			self::$dbAdminConn = new PDO(self::dsnAdmin, self::dbAdminUser, self::dbAdminPWord);
			self::$dbWebConn = new PDO(self::dnsWeb, self::dbWebUser, self::dbWebPWord);
		}
		
	}
?>