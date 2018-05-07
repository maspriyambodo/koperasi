<?php include 'h.php';?>
<script type="text/javascript" src="java/hanya_angka.js"></script>
<script TYPE="text/javascript">
	$(function(){
		$('#nlimit').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.',centsLimit: 0});
		$('#nlimitk').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.',centsLimit: 0});
	});
</script>
<?php $id=$result->c_d($_GET['id']);$hasil=$result->query_x1("SELECT id,userid,nama,nik,branch,akses,hmenu,plafon,plafonk,telepon,aktif_satu,status FROM $tabel_user WHERE id='$id' ORDER BY userid");$r=$result->row($hasil);
if($r['status']==1) die('User ID Sedang Online');?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
<table width="100%">
	<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
	<tr>
		<td width="15%">User ID</td>
			<?php 
			if($r['userid']==''){ ?>
				<td width="35%">: <input type="text" name="user_id" id="user_id" value="<?php echo $r['userid'];?>" maxlength="20" onKeyUp="caps(this)"/></td><?php
			}else{ ?>
				<td width="35%">: <input type="text" name="user_id" id="user_id" value="<?php echo $r['userid'];?>" maxlength="20" onKeyUp="caps(this)" readonly/></td><?php
			}
			?>
	</tr>
	<tr>
		<td width="15%">Nama User</td>
		<td width="35%">: <input type="text" name="nama" id="nama" value="<?php echo $r['nama'];?>" size="30" maxlength="40" onKeyUp="caps(this)"/></td>
	</tr>
	<tr>
		<td>Nomor Induk</td>
		<td>: <input type="text" name="nik" id="nik" value="<?php echo $r['nik'];?>" size="30" maxlength="10" /></td>
	</tr>
	<tr>
		<td>Kode Cabang</td>
		<td>:
			<select name="kcabang" id="kcabang">
			<?php 
			$hasil=$result->res("select kode,nama from tblkantor order by kode");
			if ($hasil) {
				while ($data = $result->row($hasil)) {
					$pilih=$data['kode'].' '.$data['nama'];
					if ($r['branch'] == $data['kode']) 
						echo "<option value=\"".$pilih."\" selected>".$data['nama']."</option>";
					else
						 echo "<option value=\"".$pilih."\">".$data['nama']."</option>";
				}
			}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Hak Akses</td>
		<td>:
			<select name="hakses" id="hakses">
			<?php
			$huruf = array("PEMIMPIN","MANAGER","SUPERVISOR","STAF","ADMIN");
			$i = 0;
			while($i<5){
				if ($r['akses'] == $i) echo 
					"<option value='".$i."' selected>".$huruf[$i]."</option>";
				else 
					 echo "<option value='".$i."'>".$huruf[$i]."</option>";
			$i++;
			} ?>
			  </select>
		</td>
	</tr>
	<tr>
		<td>Menu Akses</td>
		<td>:
			<select name="hmenu" id="hmenu">
			<?php
			$huruf = array("MENU KREDIT","MENU TABUNGAN","MENU TELLER","MENU DEPOSITO","MENU ADMIN","MENU PEJABAT","MENU AKUNTANSI","MENU PAYROLL");
			$i = 0;
			while($i<8){
				if ($r['hmenu'] == $i) echo 
					"<option value='".$i."' selected>".$huruf[$i]."</option>";
				else 
					 echo "<option value='".$i."'>".$huruf[$i]."</option>";
			$i++;
			} ?>
		  	</select>
		</td>
	</tr>
	<tr>
		<td>Limit Debet</td>
		<td>: <input type="text" name="nlimit" id="nlimit" value="<?php echo $r['plafon'];?>" style="text-align: right" size="30" maxlength="12"/></td>
	</tr>
	<tr>
		<td>Limit Kredit</td>
		<td>: <input type="text" name="nlimitk" id="nlimitk" value="<?php echo $r['plafonk'];?>" size="30" maxlength="12" style="text-align: right"/></td>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td>: <input type="text" name="ntelepon" id="ntelepon" value="<?php echo $r['telepon'];?>" size="30" maxlength="12" onkeypress="return hanyaAngka(event, false)"/></td>
	</tr>
	<tr>
		<td>Disable Pelunasan</td>
		<td>:
			<select name="aktif_satu" id="aktif_satu">
			<?php
			$huruf = array("YA","TIDAK");
			$i = 0;
			while($i<2){
				if ($r['aktif_satu'] == $i) echo 
					"<option value='".$i."' selected>".$huruf[$i]."</option>";
				else 
					 echo "<option value='".$i."'>".$huruf[$i]."</option>";
			$i++;
			} ?>
		  	</select>
		</td>
	</tr>
</table>
</form>
</div>