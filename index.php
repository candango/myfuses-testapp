<?php
function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function get_mem_usage() {
    return ( round( memory_get_usage() / 1024 ) ) . " Kb";
}

$time = microtime_float();

var_dump( get_mem_usage() );
// creating new iflux instance
require_once 'myfuses/MyFuses.class.php';

$myFuses = MyFuses::getInstance( "TestApp" );

$myFuses->setApplicationPath( dirname( __FILE__ ) . "/" );

$myFuses->doProcess();

var_dump( get_mem_usage() );

var_dump( microtime_float() - $time );
