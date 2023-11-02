<?php
//Start Session
session_start();

//Config File
require_once 'config.php';

//Autoloader
 spl_autoload_register(function ($class_name){
    require_once 'model/'.$class_name.'.php';
});