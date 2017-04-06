<?php
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

//$sql = "delete from user_cart where productID='".$_GET["productID"]."'and Email='".$_GET["Email"]."'";
$sql = "delete from user_cart where orderTime='".$_GET["orderTime"]."'and Email='".$_GET["Email"]."'";
if ($conn->query($sql) === TRUE) {
    echo "<div class='singlemessage'>Delete item success!</div>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='singlemessage'>Delete item failed,please try again later.</div>";
}
$conn->close();
?>