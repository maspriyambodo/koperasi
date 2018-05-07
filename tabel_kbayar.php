<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/parameterx.js"></script>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" src="parameter/tabel_sort.js"></script>
<script TYPE="text/javascript">
	url1="tabel_kbayar01.php";
	url2="tabel_kbayar02.php?p=1";
	url3="tabel_kbayar02.php?p=2";
	url4="tabel_kbayar.php";
	uhead='DATA TABEL KANTOR BAYAR';
	lebar=550;
	tinggi=300;	
</script>
<?php 
$hasil=$result->query_x1("SELECT id,branch,kd,nmkb FROM $tabel_kkb ORDER BY kd");$no=1;
?>
<button id="tambah">Tambah Kantor Bayar</button>
<div class="ui-widget-content">
<div id="divPageHasil">
<div style="white-space: nowrap;">
	<table class="tablesorter">
		<thead>
			<tr>
				<th>Branch</th>
				<th>Kode Kantor</th>
				<th>Nama Kantor</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Branch</th>
				<th>Kode Kantor</th>
				<th>Nama Kantor</th>
				<th>Aksi</th>
			</tr>			
		</tfoot>
		<tbody><?php
		if($result->num($hasil)!=0){
			while($row = $result->row($hasil)){ ?>
				<tr>
					<td><?php echo $row['branch'];?></td>
					<td><?php echo $row['kd'];?></td>
					<td><?php echo $row['nmkb'];?></td>
					<td align="center">
					<a title="Edit Data" class="standar" onClick="showEdit(<?php echo $row['id']; ?>)"><img src="css/images/edit.png"></a>
					<a title="Menghapus Data" class="standar" onClick="showDelete(<?php echo $row["id"]; ?>)"><img src="css/images/delete.png"></a>
					</td>
			  	</tr> <?php
			 	$no++;
			}
		}else{
			echo '<tr><td align="center" colspan="4" style="color: #ff0000">Data tidak ditemukan!</td></tr>';
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