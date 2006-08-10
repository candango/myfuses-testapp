<?php
class Application implements IContextRegisterable {
    
    private $name;
    
    private $path;
    
    private $registerTime;
    
    private $actionVariable = "action";
    
    private $lastLoadTime = 0;
    
    public function getName() {
    	return $this->name;
    }
    
    public function setName( $name ) {
        $this->name = $name;
    }
    
    public function getPath() {
        return $this->path;
    }
    
    public function setPath( $path ) {
        $this->path = $path;
    }
    
    public function getRegisterTime() {
    	return $this->registerTime;
    }
    
    public function setRegisterTime( $registerTime ) {
    	$this->registerTime = ( int ) $registerTime;
    }
    
    public function getActionVariable() {
        return $this->actionVariable;
    }
    
    public function setActionVariable( $actionVariable ) {
    	$this->actionVariable = $actionVariable;
    }
    
    public function getLastLoadTime() {
    	return $this->lastLoadTime;
    }
    
    public function setLastLoadTime( $time ) {
    	return $this->lastLoadTime = (int) $time;
    }
    
    public function getContextXML( $identation = "" ) {
    	$xml = $identation . "<application name=\"" . $this->getName() . "\">\n";
        $xml .= $identation . "\t<action_variable>" . 
            $this->getActionVariable() . "</action_variable>\n";
        $xml .= $identation . "\t<path>" . $this->getPath() . "</path>\n";
        $xml .= $identation . "\t<register_time>" . $this->getRegisterTime() . 
            "</register_time>\n";
        $xml .= $identation . "\t<last_load_time>" . $this->getLastLoadTime() . 
            "</last_load_time>\n";
        $xml .= $identation . "</application>\n";
        return $xml;
    }
    
    public function setAttributesFromContext( SimpleXMLElement $element ) {
    	$attributesSetMap =  array(
            'action_variable' => 'setActionVariable',
            'path' => 'setPath',
            'register_time' => 'setRegisterTime'	
    	);
        
        $this->setName( ( string ) $element->attributes()->name );
        
        foreach( $element as $key => $itemXML ) {
            if( isset( $attributesSetMap[ $key ] ) ) {
                $this->$attributesSetMap[ $key ]( ( string ) $itemXML );	
            }
            // TODO throw some exception
        }
        
    }
    
}
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */