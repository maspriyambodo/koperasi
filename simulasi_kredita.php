<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jQuery.print.js"></script>
<script type="text/javascript">
	var linkx='simulasi_hasil.php';
	var saldoa,blunas,alunas,bungakk,flunas;
	$(document).ready(function () {
		$('#hitung').submit(function () {
			$.ajax({
				type: 'POST',
				url	: linkx,
				data: $(this).serialize(),
				beforeSend: function () {
					$('#loading').show();
				},
				success: function (data) {
					$("#divSimulasii").html(data);
					$('#loading').hide();
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert('Error: ' + xhr.status || ' - ' || thrownError);
					$('#loading').hide();
				}
			});
			return false;
		});
		$('#blunas').on('keyup', function() {
			variabel();
			var inp = $(this).val().replace(/\./g, '');
			var blunas = new Number(inp);
			var total_hutang=new Number(saldoa+blunas+alunas+bungakk+flunas);
			//alert(total_hutang);
			$('#sisa_hutang').val(formatAngka(total_hutang));
		});
		$('#alunas').on('keyup', function() {
			variabel();
			var inp = $(this).val().replace(/\./g, '');
			var alunas = new Number(inp);
			var total_hutang=new Number(saldoa+blunas+alunas+bungakk+flunas);
			$('#sisa_hutang').val(formatAngka(total_hutang));
		});
		$('#bungakk').on('keyup', function() {
			variabel();
			var inp = $(this).val().replace(/\./g, '');
			var bungakk = new Number(inp);
			var total_hutang=new Number(saldoa+blunas+alunas+bungakk+flunas);
			$('#sisa_hutang').val(formatAngka(total_hutang));
		});
		$('#flunas').on('keyup', function() {
			variabel();
			var inp = $(this).val().replace(/\./g, '');
			var flunas = new Number(inp);
			var total_hutang=new Number(saldoa+blunas+alunas+bungakk+flunas);
			$('#sisa_hutang').val(formatAngka(total_hutang));
		});
		function variabel(){
			saldoa = new Number($("#saldoa").val().replace(/\./g, ''));
			blunas = new Number($("#blunas").val().replace(/\./g, ''));
			alunas = new Number($("#alunas").val().replace(/\./g, ''));
			bungakk = new Number($("#bungakk").val().replace(/\./g, ''));
			flunas = new Number($("#flunas").val().replace(/\./g, ''));
		}
		function formatAngka(angka) {
			if (typeof(angka) != 'string') angka = angka.toString();
			var reg = new RegExp('([0-9]+)([0-9]{3})');
			while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
			return angka;
		}	
	});
	function validasi(){
		var jangka=document.forms["hitung"]["jangka"].value;jangka=jangka.replace(/\./g,"");
		var nominal=document.forms["hitung"]["nomi"].value;nominal=nominal.replace(/\./g,"");
		var gaji=document.forms["hitung"]["gaji"].value;gaji=gaji.replace(/\./g,"");
		var suku_bunga=document.forms["hitung"]["suku"].value;
		var numbers=/^[0-9]+$/;
		if (suku_bunga==null || suku_bunga==""){alert("Texbox Suku bunga tidak boleh kosong !");return false;}
		if (!jangka.match(numbers)){alert(" Textbox Jangka waktu harus angka !");return false;}
		if (!nominal.match(numbers)){alert("Textbox nominal harus angka !");return false;}
		if (!gaji.match(numbers)){alert("Textbox  Gaji harus angka !");return false;}
	}
	$(function(){
		$('#blunas').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#alunas').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#bungakk').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#flunas').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#sisa_bunga').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#sisa_adm').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#sisa_denda').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#sisa_finalti').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#gaji').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#nomi').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#suku').priceFormat({prefix: '', centsSeparator: '.', thousandsSeparator: '.', centsLimit:2});
		$('#simpanan_pokok').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#simpanan_wajib').priceFormat({prefix:'',centsSeparator:'.',thousandsSeparator:'.',centsLimit:0});
		$('#jumbtl').priceFormat({prefix:'',centsSeparator:'.',thousandsSeparator:'.',centsLimit:0});
	});
	function myFunction(){
		var x=document.getElementById('myDiv');
		if(x.style.display==='none'){
			x.style.display='block';
		}else{
			x.style.display='none';
		}
	}
	function myPrint(){
		$("#divSimulasi").print({
			//Use Global styles
			globalStyles : false,
			//Add link with attrbute media=print
			mediaPrint : false,
			//Custom stylesheet
			//stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
			//Print in a hidden iframe
			iframe : true,
			//Don't print this
			noPrintSelector : ".avoid-this",
			//Add this at top
			prepend : "Simulasi Kredit<br/>",
			//Add this on bottom
			append : "<br/>Print Simulasi Kredit"
		});
	}
