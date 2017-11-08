<?php

use Candango\MyFuses\Controller;
use Candango\MyFuses\Core\AbstractPlugin;
use Candango\MyFuses\Core\Circuit;
use Candango\MyFuses\Process\Context;

class BreadCrumbPlugin extends AbstractPlugin
{
    
    public function run()
    {
        $myFuses = Controller::getInstance();
        $action = $myFuses->getCurrentAction();
        $circuit = $myFuses->getRequest()->getAction()->getCircuit();
        $breadCrumb =  $this->buildTrack($circuit) . "." .
            $myFuses->getRequest()->getAction()->getName();
        Context::setParameter( "breadCrumb", $breadCrumb );
    }

    private function buildTrack(Circuit $circuit)
    {
        if( !is_null( $circuit->getParent() ) ) {
            return  $this->buildTrack( $circuit->getParent() ) . " > " .
                $circuit->getName();
        }
        return $circuit->getName();
    }
}
