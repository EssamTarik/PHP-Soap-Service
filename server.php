<?php
/*
 * PHP SOAP - How to create a SOAP Server and a SOAP Client
 */

//a basic API class
class MyAPI {
    function cancelOrder($id){
    	$connection = new PDO('mysql:host=localhost;dbname=soap', 'soap', 'soap');
		$statement = $connection->prepare("delete from orders where id=$id;");
		$statement->execute();
		return true;
    }
    function uploadOrder($fileName, $filePath){
	    $connection = new PDO('mysql:host=localhost;dbname=soap', 'soap', 'soap');
		$query = $connection->query("insert into orders set file_name='$fileName', status=1;");
		return true;
    }

}


//when in non-wsdl mode the uri option must be specified
$options=array('uri'=>'http://localhost/');
//create a new SOAP server
$server = new SoapServer(NULL,$options);
//attach the API class to the SOAP Server
$server->setClass('MyAPI');
//start the SOAP requests handler
$server->handle();
?>
