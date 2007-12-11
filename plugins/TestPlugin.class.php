<?php
class TestBugaPlugin extends AbstractPlugin {
    
    public function run() {
        $circuit = MyFuses::getInstance()->getRequest()->getAction()->getCircuit();
        echo $this->buildTrack( $circuit ) . "." . MyFuses::getInstance()->getRequest()->getAction()->getName() ;
    }
    
    private function buildTrack( Circuit $circuit ) {
        if( !is_null( $circuit->getParent() ) ) {
            return  $this->buildTrack( $circuit->getParent() ) . " > " . $circuit->getName(); 
        }
        return $circuit->getName();
    }
    
}