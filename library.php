<?php
session_start();
define("homePage", "http://www.charmingy.com/");

function getContentOfHeadTag(){
	/*
	<meta charset="UTF-8">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<link rel="icon" type="image/png" href="images/icon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.cycle2.js"></script>
	......
	*/
	//this part is going to print <meta>
	echo "<meta name='Author' content='Daoxing Li'>";
	echo "<meta name='Keywords' content='Flower,永生花,charmin'>";
	echo "<meta name='Description' content=''>";
	//this part is going to print <link>
	echo "<link rel='icon' type='image/png' href='images/icon.ico'>";
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
	//this part is going to connect javascript
	echo "<script src='javascript/functions.js'></script>";
	
}

function getUser_infor($Em,$Passw){
	if($_GET["Lg"]==yes){
		$_SESSION['Email']='';
		echo "<div id='user_info'>";
		echo "<a id='openloginoverlay' onClick=\"document.getElementById('loginoverlay').style.display='block';document.getElementById('container').style.display='none';document.getElementById('signupoverlay').style.display='none';\">Login|</a>";
		echo "<a id='opensignupoverlay' onClick=\"document.getElementById('signupoverlay').style.display='block';document.getElementById('container').style.display='none';document.getElementById('loginoverlay').style.display='none';\">Sign Up</a>";
		echo "</div>";
		return;
		}
	if(!$Em){
		if(!empty($_SESSION['Email'])&&empty($Em)&&empty($Passw)){
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
			$sql = "SELECT role FROM user_info WHERE Email='".$_SESSION['Email']."'";
			$result = $conn->query($sql);
			if ($result->num_rows ==1) {
				$row = $result->fetch_assoc();
				if($row["role"]=='admin'){
					echo "<div id='user_info'>";
					echo "Hi,".$_SESSION['Email']."  <a href='payment.php'><img src='images/icon_cart.png' width='20' height='20' /></a>  <a  onClick=\"document.getElementById('settingoverlay').style.display='block';document.getElementById('container').style.display='none';\"><img src='images/icon_setting.png' width='20' height='20'</a> <a href='".homePage."?Lg=yes' \">Log Out</a>&nbsp;&nbsp;&nbsp;<a href='queues.php?Email=".$_SESSION['Email']."' target=\"_blank\" \">Queues</a>&nbsp;&nbsp;&nbsp;<a href='admin.php?Email=".$_SESSION['Email']."' target=\"_blank\"\">Admin</a>";
					echo "</div>";
					}
					else{
					echo "<div id='user_info'>";
					echo "Hi,".$_SESSION['Email']."  <a href='payment.php'><img src='images/icon_cart.png' width='20' height='20' /></a>  <a  onClick=\"document.getElementById('settingoverlay').style.display='block';document.getElementById('container').style.display='none';\"><img src='images/icon_setting.png' width='20' height='20'</a> <a href='".homePage."?Lg=yes' \">Log Out</a>";
					echo "</div>";
					}
				}
			return true;
		}else{
			echo "<div id='user_info'>";
			echo "<a id='openloginoverlay' onClick=\"document.getElementById('loginoverlay').style.display='block';document.getElementById('container').style.display='none';document.getElementById('signupoverlay').style.display='none';\">Login|</a>";
			echo "<a id='opensignupoverlay' onClick=\"document.getElementById('signupoverlay').style.display='block';document.getElementById('container').style.display='none';document.getElementById('loginoverlay').style.display='none';\">Sign Up</a>";
			echo "</div>";
			}
	}else{
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
		$sql = "SELECT * FROM user_info WHERE Email='".$Em."' and Password='".MD5($Passw)."'";
		$result = $conn->query($sql);
		if ($result->num_rows ==1) {
			$row = $result->fetch_assoc();
			if($row["Password"]==MD5($Passw)){
			$_SESSION['Email']=$Em;
		    
			
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
			$sql = "SELECT role FROM user_info WHERE Email='".$Em."'";
			$result = $conn->query($sql);
			if ($result->num_rows ==1) {
				$row = $result->fetch_assoc();
				if($row["role"]=='admin'){
					echo "<div id='user_info'>";
					echo "Hi,".$_SESSION['Email']."  <a href='payment.php'><img src='images/icon_cart.png' width='20' height='20' /></a>  <a  onClick=\"document.getElementById('settingoverlay').style.display='block';document.getElementById('container').style.display='none';\"><img src='images/icon_setting.png' width='20' height='20'</a> <a href='".homePage."?Lg=yes' \">Log Out</a>&nbsp;&nbsp;&nbsp;<a href='queues.php?Email=".$_SESSION['Email']."' target=\"_blank\" \">Queues</a>&nbsp;&nbsp;&nbsp;<a href='admin.php?Email=".$_SESSION['Email']."' target=\"_blank\" \">Admin</a>";
					echo "</div>";
					}
					else{
					echo "<div id='user_info'>";
					echo "Hi,".$_SESSION['Email']."  <a href='payment.php'><img src='images/icon_cart.png' width='20' height='20' /></a>  <a  onClick=\"document.getElementById('settingoverlay').style.display='block';document.getElementById('container').style.display='none';\"><img src='images/icon_setting.png' width='20' height='20'</a> <a href='".homePage."?Lg=yes' \">Log Out</a>";
					echo "</div>";
					}
				}
			return true;
			}else{
			echo "<div id='user_info'>";
			echo "Your email or password is wrong,please try again<a id='openloginoverlay' onClick=\"document.getElementById('loginoverlay').style.display='block';document.getElementById('container').style.display='none';document.getElementById('signupoverlay').style.display='none';\">Login|</a>";
			echo "<a id='opensignupoverlay' onClick=\"document.getElementById('signupoverlay').style.display='block';document.getElementById('container').style.display='none';document.getElementById('loginoverlay').style.display='none';\">Sign Up</a>";
			echo "</div>";
				}
		}else{
			
			echo "<div id='user_info'>";
			echo "This account doesn't exit <a id='openloginoverlay' onClick=\"document.getElementById('loginoverlay').style.display='block';document.getElementById('container').style.display='none';document.getElementById('signupoverlay').style.display='none';\">Login|</a>";
			echo "<a id='opensignupoverlay' onClick=\"document.getElementById('signupoverlay').style.display='block';document.getElementById('container').style.display='none';document.getElementById('loginoverlay').style.display='none';\">Sign Up</a>";
			echo "</div>";
			} 
	}
	
}

