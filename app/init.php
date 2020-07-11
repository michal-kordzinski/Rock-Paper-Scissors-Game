<?php

/**
 * GLOBALS
 */
define('URL', 'http://localhost/Rock-Paper-Scissors-Game/public');

/**
 * credentials to database
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gra-papier-kamien-nozyczki');
define('DB_CHARSET', 'utf8');

/**
 * session starting
 */
session_start();

/**
 * classes autoloader
 * TODO rebulid to OOP
 */
spl_autoload_register(function($class){
    require_once('core/' . $class . '.php');
});