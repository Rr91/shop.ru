<?php
	require_once "config_class.php";

	class Format{

		private $config;

		public function __construct(){
			$this->config = new Config();
		}

		public function ts(){
			return time();
		}

		public function xss($data){
			
			if(is_array($data))
			{
				$escaped = array();

				foreach ($data as $key => $value) {
					$escaped[$key] = $this->xss($value);
				}
				return $escaped;
			}
			return htmlspecialchars($data);
		}
	}
?>