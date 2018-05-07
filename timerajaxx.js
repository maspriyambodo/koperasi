window.onload = chekdata();
var interval;
var xplay=true;
var xstop=true;
function chekdata(){
	interval = setInterval(trackLoginn,2000);
}
function trackLoginn(){
	var xmlReq = false;
	$('<audio id="chatAudio"><source src="audio/bintang.mp3" type="audio/mpeg"></audio>').appendTo('body');
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
	xmlReq.open('get', 'chekmain.php', true);
	xmlReq.setRequestHeader("Connection", "close");
	xmlReq.send(null);
	xmlReq.onreadystatechange = function(){
		if(xmlReq.readyState == 4 && xmlReq.status==200) {
			var text=xmlReq.responseText;
			if(text==1){
				xmlReq.abort();
				if(xplay==false){
					$('#chatAudio')[0].pause();
					$('#chatAudio')[0].currentTime=0;
				}
				clearInterval(interval);
				document.location.href = "logout.php";
				//alert('Waktu Login Sudah Habis, Karena Tidak Ada Interaksi.');
			}else{
				var n = text.search("Anda");
				if(n==0){
					$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
					if(xplay==true){
						$('#chatAudio')[0].play();
						xplay=false;
					}
				}else{
					if(xplay==false){
						$('#chatAudio')[0].pause();
						$('#chatAudio')[0].currentTime=0;
						xplay=true;
					}
				}
			}
		}
	}
	//setTimeout( "chekdata()", 1000 );
}
