<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" src="parameter/tabel_sort.js"></script>
<?php $nonas=$result->c_d($_POST['nonas']);if(strlen($nonas)<3) $result->msg_error('Kriteria Pencairan Minimal 2 Karakter');$hasil=$result->query_x1("select a.id,a.branch,a.nonas,a.nopen,a.sufix,a.norek,a.tglahir,a.noktp,a.saldoa,b.nama FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.nonas LIKE '%$nonas%' OR a.norek LIKE '%$nonas%' OR b.nama LIKE '%$nonas%' OR a.nopen LIKE '%$nonas%' ORDER BY b.nama");$no=1;echo '
<div class="ui-widget-content">
<table class="tablesorter">
<thead>
	<tr>
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
		<td>'.$row['branch'].'-'.$row['nonas'].'-'.$row['sufix'].'</td>
		<td><a style="cursor: pointer;" onClick="showPayment('.$row['id'].')">'.$row['norek'].'</a></td>
		<td>'.$row['nopen'].'</td>
		<td>'.$row['nama'].'</td>
		<td>'.$row['noktp'].'</td>
		<td>'.$row['tglahir'].'</td>
		<td align="right">'.number_format($row['saldoa']).'</td>
		<td align="center"><a title="Detail Data Kredit" class="icon-more" onClick="showEdit('.$row['id'].')">Detail</a></td>
		</tr>';
		$no++;
	}
}else{echo '<tr><td align="center" colspan="8" style="color: #ff0000">Data tidak ditemukan!</td></tr>';}
echo '</tbody></table></di>'; ?>
<div id="pager" class="pager">
  <form>
    <img src="css/images/first.gif" class="first"/>
    <img src="css/images/prev.gif" class="prev"/>
    <span class="pagedisplay" data-pager-output-filtered="{startRow:input} &ndash; {endRow} / {filteredRows} of {totalRows} total rows"></span>
    <img src="css/images/next.gif" class="next"/>
    <img src="css/images/last.gif" class="last"/>
    <select class="pagesize">
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="30">30</option>
      <option value="40">40</option>
      <option value="all">All Rows</option>
    </select>
  </form>
</div>

