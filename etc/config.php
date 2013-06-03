<?php

define ( 'DS', '/' );
define ( 'ETC', 'etc' );
define ( 'LIB', 'lib' );
define ( 'BIN', 'bin' );
define ( 'HOME', 'home' );
define ( 'VIEW', 'views' );
define ( 'PAGE', 'pages' );
define ( 'CACHE', 'cache' );
define ( 'TPL', 'templates' );

function __autoload( $package ) {
	include BIN.DS.$package.DS.$package.'_model.php';
	include BIN.DS.$package.DS.$package.'_controller.php';
}


if( !$_SESSION['l']) {
	$_SESSION['l'] = $language;
}
if( $_GET['l'] ) {
	$_SESSION['l'] = $_GET['l'];
}

define( LANG, $_SESSION['l'] );

?>
