var url_umum,url4,dataString;
$(document).ready(function(){
	$('#masuk').submit(function(){
		var r = confirm("Anda yakin data di simpan...?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: "POST",
			url : url_umum,
			data: $(this).serialize(),
			beforeSend: function(){
				$('#loading').show();
			},
			success: function(data){
				alert(data);
				var text=data;
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
});
$(function(){
	$(".norek").autocomplete({
		minLength:2,
		source:'auto_norek.php',
		select:function(event, ui){
			$('#text1').val(ui.item.branch);
			$('#text3').val(ui.item.sufix);
		}
	});
});
function goKembali(){
	$.ajax({
		type: "POST",
		url : url4,
		data: $("form").serialize(),
		beforeSend: function () {
			$('#loading').show();
		},
		success	: function(data){
			innerHtml(data);
			$('#loading').hide();
		}
	});
}