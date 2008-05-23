<?php
require_once "classes/Entity.class.php";

$data = new Entity();

$data->setName( "Entity 1" );

$data->setValue( "Value 1" );

$items = array();

for( $i = 0; $i < 10; $i++ ) {
    $item = new Entity();
    
    $item->setName( "Entity 1 - " . $i );
    $item->setValue( "Value 1 - " . $i );
    
    $items[] = $item;
    
}

$data->setItems( $items );