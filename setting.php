<?php
include 'library.php';
$servername = "localhost";
$username = "charming_lidao";
$password = "13335396358";
$dbname = "charming_charmingyDatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM user_info where Email='".$_GET["Email"]."'";
$result = $conn->query($sql);

if ($result->num_rows != 0) {
	$updateitem="";
	if($_POST["Password"])
	{
		$updateitem=$updateitem."Password='".MD5($_POST["Password"])."',";	
	}
	
	if($_POST["address"])
	{
		$updateitem=$updateitem."address='".$_POST["address"]."',";	
	}
	
	if($_POST["tel"])
	{
		$updateitem=$updateitem."tel='".$_POST["tel"]."',";	
	}
	echo $updateitem."<br>";
	$updatesql = "UPDATE user_info SET ".$updateitem." where Email='".$_GET["Email"]."'";
	if ($conn->query($updatesql) === TRUE) {
		errorProcessing('Your information is updated!!!');
	} else {

		errorProcessing('Creating record failed,please try again later.');
	}

} else {
   errorProcessing('This email does not exist!!!!!!!!!!!!');
}

$conn->close();



?>
