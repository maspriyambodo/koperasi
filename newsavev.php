<?php include "h_tetap.php";?>
<script type="text/javascript" src="java/verivikasi.js"></script>
<script type="text/javascript">
	url1='newsavevs.php';
	url3='newsavev.php';
</script>
<div id="divPageData">
<a onclick="javascript:checkAll('kwitansi', true);" href="javascript:void();">Check all</a>
<a onclick="javascript:checkAll('kwitansi', false);" href="javascript:void();">Uncheck all</a>
<form name="kwitansi" id="kwitansi" method="post" action="">
	<table class="table-line">
		<thead>
			  <tr>
			  	<th>Pilih</th>
				<th>Branch</th>
				<th>Nonas</th>
				<th>Suffix</th>
				<th>Norek</th>
				<th>Nama</th>
				<th>No KTP</th>
				<th>Tgl Lahir</th>
				<th>Tgl Buka</th>
				<th>Produk</th>
				<th>Keterangan</th>
			  </tr>
		</thead>
		<tbody>
		<?php
		$hasil=$result->query_x1("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,DATE_FORMAT(a.tgbuka,'%d-%m-%Y %h:%i:%s') as tgbuka,DATE_FORMAT(a.tgtutup,'%d-%m-%Y %h:%i:%s') as tgtutup,a.kdaktif,a.produk,b.nama,b.noktp,DATE_FORMAT(b.tgllahir,'%d-%m-%Y') as tglahir FROM $tabel_tabungan a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.kdaktif=0 ORDER BY a.nonas,a.sufix");$no=1;
		if($result->num($hasil)!=0){
		while($row=$result->row($hasil)){ ?>
			<tr>
				<td align="center"><input type="checkbox" name="id[]" value="<?php echo $row["id"]; ?>" ></td>
				<td><?php echo $row['branch']; ?></td>
				<td><?php echo $row['nonas']; ?></td>
				<td><?php echo $row['sufix']; ?></td>
				<td><?php echo $row['norek']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['noktp']; ?></td>
				<td><?php echo $row['tglahir']; ?></td>
				<td><?php echo $row['tgbuka']; ?></td>
				<td><?php echo $row['produk']; ?></td>
				<td><?php 
					if($row['kdaktif']==0){
						echo 'Account Disable';
					}elseif($row['kdaktif']==1){
						echo 'Account Enable';
					}else{
						echo 'Account Close';
					}?>
				</td>
			</tr>
			<?php 
			$no++;
		}
		echo '<tr>
		<td colspan="2"><input type="submit" value="Update" id="submit" class="icon-save"/></td>
		<td colspan="10">&nbsp;</td>
		</tr>';
		}else{
			echo '<tr><td align="center" colspan="12" style="color: #ff0000">Data Nasabah Tidak Ditemukan!</td></tr>';
		}?>	
		</tbody>
	</table>
</form>	
</div>