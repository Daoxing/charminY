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
//First we need to check whether the costomer has the product.
$checksql="select * from user_cart where Email='".$_GET["userID"]."' and productID='".$_GET["productID"]."'";
$result = $conn->query($checksql);
if ($result->num_rows ==0) {
	$insertsql = "INSERT INTO user_cart(productID,Email,amount,isPaid,orderTime,sold)VALUES('".$_GET["productID"]."','".$_GET["userID"]."','".$_GET["amount"]."','0','".date("Y-m-d H:i:s")."',0)";
	if ($conn->query($insertsql) === TRUE) {
		echo "New record created successfully";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
		echo "Creating record failed,please try again later.";
	}
	
}else{
	//UPDATE user_cart SET amount=amount+1 where Email='1007156218@qq.com' and productID='id000002'
	$updatesql = "UPDATE user_cart SET amount=amount+1 where productID='".$_GET["productID"]."' and Email='".$_GET["userID"]."'";
	if ($conn->query($updatesql) === TRUE) {
		echo "Add to cart successfully";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
		echo "Creating record failed,please try again later.";
	}
	
	
	}










$conn->close();

?>