<?php
class pages extends pagesModel {
	public $_PAGES;

	public function __construct( $conf )
	{
		$this->_package = 'pages';
		parent::__construct();

		foreach( scandir(ETC.DS.PAGE) as $page ):
			$lang = explode('.',$page);
			if( 	is_file( ETC.DS.PAGE.DS.$page)==true && 
				$lang[0]==LANG
			):
				$this->_PAGES[]	= array( 'page' => array( 'l'=>$lang[1], 'f'=>DS.$conf['path'].DS.LANG.'/page/display'.DS.$page) );
			endif;
		endforeach;
	}
	public function __tostring( )
	{
		$this->_tplManager->assign( 'pages', $this->_PAGES );
		$this->_tplManager->draw( 'pages' );
	}
}
?>
