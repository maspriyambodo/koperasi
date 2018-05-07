var url1,url2,url3,url4,uhead;
$(document).ready(function() {
	$('.filter').multifilter()
})
$( "#tambah" ).button().on( "click", function() {
	showEdit('');
});
function showEdit(id) {
	var dataString='id='+id;
	$.ajax({
		type: "GET",
		url	: url1,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success:function(data){
			$('#dialog').html(data); 
			$('#loading').hide();
			$("#dialog").dialog({
				title : uhead,
				height: 450,
				width : 800,
				modal : true ,
				buttons: { 
					Simpan: function() {
						alert(url2);
						$.ajax({
							type: 'POST',
							url : url2,
							data: $('#formm').serialize(),
							beforeSend: function () {
								$('#loading').show();
							},
							success: function (data) {
								alert(data);
								var text=data;
								var tes = data.search("Sukses");
								if(tes!=0){
									$('#loading').hide();
									return false;
								}
								goKembali();
							}
						});
						$(this).dialog('close');
						$('#loading').hide();
					},
					close: function() {
						$(this).dialog('close'); 
					}
				}
			})
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert('Error: ' + xhr.status || ' - ' || thrownError);
			$('#loading').hide();
		}
	});
	return false;
}
function showDelete(id) {
	var r = confirm("Anda yakin data di hapus?");
	if (r == false) {
		return false;
	}
	var dataString='id='+id;
	$.ajax({
		type: "GET",
		url : url3,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success	: function(data){
			goKembali();
			$('#loading').hide();
			alert(data);
		}
	});
}
function goKembali() {
	var dataString="nik=1";
	$.ajax({
		type: "GET",
		url : url4,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success	: function(data){
			$('#innertub').html(data);
			$('#loading').hide();
		}
	});
}