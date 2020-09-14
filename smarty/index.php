<?php
require_once 'myfuses/src/MyFuses/Controller.php';

use Candango\MyFuses\Controller;

require_once(__DIR__ . "/../vendor/autoload.php");

// creating new iflux instance
$myFuses = Controller::getInstance();

$myFuses->createApplication("SmartyTestApp");

$myFuses->doProcess();
