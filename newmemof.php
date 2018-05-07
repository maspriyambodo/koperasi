<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jS/_memorial.js"></script>
<script type="text/javascript" src="jQuery/jquery.autotab.min.js"></script>
<script TYPE="text/javascript">
	$("#lookupx").lookupbox({
		title: 'Daftar Rekening',
		kodecabang: $("#xcabang").val(),
		url	 : './dist/_lookup_rekening.php?chars=',
		imgLoader: '<img src="./images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=branch_]').val(data.branch);
			$('input[name=nonas_]').val(data.nonas);
			$('input[name=sufix_]').val(data.sufix);
			$('input[name=nama]').val(data.nama);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
	});
	$("input#text2").focus();
	$(function() {
		$.autotab({tabOnSelect: true});
		$('.number').autotab('filter', 'number');
		$('.text').autotab('filter', 'text');
		$('#function').autotab('filter', function(value, element) {
		    var parsedValue = parseInt(value, 10);
		    if (!value || parsedValue != value) {return '';};
		    var newValue = element.value + value;
		    if (newValue > 12) {
		        $.autotab.next();
		        return 2;
		    } else if (element.value.length == 0 && value > 1) {
		        $.autotab.next();
		        return value;
		    } else if (element.value.length == 1 && parsedValue === 0 && newValue != 10) {
		        $.autotab.next();
		        return 1;
		    };
		    return value;
		});
	});
	$("#lookupx").button({
		text: false,icons: {primary: 'ui-icon-circle-plus'}
	});
	 $('#simpan').button({
	 	text: true,icons: {primary: 'ui-icon-disk'}
	});
</script>
<?php 
$noreferr=$result->c_d($_POST['nonas']);$norefer='M'.substr('0000'.$noreferr,-4);$id=0;$text1=$kcabang;$text2='';$text3='360';
echo '<div id="divPageList">
<input name="xcabang" id="xcabang" type="hidden" value="'.$kcabang.'"/>
<input name="limitk" id="limitk" type="hidden" value="'.$limitk.'"/>
<input name="limitd" id="limitd" type="hidden" value="'.$limitd.'"/>
<input name="nonas" id="nonas" type="hidden" value="'.$noreferr.'"/>
<form id="masuk" name="masuk" method="POST" action="">
	<input name="id" id="id" type="hidden" value="'.$id.'"/>
	<input name="norefer" id="norefer" type="hidden" value="'.$norefer.'"/>
	<table align="center">
		<tr>
		<td>NO REKENING</td><td>
			<input type="text" name="branch_" id="text1" size="5" maxlength="4" value="'.$text1.'" required autocomplete="off" onblur="blurFunction()"/>
			<input type="text" name="nonas_" id="text2" size="8" maxlength="6" value="'.$text2.'" class="norek" required autocomplete="off" onblur="blurFunction()"/>
			<input type="text" name="sufix_" id="text3" size="4" maxlength="3" value="'.$text3.'" required autocomplete="off" onblur="blurFunction()"/>
			<button type="button" id="lookupx">&nbsp;</button>
		</td>
		</tr><tr>
		<td>NAMA</td><td><input name="nama" id="nama" type="text" size="60" maxlength="35" readonly /></td>
		</tr><tr>
		<td>KODE TRANSAKSI</td><td>'; 
		$hasil=$result->res("SELECT kdtran,nama FROM kdtran ORDER BY nama");echo '
		<select name="kdtran" id="kdtran">
			<option value=""></option>'; 
			while ($row=$result->row($hasil)){ 
				echo '<option value="'.$row['kdtran'].'">'.$row['kdtran'].' '.$row['nama'].'</option>'; 
			} echo '
		</select></td>
		</tr><tr>
		<td>TANGGAL</td><td><input name="tgl" type="text" id="tgl" size="25" maxlength="15" value="'.$tanggal.'" readonly/></td>
		</tr><tr>
		<td>JUMLAH</td>
		<td><input style="text-align:right;" name="jumlah" type="text" id="jumlah" size="25" maxlength="15" value=""/></td>
		</tr><tr>
		<td>KETERANGAN</td>
		<td><textarea name="kete" id="kete" form="masuk" style="width:350px;height: 40px;" maxlength="90"></textarea></td>
		</tr>
	</table>
	<div class="ui-widget-content" align="center"><button type="button" id="simpan">Simpan</button></div>
</form>';
$hasil=$result->res("SELECT id,branch,nonas,sufix,norek,oper,noreferensi,keterangan,tanggal,kdtran,jumlah,nama FROM $tabelTransaksi WHERE oper='$userid' AND noreferensi='$norefer' AND tanggal='$t'");
if($result->num($hasil)>0){
	echo '<br/>
	<div id="divPageListt" style="width:100%;overflow: auto;">
		<table class="table" width="100%">
			<thead>
				<tr class="td" bgcolor="#e5e5e5"><th>NONAS</th><th>NOREK</th><th>NAMA</th><th>DEBET</th><th>KREDIT</th><th>KETERANGAN</th><th>NO REFERENSI</th><th>AKSI</th></tr>
			</thead>
			<tbody>';
				$debet=0;$kredit=0; 
				while ($row=$result->row($hasil)){ echo '
					<tr>
					    <td>'.$row['branch'].'-'.$row['nonas'].'-'.$row['sufix'].'</td>
					    <td>'.$row['norek'].'</td>
					    <td>'.$row['nama'].'</td>'; 
					    if (substr($row['kdtran'],0,1)=='3'){ 
					    	echo '
					    	<td align="right">'.number_format($row['jumlah']).'</td>
					    	<td>&nbsp;</td>'; $debet=$debet+$row['jumlah']; 
					    }else{
					    	echo '
					    	<td>&nbsp;</td>
					    	<td align="right">'.number_format($row['jumlah']).'</td>'; $kredit=$kredit+$row['jumlah'];
					    }
					    echo '
					    <td>'.$row['keterangan'].'</td>
					    <td>'.$row['noreferensi'].' / Kode Transaksi : '.$row['kdtran'].'</td>
					    <td align="center">
					        <a title="Edit Data" class="icon-remove" onClick="showEditt('.$row['id'].')">Delete</a>
					        <a title="Edit Data" class="icon-edit" onClick="showEdit('.$row['id'].')">Edit</a>
					    </td>
					</tr>';
				} 
				echo '
				<tr>
					<td colspan="3" align="center">JUMLAH</td>
			    	<td align="right">'.number_format($debet).'</td>
			    	<td align="right">'.number_format($kredit).'</td>
			    	<td colspan="3" align="center">&nbsp;</td>
			    </tr>
		    </tbody>
	    </table>
    </div>'; 
} echo '</div>
<div id="dialog-form" title="Otorisasi">
	<table>
		<tr><td>User Name</td><td>: <input type="text" name="nmuser" id="nmuser" onKeyUp="caps(this)"/></td></tr>
		<tr><td>Password</td><td>: <input type="password" name="password" id="password"/></td></tr>
	</table>
</div>'; ?>