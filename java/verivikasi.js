var url1,url2,url3,url4;
$(document).ready(function() {
	$("#kwitansi").submit(function() {
		var r = confirm("Anda Yakin Data Di Otorisasi...?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: 'POST',
			url : url1,
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){
				alert(data);
				var text=data;
				$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
				var n = data.search("Sukses");
				if(n==0){
					ListData(0);
				}				
				$('#loading').hide();
			}
		});
		return false;
	});
});
function showEdit(id) {
	$.ajax({
		url : url2,
		type: 'GET',
		data: 'id='+id,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){ 
			$('#dialog').html(data);
			$('#loading').hide();
			$("#dialog").dialog({
			title:"Detail Data Nasabah",
			height: 550,
			width: 900,
			buttons: {
				Ok: function () {
					$(this).dialog('close');
				} 
			},
			modal: true
			})
		}
	});
}
function ListData(nonas) {
	var dataString='nonas='+nonas;
	$.ajax({
		type: 'GET',
		url : url3,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			$("#innertub").html(data);
			$('#loading').hide();
		}
	});
	return false;
}
function checkAll(formname, checktoggle){
	var checkboxes = new Array(); 
	checkboxes = document[formname].getElementsByTagName('input');
	for (var i=0; i<checkboxes.length; i++)  {
		if (checkboxes[i].type == 'checkbox')   {
			checkboxes[i].checked = checktoggle;
		}
	}
}