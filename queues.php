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
	
	echo "<div class='admintitle'><h1>Pick Up</h1></div>";
	echo "<div class='admindiv' id='queuesitemdiv'><ul>";
	echo "<li><div class='queuesitemdiv'>ProductID</div><div class='queuesitemdiv'>Email</div><div class='queuesitemdiv'>amount</div><div class='queuesitemdiv'>Name</div><div class='queuesitemdiv'>Price</div><div class='queuesitemdiv'>Tel</div><div class='queuesitemdiv'>Address</div><div class='queuesitemdiv'>paytime</div><div class='queuesitemdiv'>Command</div></li>";
	$getpickupsql = "SELECT * FROM purchased where isDeliver='Pick Up'";
	$result = $conn->query($getpickupsql);
	$rowscounter = $result->num_rows;
	for($i=0;$i<$rowscounter;$i++){
		$row = $result->fetch_assoc();
		echo "<li>
		<div class='queuesitemdiv'>".$row["productID"]."</div><div class='queuesitemdiv'>".$row["Email"]."</div><div class='queuesitemdiv'>".$row["amount"]."</div><div class='queuesitemdiv'>".$row["name"]."</div><div class='queuesitemdiv'>".$row["price"]."</div><div class='queuesitemdiv'>".$row["tel"]."</div><div class='queuesitemdiv'>".$row["address"]."</div><div class='queuesitemdiv'>".$row["paytime"]."</div><div class='queuesitemdiv'><a href='forAdmin/donewiththisitem.php?SessionEmail=".$_GET["Email"]."&paytime=".$row["paytime"]."&productID=".$row["productID"]."&Email=".$row["Email"]."&isDeliver=Pick Up&amount=".$row["amount"]."'>Done</a></div>
		</li>";
		}
	echo"</ul></div>";
	
	

	echo "<div class='admintitle'><h1>Need to Deliver</h1></div>";
	echo "<div class='admindiv' id='queuesitemdiv'><ul>";
	echo "<li><div class='queuesitemdiv'>ProductID</div><div class='queuesitemdiv'>Email</div><div class='queuesitemdiv'>amount</div><div class='queuesitemdiv'>Name</div><div class='queuesitemdiv'>Price</div><div class='queuesitemdiv'>Tel</div><div class='queuesitemdiv'>Address</div><div class='queuesitemdiv'>paytime</div><div class='queuesitemdiv'>Command</div></li>";
	$getpickupsql = "SELECT * FROM purchased where isDeliver='Deliver'";
	$result = $conn->query($getpickupsql);
	$rowscounter = $result->num_rows;
	for($i=0;$i<$rowscounter;$i++){
		$row = $result->fetch_assoc();
		echo "<li>
		<div class='queuesitemdiv'>".$row["productID"]."</div><div class='queuesitemdiv'>".$row["Email"]."</div><div class='queuesitemdiv'>".$row["amount"]."</div><div class='queuesitemdiv'>".$row["name"]."</div><div class='queuesitemdiv'>".$row["price"]."</div><div class='queuesitemdiv'>".$row["tel"]."</div><div class='queuesitemdiv'>".$row["address"]."</div><div class='queuesitemdiv'>".$row["paytime"]."</div><div class='queuesitemdiv'><a href='forAdmin/donewiththisitem.php?SessionEmail=".$_GET["Email"]."&paytime=".$row["paytime"]."&productID=".$row["productID"]."&Email=".$row["Email"]."&isDeliver=Deliver&amount=".$row["amount"]."'>Done</a></div>
		</li>";
		}
	echo"</ul></div>";
	
?>
</html>