function getLogo(){

	echo "<div id='logo'>";
	echo "<a href='".homePage."'><img src='images/LOGO.png'></a>";
    echo "</div>"; 

}

function getNavigation(){
	
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
	$sql = "SELECT DISTINCT category FROM product_info";
	$sublist="<ul onmouseout=\"hideSubMenu(flowersublist)\">";
	$result = $conn->query($sql);
	$rowcounter=$result->num_rows;
	if($rowcounter>0){
		
			for($i=0;$i<$rowcounter;$i++) {
				$row = $result->fetch_assoc();
				$sublist=$sublist.$row[""];
				$sublist=$sublist."<li   ><a href='flowers.php?category=".$row["category"]."'>".$row["category"]."</a></li>";
				}
			
		}
	$sublist=$sublist."</ul>";
	echo "<div id='navigation'>";
    echo "<ul>";
    echo "<li><a href='".homePage."'>Home</a></li>";
    echo "<li><a href='events.php'>Events</a></li>";
    echo "<li onmouseover=\"displaySubMenu(this)\" id='flowersublist'><a href='flowers.php'>Flowers</a> 
			".$sublist."
		  </li>";
    echo "<li><a href='about.php'>About Us</a></li>";
    echo "<li><a href='contactus.php'>Contact Us</a></li>";
    echo "</ul>";
	echo "</div>";
}

function getSlideshow(){

	echo "<div id='slideshow'>";
	echo "<div id='slides'>";
	$dir = "slideshowimages/";
	// Open a known directory, and proceed to read its contents
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				if($file=='.'||$file=='..')continue;
				echo "<a href=''><img src='slideshowimages/".$file."' ></a>";
			}
			closedir($dh);
		}
	}
	//second way to achieve read files.
	/* 
	$dir = "slideshowimages/";
	$dh  = opendir($dir);
	while (false !== ($filename = readdir($dh))) {
		$files[] = $filename;
	}
	print_r($files);
	*/
	echo "<a href='#' class='slidesjs-previous slidesjs-navigation'><i class='icon-chevron-left'></i></a>";
	echo "<a href='#' class='slidesjs-next slidesjs-navigation'><i class='icon-chevron-right'></i></a>";
	echo "</div>"; 
	echo "</div>";

}

