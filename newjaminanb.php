<?php include 'h_atas.php';?>
<script TYPE="text/javascript">
$(document).ready(function(){
	jQuery(function($) {$("#tgsk").mask("99-99-9999");});
	jQuery(function($) {$("#tgpjk").mask("99-99-9999");});
	jQuery(function($) {$("#tgstnk").mask("99-99-9999");});
	var urls = 'newjaminans.php';
	$('#masuk').submit(function () {
		$.ajax({
			type: 'POST',
			url : urls,
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
});
function goKembali() {
	var url = "newjaminan.php";
	$('#innertub').load(url);
}
</script>
<?php $id=$result->c_d($_GET['id']);$kdskep=$result->c_d($_GET['kdskep']);$branch=$kcabang;$nosk='';$pensk='';$tgsk='';$agunan1='';$agunan2='';$agunan3='';$agunan4='';$agunan5='';$agunan6='';$tgstnk='';$tgpjk='';?>
<form id="masuk" name="masuk" method="POST" action="">
	<table width="100%">
		<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
		<input type="hidden" name="kdskep" id="kdskep" value="<?php echo $kdskep;?>"/>
		<tr>
			<td colspan="4" align="center" class="ui-state-highlight"><strong>DATA JAMINAN BARU</strong></td>
		</tr>
		<?php include 'agunan.php'; ?>
	</table>
	<div class="ui-widget-content" align="center">
		<input type="submit" value="Simpan" id="submit" onclick="return validasi();" class="icon-save"/>
		<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
	</div>
</form>