<?php
/**
 * carlo 'blackout' denaro - blackout@grayhats.org
 */

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();

include 'user.config.php';	// user config
include 'etc/config.php';	// main config
include 'lib/template/raintpl/rain.tpl.class.php';
include 'lib/Parsedown.php';

$init	= new core( $template, $languages, array('path'=>'falcon20') );

//--EOF
?>
