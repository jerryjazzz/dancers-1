<?php
	namespace config;
	class Config /* */{
		var $APP_PATH ;
		var $DB_HOST =  "192.168.3.3" ;
		var $DB_USER =  "root" ;
		var $DB_PASS =  "";
		var $DB_NAME =  "dancers" ;
		var $BASE_URL = "http://192.168.3.3" ;
	}
	global $config;
	$config = new Config() ;


	?>