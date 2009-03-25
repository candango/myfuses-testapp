<h2>User Login</h2>

<form name="frmLogin" action="<?=xfa("goToLoginAction")?>" method="post">

<p><b>Login:</b> <input type="text" name="<?=MyFusesAbstractSecurityManager::getInstance()->getUserLoginField()?>" /></p>
<p><b>Password:</b> <input type="password" name="<?=MyFusesAbstractSecurityManager::getInstance()->getUserPasswordField()?>" /></p>

<p><input type="submit" name="submit" value="Login" /></p>

</form>