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
$insertsql = "INSERT INTO events(time,title,text)VALUES('".date("Y-m-d H:i:s")."','".$_GET["addeventstitle"]."','".$_GET["eventTextEditor"]."')";
	if ($conn->query($insertsql) === TRUE) {
		echo "<div class='singlemessage'>New record created successfully</div>";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
		echo "<div class='singlemessage'>Creating record failed,please try again later.</div>";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
	}

?>