<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

//session start() wont work if there is space or any echo statement after php or before php

require "vendor/autoload.php";
require_once ('model/validation-functions.php');

session_start();

$f3 = Base::instance();
$f3->set('DEBUG', 3);
$f3->set('colors', array('pink', 'black', 'brown', 'white'));

$controller = new PetController($f3);

$f3->route('GET /',function ()
{
    global $controller;
    $controller->home();
});

$f3->route('GET /@item', function($f3, $params) {
    global $controller;
    $controller->homeParams($f3, $params);
});

$f3->route('GET|POST /order',function ($f3){
    global $controller;
    $controller->order1($f3);
});

$f3->route('GET|POST /order2',function ($f3)
{
    global $controller;
    $controller->order2($f3);
});

//$f3->route('POST /results',function ()
//{
//
//
//});

$f3->run();