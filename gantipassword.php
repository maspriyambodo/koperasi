<?php include 'h_tetap.php';?>
<script type="text/javascript">
$(document).ready(function(){
	$('input[name=submit]').click(function(){
		var pass= $("input#pass").val();
		if (pass.replace(/\s/g,"") == ""){
			alert('Password lama harus diisi??');
			return false;
		}
		var pass1= $("input#pass1").val();
		var pass2= $("input#pass2").val();
		if (pass1.replace(/\s/g,"") == "" || pass2.replace(/\s/g,"") == ""){
			alert('Password Baru harus diisi??');
			return false;
		}
		if (pass1.replace(/\s/g,"") != pass2.replace(/\s/g,"")){
			alert('Password yang anda masukan tidak sama??');
			return false;
		}
		if (pass.replace(/\s/g,"") == pass2.replace(/\s/g,"")){
			alert('Password Baru Tidak Boleh Sama Dengan Password Lama??');
			return false;
		}
		var r = confirm("Anda yakin data di simpan?");
		if (r == false) {
			return false;
		}
		var dataString='pass2='+pass2+'&pass='+pass;
		$.ajax({
			type: "POST",
			url	: "simpanpass.php",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){
				$('#loading').hide();
				alert(data);
				$("input#pass").val('');
				$("input#pass1").val('');
				$("input#pass2").val('');
			}
		});
		return false;
	});
	$("#pass").on('keyup', function () {
		var xpass = this.value;
		$.ajax({
			type: 'POST',
			url : 'cekpassword.php',
			data: 'xpass=' + xpass,
			success: function (data) {
				$('#pesan').html(data);
			}
		});
	});
});
</script>
<div class="ui-widget ui-widget-content" align="center">
	<form name="ganti" action="" method="post">
	<table class="table">
		<tr><td>User ID</td>
			<td><input disabled="disabled" type="text" name="userid" id="userid" size="30" maxlength="8" value="<?php echo $userid ;?>"/></td>
		</tr>
		<tr><td>Password Lama</td>
			<td><input type="password" name="pass" id="pass" size="30" maxlength="30"/><div id="pesan"></div></td>
		</tr>
		<tr><td>Password Baru</td>
			<td><input type="password" name="pass1" id="pass1" size="30" maxlength="30" /></td>
		</tr>
		<tr><td>Confirm Password</td>
			<td><input type="password" name="pass2" id="pass2" size="30" maxlength="30" /></td>
		</tr>
		<tr>
			<td colspan="2"> <input type="submit" name="submit" id="submit" value="Submit" class="icon-save"/></td>
		</tr>
	</table>
	</form>
</div>
