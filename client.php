 <?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 /*
 * PHP SOAP - How to create a SOAP Server and a SOAP Client
 */

$options = array('location' => 'http://localhost/soap/server.php', 
                  'uri' => 'http://localhost/');
//create an instante of the SOAPClient (the API will be available)
$Server = new SoapClient(NULL, $options);
//call an API method

if($_POST['operation']=='cancel')
	$Server->cancelOrder($_POST['id']);

if($_POST['operation']=='upload'){
	$fileName=$_FILES['fileToUpload']['name'];
	$filePath= $_FILES['fileToUpload']['tmp_name'];
	$res=move_uploaded_file($filePath, getcwd().'/'.$fileName);
	$Server->uploadOrder($fileName, $filePath);
}
header('Location: request.php');

?>