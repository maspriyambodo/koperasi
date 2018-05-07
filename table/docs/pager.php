
	<link rel="stylesheet" href="../themes/blue/style.css" type="text/css" media="print, projection, screen" />
	<script type="text/javascript" src="../jquery-latest.js"></script>
	<script type="text/javascript" src="../jquery.tablesorter.js"></script>
	<script type="text/javascript" src="../addons/pager/jquery.tablesorter.pager.js"></script>
	<script type="text/javascript">
	$(function() {
		$("table")
			.tablesorter({widthFixed: true, widgets: ['zebra']})
			.tablesorterPager({container: $("#pager")});
	});
	</script>

<?php
include '../../h_tetap.php';
$nonas='FRAN';
$hasil=$result->query_x("select a.id,a.branch,a.nonas,a.nopen,a.sufix,a.norek,a.tglahir,a.noktp,a.saldoa,b.nama FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.nonas LIKE '%$nonas%' OR a.norek LIKE '%$nonas%' OR b.nama LIKE '%$nonas%' OR a.nopen LIKE '%$nonas%' ORDER BY b.nama",'');$no=1;
echo '<div id="main">
<table cellspacing="1" class="tablesorter">
<thead>
	<tr>
		<th>No</th>
		<th>No Nasabah</th>
		<th>No Rekening</th>
		<th>Nopen</th>
		<th>Nama</th>
		<th>No KTP</th>
		<th>Tgl Lahir</th>
		<th>Saldo Akhir</th>
		<th>Aksi</th>
	</tr>
</thead>
<tfoot>
	<tr>
		<th>No</th>
		<th>No Nasabah</th>
		<th>No Rekening</th>
		<th>Nopen</th>
		<th>Nama</th>
		<th>No KTP</th>
		<th>Tgl Lahir</th>
		<th>Saldo Akhir</th>
		<th>Aksi</th>
	</tr>
</tfoot>
<tbody>';
if($result->num($hasil)!=0){
	while($row = $result->row($hasil)){ 
		if($no %  2){
			$clsname="even";
		}else{
			$clsname="odd";
		}
		echo '<tr class="'.$clsname.'">
		<td>'.$no.'</td>
		<td>'.$row['branch'].'-'.$row['nonas'].'-'.$row['sufix'].'</td>
		<td>'.$row['norek'].'</td>
		<td>'.$row['nopen'].'</td>
		<td>'.$row['nama'].'</td>
		<td>'.$row['noktp'].'</td>
		<td>'.$row['tglahir'].'</td>
		<td>'.number_format($row['saldoa']).'</td>
		<td align="center"><a title="Detail Data Kredit" class="icon-more" onClick="showEdit('.$row['id'].')">Detail</a></td>
		</tr>';
		$no++;
	}
}else{
	echo '<tr><td align="center" colspan="10" style="color: #ff0000">Data tidak ditemukan!</td></tr>';
}
echo '</tbody>
</table>';
?>
<div id="pager" class="pager">
	<form>
		<img src="../table/addons/pager/icons/first.png" class="first"/>
		<img src="../table//addons/pager/icons/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="../table//addons/pager/icons/next.png" class="next"/>
		<img src="../table/addons/pager/icons/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected"  value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option  value="40">40</option>
		</select>
	</form>
</div>

</div>

