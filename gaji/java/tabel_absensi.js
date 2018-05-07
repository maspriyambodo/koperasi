var url1,url2,url3,url4,url5,url6,uhead,nikx;
$(document).ready(function () {
	$('#masuk').submit(function () {
		nikx=$('#nikx').val();
		$.ajax({
			type: 'POST',
			url : url1,
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				alert(data);
				var tes = data.search("Sukses");
				if(tes==0){
					goKembali(nikx);
				}
				$('#loading').hide();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
				$('#loading').hide();
			}
		});
		return false;
	});
	$("#lookup_lokasi").lookupbox({
		title: 'Daftar Area',
		url  : '../gaji/lookup_lokasi.php?chars=',
		imgLoader: '<img src="../images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=kode_lokasi]').val(data.kode_lokasi);
			$('#nm_lokasi').html(data.nama_lokasi);
			$('input[name=kode_wilayah]').val(data.kode_wilayah);
			$('#nm_wilayah').html(data.nama_wilayah);
			$('input[name=kode_organisasi]').val(data.kode_organisasi);
			$('#nm_organisasi').html(data.nama_organisasi);
		},
		tableHeader: ['Area','Nama Area','Wilayah','Nama Wilayah','Direktorat','Nama Direktorat']
	});
	$("#lookup_grade").lookupbox({
		title: 'Daftar Grade',
		url  : '../gaji/lookup_grade.php?chars=',
		imgLoader: '<img src="../images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=kode_grade]').val(data.kode_grade);
			$('input[name=grade]').val(data.grade);
			$('input[name=gaji_pokok]').val(data.gaji_pokok);
			$('#nm_grade').html(data.keterangan);
		},
		tableHeader: ['Kode Grade','Grade','Keterangan','Gaji Pokok']
	});
});
function showEdit(id) {
	var dataString='id='+id;
	$.ajax({
		type: "GET",
		url	: url2,
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
						$.ajax({
							type: 'POST',
							url : url3,
							data: $('#formm').serialize(),
							beforeSend: function () {
								$('#loading').show();
							},
							success: function (data) {
								var tes = data.search("Sukses");
								if(tes != 0){
									alert(data);
									$('#loading').hide();
									return false;
								}
								alert(data);
								goKembali(nikx);
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
	nikx=$('#nikx').val();
	$.ajax({
		type: "GET",
		url : url4,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success	: function(data){
			goKembali(nikx);
			$('#loading').hide();
			alert(data);
		}
	});
}
function goKembali(nikx) {
	nikx=$('#nikx').val();
	var dataString="nik="+nikx;
	$.ajax({
		type: "GET",
		url : url5,
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success	: function(data){
			$('#divPageHasil').html(data);
			$('#loading').hide();
		}
	});
}
function kembali() {
	$('#innertub').load(url6);
}