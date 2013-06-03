<?php
/**
 * carlo 'blackout' denaro - blackout@grayhats.org
 * CORE - CONTROLLER
 */
class core extends coreModel {
	public function __construct( $template, $languages, $conf )
	{
		$this->_package = 'core';
		parent::__construct();

		$this->__printTpl( 'header', $template );

		// microtime
		//
		$this->_MICRO	= microtime(true);

		foreach( scandir(BIN) as $package ):
			if( is_dir( BIN.DS.$package )==true && $package!='.' && $package!='..' && $package!='core' ):
				$this->_packageCount[] = $package;
				$p	= new $package( $conf );
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
		$this->_tplManager->assign( 'langs', $languages );
		$this->_tplManager->assign( 'path', $conf['path'] );
		$this->_tplManager->draw( 'micro' );

		$this->__printTpl( 'footer', $template );
	}
	private function __printTpl( $how, $template ) {
		$temp 			= raintpl::$tpl_dir;
		switch( $how ) {
			case 'header':
			$this->_tplManager->assign( 'title', TITLE );
			$this->_tplManager->assign( 'descr', DESCR );
			$this->_tplManager->assign( 'keywords', KEYS );
			$this->_tplManager->assign( 'lang', LANG );
			break;
		}
		raintpl::$tpl_dir = TPL.DS.$template.DS;
		$this->_tplManager->draw( $how );
		raintpl::$tpl_dir	= $temp;
	}
}
?>
