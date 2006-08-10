<?php
class Context {
    
    private $name = "default";
    
    /**
     * Unique Context instance that must exist
     * 
     * @access private
     */
    private static $instance;
    
    /**
     * The name of current appliaction that context is deal with
     * 
     * @access private
     */
    private $currentApplicationName;
    
    /**
     * Array of apliactions that the context knows
     */
    private $applications = array();
    
    /**
     * The constructor
     * 
     * @access private
     */
    private function __construct() {	
        $this->name = MyFuses::getContextName();
        $this->currentApplicationName = MyFuses::getApplicationName();
    }
    
    /**
     *  
     */
    public static function getInstance() {
    	if ( is_null( self::$instance ) ) {
            self::$instance = new Context();
        }
        return self::$instance;
    }
    
    public function &getApplication( $name ) {
    	return $this->applications[ $name ];
    }
    
    public function addApplication( Application $application ) {
    	$this->applications[ $application->getName() ] = $application;
    }
    
    public function removeApplication( $name ) {
    	
        //TODO throw invalid operation exception
        if( $this->currentApplication->getName() !== $name ) {
    	   $applicationsTemp = $this->applications;
    	}
    }
    
    public function getApplications() {
    	return $this->applications;
    }
    
    public function applicationExists( $name ) {
    	if ( is_null( $this->getApplication( $name ) ) ) {
    		return false;
    	}
        return true;
    }
    
    public function &getCurrentApplication() {
    	return $this->getApplication( MyFuses::getApplicationName() );
    }
    
    public function getName() {
    	return $this->name;
    }
    
}
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */