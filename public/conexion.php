<?php

define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'sistema_web_oneil');
	define('DB_CHARSET', 'utf8');

	class Model{
		protected $db;
		public function __construct(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if($this->db->connect_errno){
				exit();
			}
			$this->db->set_charset(DB_CHARSET);
		}
	}
?>