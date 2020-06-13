<?php
// AUTOLOADER

function __autoload($class_name) {
    require_once 'lib/'.$class_name.'.php';
}