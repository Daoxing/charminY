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
		die("You did not provide the user,we can do nothing.<meta http-equiv=\"refresh\" content=\"10; url=../admin.php?Email=".$_GET["Email"]."\" />");	
	}
	
	
	$deleteusersql = "DELETE FROM user_info WHERE Email='".$_GET["Email"]."'";
	if($conn->query($deleteusersql)===true){
		echo "<div class='singlemessage'>Delete Successfully.</div>";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
		}else{
			echo "<div class='singlemessage'>Delete failed.Please report to the developer</div>";
			echo "<meta http-equiv=\"refresh\" content=\"10; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
			}
	
?>