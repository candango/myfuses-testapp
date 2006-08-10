<?php
class ApplicationHandler {

    public static function initApplication() {
    	
        $context = Context::getInstance();
        
        if ( !$context->applicationExists( MyFuses::getApplicationName() ) ) {
            
            $application = new Application();
        
            $application->setName( MyFuses::getApplicationName() );
        
            $application->setPath( MyFuses::getApplicationPath() );
            
            ContextHandler::registerApplication( $application );	
        }
        
    }
    
    public static function loadApplicationFile() {
    	
        
        
    }
    
}
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */