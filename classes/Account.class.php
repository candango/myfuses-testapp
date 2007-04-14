<?php
class Account {
    
    private $name;
    
    public function __construct( $name ) {
        $this->name = $name;
    }
    
    public function getName() {
        var_dump($this->name);
        return $this->name;
    }
    
    public function setName( $name ) {
        $this->name = $name;
    }
    
}