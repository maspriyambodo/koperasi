$(document).ready(function () {
	jQuery(function($) {
		$("#tgl_mati").mask("99-99-9999");
		$("#tgl_klaim").mask("99-99-9999");
		$("#tgl_akte_kematian").mask("99-99-9999");
		$("#tgl_surat_taspen").mask("99-99-9999");
	});
	$('#submit').click(function(){
		var r = confirm("Anda yakin data di simpan?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: 'POST',
			url : urls,
			data: $('#masuk').serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				alert(data);
				var text=data;
				$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
				var n = data.search("Sukses");
				if(n==0){
					goKembali();
				}
				$('#loading').hide();
			}
		});
		return false;
	});
});
$(function(){
	$('#jumlah_klaim').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
});
function goKembali() {
	$('#innertub').load(url);
}