</script>
<!--
<style type="text/css">  
@media screen {
BODY {font-size: medium; line-height: 1em; background: silver;}  
} 
@media print {
BODY {font-size: 10pt; line-height: 120%; background: white;}  
} 
</style>-->
<?php $norek=$result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);$fieldss='a.noreks,a.tbunga,a.flunas,a.ketnas,a.pokok,a.bunga,a.administrasi,a.status_klaim';$hasil=$result->query_x1("SELECT a.id,a.branch,a.norek,a.nonas,a.sufix,a.produk,a.nopen,a.suku,a.tgtran,a.nomi,a.jangka,a.saldoa,a.kdkop,a.nomi,a.tglahir,a.kdsales,a.kkbayar,a.nmbayar,a.umur,a.angsurke,a.gaji,b.nama,b.noktp,b.alamat,b.lurah,b.camat,b.kota,b.kdpos,a.kolek,c.nmproduk".",".$fieldss." FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE a.norek='$norek' AND a.branch='$branch' LIMIT 1");$group=FALSE;$nomi=0;$jangka=0;$suku=0;$simpanan_pokok=0;$simpanan_wajib=0;$jumbtl=0;if($result->num($hasil)<1){$saldoa=0;$blunas=0;$alunas=0;$bungakk=0;$jum_pelunasan=0;$flunas=0;$tgl_x1=$tglxxx;$bln_x1=$blnxxx;$thn_x1=$thnxxx;$gaji=0;$group=TRUE;$nama='';}else{$row=$result->row($hasil);$nama=$row['nama'];$alamat=$row['alamat'];$lurah=$row['lurah'];$camat=$row['camat'];$kota=$row['kota'];$kdpos=$row['kdpos'];$noktp=$row['noktp'];$tgl_lahir=date_sql($row['tglahir']);$tglahir=$tgl_lahir;$branch=$row['branch'];$nonas=$row['nonas'];$sufix=$row['sufix'];$norek=$row['norek'];$nopen=$row['nopen'];$nomi=$row['nomi'];$suku=$row['suku'];$jangka=$row['jangka'];$tgtran=date_sql($row['tgtran']);$kdkop=$row['kdkop'];$saldox=$row['saldoa'];$kolek=$row['kolek'];$ketnas=$row['ketnas'];$produk=$row['produk'];$nmproduk=$row['nmproduk'];$kkbayar=$row['kkbayar'];$nmbayar=$row['nmbayar'];$umur=$row['umur'];$angsurke=$row['angsurke'];$gaji=$row['gaji'];$saldoa=$row['saldoa'];$blunas=0;$alunas=0;$bungakk=0;$tbunga=$row['tbunga'];$xpokok=$row['pokok'];$xbunga=$row['bunga'];$xadm=$row['administrasi'];$xlunas=$row['flunas'];$xkdkop=ket_ditagih($kdkop);$xkolek=ket_kolek($kolek);$flunas=0;$norekl='';$sufixl='';$jumlah_tagihan=$xpokok+$xbunga+$xadm;$no_paymet=$norek;$kali_sisa=intval($jangka/3);$ybunga=0;$sisa_angsuran=$jangka-$angsurke;if($sisa_angsuran<=$kali_sisa){$ybunga=$xbunga;if($sisa_angsuran<=0){$ybunga=0;}}else{$kali_sisa=intval($jangka/2);if($sisa_angsuran<=$kali_sisa){$ybunga=$xbunga*2;}else{$ybunga=$xbunga*3;}}include '_pelunasanxx.php';$blunas=$jbunga+$ybunga;$alunas=$jadm;if($kk>0){$bungakk=intval(($jumlah_tagihan*$tbunga)/100)*$kk;}$saldoa=$saldox;$jum_pelunasan=$saldoa+$blunas+$alunas+$bungakk;$bln_x1=date('m',strtotime($tgl_lahir));$thn_x1=date('Y',strtotime($tgl_lahir));$tgl_x1=date('d',strtotime($tgl_lahir));}?>
<div class="ui-widget-content">
<table width="100%">
	<?php if($group==FALSE) include '_headerx.php';?>
