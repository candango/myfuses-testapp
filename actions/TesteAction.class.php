<?php
class TesteAction extends FuseAction {
    
    public function doAction(){
        var_dump( MyFuses::getInstance()->getCurrentPhase() );
    }
    
}