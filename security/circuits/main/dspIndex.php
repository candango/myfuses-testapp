<?php
use Candango\MyFuses\Security\AbstractSecurityManager;
$credential = AbstractSecurityManager::getInstance()->getCredential();
?>

<h1>Security test application</h1>

<h2>User Information</h2>

<p><b>Name:</b> <?=$credential->getAttribute( 'name' )?></p>

<p><b>Login:</b> <?=$credential->getAttribute( 'login' )?></p>
