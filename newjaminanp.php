<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script TYPE="text/javascript">
$(document).ready(function(){
	$('#tombol').click(function(){
		var id= $("#id").val();
		var kdskep= $("#kdskep").val();
		$.ajax({
			type:"GET",
			url:"newjaminanb.php",
			data:'id='+id+'&kdskep='+kdskep,
			beforeSend: function(){
				$('#loading').show();
			},
			success: function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
			}
		});
	});
});
</script>
<?php $norek=$result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);$hasil=$result->query_lap("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.nopen,a.tgtran,a.jangka,a.suku,a.kdkop,a.nomi,a.saldoa,a.kolek,a.noktp,a.tglahir,a.umur,a.kkbayar,a.nmbayar,a.kdskep,a.ketnas,a.produk,a.nosk,a.pensk,a.tgsk,a.tgpjk,a.tgstnk,a.agunan1,a.agunan2,a.agunan3,a.agunan4,a.agunan5,a.agunan6,b.nama,b.alamat,b.lurah,b.camat,b.kota,b.kdpos FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.norek='$norek' AND a.branch='$branch' LIMIT 1");$row = $result->row($hasil);$branch=$row['branch'];$nonas=$row['nonas'];$norek=$row['norek'];$sufix=$row['sufix'];$saldoa=$row['saldoa'];$nomi=$row['nomi'];$suku=$row['suku'];$jangka=$row['jangka'];$kdkop=$row['kdkop'];$ketnas=$row['ketnas'];$tgtran=date_sql($row['tgtran']);$tglahir=date_sql($row['tglahir']);$nama=$row['nama'];$noktp=$row['noktp'];$alamat=$row['alamat'];$lurah=$row['lurah'];$camat=$row['camat'];$kota=$row['kota'];$kdpos=$row['kdpos'];$kolek=$row['kolek'];$nopen=$row['nopen'];$noktp=$row['noktp'];$saldox=$row['saldoa'];$kdskep=$row['kdskep'];$produk=$row['produk'];$umur=$row['umur'];$kkbayar=$row['kkbayar'];$nmbayar=$row['nmbayar'];$norekl='';echo '<div class="ui-widget-content">
<table width="100%" class="table">
	<tr><th colspan="4" class="ui-state-highlight">DATA DEBITUR</th></tr>';
	include '_headerx.php';
	echo '
	<tr><td colspan="4" align="center" class="ui-state-highlight"><strong>DATA JAMINAN LAMA</strong></td></tr>';
	if($kdskep==0){ echo'
		<tr>
			<td align="right">Nomor Skep Pensiun :</td><td>'.$row['nosk'].'</td>
			<td align="right">Penerbit Skep Pensiun :</td><td>'.$row['pensk'].'</td>
		</tr>
		<tr>
			<td align="right">Tanggal SkepPensiun :</td><td>'.date_sql($row['tgsk']).'</td>
			<td colspan="2">&nbsp;</td>
		</tr>';
	}elseif($kdskep==1){ echo '
		<tr>
			<td align="right">Nomor Skep Pegawai :</td><td>'.$row['nosk'].'</td>
			<td align="right">Penerbit Skep Pegawai :</td><td>'.$row['pensk'].'</td>
		</tr>
		<tr>
			<td align="right">Tanggal Skep Peagawai :</td><td>'.date_sql($row['tgsk']).'</td>
			<td colspan="2">&nbsp;</td>
		</tr>';
	}elseif($kdskep==2){ echo '
		<tr>
			<td align="right">Nomor BPKB :</td><td>'.$row['nosk'].'</td>
			<td align="right">Pembuat BPKP :</td><td>'.$row['pensk'].'</td>
		</tr>
		<tr>
			<td align="right">Tanggal BPKP :</td><td>'.date_sql($row['tgsk']).'</td>
			<td align="right">DB / Tahun Pembuatan :</td><td>'.$row['agunan1'].'</td>
		</tr>
		<tr>
			<td align="right">Nomor Rangka :</td><td>'.$row['agunan2'].'</td>
			<td align="right">Nomor Mesin :</td><td>'.$row['agunan3'].'</td>
		</tr>
		<tr>
			<td align="right">Type / Model :</td><td>'.$row['agunan4'].'</td>
			<td align="right">NO STNK :</td><td>'.$row['agunan5'].'</td>
		</tr>
		<tr>
			<td align="right">Tgl Berlaku STNK :</td><td>'.date_sql($row['tgstnk']).'</td>
			<td align="right">Tgl Berakhir Pajak :</td><td>'.date_sql($row['tgpjk']).'</td>
		</tr>';
	}elseif($kdskep==3){ echo '
		<tr>
			<td align="right">Nomor Sertifikat :</td><td>'.$row['nosk'].'</td>
			<td align="right">Pembuat Sertifikat :</td><td>'.$row['pensk'].'</td>
		</tr>
		<tr>
			<td align="right">Tanggal Sertifikat :</td><td>'.date_sql($row['tgsk']).'</td>
			<td align="right">Nama Notaris :</td><td>'.$row['agunan1'].'</td>
		</tr>
		<tr>
			<td align="right">Alamat Notaris :</td><td>'.$row['agunan2'].'</td>
			<td align="right">Luas Tanah/Bangunan :</td><td>'.$row['agunan3'].'</td>
		</tr>
		<tr>
			<td align="right">Pemilik :</td><td>'.$row['agunan4'].'</td>
			<td align="right">Alamat :</td><td>'.$row['agunan5'].'</td>
		</tr>';
	}elseif($kdskep==4){ echo '
		<tr>
			<td align="right">No Ijazah :</td><td>'.$row['nosk'].'</td>
			<td align="right">Pembuat Ijazah :</td><td>'.$row['pensk'].'</td>
		</tr><tr>
			<td align="right">Tanggal Ijazah :</td><td>'.date_sql($row['tgsk']).'</td>
			<td colspan="2">&nbsp;</td>
		</tr>';
	}elseif($kdskep==5){ echo '
		<tr>
			<td align="right">No Akte Nikah :</td><td>'.$row['nosk'].'</td>
			<td align="right">Pembuat Akte Nikah :</td><td>'.$row['pensk'].'></td>
		</tr><tr>
			<td align="right">Tanggal Pernikahan :</td><td>'.date_sql($row['tgsk']).'</td>
			<td colspan="2">&nbsp;</td>
		</tr>';
	}
	echo '
	<tr><td colspan="4" align="center">JAMINAN BARU :
	<select name="kdskep" id="kdskep" class="combobox">';
		$huruf = array("SK PENSIUN","SK PEGAWAI","BPKP KENDARAAN","SERTIFIKAT TANAH","IJASAH","AKTE NIKAH","TAMPA AGUNAN");
		$i = 0;
		while ($i < 7) {
			if ($kdskep == $i){
				echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
			}else{
				echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
			}
			$i++;
		} echo '
	</select>
	<input type="hidden" name="id" id="id" value="'.$row['id'].'"/>
	<input type="button" class="icon-add" id="tombol" value="KOREKSI DATA JAMINAN" title="Koreksi Data Jaminan"/>
	</td>
	</tr>
</table>
</div><div ID="divPageAkun"></div>'; ?>