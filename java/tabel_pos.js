var linkcaridata='tabel_pos_page.php';
var linkdelete="parameter/pos_save.php";
var linkform="parameter/pos_form.php";
var linksave='parameter/pos_save.php?p=1';
$( "#tambah" ).button().on( "click", function() {
	showEdit('');
});
function showEdit(id) {
	var dataString='id='+id+'&p=2';
	$.ajax({
		type: "GET",
		url	: linkform,
		data	: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success:function(data){
			$('#dialog').html(data); 
			$('#loading').hide();
			$("#dialog").dialog({
				title:"Input Data Pos",
				height: 350,
				width: 550,
				modal: true ,
				buttons: { 
					Simpan: function() {
						$.ajax({
							type: 'POST',
							url : ,
							data: $('#formm').serialize(),
							beforeSend: function () {
								$('#loading').show();
							},
							success: function (data) {
								if(data=='Sukses'){
									$("#dialog" ).dialog('close');
									goKembali();
								}
								$('#loading').hide();
								alert(data);
							}
						});
					},
					close: function() {
						$(this).dialog('close'); 
						goKembali();
					}
				}
			})
		}
	});
	return false;
}
function showDelete(id) {
	var r = confirm("Anda yakin data di hapus?");
	if (r == false) {
		return false;
	}
	var dataString='id='+id+'&p=2';
	$.ajax({
		type: "GET",
		url	: linkdelete,
		data	: dataString,
		success: function(data){
			goKembali();
			alert(data);
		}
	});
}
function goKembali() {
	var nonas= $("input#nonas").val();
	$.ajax({
		type: 'POST',
		url	: linkcaridata,
		data: 'nonas='+nonas,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function (data) {
			$("#divPageData").html(data);
			$('#loading').hide();
		},
	});
	return false;
}