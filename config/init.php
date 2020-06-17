<?php
// The source code for this was from the YouTube Tutorial:
// "Projects In PHP | Creating A Job Lister Website From Scratch | Eduonix"
// https://www.youtube.com/watch?v=LEkjrQMmIK0

// Our Group used this php file for our templates.

// START SESSION
session_start();

// INCLUDE HELPERS
require_once 'helpers/system_helper.php';

// AUTOLOADER
function __autoload($class_name) {
    require_once 'lib/'.$class_name.'.php';
}