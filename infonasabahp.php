<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" src="parameter/tabel_sort.js"></script>
<?php
$nonas=$result->c_d($_POST['nonas']);
if(strlen($nonas)<3) $result->msg_error('Kriteria Pencairan Minimal 2 Karakter');
$hasil = $result->query_lap("SELECT id,branch,nonas,nama,DATE_FORMAT(tgllahir,'%d-%m-%Y') as tgllahir,alamat,lurah,camat,noktp FROM $tabel_nasabah WHERE nonas LIKE '%$nonas%' OR nama LIKE '%$nonas%' OR noktp LIKE '%$nonas%' ORDER BY nonas,nama");
$no=1;
echo '
<div class="ui-widget-content">
<div style="white-space: nowrap;">
	<table class="tablesorter">
		<thead>
			<tr>
				<th>Nonas</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Kelurahan</th>
				<th>Kecamatan</th>
				<th>No KTP</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Nonas</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Kelurahan</th>
				<th>Kecamatan</th>
				<th>No KTP</th>
				<th>Aksi</th>
			</tr>
		</tfoot>
		<tbody>';
			while($row = $result->row($hasil)){ 
				if($no %  2){
					$clsname="even";
				}else{
					$clsname="odd";
				}
				echo '
				<tr class="'.$clsname.'">
					<td>'.$row['branch'].'-'.$row['nonas'].'</td>
					<td>'.$row['nama'].'</td>
					<td>'.$row['alamat'].'</td>
					<td>'.$row['lurah'].'</td>
					<td>'.$row['camat'].'</td>
					<td>'.$row['noktp'].'</td>
					<td align="right"><a class="icon-more" onClick="showEdit('.$row['id'].')">Detail</a></td>
				</tr>';
				$no++;
			}
			echo '
		</tbody>
	</table>
</di>';
?>
<div id="pager" class="pager">
  <form>
    <img src="css/images/first.gif" class="first"/>
    <img src="css/images/prev.gif" class="prev"/>
    <span class="pagedisplay" data-pager-output-filtered="{startRow:input} &ndash; {endRow}/{filteredRows} of {totalRows} total rows"></span>
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
</div>