function getProducts($title){
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
	echo "<div id='products'>";
    echo "<div class='producttitle'>".$title."</div>";
    echo "<table width='1080' border='0' cellspacing='0' cellpadding='10'>";
	
	$getallflowers="";
	$checksql="SELECT * FROM record ORDER BY sale DESC LIMIT 8";
	$checkcount=$conn->query($checksql);
	if($checkcount->num_rows!=8){
		$getallflowers="select * from product_info";
	}else{
		$getallflowers="SELECT a.productID,a.imagePath,a.name,a.price,a.category,a.productIntroduction
FROM product_info AS a
INNER JOIN
(SELECT productID FROM record ORDER BY sale DESC LIMIT 8)AS b WHERE a.productID=b.productID ";
		}
	$result=$conn->query($getallflowers);
	$rowscounter = $result->num_rows;
	for($i=0;$i<($rowscounter/4);$i++){
		echo "<tr>";
		//this is the begin of each line.
			for($j=0;$j<4;$j++){
				//display the flower here!
				$row = $result->fetch_assoc();
				if($row){
					echo "<td><a href='product.php?pid=".$row["productID"]."'><img src='".$row["imagePath"]."' width='250' height='250'></a></td>";
					}
					else{
						echo "<td><div  style='width:250px; height:250px;'><div></td>";
					}					
				
				}
		echo "</tr>";
		}
	
	echo "</table>";
	echo "</div>";			
}

function getFooter(){

	echo "<div id='footer'>";
	echo "<div id='contact'>";
	echo "Tel:123-123-1234<br><br>";
	echo "Email:charmin'y@gmail.com<br><br>";
	echo "Address:Newbury street,Boston,MA.<br>";
	echo "</div>";
	echo "<div id='share'>";
	echo "<style type=\"text/css\">
			#share-buttons img {
			width: 35px;
			padding: 5px;
			border: 0;
			box-shadow: 0;
			display: inline;
			}
			</style>";
	echo "<div id=\"share-buttons\">
    
    <!-- Buffer -->
    <a href=\"https://bufferapp.com/add?url=https://simplesharebuttons.com&amp;text=Simple Share Buttons\" target=\"_blank\">
        <img src=\"https://simplesharebuttons.com/images/somacro/buffer.png\" alt=\"Buffer\" />
    </a>
    
    <!-- Digg -->
    <a href=\"http://www.digg.com/submit?url=https://simplesharebuttons.com\" target=\"_blank\">
        <img src=\"https://simplesharebuttons.com/images/somacro/diggit.png\" alt=\"Digg\" />
    </a>
    
    <!-- Email -->
    <a href=\"mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://simplesharebuttons.com\">
        <img src=\"https://simplesharebuttons.com/images/somacro/email.png\" alt=\"Email\" />
    </a>
 
    <!-- Facebook -->
    <a href=\"http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com\" target=\"_blank\">
        <img src=\"https://simplesharebuttons.com/images/somacro/facebook.png\" alt=\"Facebook\" />
    </a>
    
 
</div>";
	echo "</div>";
	echo "</div>";

}

