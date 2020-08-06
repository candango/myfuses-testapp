<?php
/*function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function get_mem_usage() {
    return ( round( memory_get_usage() / 1024 ) ) . " Kb";
}

$time = microtime_float();

var_dump( get_mem_usage() );*/

require_once 'myfuses/src/MyFuses/Controller.php';

require_once(__DIR__ . '/vendor/autoload.php');

use Candango\MyFuses\Controller;

// creating new iflux instance
$myFuses = Controller::getInstance();

$myFuses->createApplication( "TestApp" );

$myFuses->doProcess();
/*
var_dump( get_mem_usage() );

var_dump( microtime_float() - $time );*/