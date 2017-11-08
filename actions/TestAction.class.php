<?php

use Candango\MyFuses\Core\FuseAction;

class TestAction extends FuseAction {
    
    public function doAction(){
        echo MyFuses::getInstance()->getCurrentPhase() . "<br>";
    }
    
}