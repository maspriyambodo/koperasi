<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script> 
<script type="text/javascript" src="java/newsaveopen.js"></script>
<script type="text/javascript">
	var url ="newsaveopen.php";
	var urls ='newsaveopen01.php';
	$(document).ready(function() {
		$("#tampil").hide();
		$('#tableData').paging({limit:20});
		$("#kode_buka").change(function() {
			var kode_buka=$("#kode_buka").val();
			if(kode_buka==0){
				$("#tampil").hide();
				$("#norek").val('');
			}else{
				$("#tampil").show();
				$("#norek").val('');
			}
		});
	});
</script>
<?php
$nonas = $result->c_d($_POST['nonas']);$result->data_nasabah($kcabang,$nonas);$text="SELECT a.id,a.branch,a.nonas,a.nama,DATE_FORMAT(a.tgllahir,'%d-%m-%Y') as tgllahir,a.alamat,a.lurah,a.camat,a.noktp,b.norek,b.sufix,b.kdaktif,b.produk FROM $tabel_nasabah a LEFT JOIN $tabel_tabungan b ON a.nonas=b.nonas WHERE a.branch='$kcabang' AND a.nonas LIKE '%$nonas%' ORDER BY nonas,sufix";$hasil=$result->query_cari($text);$row=$result->row($hasil);$branch=$row['branch'];$nonas=$row['nonas'];$nama=$row['nama'];$tgllahir=$row['tgllahir'];$alamat=$row['alamat'].' KEL '.$row['lurah'].' KEC '.$row['camat'];$noktp=$row['noktp'];$kode_buka=0;$norek='';$hasil=$result->res($text);
?>
<table id="tableData" class="table">
	<thead >
		<tr>
			<th>No</th>
			<th>Branch</th>
			<th>Nonas</th>
			<th>Sufix</th>
			<th>Norek</th>
			<th>Nama</th>
			<th>No KTP</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1;
		while($row = $result->row($hasil)){ ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['branch']; ?></td>
				<td><?php echo $row['nonas']; ?></td>
				<td><?php echo $row['sufix']. ' ['.$row['produk'].' ]'; ?></td>
				<td><?php echo $row['norek']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['noktp']; ?></td>
				<td> <?php 
					if($row['kdaktif']==0){
						if($row['sufix']==''){
							echo 'No Account';
						}else{
							echo 'Account Disable';
						}
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
		?>
	</tbody>
</table>
<form id="masuk" name="masuk" method="POST" action="">
	<input type="hidden" name="nonas" id="nonas" value="<?php echo $nonas;?>" />
	<input type="hidden" name="branch" id="branch" value="<?php echo $branch;?>" />
	<table width="100%">
		<tr>
			<th colspan="4" class="ui-state-highlight">DATA NASABAH</th>
		</tr>
		<tr>
			<td width="25%">Branch</td>
			<td width="25%">: <?php echo $branch.'-'.$nonas;?></td>
			<td width="25%">Nama</td>
			<td width="25%">: <?php echo $nama;?></td>
		</tr>
		<tr>
			<td>Nomor KTP</td>
			<td>: <?php echo $noktp;?></td>
			<td>Tanggal Lahir</td>
			<td>: <?php echo $tgllahir;?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td colspan="3">: <?php echo $alamat;?></td>
		</tr>
		<tr>
			<th colspan="4" class="ui-state-highlight">PEMBUKAAN REKENING</th>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Pajak</td>
			<td>: 
				<select name="kode_pajak" id="kode_pajak">
					<?php 
					$kode_pajak=0;
					$huruf = array("YA","TIDAK");$i = 0;
					while($i < 2){
						if($kode_pajak== $i){
							echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
						}else{
							echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
						}
						$i++;
					} ?>
				</select>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Jenis Produk</td>
			<td>: 
				<select name="produk" id="produk">
					<?php
					$_produkt='TPN';
					$hasil=$result->res("SELECT kdproduk,nmproduk FROM $tabel_produkt  ORDER BY kdproduk");
					while ($row=$result->row($hasil)){
						if($_produkt==$row['kdproduk']){
							echo "<option value=".$row['kdproduk'].">".$row['kdproduk'].' - '.$row['nmproduk']."</option>";
						}else{
							echo "<option value=".$row['kdproduk'].">".$row['kdproduk'].' - '.$row['nmproduk']."</option>";
						}
					}
					?>
				</select>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Pembukaan Rekening</td>
			<td>: 
				<select name="kode_buka" id="kode_buka">
					<?php 
					$huruf = array("OUTOMATIS","MANUAL");$i = 0;
					while($i < 2){
						if($kode_buka== $i){
							echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
						}else{
							echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
						}
						$i++;
					} ?>
				</select>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr id="tampil">
			<td>&nbsp;</td>
			<td>Nomor Rekening</td>
			<td>: <input  type="text" name="norek" id="norek" size="17"  maxlength="13"/></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	<div class="ui-widget-content" align="center">
		<input type="submit" value="Simpan" id="submit" class="icon-save"/>
		<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
	</div>
</form>