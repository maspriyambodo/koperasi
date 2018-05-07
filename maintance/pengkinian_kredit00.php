<?php include '../h_tetap.php';?>
<script type="text/javascript" src="js/pengkinian_kredit.js"></script>
<script type="text/javascript" src="js/_tambah_iconx.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<?php $norek=$result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);$hasil=$result->query_lap("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.nocitra,a.noreks,a.nopen,a.pekerjaan,a.umur,a.nmwaris,a.tglahirw,a.jenis,a.jenis1,a.kdjiwa,a.nokarip,a.nodapem,a.kdbyr,a.kkbayar,a.nmbayar,a.kdkop,a.produk,a.deb1,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa,a.nomi,a.tgtran,a.jangka,a.suku,a.anuitas,a.hitbunga,a.tbunga,a.flunas,a.kdpremi,a.kdgol,a.kdjamin,a.kdsektor,a.jkredit,a.skredit,a.kdguna,a.gaji,a.self1,a.self2,a.self3,a.pbank,a.plain,a.kdsales,a.arekom,a.nrekom,a.trekom,a.lrekom,a.krekom,a.brekom,a.nktprekom,a.tktprekom,a.nmsid,a.ketnas,a.kketnas,a.kolek,a.ketkolek,a.instansi_pensiun,a.pengelola_pensiun,a.no_aso_bank,a.no_cif_bank,a.bank_transfer,a.nama_transfer,a.rekening_transfer,a.mitra_cheking,a.kdpin,b.nama,b.noktp,b.tgllahir,b.alamat,b.lurah,b.camat,b.kota,b.kdpos FROM kredit a JOIN nasabah b ON a.nonas=b.nonas WHERE a.norek='$norek' AND a.branch='$branch'");$row=$result->row($hasil);$kota= $row['kota'];$nama=$row['nama'];$kdpos= $row['kdpos'];$sufixl='';$norekl='';$produk=$row['produk'];$branch=$row['branch'];$nonas=$row['nonas'];$sufix=$row['sufix'];$alamat= $row['alamat'];$lurah= $row['lurah'];$camat= $row['camat'];$norek=$row['norek'];$nopen=$row['nopen'];$noktp=$row['noktp'];$tglahir=date_sql($row['tgllahir']);$umur=$row['umur'];$tgtran=$row['tgtran'];$nomi=$row['nomi'];$jangka=$row['jangka'];$kdkop=$row['kdkop'];$kolek=$row['kolek'];$kkbayar=$row['kkbayar'];$nmbayar=$row['nmbayar'];$suku=$row['suku'];$saldox=$row['saldoa'];
echo '<div class="ui-widget-content">';
include "../maintance/pengkinian_kredit22.php";
echo '</div>
<div id="koreksisaldo" style="display: none">
	<form id="editmasuk" name="editmasuk" method="POST" action="">
		<input name="id" type="hidden" id="id" value="'.$row['id'].'"/>
		<table align="center">
			<tr>
				<td align="right">Saldo Awal :</td>
				<td><input style="text-align:right" name="saldoawal" type="text" id="saldoawal" value="'.$row['saldo'].'"/></td>
			</tr>
			<tr>
				<td align="right">Mutasi Debet Kas :</td>
				<td><input style="text-align:right" name="mutdebet" type="text" id="mutdebet" value="'.$row['mutdeb'].'"/></td>
			</tr>
			<tr>
				<td align="right">Mutasi Kredit Kas :</td>
				<td><input style="text-align:right" name="mutkredit" type="text" id="mutkredit" value="'.$row['mutkre'].'"/></td>
			</tr>
			<tr>
				<td align="right">Mutasi Debet Memorial :</td>
				<td><input style="text-align:right" name="memdebet" type="text" id="memdebet" value="'.$row['memdeb'].'"/></td>
			</tr>
			<tr>
				<td align="right">Mutasi Kredit Memorial</td>
				<td><input style="text-align:right" name="memkredit" type="text" id="memkredit" value="'.$row['memkre'].'"/></td>
			</tr>
			<tr>
				<td align="right">Saldo Akhir :</td>
				<td><input style="text-align:right" name="saldoakhir" type="text" id="saldoakhir" value="'.$row['saldoa'].'"/></td>
			</tr>
		</table>
	</form>
</div>';
?>