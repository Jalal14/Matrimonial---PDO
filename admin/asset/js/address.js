$(document).ready(function () {

});
xmlhttp = new XMLHttpRequest();
function showHint() {
	str=document.getElementById('mytext').value;
	//document.getElementById("spinner").style.visibility= "visible";
	xmlhttp.onreadystatechange = function() {
		
		if (xmlhttp.readyState == 4) {
			//alert(xmlhttp.responseText);
			
			m=document.getElementById("txtHint");
			m.innerHTML=xmlhttp.responseText;
			//document.getElementById("spinner").style.visibility= "hidden";
		}
	};
	var url="server.php?uname="+str;
	//alert(url);
	xmlhttp.open("GET", url,true);
	xmlhttp.send();
}