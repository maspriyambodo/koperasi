$(document).ready(function(e) {
	$('#masuk').submit(function () {
		var r = confirm("Anda yakin data di simpan ?");
		if (r == false) {
			return false;
		}	
		var xjumlah	= new Number($("#jumlah").val().replace(/\./g, ''));
		var xsakhir	= new Number($("#sakhir").val().replace(/\./g, ''));
		var xsblokir= new Number($("#sblokir").val().replace(/\./g, ''));
		xjum11=new Number(xsakhir-xjumlah-xsblokir);
		if (xjum11<0){
			alert("Saldo Tabungan Tidak Cukup ?");
			return false;
		}
		$.ajax({
			type: 'POST',
			url: linkfilem,
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				if(data=='Sukses'){
					goKembali();
				}
				$('#loading').hide();
				alert(data);
			}
		});
		return false;
	});
	$(function() {
		$( "#tgl1" ).datepicker({
			dateFormat:"dd-mm-yy",
		});
		$( "#tgl2" ).datepicker({
			dateFormat:"dd-mm-yy",
		});
	});
});
function goKembali() {
	$('#innertub').load(linkfile);
}			
$(function () {
	$('#jumlah').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
})
