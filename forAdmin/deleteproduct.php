<style>
.singlemessage{
width:500px;
height:auto; 
margin:15% auto;
text-align:center;
font-family: 'Tangerine', serif;
font-size: 36px;
}
</style>
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
	
	if(!$_GET["productID"]){
		die("The product does not exist.<meta http-equiv=\"refresh\" content=\"10; url=../admin.php?Email=".$_GET["Email"]."\" />");	
	}
	
	
	$deleteProductsql = "DELETE FROM product_info WHERE productID='".$_GET["productID"]."'";
	if($conn->query($deleteProductsql)===true){
		
		echo "<div class='singlemessage'>Delete Successfully.</div>";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["Email"]."\" />";
		}else{
			echo "<div class='singlemessage'>Delete failed.</div>";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["Email"]."\" />";
			}
	
?>