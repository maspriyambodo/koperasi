// JavaScript Document
$(document).ready(function () {
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
function goKembali() {
	$('#innertub').load(url);
}