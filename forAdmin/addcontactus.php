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
	$checksql = "select * from contactus";
	$result = $conn->query($checksql);
	$rowscounter = $result->num_rows;
	if($rowscounter==0){
		//insert the about content
		$insertsql = "INSERT INTO contactus(content)VALUES('".$_GET["contactusTextEditor"]."')";
		if ($conn->query($insertsql) === TRUE) {
			echo "<div class='singlemessage'>Insert successfully</div>";
			echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
			echo "<div class='singlemessage'>Insert failed,please try again later.</div>";
			echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
		}
		
	}else{
			$updatesql = "UPDATE contactus SET content='".$_GET["contactusTextEditor"]."'";
			if ($conn->query($updatesql) === TRUE) {
				echo "<div class='singlemessage'>Update successfully</div>";
				echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
			} else {
				//echo "Error: " . $sql . "<br>" . $conn->error;
				echo "<div class='singlemessage'>Update failed,please try again later.</div>";
				echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
			}
		}
	

?>