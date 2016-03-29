<?php
	require_once "globalmessage_class.php";

	class Message extends Globalmessage
	{
		
		public function __construct()
		{
			parent::__construct("messages");
		}
	}
?>