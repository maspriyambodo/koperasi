<?php include 'h.php';?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn').hide();
		$( "#btn" ).button().on( "click", function() {
			var cetak=$('#cetak').val();
			var bln= $("#bln").val();
			var thn= $("#thn").val();
			var branch= $("#branch").val();
			var dataString=cetak+'.php?bln='+bln+'&branch='+branch+'&thn='+thn+'&p=2';
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
		var bln = $("#bln").val();
		var thn = $("#thn").val();
		var branch= $("#branch").val();
		var dataString='bln='+bln+'&branch='+branch+'&thn='+thn+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi110.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi110");
			}
		});
	}
	function goNeracab() {
		var bln 	= $("#bln").val();
		var thn 	= $("#thn").val();
		var branch= $("#branch").val();
		var dataString='bln='+bln+'&branch='+branch+'&thn='+thn+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi210.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi210");
			}
		});
	}
	function goLabaRugib() {
		var bln 	= $("#bln").val();
		var thn 	= $("#thn").val();
		var branch= $("#branch").val();
		var dataString='bln='+bln+'&branch='+branch+'&thn='+thn+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi410.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi410");
			}
		});
	}
	function goLabaRugi() {
		var bln 	= $("#bln").val();
		var thn 	= $("#thn").val();
		var branch= $("#branch").val();
		var dataString='bln='+bln+'&branch='+branch+'&thn='+thn+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi310.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi310");
			}
		});
	}
	function goNeracal() {
		var bln 	= $("#bln").val();
		var thn 	= $("#thn").val();
		var branch= $("#branch").val();
		var dataString='bln='+bln+'&branch='+branch+'&thn='+thn+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi810.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi810");
			}
		});
	}
	function goPosisi() {
		var bln 	= $("#bln").val();
		var thn 	= $("#thn").val();
		var branch= $("#branch").val();
		var dataString='bln='+bln+'&branch='+branch+'&thn='+thn+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi610.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi610");
			}
		});
	}
	function goJurnal() {
		var bln 	= $("#bln").val();
		var thn 	= $("#thn").val();
		var branch= $("#branch").val();
		var dataString='bln='+bln+'&branch='+branch+'&thn='+thn+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi510.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi510");
			}
		});
	}
	function goArusKas() {
		var bln 	= $("#bln").val();
		var thn 	= $("#thn").val();
		var branch= $("#branch").val();
		var dataString='bln='+bln+'&branch='+branch+'&thn='+thn+'&p=1';
		$.ajax({
			url: 'akuntansi/akuntansi910.php',
			type: "GET",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageNeraca').html(data);
				$('#loading').hide();
				$('#btn').show();
				$('#cetak').val("akuntansi910");
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
<?php 
$bln=date('m',strtotime($tanggal));
$thn=date('Y',strtotime($tanggal));
?>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetak" name="cetak"/>
	BULAN
	<select name="bln" id="bln" style="width: 130px" >
		<?php $bln_x1=$blnxxx;include 'form_bulan.php';?>
	</select>
	<select name="thn" id="thn"  style="width: 80px" >
		<?php $thn_x1=$thnxxx;include 'form_tahun.php';?>
	</select>
	<?php
	if($level<3 OR $level==6){
		echo '<select name="branch" id="branch">';
		$hasil = $result->res("select kode,nama from tblkantor order by kode");
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
		<a title="Neraca Harian" onClick="goNeraca()"><img src="images/short1.png"><br>Neraca Bulanan</a>
		<a title="Neraca Perbandingan Harian" onClick="goNeracab()"><img src="images/short2.png"><br>Neraca %</a>
		<a title="Laba Rugi Harian" onClick="goLabaRugi()"><img src="images/short1.png"><br>SHU Bulanan</a>
		<a title="Laba Rugi Perbandingan Harian" onClick="goLabaRugib()"><img src="images/short2.png"><br>SHU Bulanan %</a>
		<a title="Neraca Lajur Harian" onClick="goNeracal()"><img src="images/short1.png"><br>Neraca Lajur</a>
		<a title="Junal Kas dan Memorial" onClick="goJurnal()"><img src="images/short3.png"><br>Jurnal Transaksi</a>
		<a title="Posisi Saldo Harian" onClick="goPosisi()"><img src="images/short4.png"><br>Posisi Saldo</a>
		<a title="Laporan Arus Kas Harian" onClick="goArusKas()"><img src="images/short5.png"><br>Arus Kas</a>
	</div>
</div>
<div><button id="btn"> PDF</button></div>
<div id="divPageNeraca"></div>
