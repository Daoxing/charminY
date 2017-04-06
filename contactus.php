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

	getContactUs();

	getFooter();
	?>
	</div>
	<?php
	getLoginAndSignUpAndSettingOverlay('contatus.php');

	getReady();
	?>
	</body>
</html>