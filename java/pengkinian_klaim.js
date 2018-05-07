$(document).ready(function () {
	jQuery(function($) {
		$("#tgmati").mask("99-99-9999");
		$("#tgklaim").mask("99-99-9999");
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
	$( "#tglmati" ).datepicker({
		dateFormat:"dd-mm-yy",
	});
	$( "#tglklaim" ).datepicker({
		dateFormat:"dd-mm-yy",
	});
});
function goKembali() {
	$('#innertub').load(url);
}