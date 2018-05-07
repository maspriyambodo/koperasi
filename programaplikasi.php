<?php include 'h_tetap.php';?>
<script type="text/javascript">
$( "#tambah" ).button().on( "click", function() {
	var kode=$("#menux").val();
	if(kode=='0000'){
		alert("Anda Belum Memilih Menu...?");
		return false;
	}
	var dataString="kode="+kode;
	$.ajax({
		type: "GET",
		url	: "programaplikasi0.php",
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success:function(data){
			$('#loading').hide();
			$('#dialog').html(data); 
			$("#dialog").dialog({
				title : 'DATA PROGRAM APLIKASI',
				height: 500,
				width : 800,
				modal : true,
				buttons: { 
					Simpan: function() {
						$.ajax({
							type: 'POST',
							url : 'programaplikasiZ.php?p=1',
							data: $('#formm').serialize(),
							beforeSend: function () {
								$('#loading').show();
							},
							success: function(data){
								$('#loading').hide();
								alert(data);
								var tes = data.search("Sukses");
								if(tes!=0){
									return false;
								}
								showEditt();
							}
						});
						$(this).dialog('close');
					},
					close: function() {
						$(this).dialog('close');
					}
				}
			});
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert('Error: ' + xhr.status || ' - ' || thrownError);
			$('#loading').hide();
		}
	});
	return false;
});
function showEnable(id) {
	var r = confirm(" Pilihan Sudah Benar...?");
	if (r == false) {
		return false;
	}
	var dataString='id='+id+'&p=3';
	$.ajax({
		type: "GET",
		url	: "programaplikasiZ.php",
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success	: function(data){
			$('#loading').hide();
			alert(data);
			var tes = data.search("Sukses");
			if(tes!=0){
				return false;
			}
			showEditt();
		}
	});
}
function showDisable(id) {
	var r = confirm(" Pilihan Sudah Benar...?");
	if (r == false) {
		return false;
	}
	var dataString='id='+id+'&p=4';
	$.ajax({
		type: "GET",
		url	: "programaplikasiZ.php",
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success	: function(data){
			$('#loading').hide();
			alert(data);
			var tes = data.search("Sukses");
			if(tes!=0){
				return false;
			}
			showEditt();
		}
	});
}
function showEditt() {
	var kode=$("#menux").val();
	var dataString="kode="+kode;
	$.ajax({
		type: "GET",
		url : "programaplikasiX.php",
		data: dataString,
		beforeSend: function () {
			$("#loading").show();
		},
		success: function(data){
			$("#divPageHasil").html(data);
			$("#loading").hide();
		}
	});
	return false;
}
$("#menux").change(function() {
	var kode=$("#menux").val();
	var dataString="kode="+kode;
	$.ajax({
		type: "GET",
		url : "programaplikasiX.php",
		data: dataString,
		beforeSend: function () {
			$("#loading").show();
		},
		success: function(data){
			$("#divPageHasil").html(data);
			$("#loading").hide();
		}
	});
	return false;
});
</script>
<div class="ui-widget-content">
	<select name="menux" id="menux">
		<option value="0000">PILIHAN</option>
		<option value="1000">MENU DATA NASABAH</option>
		<option value="1100">MENU INFORMASI</option>
		<option value="1200">MENU TRANSAKSI</option>
		<option value="1300">MENU BACKUP DATA</option>
		<option value="1350">MENU TABUNGAN</option>
		<option value="1400">MENU KREDIT</option>
		<option value="1500">MENU LAPORAN HARIAN</option>
		<option value="1600">MENU TELLER</option>
		<option value="1800">MENU SETUP PARAMETER</option>
		<option value="1900">MENU TAGIHAN BULANAN</option>
		<option value="1950">MENU TAGIHAN SUSULAN</option>
		<option value="2000">MENU LAPORAN AKUNTANSI</option>
		<option value="2100">MENU DEPOSITO</option>
		<option value="2200">MENU TAGIHAN MICRO</option>
		<option value="2300">MENU LAPORAN BULANAN</option>
	</select>
	<button id="tambah">Tambah Program Aplikasi</button>
</div>
<div id="divPageHasil"></div>
<div id="dialog" style="display: none"></div>