<?php

class fortune extends fortuneModel {
	public function __construct( ) {
		$this->_package = 'fortune';
		parent::__construct();

		$path = ETC.DS.'fortune.txt';
		$fd=file($path);
		$riga=rand(1,sizeof($fd));
		for($r=0;$r<$riga;$r++) { $tmp=explode("||", $fd[$r]); }
		$this->_OUTPUT = $tmp[0].'<br>'.$tmp[1]; 
	}
	public function __tostring( )
	{
		$this->_tplManager->assign( 'fortune', $this->_OUTPUT );
		$this->_tplManager->draw( 'fortune' );
	}
}

?>