function getLoginAndSignUpAndSettingOverlay($link){
	if($_SESSION['Email']){
			echo "<div id=\"settingoverlay\" class=\"overlay\" style=\"display:none;\">\n";
			echo "<a class='closebutton' onClick=\"return cancelSettingInfor();\"><img src='images/closeicon.png'></a>";
			
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
			$sql = "SELECT * FROM user_info WHERE Email='".$_SESSION['Email']."'";
			$result = $conn->query($sql);
			if ($result->num_rows ==1) {
				$row = $result->fetch_assoc();
				echo "<h1>Setting</h1>\n";
				echo "<form action='setting.php?Email=".$_SESSION['Email']."' method='post'>\n";
				//echo "*<input type='email' placeholder='Please Input Your Email' name='Email' id='settingEmail' value='".$row['Email']."' onblur='isEmailExist(\"".$SESSION['Email']."\");'><br>\n";
				//echo "<span id='isEmailExistMessage'></span>";
				echo "*<input type='password' placeholder='Please Input Your Password' maxlength='16' name='Password' id='settingPassword'><br>\n";
				echo "<input type='password' placeholder='Please Input Your Password Again' maxlength='16' id='settingRePassword'><br>\n";
				echo "<input type='text' placeholder='Please Input Your address'  name='address' id='settingAddress' value='".$row['address']."'><br>\n";
				echo "<input type='tel' placeholder='Please Input Your Phone number' maxlength='11' name='tel' id='settingTel' value='".$row['tel']."'><br>\n";
				echo "<input type='submit' value='OK' onClick=\"return verifySettingInformation();\">\n";   
				echo "<input type='button' value='cancel'  onClick=\"return cancelSettingInfor();\">\n";
				echo "</form>\n";
				echo "</div>\n";
			}else{
				echo "<h1>Setting</h1>\n";
				echo "<form action='setting.php' method='post'>\n";
				echo "*<input type='email' placeholder='Please Input Your Email' name='Email' id='settingEmail'><br>\n";
				echo "*<input type='password' placeholder='Please Input Your Password' maxlength='16' name='Password' id='settingPassword'><br>\n";
				echo "<input type='password' placeholder='Please Input Your Password Again' maxlength='16' id='settingRePassword'><br>\n";
				echo "<input type='text' placeholder='Please Input Your address'  name='address' id='settingAddress'><br>\n";
				echo "<input type='tel' placeholder='Please Input Your Phone number' maxlength='11' name='tel' id='settingTel'><br>\n";
				echo "<input type='submit' value='OK' onClick=\"return verifySettingInformation();\">\n";   
				echo "<input type='button' value='cancel'  onClick=\"return cancelSettingInfor();\">\n";
				echo "</form>\n";
				echo "</div>\n";
				}
			
			
			
			
			
		}
		else{
			echo "<div id=\"signupoverlay\" class=\"overlay\" style=\"display:none;\">\n";
			echo "<a class='closebutton' onClick=\"return cancelToSignUp();\"><img src='images/closeicon.png'></a>";
			echo "<h1>Sign Up</h1>\n";
			echo "<form action='usersignup.php' method='post'>\n";
			echo "*<input type='email' placeholder='Please Input Your Email' name='Email' id='signUpEmail'><br>\n";
			echo "*<input type='password' placeholder='Please Input Your Password' maxlength='16' name='Password' id='signUpPassword'><br>\n";
			echo "<input type='password' placeholder='Please Input Your Password Again' maxlength='16' id='signUpRePassword'><br>\n";
			echo "<input type='text' placeholder='Please Input Your address'  name='address' id='signUpAddress'><br>\n";
			echo "<input type='tel' placeholder='Please Input Your Phone number' maxlength='11' name='tel' id='signUpTel'><br>\n";
			echo "<input type='submit' value='OK' onClick=\"return verifySignUpInformation();\">\n";   
			echo "<input type='button' value='cancel'  onClick=\"return cancelToSignUp();\">\n";
			echo "</form>\n";
			echo "</div>\n";
		
		
			echo "<div id='loginoverlay' class='overlay' style=\"display:none;\">\n";
			echo "<a class='closebutton' onClick=\"cancelToLogin();\"><img src='images/closeicon.png'></a>";
			echo "<h1>Login</h1>\n";
			echo "<form action='".$link."' method='post'>\n";
			echo "<input type='email' name='userid' placeholder='Please Input Your Email' id='loginEmail'><br>\n";
			echo "<input type='password' name='Password' maxlength='16' placeholder='Your Password' id='loginPassword'><br>\n";
			echo "<input type='submit' value='OK' onClick='return verifyLoginInformation();'>\n";
			echo "<input type='button' value='cancel' onClick=\"cancelToLogin();\"><br>";
			echo "<a href='forgetpassword.php' onclick='return verifyForgetPasswordEmail();'>Forget Your Password?</a>";
			echo "</form>\n";
			echo "</div>\n";
			}

}



function getReady(){
	echo "<script src='javascript/jquery-1.9.1.min.js'></script>";
	echo "<<script src='javascript/jquery.slides.min.js'></script>";
	echo "<script>
		$(function() {
		  $('#slides').slidesjs({
        width: 1080,
        height: 400,
        navigation: false,
        start: 3,
        play: {
          auto: true
        }
      });
		});
	  </script>
	";
}

