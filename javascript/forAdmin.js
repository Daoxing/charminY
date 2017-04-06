function verifyAdminSubmitProductForm(){
	var i=0;	
	//alert(i+'   '+document.getElementById("adminsubmitproductform").length);
	if(document.getElementById("adminsubmitproductformname").value.length==0){
		alert('you should fill the product\'s name');
		return false;
		}
	if(document.getElementById("adminsubmitproductformprice").value.length==0){
		alert('you should fill the product\'s price');
		return false;
		}
	if(document.getElementById("adminsubmitproductformcategory").value.length==0){
		alert('you should fill the product\'s category');
		return false;
		}
	if(document.getElementById("Adminproductimage").value.length==0){
		alert('you should fill the product\'s imagepath');
		return false;
		}
	if(document.getElementById("Adminproductimage").files[0].size>5000000){
		alert('your image file is too big');
		return false;
		}
	var filextention=document.getElementById("Adminproductimage").value.split('.').pop();
	filextention=filextention.toLowerCase();
	
	if(filextention!='png'&&filextention!='jpg'&&filextention!='bmp'&&filextention!='gif'){
		alert('We only accept images with extention of png, jpg, bmp or gif');
		return false;
		}
	if(document.getElementById("adminsubmitproductformeditor").value.length==0){
		alert('you should fill the product\'s introduction');
		return false;
		}
	return true;
}

function verifyAdminAddEventsForm(){
	if(document.getElementById("addeventstitle").value.length==0){
		alert('You should fill event\'s title!');
		return false;
	}
	if(document.getElementById("eventsubmitproductformtextarea").value.length==0){
		alert('You should fill events!');
		return false;
	}
	
	return true;
}

function verifyAdminAboutForm(){
	if(document.getElementById("aboutTextEditortextarea").value.length==0){
		alert('You should fill content!');
		return false;
		}
	return true;
}

function verifyAdminContactUsForm(){
	if(document.getElementById("contactusTextEditortextarea").value.length==0){
		alert('You should fill content!');
		return false;
		}
	return true;	
}

function addANewSlideshowImage(){
	var slideimagecounter=document.getElementById('slideshowimagescounter').value;
	var newelement= document.createElement('div');
	newelement.id="slideshowimagediv"+(slideimagecounter); 
	newelement.innerHTML="Image File "+(slideimagecounter)+":<input name='slideshowimage"+(slideimagecounter)+"' id='slideshowimage"+(slideimagecounter)+"' type='file' ><br><br>";
	document.getElementById('slideshowimagearray').appendChild(newelement);
	document.getElementById('slideshowimagescounter').value++;
}

function removeLastSlideshowImage(){
	if(document.getElementById('slideshowimagescounter').value>1){
	var slideshowimage = document.getElementById("slideshowimagediv"+(document.getElementById('slideshowimagescounter').value-1));
	var parentofslideshowimage = document.getElementById("slideshowimagearray");
	parentofslideshowimage.removeChild(slideshowimage);
	document.getElementById('slideshowimagescounter').value--;
	}
}

function verifySlideShowImagesForm(){
/*
if(document.getElementById("Adminproductimage").value.length==0){
		alert('you should fill the product\'s imagepath');
		return false;
		}
	if(document.getElementById("Adminproductimage").files[0].size>5000000){
		alert('your image file is too big');
		return false;
		}
	var filextention=document.getElementById("Adminproductimage").value.split('.').pop();
	filextention=filextention.toLowerCase();
	
	if(filextention!='png'&&filextention!='jpg'&&filextention!='bmp'&&filextention!='gif'){
		alert('We only accept images with extention of png, jpg, bmp or gif');
		return false;
		}
*/
	
	var slideimagecounter=document.getElementById('slideshowimagescounter').value;
	var i=0;
	for(;i<slideimagecounter;i++){
		var slideshowimage = document.getElementById("slideshowimage"+i);
		if(slideshowimage.value.length==0){
		alert('you should fill the product\'s imagepath');
		return false;
		}
		if(slideshowimage.files[0].size>5000000){
			alert('your image file is too big');
			return false;
			}
		var filextention=slideshowimage.value.split('.').pop();
		filextention=filextention.toLowerCase();
		
		if(filextention!='png'&&filextention!='jpg'&&filextention!='bmp'&&filextention!='gif'){
			alert('We only accept images with extention of png, jpg, bmp or gif');
			return false;
			}
		//whether make sure about pictures size.
	}
	
	return true; 
}

