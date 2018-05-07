<?php include 'h.php';?>
<script type="text/javascript">
	$(document).ready(function(e) {
		$(function() {
			$( "#tgl1" ).datepicker({
				dateFormat:"dd-mm-yy",
			});
		});
		$('#btn').hide();
		$( "#btn" ).button().on( "click", function() {
			var cetak=$('#cetak').val();
			var tgl1=$("#tgl1").val();
			var branch=$("#branch").val();
			var dataString=cetak+'.php?tgl='+tgl1+'&branch='+branch+'&p=2';
			var url='akuntansi/'+dataString;
			newwindow=window.open(url,'Cetak','height=600,width=1000');
			if (window.focus) {newwindow.focus()};
			return false;
		});
	});
	$(function() {
		$("#btn").button({
			text: true,
			icons: {
				primary: "ui-icon-print"
			}
		});
	});
	function goNeraca() {
		var tgl1  = $("#tgl1").val();
		var branch= $("#branch").val();
		var dataString='tgl='+tgl1+'&branch='+branch+'&p=1';
		$.ajax({
			url : 'akuntansi/akuntansi100.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi100");
			}
		});
	}
	function goNeracab() {
		var tgl1  = $("#tgl1").val();
		var branch= $("#branch").val();
		var dataString='tgl='+tgl1+'&branch='+branch+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi200.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi200");
			}
		});
	}
	function goLabaRugi() {
		var tgl1  = $("#tgl1").val();
		var branch= $("#branch").val();
		var dataString='tgl='+tgl1+'&branch='+branch+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi300.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi300");
			}
		});
	}
	function goLabaRugib() {
		var tgl1 = $("#tgl1").val();
		var branch= $("#branch").val();
		var dataString='tgl='+tgl1+'&branch='+branch+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi400.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi400");
			}
		});
	}
	function goNeracal() {
		var tgl1 	= $("#tgl1").val();
		var branch= $("#branch").val();
		var dataString='tgl='+tgl1+'&branch='+branch+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi800.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi800");
			}
		});
	}
	function goPosisi() {
		var tgl1 	= $("#tgl1").val();
		var branch= $("#branch").val();
		var dataString='tgl='+tgl1+'&branch='+branch+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi600.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi600");
			}
		});
	}
	function goJurnal() {
		var tgl1 = $("#tgl1").val();
		var branch= $("#branch").val();
		var dataString='tgl='+tgl1+'&branch='+branch+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi500.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi500");
			}
		});
	}
	function goArusKas() {
		var tgl1 	= $("#tgl1").val();
		var branch= $("#branch").val();
		var dataString='tgl='+tgl1+'&branch='+branch+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi900.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi900");
			}
		});
	}
</script>
<style>
	#shortcut {
		text-align:center;
	}
	#shortcut a {
		background:#FFF;
		display:inline-block;
		border:1px solid #999;
		height:50px;
		width:110px;
		text-align:center;
		color:#444;
		text-decoration:none;
		padding:2px;
		margin:0px 2px;
		box-shadow:1px 1px 3px #CCC;
	}	
	#shortcut a:hover {
		box-shadow:0px 0px 5px #555;
		cursor: pointer;
	}
</style>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetak" name="cetak"/>
	TANGGAL 
	<input type="text" id="tgl1" name="tgl1" size="15" maxlength="10" value="<?php echo $tanggal;?>"/>
	<?php
	if($level<3 OR $level==6){
		echo '<select name="branch" id="branch">';
		$hasil = $result->res("select kode,nama from $tabel_kantor order by kode");
		while ($data = $result->row($hasil)) {
			$pilih=$data['kode'].' '.$data['nama'];
			if ($kcabang==$data['kode']){
				echo "<option value=\"".$data['kode']."\" selected>".$pilih."</option>";
			}else{
				echo "<option value=\"".$data['kode']."\">".$pilih."</option>";
			}
		}
		echo '</select>';
	 }else{
		echo '<input type="text" name="branch" id="branch" value="'.$kcabang.'" size="6" maxlength="4" readonly/>';
	}
	?>
	<div id="shortcut">
		<a title="Neraca Harian" onClick="goNeraca()"><img src="images/short1.png"><br>Neraca Harian</a>
		<a title="Neraca Perbandingan Harian" onClick="goNeracab()"><img src="images/short2.png"><br>Neraca %</a>
		<a title="Laba Rugi Harian" onClick="goLabaRugi()"><img src="images/short1.png"><br>SHU Harian</a>
		<a title="Laba Rugi Perbandingan Harian" onClick="goLabaRugib()"><img src="images/short2.png"><br>SHU Harian %</a>
		<a title="Neraca Lajur Harian" onClick="goNeracal()"><img src="images/short1.png"><br>Neraca Lajur</a>
		<a title="Junal Kas dan Memorial" onClick="goJurnal()"><img src="images/short3.png"><br>Jurnal Transaksi</a>
		<a title="Posisi Saldo Harian" onClick="goPosisi()"><img src="images/short4.png"><br>Posisi Saldo</a>
		<a title="Laporan Arus Kas Harian" onClick="goArusKas()"><img src="images/short5.png"><br>Arus Kas</a>
	</div>
</div>
<div><button id="btn"> PDF</button></div>
<div id="divPageNeraca"></div>