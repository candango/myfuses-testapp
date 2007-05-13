<?php
class TestPlugin extends AbstractPlugin {
    
    public function run() {
       if ( $this->getPhase() == Plugin::PRE_FUSEACTION_PHASE ) {
           var_dump( "inicio" );
       }
       if ( $this->getPhase() == Plugin::POST_FUSEACTION_PHASE ) {
           var_dump( "fim" );
       }
    }
    
    private function buildTrack( Circuit $circuit ) {
        if( !is_null( $circuit->getParent() ) ) {
            return  $this->buildTrack( $circuit->getParent() ) . " > " . $circuit->getName(); 
        }
        return $circuit->getName();
    }
    
}