<?php

class page extends pageModel {
	public function __construct( ) {
		$this->_OUTPUT = '';
	}
	public function __tostring( )
	{
		return $this->_OUTPUT;
	}
}

?>
