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
	
	if(!$_GET["SessionEmail"]){
		die("You did not provide the user,we can do nothing.<meta http-equiv=\"refresh\" content=\"10; url=../admin.php?Email=".$_GET["Email"]."\" />");	
	}
	
	
	$donewithitemsql = "DELETE FROM purchased WHERE Email='".$_GET["Email"]."' and paytime='".$_GET["paytime"]."' and productID='".$_GET["productID"]."' and isDeliver='".$_GET["isDeliver"]."'";
	if($conn->query($donewithitemsql)===true){
		$checkproductID="SELECT productID FROM record where productID='".$_GET["productID"]."'";
		echo "<div class='singlemessage'>Delete Successfully.</div>";
		//make the sale record.
		$result=$conn->query($checkproductID);
		$rowscounter = $result->num_rows;
		if($rowscounter>0){
			$updaterecord="UPDATE record SET amount=amount+".$_GET["amount"]." where productID='".$_GET["productID"]."'";
			if($conn->query($updaterecord)===TRUE){
				echo "<div class='singlemessage'>Update Successfully.</div>";
				}
			}else{
				$insertrecord="INSERT INTO record(productID,sale)VALUES('".$_GET["productID"]."','".$_GET["amount"]."')";
				if($conn->query($insertrecord)===TRUE){
					echo "<div class='singlemessage'>Insert Successfully.</div>";
					}
				}
		
		echo "<meta http-equiv=\"refresh\" content=\"3; url=../queues.php?Email=".$_GET["SessionEmail"]."\" />";
		}else{
			echo "<div class='singlemessage'>Delete failed.Please report to the developer</div>";
			echo "<meta http-equiv=\"refresh\" content=\"10; url=../queues.php?Email=".$_GET["SessionEmail"]."\" />";
			}
?>