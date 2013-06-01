<?php
/**
 * carlo 'blackout' denaro - blackout@grayhats.org
 * CORE - MODEL
 */

class coreMain {
	protected $_package;
	public function __getView( $a ) 
	{
		if( is_file(BIN.DS.$this->_package.DS.VIEW.DS.$a.'.php')==true )
		{
			include BIN.DS.$this->_package.DS.VIEW.DS.$a.'.php';
		}
	}
}

class coreModel extends coreMain {
	private $_packageCount = array();
	static 	$_OUTPUT = array();
	static	$_MICRO;

}

// -- EOF
?>