function errorProcessing($errormessage){
	if($errormessage){
		echo "<div class='singlemessage'>".$errormessage;
		echo "<br>We will go backto home page.</div>";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=".homePage."\" />";
		}else{
			echo "<div class='singlemessage'>The system has something wrong,we will go back  to home page.Sorry!!!</div>";
			echo "<meta http-equiv=\"refresh\" content=\"7; url=".homePage."\" />";
			}
}


function getProductDetail($productID,$isUserOnline){

	//this $conn global variable help us to connect with server.
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
	echo "<div id='productdetail'><table><tr><td>";
	$sql = "SELECT * FROM product_info WHERE productID='".$productID."'";
	$result = $conn->query($sql);
	if($result->num_rows==1){
		//this part means that $result is right.then I can print the detail.
		$row = $result->fetch_assoc();
		if($row){
			echo "<div id='productimage'>";
			echo "<img src='".$row["imagePath"]."'>";
			echo "</div></td><td>";
			
			echo "<div id='productinfo'>";
			echo "<ul>";
			echo "<li>Name:".$row["name"]."</li>";
			echo "<li>Category:".$row["category"]."</li>";
			echo "<li>Price:$".$row["price"]."</li>";
			if($isUserOnline){
			echo "<form action='payment.php?' method='get'><li>\n
				  Amount: <input type='button' onClick=\"document.getElementById('productamount').value++;\" value='+'>\n
				  <input type='text' size='2' value=1 id='productamount' name='amount'>\n
				  <input type='button' onClick=\"if(document.getElementById('productamount').value>1)document.getElementById('productamount').value--;\" value='-'>\n
				  <input type='text' value='".$row["productID"]."' name='newproductID' style='display:none'></li>\n
				  <li><input type='submit' value='Buy Now'> \n
				  <input type='button' onclick=\"addToCart('".$productID."','".$_SESSION['Email']."')\" value='Add to Cart'></li></form>";
			}else{
				echo"<li>If you want to buy it,You should login first!</li>";
				}
			echo "</ul></div></td></tr></table>";
			echo "<div id='productIntroduction'>".$row["productIntroduction"]."</div>";
			}else{
				errorProcessing('');
				}
		}
	else{
		 errorProcessing('');
		}
	echo "</div>";
	
}

