$(document).ready(function () {
	$('#masuk').submit(function () {
		$.ajax({
			type: 'POST',
			url : urls,
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				alert(data);
				var tes = data.search("Sukses");
				if(tes==0){
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
	$("#lookup_kabupaten").lookupbox({
		title: 'Daftar Kabupaten',
		url	 : '../gaji/lookup_kabupaten.php?chars=',
		imgLoader: '<img src="../images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=kabupaten]').val(data.kode);
			$('#nm_kabupaten').html(data.desc1);
			$('input[name=propinsi]').val(data.kode2);
			$('#nm_propinsi').html(data.desc2);
		},
		tableHeader: ['Kode Kabupaten','Kabupaten','Kode Propinsi','Propinsi']
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
	jQuery(function($) {
		$("#tgl_lahir").mask("99-99-9999");
	});
});
function validasi(){
	var tgl1=document.forms["masuk"]["tgl_lahir"].value;
	var numbers=/^[0-9]+$/;
		//if (tlp1==null || tlp1==""){
		//	alert("Nomor KTP Tidak Boleh Kosong !");
		//	return false;
		//}
	var validformat=/^\d{2}\-\d{2}\-\d{4}$/;
	var dayfield=tgl1.split("-")[0];
	var monthfield=tgl1.split("-")[1];
	var yearfield=tgl1.split("-")[2];
	var dayobj = new Date(yearfield, monthfield-1, dayfield);
	if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
		alert("Format Tanggal DD-MM-YYYY DD=1 sd 31 MM=1 sd 12 YYYY=Reguler Tahun");
		$("#tgl_lahir").focus();
		return false;
	}
	var r = confirm("Anda Yakin Data Di Simpan?");
	if (r == false) {
		return false;
	}
}
function goKembali() {
	$('#innertub').load(url);
}