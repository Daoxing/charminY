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
$sql = "SELECT * FROM user_info where Email='".$_POST["Email"]."'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
	$sql = "INSERT INTO user_info (Email,Password,address,tel,role,Verified)VALUES ('".$_POST["Email"]."', '".MD5($_POST["Password"])."','".$_POST["address"]."', '".$_POST["tel"]."', 'user','no')";

	if ($conn->query($sql) === TRUE) {
		$_SESSION['Email']=$_POST["Email"];
		header('Location: http://www.charmingy.com/');
	} else {
		
		errorProcessing();
	}

} else {
   errorProcessing('This email has been used on this website');
}

$conn->close();
?>