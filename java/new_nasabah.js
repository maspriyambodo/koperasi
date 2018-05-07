$(document).ready(function () {
	$('#simpan').click(function () {
		var r = confirm("Anda Yakin Data Di Simpan?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: 'POST',
			url : url2,
			data: $('#masuk').serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				alert(data);
				var text=data
				$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
				var n = data.search("Sukses");
				if(n==0){
					goKembali();
				}
				$('#loading').hide();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
			}
		});
		return false;
	});
	$("#lookuppos").lookupbox({
		title: 'Daftar Kantor Pos',
		url	 : 'lookup/lookup_pos.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=kdpos]').val(data.kode);
			$('#nmpos').html(data.desc1);
		},
		tableHeader: ['Kode Pos','Kelurahan','Kecamatan','Kabupaten','Propinsi']
	});
	$("#lookupposb").lookupbox({
		title: 'Daftar Kantor Pos',
		url	 : 'lookup/lookup_pos.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=kdposb]').val(data.kode);
			$('#nmposb').html(data.desc1);
		},
		tableHeader: ['Kode Pos','Kelurahan','Kecamatan','Kabupaten','Propinsi']
	});
	$("#lookupposu").lookupbox({
		title: 'Daftar Kantor Pos',
		url	 : 'lookup/lookup_pos.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=kdposu]').val(data.kode);
			$('#nmposu').html(data.desc1);
		},
		tableHeader: ['Kode Pos','Kelurahan','Kecamatan','Kabupaten','Propinsi']
	});
	$("#lookupkota").lookupbox({
		title: 'Daftar Kabupaten',
		url	 : 'lookup/lookup_kota.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=kota]').val(data.kode);
			$('#nmkota').html(data.desc1);
		},
		tableHeader: ['Kode','Kabupaten','Propinsi']
	});
	$("#lookupkotab").lookupbox({
		title: 'Daftar Kabupaten',
		url	 : 'lookup/lookup_kota.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=kotab]').val(data.kode);
			$('#nmkotab').html(data.desc1);
		},
		tableHeader: ['Kode','Kabupaten','Propinsi']
	});
	$("#lookupkotau").lookupbox({
		title: 'Daftar Kabupaten',
		url	 : 'lookup/lookup_kota.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=kotau]').val(data.kode);
			$('#nmkotau').html(data.desc1);
		},
		tableHeader: ['Kode','Kabupaten','Propinsi']
	});
});
$(function(){
	$(".kdpos").autocomplete({
		minLength:2,
		source:'lookup/kode_pos.php',
		select:function(event, ui){
			$('#nmpos').html(ui.item.nama);
		}
	});
	$(".kdposb").autocomplete({
		minLength:2,
		source:'lookup/kode_pos.php',
		select:function(event, ui){
			$('#nmposb').html(ui.item.nama);
		}
	});
	$(".kdposu").autocomplete({
		minLength:2,
		source:'lookup/kode_pos.php',
		select:function(event, ui){
			$('#nmposu').html(ui.item.nama);
		}
	});
	$(".kota").autocomplete({
		minLength:2,
		source:'lookup/kode_kabupaten.php',
		select:function(event, ui){
			$('#nmkota').html(ui.item.nama);
		}
	});
	$(".kotau").autocomplete({
		minLength:2,
		source:'lookup/kode_kabupaten.php',
		select:function(event, ui){
			$('#nmkotau').html(ui.item.nama);
		}
	});
	$(".kotab").autocomplete({
		minLength:2,
		source:'lookup/kode_kabupaten.php',
		select:function(event, ui){
			$('#nmkotab').html(ui.item.nama);
		}
	});
	$("#kembali").button({
		text: true,
		icons: {
	   		primary: 'ui-icon-circle-close'
	  	}
	});
	$("#lookupkota").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookuppos").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookupkotab").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookupposb").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookupkotau").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookupposu").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	 $('#simpan').button({
	 	text: true,
		icons: {
			primary: 'ui-icon-disk'
		}
	});
});
function validasi(){
	var numbers=/^[0-9]+$/;
	var validformat=/^\d{2}\-\d{2}\-\d{4}$/;
	var r = confirm("Anda Yakin Data Di Simpan?");
	if (r == false) {
		return false;
	}
}
function goKembali() {
	$('#innertub').load(url3);
}