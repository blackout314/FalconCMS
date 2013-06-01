<?php
class pages extends pagesModel {
	public $_PAGES;

	public function __construct( )
	{
		$this->_package = 'pages';
		parent::__construct();

		foreach( scandir(ETC.DS.PAGE) as $page ):
			if( is_file( ETC.DS.PAGE.DS.$page)==true ):
				$this->_PAGES[]	= array( 'page' => $page );
			endif;
		endforeach;
	}
	public function __tostring( )
	{
		foreach( $this->_PAGES as $n=>$p ) {
			$this->_OUTPUT[] = $p;
		}
		$this->_tplManager->assign( 'pages', $this->_OUTPUT );
		$this->_tplManager->draw( 'pages' );
	}
	public function display( $var )
	{
		echo '['.$var.']<br>';
	}
}
?>
