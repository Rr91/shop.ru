<?php
	require_once "global_class.php";

	class Order extends GlobalClass
	{

		public function __construct()
		{
			parent::__construct("orders");
		}
	}
?>