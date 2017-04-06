<?php
	$deliveraddress=$_GET["address"];
	$option=$_GET["option"];
	$tel=$_GET["tel"];
	$SessionEmail=$_GET["SessionEmail"];
	
	
	
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

	//the user finished the payment,then I need to put this to the queue.It is for admin to deliver the product.
	/*
	SELECT imagePath,name, amount, price, orderTime
	FROM user_cart a, product_info b
	WHERE a.Email ='".$_SESSION['Email']."'
	AND a.productID = b.productID
	*/
	$sql = "
	SELECT a.productID,a.Email,b.name, a.amount, b.price
	FROM user_cart a, product_info b
	WHERE a.Email ='".$SessionEmail."'
	AND a.productID = b.productID
	";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		for($i=0;$i<$result->num_rows;$i++){
			$row = $result->fetch_assoc();
			if($option==1){
				$inserttopurchasedsql="INSERT INTO purchased VALUES('".$row["productID"]."','".$row["Email"]."','".$row["amount"]."','".$row["name"]."','".($row["amount"]*$row["price"])."','".$tel."','".$deliveraddress."','Deliver')";
				if($conn->query($inserttopurchasedsql)===TRUE){
					$deletecartitem="DELETE FROM user_cart where Email='".$SessionEmail."' and productID='".$row["productID"]."'";
					if(!$conn->query($deletecartitem)===TRUE){
						echo "<div class='singlemessage'>Delete Failed</div>";
						}
					}
				}
			if($option==2){
				$inserttopurchasedsql="INSERT INTO purchased VALUES('".$row["productID"]."','".$row["Email"]."','".$row["amount"]."','".$row["name"]."','".($row["amount"]*$row["price"])."','".$tel."','','Pick Up')";
				if(!$conn->query($inserttopurchasedsql)===TRUE){
					$deletecartitem="DELETE FROM user_cart where Email='".$SessionEmail."' and productID='".$row["productID"]."'";
					if(!$conn->query($deletecartitem)===TRUE){
						echo "<div class='singlemessage'>Delete Failed</div>";
						}
					}
				}else{
					
					
					}
			echo "<meta http-equiv=\"refresh\" content=\"1; url=payment.php\" />";
		}
	
	}

?>