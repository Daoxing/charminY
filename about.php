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

	getAbout();
	
	getFooter();
	?>
	</div>
	<?php
	getLoginAndSignUpAndSettingOverlay('http://www.charmingy.com/');

	getReady();
	?>
	</body>
</html>