/*
This is going to verify password and email format
*/
function verifySignUpInformation(){
	if(document.getElementById('signUpEmail').value.length==0||
	document.getElementById('signUpPassword').value.length==0||
	document.getElementById('signUpRePassword').value.length==0
	){
	alert('You have to fill all textarea!');
	return false;
	}else{
		if(document.getElementById('signUpPassword').value.length<6||document.getElementById('signUpRePassword').value.length<6){
			alert('Password needs 6 letters at least!');
			return false;
			}
		else{
			if(document.getElementById('signUpPassword').value!=document.getElementById('signUpRePassword').value)
			{
				alert('Two passwords have to be same!');
				return false;
			}else{
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				var email=document.getElementById('signUpEmail').value;
				if(!re.test(email)){
					alert('Email Format is Wrong!');
					return false;
				}
			}
		}
		
		
	}
	
}
function verifyLoginInformation(){
	if(document.getElementById('loginEmail').value.length==0||
	document.getElementById('loginPassword').value.length==0
	){
	alert('You have to fill all textarea!');
	return false;
	}else{
		if(document.getElementById('loginPassword').value.length<6){
			alert('Password needs 6 letters at least!');
			return false;
			}
		else{
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			var email=document.getElementById('loginEmail').value;
			if(!re.test(email)){
				alert('Email Format is Wrong!');
				return false;
			}
		}
	}
}
function verifySettingInformation(){
	
		if(
		(document.getElementById('settingPassword').value.length<6||document.getElementById('settingRePassword').value.length<6)
		&&(document.getElementById('settingPassword').value.length!=0&&document.getElementById('settingRePassword').value.length!=0)
		){
			alert('Password needs 6 letters at least!');
			return false;
			}
		else{
			if(document.getElementById('settingPassword').value!=document.getElementById('settingRePassword').value)
			{
				alert('Two passwords have to be same!');
				return false;
			}else{
				/*
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				var email=document.getElementById('settingEmail').value;
				if(!re.test(email)){
					alert('Email Format is Wrong!');
					return false;
				}*/
			}
		}	
	
}
function isEmailExist(email){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if(!re.test(email)){
		alert('Email Format is Wrong!');
		return false;
	}
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        alert('Sorry,your brower doesn\'t support AJAX');
		return false;
    }
	
	// 2. Define what to do when XHR feed you the response from the server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) {
               if(xhr.responseText='ok'){
				  document.getElementById('isEmailExistMessage').innerHTML='You can use this new email';
				  return true;
				 }else{
					 document.getElementById('isEmailExistMessage').innerHTML='This Email has been used';
					 return false;
					 }
            }
        }
    }
    // 3. Specify your action, location and Send to the server - Start 
    xhr.open('GET', 'setting.php?c=email&isEmailExist='+email);
    xhr.send();
	//return false;
}

function cancelToSignUp(){
	document.getElementById('signUpEmail').value='';
	document.getElementById('signUpPassword').value='';
	document.getElementById('signUpRePassword').value='';
	document.getElementById('signUpAddress').value='';
	document.getElementById('signUpTel').value='';
	
	document.getElementById('signupoverlay').style.display='none';
	document.getElementById('loginoverlay').style.display='none';
	document.getElementById('container').style.display='block';
	return false;
}

function cancelToLogin(){
	document.getElementById('loginEmail').value='';
	document.getElementById('loginPassword').value='';
	
	
	document.getElementById('signupoverlay').style.display='none';
	document.getElementById('loginoverlay').style.display='none';
	document.getElementById('container').style.display='block';
	return false;
}
function cancelSettingInfor(){
	//document.getElementById('settingEmail').value='';
	//document.getElementById('settingPassword').value='';
	//document.getElementById('settingRePassword').value='';
	//document.getElementById('settingAddress').value='';
	//document.getElementById('settingTel').value='';
	
	document.getElementById('settingoverlay').style.display='none';
	document.getElementById('container').style.display='block';
	return false;

}
function addToCart(productID,userID){
	// 1. Create XHR instance - Start
	if(!userID){
		alert('If you want to buy something,please login first!');
		return false;
		}
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        alert('Sorry,your brower doesn\'t support AJAX');
		return false;
    }
	
	// 2. Define what to do when XHR feed you the response from the server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) {
               alert(xhr.responseText);
            }
        }
    }
	
	var amount = document.getElementById("productamount").value;
    // 3. Specify your action, location and Send to the server - Start 
    xhr.open('GET', 'addToCart.php?productID='+productID+'&userID='+userID+'&amount='+amount);
    xhr.send();
	//return false;
}

function deleteFromCart(productID,orderTime,Email){
	if(!Email){
		alert('If you want to delete something,please login first!');
		return false;
		}
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        alert('Sorry,your brower doesn\'t support AJAX');
		return false;
    }
	
	// 2. Define what to do when XHR feed you the response from the server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) {
               alert(xhr.responseText);
            }
			var delItem=document.getElementById(orderTime);
			var delItemParent=delItem.parentNode.removeChild(delItem);
			window.location.href = "payment.php";
        }
    }
    // 3. Specify your action, location and Send to the server - Start 
    xhr.open('GET', 'deleteFromCart.php?productID='+productID+'&Email='+Email+'&orderTime='+orderTime);
    xhr.send();

}

function alertToFillInformation(){
	//alert('Thanks for shopping in charmingy!!!');
	if(document.getElementById('delivertel').value==''&&document.getElementById('deliveraddress').value==''&&document.getElementById("postoptiondeliver").checked){
		alert('Cellphone or Address,we need one at least!!!');
		return false;
		}
	if(document.getElementById('delivertel').value==''&&document.getElementById("postoptionpickup").checked){
		alert('Cellphone or Address,we need one at least!!!');
		return false;
		}
	return true;
}

function displaySubMenu(li) {
	console.log('display');
var subMenu = li.getElementsByTagName("ul")[0];
subMenu.style.display = "block";
}

function hideSubMenu(li) {
	console.log('hide');
var subMenu = li.getElementsByTagName("ul")[0];
subMenu.style.display = "none";
}

function verifyForgetPasswordEmail(){
	if(document.getElementById('loginEmail').value.length==0){
	alert('You have to fill the Email!');
	return false;
	}else{
		
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var email=document.getElementById('loginEmail').value;
		if(!re.test(email)){
			alert('Email Format is Wrong!');
			return false;			
		}else{
			window.location.href = 'forgetpassword.php?Email='+document.getElementById('loginEmail').value;
			}
	}
	return false;
}