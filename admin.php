<?php
include 'library.php';
?>
<html>
	<head>
	<?php
	getContentOfHeadTag();
	?>
    <link rel='stylesheet' type='text/css' href='css/adminstyle.css'>
    <script type="text/javascript" src="javascript/forAdmin.js"></script>
    <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
    <!--<script type="text/javascript" src="javascript/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });
    </script>
    -->
    
	</head>
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
	$sql = "SELECT role FROM user_info WHERE Email='".$_GET["Email"]."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	//$result->num_rows;
	if($row["role"]!='admin'){
		die("You do not have permission to be here!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");	
	}

	//Get Products\
	echo "<div class='admintitle'><h1>Products</h1></div>";
	echo "<div class='admindiv' id='products'><ul>";
	echo "<li><div class='productsitemdiv'>ProductID</div><div class='productsitemdiv'>Name</div><div class='productsitemdiv'>Price</div><div class='productsitemdiv'>Category</div><div class='productsitemdiv'>Image</div><div class='productsitemdiv'>sdfgsd</div></li>";
	$getProdutssql = "SELECT * FROM product_info ";
	$result = $conn->query($getProdutssql);
	$rowscounter = $result->num_rows;
	for($i=0;$i<$rowscounter;$i++){
		$row = $result->fetch_assoc();
		echo "<li><div class='productsitemdiv'>".$row["productID"]."</div><div class='productsitemdiv'>".$row["name"]."</div><div class='productsitemdiv'>".$row["price"]."</div><div class='productsitemdiv'>".$row["category"]."</div><div class='productsitemdiv'><img width='80px' height='80px' src='".$row["imagePath"]."'></div><div class='productsitemdiv'><a href='forAdmin/deleteproduct.php?productID=".$row["productID"]."&Email=".$_GET["Email"]."'>Delete</a></div></li>";
		}
	echo"</ul></div>";
	
	
	
	
	
	//get submit_product form
	echo "<div class='admintitle'><h1>Submit Product</h1></div>";
	echo "<div class='admindiv' id='submitproduct'>";
	echo "<form enctype=\"multipart/form-data\" action='forAdmin/addproduct.php' method='post' id='adminsubmitproductform'><br>";
	echo "Name:<input name='name' type='text' placeholder='please input product name' id='adminsubmitproductformname'><br>";
	echo "Price:<input name='price' type='number' placeholder='please input product price' id='adminsubmitproductformprice'><br>";
	echo "Category:<input name='category' type='text' placeholder='please input product cagetory' id='adminsubmitproductformcategory'><br>";
	echo "Image File:<input name='imagePath' id='Adminproductimage' type='file' ><br><br>";
	echo "<textarea name=\"productInformationTextEditor\"  id='adminsubmitproductformeditor'>Enter product Information here!</textarea><br><br>";
	echo "<input type='submit' value='submit' onClick=\"return verifyAdminSubmitProductForm();\">          ";
	echo "<input type='button' value='clear' onClick=\"document.getElementById('adminsubmitproductform').reset();\">";
	echo "<input style='display:none;' type='email' value='".$_GET["Email"]."' name='SessionEmail'>";
	echo "</form>";
	echo "</div>";
	
	echo "<script>";
    echo "CKEDITOR.replace('productInformationTextEditor');";
    echo "</script>";
	
	
	
	//ADD Event
	echo "<div class='admintitle'><h1>Add New Event</h1></div>";
	echo "<div class='admindiv' id='addevents'>";
	echo "<form action='forAdmin/addevent.php' method='get' id='eventsubmitproductform'><br>";
	echo "Title:<input type='text' id='addeventstitle' name='addeventstitle' maxlength='256'>";
	echo "<textarea  name=\"eventTextEditor\" form=\"eventsubmitproductform\" id='eventsubmitproductformtextarea'>Enter the events</textarea><br><br>";
	echo "<input type='submit' value='submit' onClick='return verifyAdminAddEventsForm();'>       ";
	echo "<input type='button' value='clear' onClick='document.getElementById(\"eventsubmitproductform\").reset();'>";
	echo "<input style='display:none;' type='email' value='".$_GET["Email"]."' name='SessionEmail'>";
	echo "</form>";
	echo "</div>";
	echo "<script>";
    echo "CKEDITOR.replace('eventTextEditor');";
    echo "</script>";
	
	
	//Events
	echo "<div class='admintitle'><h1>Events</h1></div>";
	echo "<div class='admindiv' id='events'><ul>";
	echo "<li><div class='eventsdiv'>Upload Time</div> <div class='eventsdiv'>Title</div><div class='eventsdiv'>Delete</div></li>";

	$geteventssql = "SELECT * FROM events ";
	$result = $conn->query($geteventssql);
	$rowscounter = $result->num_rows;
	for($i=0;$i<$rowscounter;$i++){
		$row = $result->fetch_assoc();
		echo "<li><div class='eventsdiv'>".$row["time"]."</div> <div class='eventsdiv'>".$row["title"]."</div><div class='eventsdiv'><a href='forAdmin/deleteevent.php?time=".$row["time"]."&SessionEmail=".$_GET["Email"]."'>Delete</a></div></li>";
		}
	echo "</ul></div>";
	
	
	
	//Users
	echo "<div class='admintitle'><h1>Users</h1></div>";
	echo "<div class='admindiv' id='users'><ul>";
	echo "<li><div class='useritemdiv'>Email</div><div class='useritemdiv'>Address</div><div class='useritemdiv'>Tel</div><div class='useritemdiv'>Role</div><div class='useritemdiv'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='useritemdiv'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></li>";
	$getAllUserssql = "SELECT * FROM user_info ";
	$result = $conn->query($getAllUserssql);
	$rowscounter = $result->num_rows;
	for($i=0;$i<$rowscounter;$i++){
		$row = $result->fetch_assoc();
		$listitem="<li><div class='useritemdiv'>".$row["Email"]."</div>";
		if($row["address"]){
			$listitem=$listitem."<div class='useritemdiv'>".$row["address"]."</div>";
			}
			else{
				$listitem=$listitem."<div class='useritemdiv'>&nbsp;&nbsp</div>";
				}
		if($row["tel"]){
			$listitem=$listitem."<div class='useritemdiv'>".$row["tel"]."</div>";
			}
			else{
				$listitem=$listitem."<div class='useritemdiv'>&nbsp;&nbsp;</div>";
				}
		
		$listitem=$listitem."<div class='useritemdiv'>".$row["role"]."</div>";
		$listitem=$listitem."<div class='useritemdiv'><a href='forAdmin/changerole.php?SessionEmail=".$_GET['Email']."&Email=".$row["Email"]."'>Change Role</a></div><div class='useritemdiv'><a href='forAdmin/deleteuser.php?SessionEmail=".$_GET['Email']."&Email=".$row["Email"]."'>Delete User</a></div></li>";
		echo $listitem;	
		
		}
	echo"</ul></div>";
	
	
	
	
	
	//About
	echo "<div class='admintitle'><h1>About</h1></div>";
	echo "<div class='admindiv' id='about'>";
	echo "<form action='forAdmin/addabout.php' method='get' id='aboutform'><br>";
	echo "<textarea name='aboutTextEditor' form=\"aboutform\" id='aboutTextEditortextarea'>Enter about page's content here!</textarea><br><br>";
	echo "<input type='submit' value='submit' onClick=\"return verifyAdminAboutForm();\">       ";
	echo "<input type='button' value='clear' onClick='document.getElementById(\"aboutform\").reset();'>";
	echo "<input style='display:none;' type='email' value='".$_GET["Email"]."' name='SessionEmail'>";
	echo "</form>";
	echo "</div>";
	echo "<script>";
    echo "CKEDITOR.replace('aboutTextEditor');";
    echo "</script>";
	
	
	//Contact Us
	echo "<div class='admintitle'><h1>contactus</h1></div>";
	echo "<div class='admindiv' id='contactus'>";
	echo "<form action='forAdmin/addcontactus.php' method='get' id='contactusform'><br>";
	echo "<textarea name=\"contactusTextEditor\" form=\"contactusform\" id='contactusTextEditortextarea'>Enter the Contact Us page's content here!</textarea><br><br>";
	echo "<input type='submit' value='submit' onClick=\"return verifyAdminContactUsForm();\">       ";
	echo "<input type='button' value='clear' onClick='document.getElementById(\"contactusform\").reset();'>";
	echo "<input style='display:none;' type='email' value='".$_GET["Email"]."' name='SessionEmail'>";
	echo "</form>";
	echo "</div>";
	echo "<script>";
    echo "CKEDITOR.replace('contactusTextEditor');";
    echo "</script>";

	//make slideshow.
	echo "<div class='admintitle'><h1>Add SlideShow Images</h1></div>";
	echo "<div class='admindiv' id='makeslideshow'>";
	echo "<form enctype=\"multipart/form-data\" action='forAdmin/addslideshowimages.php' method='post' ><br>";
	echo "<div id='slideshowimagearray'>
	<div id='slideshowimagediv0'>
	Image File 0:<input name='slideshowimage0' id='slideshowimage0' type='file' ><br><br>
	</div>
	</div>";
	echo "<input type='button' value='+' style='width:auto;height:auto;' onClick='addANewSlideshowImage();'>   ";
	echo "<input type='button' value='-' style='width:auto;height:auto;' onClick='removeLastSlideshowImage();'><br>";
	echo "<input type='submit' value='submit' onClick=\"return verifySlideShowImagesForm();\">       ";
	echo "<input type='number' style='display:none' value='1' name='slideshowimagescounter' id='slideshowimagescounter'>";
	echo "<input style='display:none;' type='email' value='".$_GET["Email"]."' name='SessionEmail'>";
	echo "</form>";
	echo "</div>";
	
	//All Slideshow Images.
	echo "<div class='admintitle'><h1>All Slideshow Images</h1></div>";
	echo "<div class='admindiv' ><ul>";
	$dir = "slideshowimages/";
	// Open a known directory, and proceed to read its contents
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				if($file=='.'||$file=='..')continue;
				echo "<li>".$file."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='forAdmin/addslideshowimages.php?c=delete&filename=".$file."&SessionEmail=".$_GET["Email"]."'>DELETE</a></li>";
			}
			closedir($dh);
		}
	}
	echo "</ul></div>";
	
	
?>
</html>