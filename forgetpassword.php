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
	
	$checksql="select * from user_info where Email='".$_GET["Email"]."'";
	$result=$conn->query($checksql);
	if($result->num_rows==0){
		echo "<meta http-equiv=\"refresh\" content=\"3; url=http://www.charmingy.com/\" />";
		echo "<div class='singlemessage'>The Email \" ".$_GET["Email"]." does not registerd.\"</div>";
		}else{
			$length=rand(6, 10);
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString.= $characters[rand(0, $charactersLength - 1)];
			}
			$updatepasswordsql="UPDATE user_info SET password='".md5($randomString)."' where Email='".$_GET["Email"]."'";
			if($conn->query($updatepasswordsql)===TRUE){
					$to = $_GET["Email"];
					$subject = "Charming'y Password Update";
					$txt = "Hi,\r\nThis is your new Password:\r\n".$randomString."\r\n please use this password to login and update your password From Charming'y";
					$headers = "From:donotreply@charmingy.com";
					if(mail($to,$subject,$txt,$headers)){
						echo "<div class='singlemessage'>The new Password has been sent to your email(".$_GET["Email"].").</div>";
						echo "<meta http-equiv=\"refresh\" content=\"10; url=http://www.charmingy.com/\" />";
						}
						else{
							echo "<div class='singlemessage'>Send Email Fail!!!</div>";
							echo "<meta http-equiv=\"refresh\" content=\"10; url=http://www.charmingy.com/\" />";
							}
				}
			
			}
?>