<?php
// START SESSION
session_start();

// CONFIG FILE 
require_once 'config.php';

// INCLUDE HELPERS
require_once 'helpers/system_helper.php';

// AUTOLOADER
function __autoload($class_name) {
    require_once 'lib/'.$class_name.'.php';
}