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
//create product id
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
$getCountOfProducts="SELECT COUNT( * ) FROM product_info WHERE productID LIKE  'ID".date("YmdHi")."%'";
$CountOfProducts=$conn->query($getCountOfProducts);
$row=$CountOfProducts->fetch_assoc();
$productID='ID'.date("YmdHi").($row["count(*)"]);
$productIntroduction=$_POST["productInformationTextEditor"];
$name=$_POST["name"];
$price=$_POST["price"];
$category=$_POST["category"];
//Upload image to server.
$imagePath="productImages/".$_FILES["imagePath"]["name"];

$target_dir = "../productImages/";
$target_file = $target_dir . basename($_FILES["imagePath"]["name"]);
// Check if image file is a actual image or fake image

if (move_uploaded_file($_FILES["imagePath"]["tmp_name"], $target_file)) {
	//echo "The file ". basename( $_FILES["imagePath"]["name"]). " has been uploaded.";
	//rename ( $target_file , "");
	$insertsql = "INSERT INTO product_info(productID,imagePath,name,price,category,productIntroduction)VALUES('".$productID."','".$imagePath."','".$name."','".$price."','".$category."','".$productIntroduction."')";
	if ($conn->query($insertsql) === TRUE) {
		echo "<div class='singlemessage'>New record created successfully</div>";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_POST["SessionEmail"]."\" />";
	} else {
		echo "<div class='singlemessage'>Error: " . $insertsql . "<br>" . $conn->error;
		echo "Creating record failed,please try again later.</div>";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_POST["SessionEmail"]."\" />";
	}
	
	
} else {
	echo "<div class='singlemessage'>Sorry, there was an error uploading your file.</div>";
}
?>