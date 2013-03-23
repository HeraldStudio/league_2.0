var xmlHttp=false;
function GetXmlHttpObject()
{
	try
	 {
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	 }
	catch (e)
	 {
			// Internet Explorer
		 try
			  {
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			  }
		 catch (e)
			  {
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
	 }
	 if(!xmlHttp)
	 {
		alert("无法创建对象!");
	 }
}//创建对象
function addanswer ( commentid , answeringid, answeringtype ) {
	//alert('hehehe');
	var comtent = document.getElementById('textlimit1').value;
	var url='__URL__/answer' + username + '&password=' + password;
	//alert(comtent);

}