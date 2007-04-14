<h1>Menu</h1>

<h3>Basic</h3>
<ul>
	<li><a href="<?=MyFuses::getMySelfXfa( "goToLoop" )?>">Loop</a></li>
</ul>
<?
$soapClient = new SoapClient( "http://www.webservicex.com/globalweather.asmx?WSDL" );

var_dump( $soapClient->__getTypes() );

var_dump( $soapClient->__getLastResponseHeaders() );

foreach( $soapClient->__getFunctions() as $function ) {
    
    
    var_dump($function);
}


?>