<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/parameterx.js"></script>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" src="parameter/tabel_sort.js"></script>
<script TYPE="text/javascript">
	url1="tabel_sales01.php";
	url2="tabel_sales02.php?p=1";
	url3="tabel_sales02.php?p=2";
	url4="tabel_sales.php";
	uhead='DATA TABEL SALES';
	lebar=700;
	tinggi=500;
</script>
<?php
$hasil=$result->query_x1("SELECT id,branch,idsales,nama,alamat,notlp,tglmasuk,nosk FROM $tabel_sales ORDER BY idsales");
?>
<button id="tambah">Tambah Kode Sales</button>
<div id="divPageHasil">
<div class="ui-widget-content">
<div style="white-space: nowrap;">
	<table class="tablesorter">
		<thead>
			<tr><th>Branch</th><th>Kode Sales</th><th>Nama</th><th>Alamat</th><th>Telepon</th><th>Tgl Masuk</th><th>No SK</th><th>Aksi</th></tr>
		</thead>
		<tfoot>
			<tr><th>Branch</th><th>Kode Sales</th><th>Nama</th><th>Alamat</th><th>Telepon</th><th>Tgl Masuk</th><th>No SK</th><th>Aksi</th></tr>	
		</tfoot>
		<tbody><?php
		if($result->num($hasil)!=0){
		while($row = $result->row($hasil)){?>
			<tr>
				<td><?php echo $row['branch'];?></td>
				<td><?php echo $row['idsales'];?></td>
				<td><?php echo $row['nama'];?></td>
				<td><?php echo $row['alamat'];?></td>
				<td><?php echo $row['notlp'];?></td>
				<td><?php echo $row['tglmasuk'];?></td>
				<td><?php echo $row['nosk'];?></td>
				<td align="center">
				<a title="Edit Data" class="icon-edit13" onClick="showEdit(<?php echo $row['id']; ?>)">&nbsp;</a>
				<a title="Menghapus Data" class="icon-remove13" onClick="showDelete(<?php echo $row["id"]; ?>)">&nbsp;</a>
				</td>
			</tr>
		 	<?php
		 }
		}else{
			echo '<tr><td align="center" colspan="8" style="color: #ff0000">Data tidak ditemukan!</td></tr>';
		}?>
		</tbody>
	</table>
</div>	
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
</div>
</div>
<div id="dialog" style="display: none"></div>