<?php
/**
 * carlo 'blackout' denaro - blackout@grayhats.org
 * CORE - CONTROLLER
 */
class core extends coreModel {
	public function __construct( )
	{
		$this->_package = 'core';
		parent::__construct();

		// microtime
		//
		$this->_MICRO	= microtime(true);

		foreach( scandir(BIN) as $package ):
			if( is_dir( BIN.DS.$package )==true && $package!='.' && $package!='..' && $package!='core' ):
				$this->_packageCount[] = $package;
				$p	= new $package();
				$p->__tostring();
			endif;
		endforeach;

		if( isset($_GET['p']) ) {
			$argv	= explode('/',$_GET['p']);
			if( count($argv) > 2 ):	
				$package = new $argv[0]();
				$package->$argv[1]( $argv[2] );
			endif;
		}

		// microtime
		//
		$this->_MICRO = microtime(true) - $this->_MICRO;

		parent::__construct();
		$this->_tplManager->assign( 'micro', $this->_MICRO );
		$this->_tplManager->draw( 'micro' );
	}
}
?>
