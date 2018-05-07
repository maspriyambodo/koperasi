var hal1,confirm1,hal2,confirm2,hal3,hal4,confirm4,judul1,judul2;
function AuthMethod(id) {
	var dataString='id='+id;
	var r = confirm(confirm1);
	if (r == false) {
		return false;
	}	
	$.ajax({
		type: "get",
		url : hal1,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			$('#loading').hide();
			$('#dialog').html(data); 
			$("#dialog").dialog({
				title : judul1,
				height: 550,
				width : 1000,
				modal : true,
				buttons:{
					close: function (){
						$(this).dialog('close');
					}  
				}
			});
		}
	});
};
function AuthMethoda(id) {
	var dataString='id='+id;
	var r = confirm(confirm2);
	if (r == false) {
		return false;
	}	
	$.ajax({
		type: "get",
		url : hal2,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			$('#loading').hide();
			$('#dialog').html(data); 
			$("#dialog").dialog({
				title : judul2,
				height: 550,
				width : 1000,
				modal : true,
				buttons:{
					close: function (){
						$(this).dialog('close');
					}  
				}
			});
		}
	});
};
function AuthMethodd(id) {
	var dataString='id='+id;
	var r = confirm(confirm3);
	if (r == false) {
		return false;
	}
	$.ajax({
		type: "get",
		url : hal3,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			$('#loading').hide();
			$('#dialog').html(data); 
			$("#dialog").dialog({
				title : "Hapus Bunga Deposito",
				height: 550,
				width : 1000,
				modal : true,
				buttons:{
					close: function (){
						$(this).dialog('close');
					}  
				}
			});
		}
	});
};
function AuthMethode(id) {
	var dataString='id='+id;
	var r = confirm(confirm4);
	if (r == false) {
		return false;
	}
	$.ajax({
		type: "get",
		url : hal4,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			var n=data.search("Error");
			if(n==0){
				alert(data);
			}else{
				$('#divPageHasil').html(data); 
			}
			$('#loading').hide();
		}
	});
};