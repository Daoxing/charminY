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
	
	if(!$_GET["Email"]){
		die("No Email,we can not find the user's role<meta http-equiv=\"refresh\" content=\"10; url=../admin.php?Email=".$_GET["Email"]."\" />");	
	}
	//get original role.
	$getoriginalrole = "SELECT role FROM user_info where Email='".$_GET["Email"]."'";
	$result = $conn->query($getoriginalrole);
	$row = $result->fetch_assoc();
	if($row["role"]=='admin'){
		$updateuserrolesql = "UPDATE  user_info SET  role='user' WHERE Email='".$_GET["Email"]."'";
		if($conn->query($updateuserrolesql)===true){
			echo "<div class='singlemessage'>Change Successfully.</div>";
			echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
		}
		else{
			echo "<div class='singlemessage'>Change failed.</div>";
			echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
			}
		}else if($row["role"]=='user'){
			$updateuserrolesql = "UPDATE  user_info SET  role='admin' WHERE Email='".$_GET["Email"]."'";
			if($conn->query($updateuserrolesql)===true){
				echo "<div class='singlemessage'>Change Successfully.</div>";
				echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
			}
			else{
				echo "<div class='singlemessage'>Change failed.</div>";
				echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
				}
			}
	
	
	
?>