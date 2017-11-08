<?php
require_once 'myfuses/src/MyFuses/Controller.php';

use Candango\MyFuses\Controller;

// creating new iflux instance
$myFuses = Controller::getInstance();

$myFuses->createApplication("SecurityTestApp");

$myFuses->doProcess();
