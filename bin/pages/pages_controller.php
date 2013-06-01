<?php
class pages extends pagesModel {
	public $_PAGES;

	public function __construct( )
	{
		$this->_package = 'pages';
		foreach( scandir(ETC.DS.PAGE) as $page ):
			if( is_file( ETC.DS.PAGE.DS.$page)==true ):
				$this->_PAGES[]	= $page;
			endif;
		endforeach;
		parent::__getView('pagesList');
	}
	public function __tostring( )
	{
		return $this->_OUTPUT;
	}
	public function display( $var )
	{
		echo '['.$var.']<br>';
	}
}
?>
