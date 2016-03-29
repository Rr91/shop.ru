<?php
	require_once "globalmessage_class.php";

	abstract class GomplexMessage extends GlobalMessage{

		public function getTitle()
		{
			return $this->get($name."_TITLE");
		}
		public function getText()
		{
			return $this->get($name."_TEXT");
		}


	}
?>