<?php
/**
 * carlo 'blackout' denaro - blackout@grayhats.org
 * CORE - MODEL
 */

class coreMain {
	protected 	$_package;
	public 		$_attributes;
	public 		$_tplManager;
	public function __construct() {
		$this->_tplManager = new raintpl();
		raintpl::$tpl_dir = BIN.DS.$this->__getName().DS.VIEW.DS;
		raintpl::$cache_dir = CACHE.DS;
	}
	public function __getView( $a ) 
	{
		if( is_file(BIN.DS.$this->_package.DS.VIEW.DS.$a.'.php')==true )
		{
			return file_get_contents( BIN.DS.$this->_package.DS.VIEW.DS.$a.'.php' );
		}
	}
	public function __getAttr() {
		foreach( $this->_attributes as $a=>$t ) {
			if( preg_match('/^model:/',$t) ) {
				$model 	= explode( ':', $t );
				$name	= $model[1].'Model';
				$this->_attributes[ $a ] = new $name;
			}else{
				$this->_attributes[ $a ] = $t;
			}
		}
		return $this->_attributes;
	}
	public function __getName() {
		return ( $this->_package );
	}
}

class coreModel extends coreMain {
	private $_packageCount = array();
	static 	$_OUTPUT = array();
	static	$_MICRO;
	public function __construct() {
		parent::__construct();
	}
}

// -- EOF
?>
