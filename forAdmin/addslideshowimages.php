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
if($_GET["c"]=='delete'){
	unlink('../slideshowimages/'.$_GET["filename"]);
	echo "<meta http-equiv=\"refresh\" content=\"3; url=../admin.php?Email=".$_GET["SessionEmail"]."\" />";
	echo "<div class='singlemessage'>Delete Image Success</div>";
	die();
	}
$timer=0;
$slideshowimagescounter=$_POST["slideshowimagescounter"];
$uploadprocessing="<div class='singlemessage'>";
for($i=0;$i<$slideshowimagescounter;$i++){
		//Upload image to server.
		$imagePath="slideshowimages/".$_FILES["slideshowimage".$i]["name"];
		
		$target_dir = "../slideshowimages/";
		$target_file = $target_dir . basename($_FILES["slideshowimage".$i]["name"]);
		// Check if image file is a actual image or fake image
		if (move_uploaded_file($_FILES["slideshowimage".$i]["tmp_name"], $target_file)) {
			$uploadprocessing=$uploadprocessing."Upload ".$_FILES["slideshowimage".$i]["name"]." successful.";
		}else{
			$uploadprocessing=$uploadprocessing."Upload ".$_FILES["slideshowimage".$i]["name"]." Failed.";
			$timer=20;
			}
}
$uploadprocessing=$uploadprocessing."</div>";
echo $uploadprocessing;
echo "<meta http-equiv=\"refresh\" content=\"".$timer."; url=../admin.php?Email=".$_POST["SessionEmail"]."\" />";
?>