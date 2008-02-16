<?php
class TestAction extends FuseAction {
    
    public function doAction(){
        echo MyFuses::getInstance()->getCurrentPhase() . "<br>";
    }
    
}