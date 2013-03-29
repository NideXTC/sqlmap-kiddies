<?php

error_reporting(E_ALL);

// Just 4 Fun
$startTime = microtime(true);

// Load the libraries
include('./libraries/php/core/Command.php');
include('./libraries/php/core/Data.php');
include('./libraries/php/core/Database.php');
include('./libraries/php/core/Form.php');
include('./libraries/php/core/Log.php');
include('./libraries/php/core/Mailer.php');
include('./libraries/php/core/Message.php');
include('./libraries/php/core/Page.php');
include('./libraries/php/core/System.php');
include('./libraries/php/core/Tool.php');

// Load the configurations
include('./configurations/general.php');
include('./configurations/database.php');

if (MAINTENANCE_MODE == 'enabled'){
	include('./views/maintenance.php');
	exit(0);
}

try{
	initializeSystem();
	//initializeDatabase();
}
catch(Exception $exception){
	error($exception);
}

// Select the controller
$ctl = getController();
if (empty($ctl)){
	$ctl = CONTROLLER_BY_DEFAULT;
}

// Redirect
if (!file_exists('./controllers/'.$ctl.'.php')){
	$ctl = CONTROLLER_BY_DEFAULT;
}

include('./controllers/'.$ctl.'.php');

?>
