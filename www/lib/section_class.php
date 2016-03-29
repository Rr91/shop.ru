<?php
	require_once "global_class.php";

	class Section extends GlobalClass
	{

		public function __construct()
		{
			parent::__construct("sections");
		}

		public function getAllData()
		{
			return $this->transform($this->getAll("id"));
		}

		protected function transformElement($section)
		{
			$section["link"] = $this->url->section($section["id"]);
			return $section;
		}
	}
?>