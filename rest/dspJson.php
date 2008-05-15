<?php
class Teste {
    private $buga;
    
    public $buga1;
    
    public function getBuga() {
        return $this->buga;
    }
    
    public function setBuga( $buga ) {
        $this->buga = $buga;
    }
}


$data = new Teste();

$data->setBuga( 1 );

$data->buga1 = 2;

//var_dump( MyFusesJsonUtil::toJson( $data ) );

$xml = MyFusesXmlUtil::toXml( $data );

var_dump( MyFusesXmlUtil::fromXml( $xml ) );die();