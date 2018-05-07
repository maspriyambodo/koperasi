<?php include "h_tetap.php";?>
<script type="text/javascript">
$(document).ready(function(){
	$(function() {
		$( "#tgl1" ).datepicker({
			dateFormat:"dd-mm-yy",
		});
		$( "#tgl2" ).datepicker({
			dateFormat:"dd-mm-yy",
		});
	});
	$('input[name=lacak]').click(function(){
		var kcabang = $("#kcabang").val();
		var tgl1= $("#tgl1").val();
		var tgl2= $("#tgl2").val();
		var cpokok= document.getElementById("pokok").checked;
		var xpokok=0;
		if (cpokok==true){
			xpokok=1;
		}
		var dataString='kcabang='+kcabang+'&tgl1='+tgl1+'&tgl2='+tgl2+'&pokok='+xpokok;
		$.ajax({
			url: 'cetakspkp.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageLaporan').html(data);
				$('#loading').hide();
			}
		});
		return false;
	});
});
function showEdit(mnorek) {
	var url='cetakspkz.php?mnorek='+mnorek+'&op=1';
	newwindow=window.open(url,'Cetak','height=600,width=1000');
	if (window.focus) {newwindow.focus()};
}
function showEdit1(mnorek) {
	var url='cetakspkk.php?mnorek='+mnorek+'&op=1';
	newwindow=window.open(url,'Cetak','height=600,width=1000');
	if (window.focus) {newwindow.focus()};
}
function showEdit2(mnorek) {
	var url='cetakspka.php?mnorek='+mnorek+'&op=1';
	newwindow=window.open(url,'Cetak','height=600,width=1000');
	if (window.focus) {newwindow.focus()};
}
function showEdit3(mnorek) {
	var url='cetakspke.php?mnorek='+mnorek+'&op=1';
	newwindow=window.open(url,'Cetak','height=600,width=1000');
	if (window.focus) {newwindow.focus()};
}
function showEdit4(mnorek) {
	var url='cetakspkc.php?mnorek='+mnorek+'&op=1';
	newwindow=window.open(url,'Cetak','height=600,width=1000');
	if (window.focus) {newwindow.focus()};
}
function showEdit5(mnorek) {
	var url='cetakspkd.php?mnorek='+mnorek+'&op=1';
	newwindow=window.open(url,'Cetak','height=600,width=1000');
	if (window.focus) {newwindow.focus()};
}
function showEdit6(mnorek) {
	var url='cetakspk_premi.php?mnorek='+mnorek+'&op=1';
	newwindow=window.open(url,'Cetak','height=600,width=1000');
	if (window.focus) {newwindow.focus()};
}
</script>
<div class="ui-widget-content" align="center">
	<form id="search" name="search" method="post" action="">
		TANGGAL
		<input type="text" id="tgl1" size="15" maxlength="10" value="<?php echo $tanggal;?>"/>
		S/D
		<input type="text" id="tgl2" size="15" maxlength="10" value="<?php echo $tanggal;?>"/>
		<select name="kcabang" id="kcabang">
			<?php include 'parameter/_kcabang.php';?>
		</select>
		<label><input type="checkbox" name="pokok" id="pokok"> Tampilkan Semua</label>
		<input type="button" name="lacak" id="lacak" value="Cari Data" class="icon-search"/>
	</form>
</div>
<div id="divPageLaporan"></div>