function getCart($newProductToCart,$amount){
	$totalprice=0;
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
	if($newProductToCart){
		
	$checksql="select * from user_cart where Email='".$_SESSION['Email']."' and productID='".$newProductToCart."'";
	$result = $conn->query($checksql);
		if ($result->num_rows ==0) {
			$insertsql = "INSERT INTO user_cart(productID,Email,amount,isPaid,orderTime,sold)VALUES('".$newProductToCart."','".$_SESSION['Email']."','".$amount."','0','".date("Y-m-d H:i:s")."',0)";
			if ($conn->query($insertsql) === TRUE) {
			} else {
				//echo "Error: " . $sql . "<br>" . $conn->error;
				echo "The product you just brought,Creating record failed,please try again later.";
			}
			
			}else{
				//UPDATE user_cart SET amount=amount+1 where Email='1007156218@qq.com' and productID='id000002'
				$updatesql = "UPDATE user_cart SET amount=amount+1 where productID='".$newProductToCart."' and Email='".$_SESSION['Email']."'";
				if ($conn->query($updatesql) === TRUE) {
				//echo "Add to cart successfully";
			} else {
				//echo "Error: " . $sql . "<br>" . $conn->error;
				echo "The product you just brought,Creating record failed,please try again later.";
			}
			
		
		}
	}
	/*
	SELECT imagePath,name, amount, price, orderTime
	FROM user_cart a, product_info b
	WHERE a.Email ='".$_SESSION['Email']."'
	AND a.productID = b.productID
	*/
	$sql = "
	SELECT imagePath,name, amount, price, orderTime
	FROM user_cart a, product_info b
	WHERE a.Email ='".$_SESSION['Email']."'
	AND a.productID = b.productID
	";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		//echo $result->num_rows;
		echo "<div id='cart'><ul>
          <li><table width='1080px'><tr><td>Pics</td><td>Name</td><td>Amount</td><td>Price</td><td>Delete</td></tr></table></li>";
		for($i=0;$i<$result->num_rows;$i++){
		$row = $result->fetch_assoc();
		//while($row = $result->fetch_assoc()) {
		echo "<li id='".$row["orderTime"]."'><table width='1080px'><tr><td>";
        echo "<img width='80' height='80' src='" . $row["imagePath"]. "'></td><td>" . $row["name"]. "</td><td>" . $row["amount"]. "</td><td>".$row["amount"]*$row["price"]."</td><td><button href='payment.php' onClick=\"deleteFromCart('".$row["productID"]."','".$row["orderTime"]."','".$_SESSION['Email']."')\">Delete</button></td></tr>";
		echo "</table></li>";
		
		
		$totalprice+=$row["amount"]*$row["price"];
    	}
		//while end
		echo "<li><h2>Total:".$totalprice."$</h2></li>";
		echo "</ul></div>";

	$sql = "select address,tel from user_info WHERE Email = '".$_SESSION['Email']."'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		$row = $result->fetch_assoc();
		if($row["address"]!=null||!$row["tel"]!=null){
			echo "<div id='postoption'>";
			echo "<form  method='post'action='confirmpayment.php'>";
			echo "<input type='radio' name='option' value='1'    id='postoptiondeliver' onClick=\"document.getElementById('delivery').style.display='block';document.getElementById('pickup').style.display='none';\">Needs Delivery";
			echo "<input type='radio' name='option'  value='2'  id='postoptionpickup' onClick=\"document.getElementById('delivery').style.display='none';document.getElementById('pickup').style.display='block';\">Pick up By myself<br><br>";
			echo "<div id='delivery' style='display:none;'>";
			echo "<label>Address</label> <input type='text' name='address' placeholder='please input your address' value='".$row["address"]."'><br>";
			echo "<label>Tel</label> <input type='text' name='tel' placeholder='please input your phone number' value='".$row["tel"]."'><br>";
			echo "<input type='submit' value='Pay It Now'  onclick=\"return alertToFillInformation();\">";
			echo "</div>";
			echo "<div id='pickup' style='display:none;'>";
			//echo "<label>Address</label> <input type='text' name='address' placeholder='please input your address' value='".$row["address"]."'><br>";
			echo "<label>Tel</label> <input type='text' name='tel' placeholder='please input your phone number' value='".$row["tel"]."'><br>";
			echo "You need to go to Newbury street to pick them up!!!<br><br>";
			echo "<input type='submit' value='Pay It Now'  onclick=\"return alertToFillInformation();\">";
			echo "</div>";
			echo "<input style='display:none;' type='hidden' value='".$totalprice."' name='totalprice'>";
			echo "<input style='display:none;' type='email' value='".$_SESSION['Email']."' name='SessionEmail'>";
			echo "</form>";
			echo "</div>";
			}else{
				echo "<div id='postoption'>";
				echo "<form  method='post'action='confirmpayment.php'>";
				echo "<input type='radio' name='option' value='1'   id='postoptiondeliver' onClick=\"document.getElementById('delivery').style.display='block';document.getElementById('pickup').style.display='none';\">Needs Delivery";
				echo "<input type='radio' name='option'  value='2'   id='postoptionpickup' onClick=\"document.getElementById('delivery').style.display='none';document.getElementById('pickup').style.display='block';\">Pick up By myself<br><br>";
				echo "<div id='delivery' style='display:none;'>";
				echo "<label>Address</label> <input type='text' id='deliveryaddress' name='address' placeholder='please input your address'><br>";
				echo "<label>Tel</label> <input type='text' id='delivertel' name='tel' placeholder='please input your phone number'><br>";
				echo "<input type='submit' value='Pay It Now' onclick=\"return alertToFillInformation();\">";
				echo "</div>";
				echo "<div id='pickup' style='display:none;'>";
				echo "Please go to ... to pick up your stuff!";
				//echo "<label>Address</label> <input type='text' id='deliveryaddress' name='address' placeholder='please input your address'><br>";
				echo "<label>Tel</label> <input type='text' id='delivertel' name='tel' placeholder='please input your phone number'><br>";
				echo "You need to go to Newbury street to pick them up!!!<br><br>";
				echo "<input type='submit' value='Pay It Now' onclick=\"return alertToFillInformation();\">";
				echo "</div>";
				echo "<input style='display:none;' type='email' value='".$_SESSION['Email']."' name='SessionEmail'>";
				echo "</form>";
				echo "</div>";		
				}
		
		
		}else{
			echo "<div id='postoption'>";
		  	echo "Oops!!!There is something wrong with system,we will try our best to fix it.";
  		  	echo "</div>";
			}	
		
	}else{
		echo "You did not order anything yet!";
		}
		/*echo "
		<script async=\"async\" src=\"https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=admin@charmingy.com\" 
    data-button=\"buynow\" 
    data-amount=\"222\" 
    data-currency=\"usd\" 
    data-callback=\"444\" 
    data-env=\"sandbox\"
></script>
		";*/
	
}



