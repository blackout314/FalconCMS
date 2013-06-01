<?php
/**
 * carlo 'blackout' denaro - blackout@grayhats.org
 * PAGES - MODEL
 */

class pagesModel extends coreMain {
	protected $_OUTPUT;
	public $_attributes = array(
		'page'	=> 'model:page',
		'author'=> 'string'
	);
	public function __construct() {
		parent::__construct();
	}
}

?>
