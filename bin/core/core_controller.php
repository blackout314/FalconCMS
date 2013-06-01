<?php
/**
 * carlo 'blackout' denaro - blackout@grayhats.org
 * CORE - CONTROLLER
 */
class core extends coreModel {
	public function __construct( )
	{
		$this->_package = 'core';
		// microtime
		//
		$this->_MICRO	= microtime(true);

		foreach( scandir(BIN) as $package ):
			if( is_dir( BIN.DS.$package )==true && $package!='.' && $package!='..' && $package!='core' ):
				$this->_packageCount[] = $package;
				$p	= new $package();
				$this->_OUTPUT[$package] = $p->__tostring();
			endif;
		endforeach;

		$argv	= split('/',$_REQUEST['p']);
		if( count($argv) > 2 ):	
			$package = new $argv[0]();
			$package->$argv[1]( $argv[2] );
		endif;

		foreach( $this->_OUTPUT as $p=>$o )
			echo	'p:'.$p.' >'.$o.'<br>';

		// microtime
		//
		$this->_MICRO = microtime(true) - $this->_MICRO;
		parent::__getView( 'micro' );
	}
}
?>
