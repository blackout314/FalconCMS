<?php

define ( 'DS', '/' );
define ( 'ETC', 'etc' );
define ( 'LIB', 'lib' );
define ( 'BIN', 'bin' );
define ( 'HOME', 'home' );
define ( 'VIEW', 'views' );
define ( 'PAGE', 'pages' );

function __autoload( $package ) {
	include BIN.DS.$package.DS.$package.'_model.php';
	include BIN.DS.$package.DS.$package.'_controller.php';
}

?>