function getEvents($keyword){
	if(!$keyword){
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
		$geteventssql = "SELECT * FROM events ";
		$result = $conn->query($geteventssql);
		$rowscounter = $result->num_rows;
		echo "<div id='allevents'><ul>";
		echo "<li><div>Upload Time</div> <div>Title</div></li>";
		for($i=0;$i<$rowscounter;$i++){
			$row = $result->fetch_assoc();
			echo "<li><div ><a href='events.php?eventid=".$row["time"]."'>".$row["time"]."</a></div> <div><a href='events.php?eventid=".$row["time"]."'>".$row["title"]."</a></div></li>";
			}
		echo "</ul></div>";
		
	}
	else
	{
		echo "<div id='allevents'>";
		
		
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
		$geteventssql = "SELECT * FROM events where time='".$keyword."'";
		$result = $conn->query($geteventssql);
		$rowscounter = $result->num_rows;
		if($rowscounter==0){
			echo "The event is missed.";
			}
		else{
			$row = $result->fetch_assoc();
			echo "<h1 id='eventtitle'>".$row["title"]."</h1><br>";
			echo "<div id='eventtext'>".$row["text"]."</div>";
			}
		
		
		echo "</div>";
	}
}

function getAbout(){
		echo "<div class='aboutandcontactusdiv'>";
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
		$getaboutsql = "SELECT * FROM about";
		$result = $conn->query($getaboutsql);
		$rowscounter = $result->num_rows;
		if($rowscounter==0){
			echo "The about page is missed.";
			}
		else{
			$row = $result->fetch_assoc();
			echo "".$row["content"]."<br>";
			}
		echo "</div>";
}

function getContactUs(){
		echo "<div class='aboutandcontactusdiv'>";
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
		$getaboutsql = "SELECT * FROM contactus";
		$result = $conn->query($getaboutsql);
		$rowscounter = $result->num_rows;
		if($rowscounter==0){
			echo "The about page is missed.";
			}
		else{
			$row = $result->fetch_assoc();
			echo "".$row["content"]."<br>";
			}
		echo "</div>";

}

function getFlowers($category){
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
		echo "<div id='products'>";
		echo "<div class='producttitle'>All products</div>";
    	echo "<table width='1080' border='0' cellspacing='0' cellpadding='10'>";
	
	
		if(!$category){
			$getallflowers="select * from product_info";
			$result=$conn->query($getallflowers);
			$rowscounter = $result->num_rows;
			for($i=0;$i<($rowscounter/4);$i++){
				echo "<tr>";
				//this is the begin of each line.
					for($j=0;$j<4;$j++){
						//display the flower here!
						$row = $result->fetch_assoc();
						if($row){
							echo "<td><a href='product.php?pid=".$row["productID"]."'><img src='".$row["imagePath"]."' width='250' height='250'></a></td>";
							}
							else{
						    	echo "<td><div  style='width:250px; height:250px;'><div></td>";
							}					
						
						}
				echo "</tr>";
				}
				
			}
		else{
				$getallflowers="select * from product_info where category='".$category."'";;
				$result=$conn->query($getallflowers);
				$rowscounter = $result->num_rows;
				for($i=0;$i<($rowscounter/4);$i++){
					echo "<tr>";
					//this is the begin of each line.
						for($j=0;$j<4;$j++){
							//display the flower here!
							$row = $result->fetch_assoc();
							if($row){
								echo "<td><a href='product.php?pid=".$row["productID"]."'><img src='".$row["imagePath"]."' width='250' height='250'></a></td>";
								}
								else{
									echo "<td><divstyle='width:250px; height:250px;'><div></td>";
								}					
							
							}
					echo "</tr>";
					}
					
			}
		echo "</table>";
		echo "</div>";
}
?>