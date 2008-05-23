<?php
class BreadCrumbPlugin extends AbstractPlugin {
    
    public function run() {
        $action = MyFuses::getInstance()->getCurrentAction();
        $circuit = MyFuses::getInstance()->getRequest()->getAction()->getCircuit();
        $breadCrumb =  $this->buildTrack( $circuit ) . "." . 
            MyFuses::getInstance()->getRequest()->getAction()->getName();
        MyFusesContext::setParameter( "breadCrumb", $breadCrumb );
    }
    
    private function buildTrack( Circuit $circuit ) {
        if( !is_null( $circuit->getParent() ) ) {
            return  $this->buildTrack( $circuit->getParent() ) . " > " . $circuit->getName(); 
        }
        return $circuit->getName();
    }
    
}