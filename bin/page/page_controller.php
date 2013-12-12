<?php

class page extends pageModel {
	public function __construct () {
		$this->_package = 'page';
		parent::__construct ();
		$this->_OUTPUT = '';
	}
	public function __tostring( )
	{
		return $this->_OUTPUT;
	}
	public function display( $var )
	{
		$this->_PAGE = '';
		if( is_file( ETC.DS.PAGE.DS.$var)==true ) {
			$this->_PAGE = Parsedown::instance()->parse( file_get_contents(ETC.DS.PAGE.DS.$var) );
		}
		$this->_tplManager->assign( 'page', $this->_PAGE );
		$this->_tplManager->draw( 'singlepage' );

		// lang
		//
		$page = explode('.',$var);
		$returned = array();
		foreach($this->_languages as $k=>$l) {
			$imploded = implode('.', array($k,$page[1],$page[2]));
			if ($k!==LANG && is_file( ETC.DS.PAGE.DS.$imploded) ) {
				$returned[$k] = $imploded;
			}
		}
		return $returned;
	}
}

?>
