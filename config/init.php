<?php
//Start Session
session_start();

//Config File
require_once $_SERVER['DOCUMENT_ROOT'].'/timeline/config/config.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/timeline/utils/validate_input.php';

//Autoloader
 spl_autoload_register(function ($class_name){
    require_once $_SERVER['DOCUMENT_ROOT'].'/timeline/model/'.$class_name.'.php';
});