</table>
<div id="divSimulasi" style="font-family: Arial;font-size: 9pt;">
<form id="hitung" name="hitung" method="POST" action="">
	<input type="hidden" name="namaa" id="namaa" value="<?php echo $nama;?>"/>
	<table align="center" width="100%">
	<tr>
		<td>Nama / Norek</td>
		<td>: 
		<input type="text" name="nama" id="nama" value="<?php echo $nama;?>" maxlength="35" size="20"/>
		<input type="text" name="norek" id="norek" value="" maxlength="13" size="15"/>
		</td>
		<td>No Nasabah / Sufix</td>
		<td>: 
		<input type="text" name="nonas" id="nonas" value="" maxlength="6" size="25"/>
		<input type="text" name="sufix" id="sufix" value="" maxlength="3" size="10"/>
		</td>
	</tr>
	<tr><th colspan="4" class="ui-state-highlight">SISA HUTANG LAMA</th></tr>
	<tr>
		<td>Pokok Pinjaman</td>
		<td>: <input style="text-align:right" type="text" name="saldoa" id="saldoa" value="<?php echo formatrp($saldoa);?>" maxlength="10" size="35" readonly/></td>
		<td>denda angsuran</td>
		<td>: <input style="text-align:right" type="text" name="bungakk" id="bungakk" value="<?php echo formatrp($bungakk);?>" maxlength="10" size="35" autocomplete="off"/></td>
	</tr>
	<tr>
		<td>Bunga Pinjaman</td>
		<td>: <input style="text-align:right" type="text" name="blunas" id="blunas" value="<?php echo formatrp($blunas); ?>" maxlength="10" size="35" autocomplete="off"/></td>
		<td>Finalty Pelunasan</td>
		<td>: <input style="text-align:right" type="text" name="flunas" id="flunas" value="<?php echo formatrp($flunas); ?>" maxlength="10" size="35" autocomplete="off"/></td>
	</tr>
	<tr>
		<td>Adm Pinjaman</td>
		<td>: <input style="text-align:right" type="text" name="alunas" id="alunas" value="<?php echo formatrp($alunas);?>" maxlength="10" size="35" autocomplete="off"/></td>
		<td>Jumlah Pelunasan</td>
		<td>: <input style="text-align:right" type="text" name="sisa_hutang" id="sisa_hutang" value="<?php echo formatrp($jum_pelunasan); ?>" maxlength="10" size="35" readonly/></td>
	</tr>
	<tr><th colspan="4" class="ui-state-highlight">PINJAMAN BARU</th></tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>: 
			<select name="tgl_lahir" id="tgl_lahir" style="width:60px" >
				<?php include 'form_tanggal.php'; ?>
			</select>
			<select name="bln_lahir" id="bln_lahir" style="width:80px" >
				<?php include 'form_bulan.php'; ?>
			</select>
			<select name="thn_lahir" id="thn_lahir" style="width:70px" >
				<?php include 'form_tahun.php'; ?>
			</select>	
		</td>
		<td>Tanggal Pinjam</td>
		<td>: 
			<?php $bln_x1=date('m',strtotime($t));$thn_x1=date('Y',strtotime($t));$tgl_x1=date('d',strtotime($t));?>
			<select name="tgl_pinjam" id="tgl_pinjam" style="width:60px" >
				<?php include 'form_tanggal.php'; ?>
			</select>
			<select name="bln_pinjam" id="bln_pinjam" style="width:80px" >
				<?php include 'form_bulan.php'; ?>
			</select>
			<select name="thn_pinjam" id="thn_pinjam" style="width:70px" >
				<?php include 'form_tahun.php'; ?>
			</select>	
		</td>	
	</tr>
	<tr>
		<td>Kode Produk</td>
		<td>: 
		<select name="produk" id="produk">
			<option value="">PILIHAN</option>
			<?php 
			$hasil=$result->res("SELECT kdproduk,nmproduk FROM debit1 ORDER BY kdproduk",'');
			while($data = $result->row($hasil)){
				echo "<option value=\"" .$data['kdproduk']."\">" .$data['kdproduk'].' '.$data['nmproduk']. "</option>";
			}
			?>
		</select>
		</td>
		<td>Nama Asuransi</td>
		<td>: 
		<select name="kdpremi" id="kdpremi">
			<option value="PILIHAN"></option>
			<?php 
			$hasil=$result->res("SELECT kode_asuransi,nama_asuransi FROM tbl_asuransi WHERE status_asuransi=1 ORDER BY nama_asuransi",'');
			while($data = $result->row($hasil)){
				echo "<option value=\"".$data['kode_asuransi']."\">".$data['nama_asuransi']."</option>";
			}
			echo "<option selected='selected' value=9>TIDAK DI ASURANSIKAN</option>";
			?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Jumlah Grace Period</td>
		<td>: 
			<select name="jumlah_period" id="jumlah_period" class="combobox">
			<?php
			$huruf = array("0 PILIHAN","1 BULAN","2 BULAN","3 BULAN","4 BULAN","5 BULAN","6 BULAN");$i=0;
			$jumlah_period=0;
			while ($i<7) {
				if ($jumlah_period==$i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			}?>
			</select>
		</td>
		<td>Skim Bunga</td>
		<td>: 
			<select name="hitung_bunga" id="hitung_bunga">
				<option value="">PILIHAN</option>
				<?php
				$huruf = array("FLAT","ANUITAS","MENURUN");
				$i = 0;
				while ($i<3) {
					echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
					$i++;
				}
				?>
			</select>
		</td>	
	</tr>
	<tr>
		<td>Setoran  Angsuran Pertama</td>
		<td>: 
			<select name="kdangsur" id="kdangsur" class="combobox">
			<?php 
			$huruf = array("YA","TIDAK");$i=0;$kdangsur=1;
			while($i < 2){
				echo "<option value='".$i."'>".$huruf[$i]."</option>";
				$i++;
			}?>
			</select>
		</td>
		<td>Jumlah Setoran Pertama</td>
		<td>: 
			<select name="jum_kdangsur" id="jum_kdangsur" class="combobox">
			<?php
			$huruf = array("0 PILIHAN","1 BULAN","2 BULAN","3 BULAN","4 BULAN","5 BULAN","6 BULAN");$i=0;
			while ($i<7) {
				echo "<option value='".$i."'>".$huruf[$i]."</option>";
				$i++;
			}?>
			</select>			
		</td>
	</tr>
	<tr>
		<td>Jumlah Pendapatan</td>
		<td>: <input style="text-align:right" type="text" name="gaji" id="gaji" value="<?php echo $gaji; ?>" maxlength="15" size="25" autocomplete="off"/></td>
		<td>Potongan Lainnya</td>
		<td>: <input style="text-align:right" name="jumbtl" type="text" id="jumbtl" maxlength="15" size="25" value="<?php echo $jumbtl; ?>"/></td>
	</tr>
	<tr>
		<td>Simpanan Pokok</td>
		<td>: <input style="text-align:right" name="simpanan_pokok" type="text" id="simpanan_pokok" maxlength="15" size="25" value="<?php echo $simpanan_pokok;?>" autocomplete="off"/></td>
		<td>Simpanan Wajib</td>
		<td>: <input style="text-align:right" name="simpanan_wajib" type="text" id="simpanan_wajib" maxlength="15" size="25" value="<?php echo $simpanan_wajib;?>" autocomplete="off"/></td>
	</tr>
	<tr>
		<td>Nominal Pinjaman</td>
		<td>: <input style="text-align:right" name="nomi" type="text" id="nomi" maxlength="15" size="25" value="<?php echo $nomi;?>" autocomplete="off"/></td>	
		<td>Jangka Waktu</td>
		<td>: <input style="text-align:right" name="jangka" type="text" id="jangka" maxlength="3" size="25" value="<?php echo $jangka;?>" autocomplete="off"/></td>
	</tr>
	<tr>
		<td>Suku Bunga</td>
		<td>: <input style="text-align:right" name="suku" type="text" id="suku" maxlength="5" size="25" value="<?php echo $suku;?>" autocomplete="off"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
</table>
<div class="ui-widget-content" align="center">
	<input type="submit" value="Hitung Pinjaman" id="submit" class="icon-proses" onclick="return validasi();"/>
</div>
</form>
<div id="divSimulasii" style="font-family: Arial;font-size: 9pt;"></div>
</div>
</div>
<button onclick="myPrint()" class="icon-print">Print</button>
<button onclick="myFunction()" class="icon-enable">Show/Hide Payment Scedule</button>