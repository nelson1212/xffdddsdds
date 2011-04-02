function checkExtension(form) 
{
	
  var imagen1 = document.getElementById("FotosFoto1").value;
  var imagen2 = document.getElementById("FotosFoto2").value;
  var imagen3 = document.getElementById("FotosFoto3").value;
  var imagen4 = document.getElementById("FotosFoto4").value;
  var imagen5 = document.getElementById("FotosFoto5").value;
	
	 if(imagen1 != "")
	 {
	// code to get File Extension..
		var arr1 = new Array;
		arr1 = imagen1.split("\\");
		var len = arr1.length;
		var img1 = arr1[len-1];
		var filext = img1.substring(img1.lastIndexOf(".")+1);
		// Checking Extension
		if(filext == "jpg" || filext == "jpeg" || filext == "gif")
		{	
			window.document.getElementById('mensaje1').innerHTML = "";
		}else 
		{
	
		    window.document.getElementById('mensaje1').innerHTML = "Imagen con formato incorrecto solo se permiten .jpg, .gif o .png";	
			return false;
		}
		
		alert("Hola mundo");
	} 
	
	if(imagen2 != "")
	 {
	// code to get File Extension..
		var arr1 = new Array;
		arr1 = imagen2.split("\\");
		var len = arr1.length;
		var img1 = arr1[len-1];
		var filext = img1.substring(img1.lastIndexOf(".")+1);
		// Checking Extension
		if(filext == "jpg" || filext == "jpeg" || filext == "gif")
		{	
			window.document.getElementById('mensaje2').innerHTML = "";
		}else 
		{
			
		    window.document.getElementById('mensaje2').innerHTML = "Imagen con formato incorrecto solo se permiten .jpg, .gif o .png";	
			return false;
		}
	}
	
	if(imagen3 != "")
	 {
	// code to get File Extension..
		var arr1 = new Array;
		arr1 = imagen3.split("\\");
		var len = arr1.length;
		var img1 = arr1[len-1];
		var filext = img1.substring(img1.lastIndexOf(".")+1);
		// Checking Extension
		if(filext == "jpg" || filext == "jpeg" || filext == "gif")
		{	
			window.document.getElementById('mensaje3').innerHTML = "";
		}else 
		{
			
		    window.document.getElementById('mensaje3').innerHTML = "Imagen con formato incorrecto solo se permiten .jpg, .gif o .png";	
			return false;
		}
	}
	
	 if(imagen4 != "")
	 {
	// code to get File Extension..
		var arr1 = new Array;
		arr1 = imagen4.split("\\");
		var len = arr1.length;
		var img1 = arr1[len-1];
		var filext = img1.substring(img1.lastIndexOf(".")+1);
		// Checking Extension
		if(filext == "jpg" || filext == "jpeg" || filext == "gif")
		{	
			window.document.getElementById('mensaje4').innerHTML = "";
		}else 
		{
			
		    window.document.getElementById('mensaje4').innerHTML = "Imagen con formato incorrecto solo se permiten .jpg, .gif o .png";	
			return false;
		}
	}
	
	if(imagen5 != "")
	 {
	// code to get File Extension..
		var arr1 = new Array;
		arr1 = imagen5.split("\\");
		var len = arr1.length;
		var img1 = arr1[len-1];
		var filext = img1.substring(img1.lastIndexOf(".")+1);
		// Checking Extension
		if(filext == "jpg" || filext == "jpeg" || filext == "gif")
		{	
			window.document.getElementById('mensaje5').innerHTML = "";
		}else 
		{
			
		    window.document.getElementById('mensaje5').innerHTML = "Imagen con formato incorrecto solo se permiten .jpg, .gif o .png";	
			return false;
		}
	}
	
	window.document.forms['PhotoAddForm'].submit();
}