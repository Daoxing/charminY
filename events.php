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
	
	//get events in here!!!
	getEvents($_GET['eventid']);

	getFooter();
	?>
	</div>
	<?php
	getLoginAndSignUpAndSettingOverlay('events.php');

	getReady();
	?>
	</body>
</html>