<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

echo "<html>";

echo "<table>";

$connection = new PDO('mysql:host=localhost;dbname=soap', 'soap', 'soap');

$statement = $connection->prepare('select * from orders;');
$statement->execute();

echo 'upload order<br><br>';
echo '<form action="client.php" method="post" enctype="multipart/form-data">
    Select File to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="operation" value="upload">
    <input type="submit" value="Upload File" name="submit">
</form>';
echo "<hr>";
echo "<h1>Orders : </h1><hr>";
while($data = $statement->fetch(PDO::FETCH_ASSOC)){
	$id=$data['id'];
	echo $data['file_name'].' : '.$data['status'];
	echo "<br>";
	echo "<form action='client.php' method='POST'><input type='hidden' name='id' value='$id'><input type='hidden' name='operation' value='cancel'><input type='submit' value='cancel order'></form>";
	echo "<hr>";
}
echo "</table>";
echo "</html>";