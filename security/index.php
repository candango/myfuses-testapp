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

require_once 'myfuses/MyFuses.class.php';

// creating new iflux instance
$myFuses = MyFuses::getInstance();

$myFuses->createApplication( "SecurityTestApp" );

$myFuses->doProcess();
/*
var_dump( get_mem_usage() );

var_dump( microtime_float() - $time );*/