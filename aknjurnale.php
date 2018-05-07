<?php include 'h.php';?>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn').hide();
	$( "#btn" ).button().on( "click", function() {
		var cetak = $('#cetak').val();
		var thn   = $("#thn").val();
		var branch= $("#branch").val();
		var dataString='aknpdf'+cetak+'.php?branch='+branch+'&thn='+thn;
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
function goNeracab() {
	var thn   =$("#thn").val();
	var branch= $("#branch").val();
	var dataString='branch='+branch+'&thn='+thn;
	$.ajax({
		url: 'akuntansi/akuntansi831.php',
		type: "GET",
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success:function(data){
			$('#divPageAkun').html(data);
			$('#loading').hide();
			$('#btn').show();
			$('#cetak').val("31");
		}
	});
}
function goNeracal() {
	var thn = $("#thn").val();
	var branch= $("#branch").val();
	var dataString='branch='+branch+'&thn='+thn;
	$.ajax({
		url : 'akuntansi/akuntansi832.php',
		type: "GET",
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success:function(data){
			$('#divPageAkun').html(data);
			$('#loading').hide();
			$('#btn').show();
			$('#cetak').val("32");
		}
	});
}
function goNeracap() {
	var thn = $("#thn").val();
	var branch= $("#branch").val();
	var dataString='branch='+branch+'&thn='+thn;
	$.ajax({
		url: 'akuntansi/akuntansi833.php',
		type: "GET",
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success:function(data){
			$('#divPageAkun').html(data);
			$('#loading').hide();
			$('#btn').show();
			$('#cetak').val("33");
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
		width:120px;
		text-align:center;
		color:#444;
		text-decoration:none;
		padding:5px;
		margin:0px 5px;
		box-shadow:1px 1px 3px #CCC;
	}	
	#shortcut a:hover {
		box-shadow:0px 0px 5px #555;
		cursor: pointer;
	}	
</style>
<table align="center" class="ui-widget-content">
	<tr>
		<input type="hidden" id="cetak" name="cetak"/>
		<td align="right">Branch</td><td> :
		<?php
		if($level<3 OR $level==6){
			echo '<select name="branch" id="branch" class="combobox">';
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
			echo '<input type="text" name="branch" id="branch" value="<?php echo $kcabang;?>" size="6" maxlength="4" readonly/>';
		}
		?>
		</td>
		<td align="right">Tahun</td>
		<td>: 
		 <input type="text" id="thn" name="thn" size="6" maxlength="4" value="<?php echo $thn;?>"/>
		</td>
	</tr>
</table>
<div id="shortcut">
	<a title="Jurnal Penutup Akhir Tahun" onClick="goNeracab()"><img src="images/short2.png"><br>Jurnal Penutup</a>
	<a title="Neraca Penutup Akhir Tahun" onClick="goNeracal()"><img src="images/short1.png"><br>Neraca Penutup</a>
	<a title="Neraca Lajur Penutup Akhir Tahun" onClick="goNeracap()"><img src="images/short1.png"><br>Neraca Lajur Penutup</a>
</div>
<div><button id="btn">PDF</button></div>
<div id="divPageAkun"></div>