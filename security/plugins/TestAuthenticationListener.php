<?php
use Candango\MyFuses\Security\SecurityManager;
use Candango\MyFuses\Security\AuthenticationListener;


class TestAuthenticationListener implements AuthenticationListener
{
    public function authenticate(SecurityManager $manager)
    {
        $users = array(
           'admin' => array('name' => "Administration",
               'password' => "adminpass" ),
           'usr1' => array('name' => "User 1", 'password'=> "usr1"),
           'usr2' => array('name' => "User 2", 'password'=> "usr2"),
        );
        $userLogin = $manager->getUserLoginInPost();
        $userPassword = $manager->getUserPasswordInPost();

        if($userLogin != "" && $userPassword != "")
        {
            if(!array_key_exists($userLogin, $users))
            {
                $_SESSION['MYFUSES_SECURITY']['AUTH_ERRORS'][
                    'error'] = "Invalid Login!";
            } else {
                if($users[$userLogin]['password'] !== $userPassword)
                {
                    $_SESSION['MYFUSES_SECURITY']['AUTH_ERRORS'][
                        'error'] = "Invalid Login!";
                } else {
                    $credential = $manager->getCredential();
                    
                    $credential->addAttribute("login", $userLogin);
                    $credential->addAttribute("name",
                        $users[$userLogin]['name']);
                    
                    $credential->setAuthenticated(true);
                    $manager->persistCredential($credential);
                }
            }
        } else {
            if($userLogin == "")
            {
                $_SESSION['MYFUSES_SECURITY']['AUTH_ERRORS'][
                    $manager->getUserLoginField()] = "The user name is a " .
                    "required Field.";
            }
            if( $userPassword == "" ) {
                $_SESSION['MYFUSES_SECURITY']['AUTH_ERRORS'][
                    $manager->getUserPasswordField()] =
                    "The user password is a required Field.";
            }
        }
    }

    public function authenticationPerformed(SecurityManager $manager) {}
}
