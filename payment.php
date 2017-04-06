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
	getUser_infor(null,null);

	getLogo();

	getNavigation();

	getCart($_GET["newproductID"],$_GET["amount"]);
	
	getFooter();
	?>
	</div>
	<?php
	
	getLoginAndSignUpAndSettingOverlay('payment.php');

	?>
	</body>
</html>