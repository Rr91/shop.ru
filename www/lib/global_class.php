<?php
	require_once "config_class.php";
	require_once "database_class.php";
	require_once "check_class.php";
	require_once "url_class.php";

	abstract class GlobalClass{

		protected $db;
		protected $table_name;
		protected $format;
		protected $config;
		protected $check;
		protected $url;

		public function __construct($table_name)
		{
			$this->config = new Config();
			$this->db     = Database::getDB();
			$this->format = new Format();
			$this->check  = new Check();
			$this->url    = new URL();

			$this->table_name = $this->config->db_prefix.$table_name;
		}

	    protected function getAll($order = false, $up = true, $count = false, $offset = false)
		{
			$ol = $this->getOL($order, $up, $count, $offset);
			$query = "SELECT * FROM `".$this->table_name."` $ol";
			return $this->db->select($query);
		}

		public function get($id)
		{
			return $this->getOnField('id', $id);
		}

		protected function getOnField($field, $value)
		{
			$query = "SELECT * FROM `".$this->table_name."` WHERE `$field` = ".$this->config->sym_query;
			return $this->db->selectRow($query, array($value));
		}


		protected function getAllOnField($field, $value, $order = false, $up = true, $count = false, $offset = false)
		 {
			$ol = $this->getOL($order, $up, $count, $offset);
			$query = "SELECT * FROM `".$this->table_name."` WHERE `$field` = ".$this->config->sym_query." $ol";
			return $this->db->select($query, array($value));
		}
		

		protected function getOL($order, $up, $count, $offset)
		{
			if($order)
			{
				$order = " ORDER BY `$order`";
				if(!$up) $order .=" DESC";
			}
			$limit = $this->getL($count, $offset);
			return "$order $limit";
		}

		protected function getL($count, $offset)
		{
			$limit = "";
			if($count)
			{
				if(!$this->check->count($count))return false;
				if($offset)
				{
					if(!$this->check->offset($offset)) return false;
					$limit = " LIMIT $offset , $count";
				}
				else $limit = " LIMIT $count";
			}
			return $limit;
		}

		protected function transform($element)
		{
			if(!$element) return false;
			if(isset($element[0]))
			{
				for($i = 0; $i < count($element); $i++)
					$element[$i] = $this->transformElement($element[$i]);
				return $element;
			}
			else return $this->transformElement($element);
		}
		
	}
?>