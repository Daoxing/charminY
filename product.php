<?php
include 'library.php';
?>
<html>
	<head>
	<?php
	getContentOfHeadTag();
	?>
	</head>
	<body>
	<div id="container">
	<?php
	$isUserOnline=false;
	$isUserOnline=getUser_infor($_POST["userid"],$_POST["Password"]);

	getLogo();

	getNavigation();

	getProductDetail($_GET['pid'],$isUserOnline);

	getFooter();
	?>
	</div>
	<?php
	
	getLoginAndSignUpAndSettingOverlay('product.php?pid='.$_GET['pid']);

	?>
	</body>
</html>