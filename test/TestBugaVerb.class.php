<?php
class TestBugaVerb extends AbstractVerb {
    
    private $value;
    
    public function getValue() {
        return $this->value;
    }
    
    public function setValue( $value ) {
        $this->value = $value;
    }
    
    public function getData() {
        $data = parent::getData();
        $data[ "attributes" ][ "value" ] = $this->getValue();
        return $data;
    }
    
    public function setData( $data ) {
        parent::setData( $data );
        $this->setValue( $data[ "attributes" ][ "value" ] );
    }

    /**
     * Return the parsed code
     *
     * @return string
     */
    public function getParsedCode( $commented, $identLevel ) {
        $strOut = parent::getParsedCode( $commented, $identLevel );
        $strOut .= str_repeat( "\t", $identLevel );
        $strOut .= "var_dump( \""  . 
            $this->getValue() .  "\");\n\n";
        return $strOut; 
    }
    
}