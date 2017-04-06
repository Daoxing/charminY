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
	getUser_infor($_POST["userid"],$_POST["Password"]);

	getLogo();

	getNavigation();


	getFlowers($_GET["category"]);

	getFooter();
	?>
	</div>
	<?php
	getLoginAndSignUpAndSettingOverlay('flowers.php');

	getReady();
	?>
	</body>
</html>