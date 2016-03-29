<?php
	require_once "config_class.php";

	class Check{

		private $config;

		public function __construct()
		{
			$this->config = new Config();
		}

		private function intNumber($number)
		{
			if(  ( !is_int($number) ) && ( !is_string($number) )  ) return false;
			return preg_match("/^-?(([1-9][0-9]*)|(0))$/", $number);
		}

		public function id($id, $zero = false)
		{
			if(!$this->intNumber($id)) return false;
			if(($id === 0)&&(!$zero))  return false;
			return $id >= 0;
		}

		public function oneOrZero($number)
		{
			if(!$this->intNumber($number)) return false;
			return (($number == 0) || ($number == 1));
		}

		public function count($count)
		{
			return $this->noNegativeInteger($count);
		}
		private function noNegativeInteger($number)
		{
			if(!$this->intNumber($number)) return false;
			return ($number >= 0);
		}
		public function offset($offset)
		{
			return $this->intNumber($offset);
		}
	}
?>