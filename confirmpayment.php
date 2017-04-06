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
$deliveraddress=$_POST["address"];
$option=$_POST["option"];
$tel=$_POST["tel"];
$SessionEmail=$_POST["SessionEmail"];
$totalprice=$_POST["totalprice"];
$callback="";

echo "<div class='singlemessage'>The Total Amount is<br>".$totalprice;

echo "
	<script async=\"async\" src=\"javascript/paypal-button.min.js?merchant=admin@charmingy.com\" 
    data-button=\"paynow\" 
    data-amount=\"$".$totalprice."\" 
    data-currency=\"USD\" 
    data-callback=\"http://www.charmingy.com/payprocessing.php?address=".$_POST["address"]."&option=".$_POST["option"]."&tel=".$_POST["tel"]."&SessionEmail=".$_POST["SessionEmail"]."\" 
    data-env=\"sandbox\"
></script>
		";

echo "</div>";
echo "<div class='singlemessage'><a href='payment.php'>Go Back</a></div>";
//		
?>