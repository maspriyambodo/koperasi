window.onload = init();
var interval;
function init(){
	interval = setInterval(trackLogin,2000);
}
function trackLogin(){
	var xmlReq = false;
	try {
		xmlReq = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlReq = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e2) {
			xmlReq = false;
		}
	}
	if (!xmlReq && typeof XMLHttpRequest != 'undefined') {
		xmlReq = new XMLHttpRequest();
	}
	xmlReq.open('get','check.php', true);
	xmlReq.setRequestHeader("Connection","close");
	xmlReq.send(null);
	xmlReq.onreadystatechange = function(){
		if(xmlReq.readyState == 4 && xmlReq.status==200) {
			var text=xmlReq.responseText;
			if(text==1){
				xmlReq.abort();
				clearInterval(interval);
				document.location.href = "logout.php";
				//alert('Waktu Login Sudah Habis, Karena Tidak Ada Interaksi.');
			}
		}
	}
}