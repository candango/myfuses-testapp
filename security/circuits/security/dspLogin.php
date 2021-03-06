<?php
use Candango\MyFuses\Security\AbstractSecurityManager;

$userLoginFieldName = AbstractSecurityManager::getInstance()->getUserLoginField();
$userPasswordFieldName = AbstractSecurityManager::getInstance()->getUserPasswordField();
?>
<h2>User Login</h2>

<form name="frmLogin" action="<?=xfa("goToAuthenticationAction")?>" method="post">

<p><b>Login:</b> <input type="text" name="<?=$userLoginFieldName?>" /></p>
<?=getErrorByFieldName( $userLoginFieldName )?>
<p><b>Password:</b> <input type="password" name="<?=$userPasswordFieldName?>" /></p>
<?=getErrorByFieldName( $userPasswordFieldName )?>
<p><input type="submit" name="submit" value="Login" /></p>

</form>
<?php if( isset( $_SESSION[ 'MYFUSES_SECURITY' ][ 'AUTH_ERRORS' ][ "error" ] ) ) { ?>
<div style="color:red;">
<?=$_SESSION[ 'MYFUSES_SECURITY' ][ 'AUTH_ERRORS' ][ "error" ];?>
</div>
<?php } ?>
<?php
function getErrorByFieldName( $fieldName ) { 
	return isset(
	   $_SESSION[ 'MYFUSES_SECURITY' ][ 'AUTH_ERRORS' ][ $fieldName ] ) ? 
	   "<p style=\"color:red;\">" . 
	   $_SESSION[ 'MYFUSES_SECURITY' ][ 'AUTH_ERRORS' ][ $fieldName ] . 
	   "</p>" : "";
}
