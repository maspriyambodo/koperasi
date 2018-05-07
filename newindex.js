$(document).ready(function() {
	$('#lg-form').submit(function() {
		$.ajax({
			type: 'POST',
			url: "prosesmasuk.php",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#loading').show();
			},
			success: function(data) {
				lmenu(data);
				$('#loading').hide();
			}
		});
		return false;
	});
});
function lmenu(cek) {
	if (cek < 6) {
		location.href = "menu.php";
	} else if (cek == 6) {
		location.href = "akuntansi.php";
	} else if (cek == 7) {
		location.href = "gaji/payroll.php";
	} else {
		var n = cek.search("Security");
		if (n == 0) {
			alert(cek);
			$("#captcha_c").attr("src", "captcha_code.php?"+(new Date()).getTime());
			return false;
		}else{
			alert(cek);
		}
	}
}