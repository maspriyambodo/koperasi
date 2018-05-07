<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/parameterx.js"></script>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" src="parameter/tabel_sort.js"></script>
<script TYPE="text/javascript">
	url1="tabeluserf.php";
	url2="tabelusers.php?p=1";
	url3="tabelusers.php?p=2";
	url4="tabeluser.php";
	uhead='DATA TABEL USER';
	lebar=700;
	tinggi=500;
	function showEnable0(id) {
		var r = confirm("User Disable, Akan Di Offline...?");
		if (r == false) {
			return false;
		}
		var dataString='id='+id+'&p=4';
		$.ajax({
			type: "GET",
			url	: "tabelusers.php",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success	: function(data){
				$('#loading').hide();
				alert(data);
				var tes = data.search("Sukses");
				if(tes!=0){
					return false;
				}
				goKembali();
			}
		});
	}
	function showEnable1(id) {
		var r = confirm("User Offline, Akan Di Disable...?");
		if (r == false) {
			return false;
		}
		var dataString='id='+id+'&p=3';
		$.ajax({
			type: "GET",
			url	: "tabelusers.php",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success	: function(data){
				$('#loading').hide();
				alert(data);
				var tes = data.search("Sukses");
				if(tes!=0){
					return false;
				}
				goKembali();
			}
		});
	}
	function showEnable2(id) {
		var r = confirm("User Online, Akan Di Offline...?");
		if (r == false) {
			return false;
		}
		var dataString='id='+id+'&p=4';
		$.ajax({
			type: "GET",
			url	: "tabelusers.php",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success	: function(data){
				$('#loading').hide();
				alert(data);
				var tes = data.search("Sukses");
				if(tes!=0){
					return false;
				}
				goKembali();
			}
		});
	}
	function resetPwd(id) {
		var r = confirm("Anda Yakin Password User Ini Di Reset...?");
		if (r == false) {
			return false;
		}
		var dataString='id='+id+'&p=5';
		$.ajax({
			type: "GET",
			url	: "tabelusers.php",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success	: function(data){
				$('#loading').hide();
				alert(data);
				var tes = data.search("Sukses");
				if(tes!=0){
					return false;
				}
				goKembali();
			}
		});
	}	
</script>
<?php 
$hasil=$result->query_x1("SELECT id,userid,nama,branch,cabang,akses,hmenu,faddr,lastaktif,jmllogin,telepon,status FROM $tabel_user ORDER BY userid");$no=1;
?>
<button id="tambah">Tambah User</button>
<div class="ui-widget-content">
<div id="divPageHasil">
<div style="white-space: nowrap;">
	<table class="tablesorter">
		<thead>
			<tr><th>BRANCH</th><th>USER</th><th>NAMA</th><th>AKSES</th><th>MENU</th><th>IP ADDRES</th><th>LAST AKTIF</th><th>COUNT</th><th>STATUS</th><th align="center">MAINTANCE</th></tr>
		</thead>
		<tfoot>
			<tr><th>BRANCH</th><th>USER</th><th>NAMA</th><th>AKSES</th><th>MENU</th><th>IP ADDRES</th><th>LAST AKTIF</th><th>COUNT</th><th>STATUS</th><th align="center">MAINTANCE</th></tr>			
		</tfoot>
		<tbody><?php
		if($result->num($hasil)!=0){
			while($row = $result->row($hasil)){
				echo '
				<td>'.$row['branch'].' '.$row['cabang'].'</td>
				<td>'.$row['userid'].'</td>
				<td>'.$row['nama'].'</td>';
				if($row['akses']==0){
					echo '<td>PEMIMPIN</td>';
				}elseif($row['akses']==1){
					echo '<td>MANAGER</td>';
				}elseif($row['akses']==2){
					echo '<td>SUPERVISOR</td>';
				}elseif($row['akses']==3){
					echo '<td>STAF</td>';
				}elseif($row['akses']==4){
					echo '<td>ADMIN</td>';
				}else{
					echo '<td>AKUNTANSI</td>';
				}
				if($row['hmenu']==0){
					echo '<td>MENU KREDIT</td>';
				}elseif($row['hmenu']==1){
					echo '<td>MENU TABUNGAN</td>';
				}elseif($row['hmenu']==2){
					echo '<td>MENU TELLER</td>';
				}elseif($row['hmenu']==3){
					echo '<td>MENU DEPOSITO</td>';
				}elseif($row['hmenu']==4){
					echo '<td>MENU ADMIN</td>';
				}elseif($row['hmenu']==5){
					echo '<td>MENU PEJABAT</td>';
				}elseif($row['hmenu']==6){
					echo '<td>MENU AKUNTANSI</td>';
				}else{
					echo '<td>MENU PAYROLL</td>';
				}
				echo '
				<td align="right">'.$row['faddr'].'</td>
				<td align="right">'.$row['lastaktif'].'</td>
				<td align="right">'.$row['jmllogin'].'</td>';
				if($row['status']==1){
					echo '
					<td style="color: #4fbc43">
					<a title="Offline User ID" class="standar" onClick="showEnable2('.$row["id"].')"><img src="css/images/offf.png"></a>
					Online
					</td>';
				}elseif($row['status']==2){
					echo '	
					<td style="color:#f4e90b">
					<a title="Disable User ID" class="standar" onClick="showEnable1('.$row["id"].')"><img src="css/images/off.png"></a>
					Offline
					</td>';
				}else{
					echo '
					<td style="color:#ec0000">
					<a title="Offline User ID" class="standar" onClick="showEnable0('.$row["id"].')"><img src="css/images/offf.png"></a>
					Disable
					</td>';
				}
				echo '
				<td align="center">
				<a title="Edit User ID" class="standar" onClick="showEdit('.$row['id'].')"><img src="css/images/edit.png"></a>
				<a title="Hapus User ID" class="standar" onClick="showDelete('.$row["id"].')"><img src="css/images/delete.png"></a>
				<a title="Reset Password User ID" class="standar" onClick="resetPwd('.$row["id"].')"><img src="css/images/riset.png"></a></td>
				</tr>';
				$no++;
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