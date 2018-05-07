<?php include 'auth.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
		<title>Pembukaan Deposito</title>
		<script type="text/javascript" src="jQuery/formatinput.js"></script>
		<script type="text/javascript" src="jQuery/combobox.js"></script>
		<script type="text/javascript" src="js/caridata.js"></script>
		<script type="text/javascript" src="js/global.js"></script>
		<script TYPE="text/javascript">
			$(document).ready(function(){
				$('#masuk').submit(function(){
					$.ajax({
						type : "POST",
						url : "createdepo.php",
						data	: $(this).serialize(),
						beforeSend: function(){
							$('#loading').show();
						},
						success: function(data){
							alert(data);
							$('#innertub').load('deposito_open.php');
							$('#loading').hide();
						}
					});
					jQuery(function ($) {$("#tanggal_buka").mask("99-99-9999");});
					return false;
				});
				$("#hitung").button().on("click",function(){
					var tanggal_buka = new $("#tanggal_buka").val();
					if(tanggal_buka.length==0){
						alert("Tanggal Buka Belum Di Isi..!");
						$("#tanggal_buka").focus();
						return false;
					}
					var rekening_internal = new $("#rekening_internal").val();
					if(rekening_internal.length==0){
						alert("Rekening Pencairan Belum Di Isi..!");
						$("#rekening_internal").focus();
						return false;
					}
					var rekening_bank = new $("#rekening_bank").val();
					if(rekening_bank.length==0){
						alert("Rekening Bank Transfer Belum Di Isi..!");
						$("#rekening_bank").focus();
						return false;
					}
					var nama_rekening_bank = new $("#nama_rekening_bank").val();
					if(nama_rekening_bank.length==0){
						alert("Nama Rekening Bank Transfer Belum Di Isi..!");
						$("#nama_rekening_bank").focus();
						return false;
					}
					var nominal = new Number($("#nominal").val().replace(/\./g, ''));
					if (nominal<1000000){
						alert ("Penempatan Deposito Minimal 1 Juta Rupiah");
					}
					var jangka_waktu = new Number($("#jangka_waktu").val().replace(/\./g, ''));
					if (jangka_waktu<1){
						alert ("Jangka Waktu Minimal 1 Bulan");
					}
					var bunga = $("#bunga").val();
					if(bunga.length==0){
						alert("Bunga Belum Di Isi..!");
						$("#bunga").focus();
						return false;
					}
					dataString='nominal='+nominal+'&jangka_waktu='+jangka_waktu+'&bunga='+bunga+'&tanggal_buka='+tanggal_buka;
					$.ajax({
						type: 'GET',
						url: 'countdepo.php',
						data: dataString,
						beforeSend: function () {
							$('#loading').show();
						},
						success: function (data) {
							$("#divPageHasil").html(data);
							$('#loading').hide();
						}
					});
					return false;
				});
				$(document).ready(function () {
				});
				$(function(){
					$('#nominal').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
					$('#bunga').priceFormat({prefix:'',centsSeparator:'.',thousandsSeparator:'.',centsLimit:2});
					// for lookup rekening_internal
					$("#findgl").lookupbox({
						title: 'Daftar Rekening',
						url: 'lookupgl.php?chars=',
						imgLoader: '<img src="images/load.gif">',
						onItemSelected: function(data)	{
							$('input[name=rekening_internal]').val(data.nonas);
						},
						tableHeader: ['Rekening','GL','Keterangan']
					});
				});
			});
		</script>
	</head>
	
	<body>
		<?php
		include 'function.php';
		include "koneksi.php";
		$no_nasabah=clean($_POST['nonas']);
		$branch=$kcabang;
		$result = $mysql->query("SELECT id,nonas,nama,noktp,alamat,lurah,camat,status_cif FROM nasabah WHERE branch='$branch' AND nonas LIKE '%$no_nasabah%' ORDER BY nonas LIMIT 1");
		include 'pesanerr.php';
		if(mysqli_num_rows($result)!=0){ 
			$row = $result->fetch_array(MYSQLI_BOTH);
			$nama=$row['nama'];
			$no_ktp=$row['noktp'];
			$alamat=$row['alamat'];
			$lurah=$row['lurah'];
			$camat=$row['camat'];
			if($row['status_cif']!=1){
				$xp='Nomor nasabah belum di otorisasi';include 'pesan.php';
			}
		}else{
			$xp='Nomor nasabah tidak ditemukan';include 'pesan.php';
		}
			$nominal=0;$jangka_waktu=0;

		    $id = "";                			//		index
		    $rekening_internal = "204301";			//		13 rekening internal pencairan Pokok & Bunga
		    $nomor_rekening = "";               //		15 nomor rekening
		    $seri_bilyet = "";                  //		17 Seri Bilyet
		    $nomor_bilyet = "";                  //		Nomor Bilyet
		    // $nama_rekening = "";                //      47 nama pemegang rekening  // SEARCH NASABAH HIDDEN
		    $nomor_nasabah = "";                //		53 no.nasabah(pemegang rekening)  // SEARCH NASABAH
		    $produk = "";                       //		0=Deposito PERORANGAN,1= Deposito PERUSAHAAN 
		    $tanggal_buka = $tanggal;                 //	 ORI	65 tanggal buka yyyy/mm/dd
		    $jangka_waktu = "";                 //      75 jangka waktu dalam bulan
		    //$counter_rate = "";                 //      80 bunga pada conter
		    $bunga = "";                        //      85 persen bunga 3 dec point /1000(pada bilyet)
		    $special_rate = "";                 //      90 spesial rate
		    //$special_rate_lain = "";            //      95 spesial rate lainnya(penggalian dana)
		    $nominal = "";                      //      103 nominal
		    //$sandi_bi = "";                     //      106 sandi bi(kode gol.kepemilikan)
		    $wilcab = "";                       //      107 kode wilayah 1=propinsi 2=kab./Kodya

		    // automized
		    ///$bunga_harian = "";                  //       115 bunga harian
		    ///$total_bunga = "";                   //       123 total bunga pada bilyet
		    ///$total_tarik = "";                   //       131 total bunga yang sudah ditarik
		    ///$total_cadangan_1 = "";              //       139 total cadangan1
		    ///$total_cadangan_2 = "";              //       147 total cadangan2
		    ///$hari_bunga_1 = "";                  //       150 Hari bunga 1
		    ///$hari_bunga_2 = "";                  //       153 Hari bunga 2
		    ///$jumlah_hari = "";                   //       156 Jumlah hari bunga
		    
		    $status_rekening = "0";              //       157 0= baru dibuka 1=aktif, 2=blokir, 9=tutup ,8=dijaminkan
		    // $flag_buka = "";                    //       158 0=blm auto 1=auto 2=setor
		    $setor_via = "";                    //       159 1=kas, 2=Pb
		    $rekening_setor = "";               //       174 rekening setor
		    $transaksi_via = "";                //       175 1=Kas 2=Pb 3=Kliring 4=ARO
		    $rekening_bank = "";                //       190 Rek Tarik Nominal
		    $kode_kliring_bank_trk = "";         //       197 Kode Bank Kliring
		    $nama_bank = "";         //       Nama Bank
		    $nama_rekening_bank = $nama;           //       127 nama rekening penarik nominal (klr)
		    $bunga_via = "";                    //       128 1=Kas 2=P.B 3=Kliring
		    //$kode_kliring_bank_bng = "";         //       150 KodeBank Kliring
		    //$nama_penarik_bunga = "";            //       180 nama rekening penarik bunga (klr)
		    $flag_cetak = "";                   //       181 flag cetak Bilyet  0=belum 1=sudah 2=Ulang
		    $kode_pajak = "";                   //       182 kode pajak 1=kena 2=tidak kena

		    //$alasan_titip = "";                  //       183 1.Dijaminkan  2.Permintaan yg berwajib  3.Lain-lain
		    $jenis_bunga = "";                  //       184 jenis bunga (0=harian  1=bulanan)
		    //$tanggal_blokir_tutup_jamin = "";    //       192 tgl blokir/tutup/Dijaminkan (klr)
		    //$id_blokir = "";                     //       195 Id blokir
		    //$tanggal_buka_blokir = "";           //       203 Tanggal release blokir
		    //$id_buka_blokir = "";                //       206 Id release blokir
		    //$nomor_rekening_blokir = "";         //       221 Nomor rekening blokir

		    ///$total_special_rate = "";           //       229 jumlah bunga special
		    //$total_bunga_lain = "";              //       137 jumlah bunga penggalian dana
		    //$penarikan_bunga_lain = "";          //       245 bunga penggalian dana yang sudah ditarik
		    //$tipe_bunga_lain = "";               //       246 type bunga penggalian dana 1=Bulanan 2=dimuka
		    //$tarik_bunga_lain_via = "";          //       247 system penarikan bunga 1=tunai 2=PB 3=klr
		    //$rek_tarik_bunga_lain = "";          //       262 rekening penarikan penggalian dana (klr)
		    //$kode_kliring_bunga_lain = "";       //       269 kode bank kliring
		    //$nama_penarik_bunga_lain = "";       //       299 nama penarik kliring
		    $mail = "";                         //       308 1=K.T.P  2=SURAT
		    $tipe_tanggal_jatuh_tempo = "";            //       309 0=TgTempo by system 1=Tgtempo diinput
		    $tanggal_jatuh_tempo = "";                 //       Tanggal Jatuh Tempo
		    ///$operator_id = "";                   //3       312 staff-id
		    ///$otorisator_id = "";                 //3       315 Staf otorisasi
		    $pembagi = "";                      //       318 360 atau 365
		    $sales_id = "";                     //       322 ACCOUNT OFFICER
		    $no_bilyet = "";					// 		Nomor Bilyet
		    //$tanggal_buka_lama = "";             //       330 tanggal buka yyyy/mm/dd lama
		    //$tanggal_jatuh_tempo_lama = "";      //       338 Jtempo yyyy/mm/dd lama
		    //$jangka_waktu_lama = "";             //       340 jangka waktu dalam bulan lama
		    //$counter_rate_lama = "";             //       345 bunga pada conter yang lama
		    //$bunga_lama = "";                    //       350 persen bunga 3 dec point /1000(pada bilyet)
		    //$special_rate_lama = "";             //       355 spesial rate lama
		    //$special_rate_lain_lama = "";        //       360 spesial rate lainnya(penggalian dana) lama
		    //$nominal_lama = "";                  //       368 (nominal lama)  digunakan untuk PAJAK

		    //$status_akun = "";                   //       369 1=biasa 2=rek bersama(join Account)
		    //$status_pemegang_akun = "";          //       370 1=ttg.pemegang rek. 2=ttg harus dua orang 3=ttg salah satu
		    //$kode_penduduk = "";                 //       371 kode penduduk/non penduduk (1=penduduk 2=non pdd)
		    $counter_aro = "";                   //       372 Counter yang di ARO (0=Non-ARO 1=ARO)
		    //$status_spesimen = "";               //       status spesimen 1=Perorangan 2=kedua-duanya 3= salah satu
		    //$filler = "";						   //		  490 filler (len = 490)
		?>
		<form id="masuk" name="masuk" method="POST" action="">
			<table width="100%">
				<tr>
					<th colspan="6" class="ui-state-highlight">DATA NASABAH</th>
				</tr>
				<tr>
					<td align="right">Nama :</td>
					<td>	<input name="nama" type="text" id="nama" value="<?php echo $nama;?>" size="35" readonly/></td>
					<td align="right">No Nasabah :</td>
					<td>	<input  name="no_nasabah" type="text" id="no_nasabah" value="<?php echo $no_nasabah; ?>" size="35" readonly/></td>
				</tr>
				<tr>
					<td align="right">Alamat :</td>
					<td><input  name="alamat" type="text" id="alamat" value="<?php echo $alamat.' '.$lurah.' '.$camat; ?>" size="35" readonly /></td>
					<td align="right">No KTP :</td>
					<td>	<input name="no_ktp" type="text" id="no_ktp" size="35" value="<?php echo $no_ktp; ?>" readonly /></td>
				</tr>
				<th colspan="6" class="ui-state-highlight">DATA DEPOSITO</th>
				
				<tr>
					<td align="right">Tanggal Buka :</td>
					<td><input name="tanggal_buka" type="text" id="tanggal_buka" value="<?php echo $tanggal_buka; ?>" size="35" maxlength="10" readonly/></td>
					<td align="right">Kode Produk :</td>
					<td>
						<select name="produk" id="produk" class="combobox">
							<option value="">Pilih Kode Produk (default PERORANGAN)</option>
							<?php 
							include 'koneksi.php';
							$result = $mysql->query("SELECT id,kd_produk,nama_produk FROM produk_depossito ORDER BY id");
							$produk="DPU";
							if($result){
								while($data = $result->fetch_array(MYSQLI_ASSOC)){
									if($produk == $data['kd_produk']){
										echo "<option value=\"" .$data['kd_produk']."\" selected>" .$data['kd_produk'].' '.$data['nama_produk']. "</option>";
									}else{
										echo "<option value=\"" .$data['kd_produk']."\">" .$data['kd_produk'].' '.$data['nama_produk']. "</option>";
									}
								}
							} ?>
					</td>
				</tr>
				<tr>
					<td align="right">Rekening Internal :</td>
					<td>
						<input name="rekening_internal" type="text" class="form-control" id="rekening_internal" value="<?php echo $rekening_internal; ?>" size="35" maxlength="8" />
						<input type="button" value="" id="findgl" class="icon-filter"/>
					</td>
					<td align="right">Rekening Bank Transfer :</td>
					<td><input name="rekening_bank" type="text" class="form-control" id="rekening_bank" value="<?php echo $rekening_bank; ?>" size="35" maxlength="16" /></td>
				</tr>
				<tr>
					<td align="right">Kode Kliring Bank Transfer</td>
					<td>
						<input name="kode_kliring_bank_trk" type="text" class="form-control" id="kode_kliring_bank_trk" value="<?php echo $kode_kliring_bank_trk; ?>" size="35" maxlength="8" />
					</td>
					<td align="right">Nama Bank :</td>
					<td><input name="nama_bank" type="text" class="form-control" id="nama_bank" value="<?php echo $nama_bank; ?>" size="35" maxlength="16" /></td>
				</tr>
				<tr>

					<td align="right">Nama Rekening Bank Transfer :</td>
					<td><input name="nama_rekening_bank" type="text" class="form-control" id="nama_rekening_bank" value="<?php echo $nama_rekening_bank; ?>" size="35" maxlength="30"/></td>
					<td align="right">Jenis Transaksi :</td>
					<td>
						<select name="transaksi_via" id="transaksi_via" class="combobox" placeholder="Pilih Jenis Setoran">
							<?php $huruf = array("TUNAI", "PINDAH BUKU", "TRANSFER");
							$i = 0;
							while ($i < 3) {
								if ($transaksi_via == $i){
									echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
								}else{
									echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
								}
								$i++;
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right">Jenis Bunga :</td>
					<td>
						<select name="jenis_bunga" id="jenis_bunga" class="combobox" placeholder="Pilih Jenis Setoran">
							<?php $huruf = array("HARIAN", "BULANAN");
							$i = 0;
							while ($i < 2) {
								if ($jenis_bunga == $i){
									echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
								}else{
									echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
								}
								$i++;
							} ?>
						</select>
					</td>
					<td align="right">Jenis Tanggal Jatuh Tempo :</td>
					<td>
						<select name="tipe_tanggal_jatuh_tempo" id="tipe_tanggal_jatuh_tempo" class="combobox" placeholder="Pilih Jenis Setoran">
							<?php $huruf = array("TANGGAL OTOMATIS", "TANGGAL INPUT MANUAL");
							$i = 0;
							while ($i < 2) {
								if ($tanggal_jatuh_tempo == $i){
									echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
								}else{
									echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
								}
								$i++;
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right">Direct Mail :</td>
					<td>
						<select name="mail" id="mail" class="combobox" placeholder="Pilih Jenis Setoran">
							<?php $huruf = array("Alamat KTP", "Surat");
							$i = 0;
							while ($i < 2) {
								if ($mail == $i){
									echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
								}else{
									echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
								}
								$i++;
							} ?>
						</select>
					</td>
					<td align="right">Account Officer :</td>
					<td>	<input name="sales_id" type="text" id="sales_id" size="35" maxlength="13" value="<?php echo $sales_id; ?>"/></td>
					
					<td>
						<select name="sales_id" id="sales_id" class="combobox">
							<option value="">Pilih Kode Sales</option>

							<?php 
							include 'koneksi.php';
							$result = $mysql->query("SELECT id,idsales,nama FROM sales ORDER BY id");
							$sales_id="";
							if($result){
								while($data = $result->fetch_array(MYSQLI_ASSOC)){
									if($sales_id == $data['idsales']){
										echo "<option value=\"" .$data['idsales']."\" selected>" .$data['idsales'].' '.$data['nama']. "</option>";
									}else{
										echo "<option value=\"" .$data['idsales']."\">" .$data['idsales'].' '.$data['nama']. "</option>";
									}
								}
							} ?>
					</td>

				</tr>
				<tr>
					<td align="right">No Bilyet :</td>
					<td>	<input name="nomor_bilyet" type="text" id="nomor_bilyet" size="35" maxlength="13" value="<?php echo $nomor_bilyet; ?>"/></td>
					<td align="right">Seri :</td>
					<td>	<input name="seri_bilyet" type="text" id="seri_bilyet" size="35" maxlength="2" value="<?php echo $seri_bilyet; ?>"/></td>
				</tr>
				<tr>
					<td align="right">Nominal :</td>
					<td>	<input name="nominal" type="text" id="nominal" size="35" maxlength="15" value="<?php echo $nominal; ?>"/></td>
					<td align="right">Jangka Waktu :</td>
					<td>	<input name="jangka_waktu" type="text" id="jangka_waktu" size="35" maxlength="2" value="<?php echo $jangka_waktu; ?>"/></td>
				</tr>
				<tr>
					<td align="right">Bunga :</td>
					<td><input name="bunga" type="text" class="form-control" id="bunga" value="<?php echo $bunga; ?>" size="35" maxlength="6" /></td>
					<td align="right">Tipe Bunga :</td>
					<td>
						<select name="counter_aro" id="counter_aro" class="combobox" placeholder="Pilih Jenis Bunga">
							<?php $huruf = array("Non-ARO", "ARO");
							$i = 0;
							while ($i < 2) {
								if ($counter_aro == $i){
									echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
								}else{
									echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
								}
								$i++;
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="6" align="center">	<h1 align="center"><button id="hitung">Hitung Bunga</button></h1></td>
				</tr>
			</table>

			<!-- Hidden Values -->
			<input name="status_rekening" type="hidden" class="form-control" id="status_rekening" value="<?php echo $status_rekening; ?>"/>
			
			<div id="divPageHasil"></div>
			<div class="ui-widget-content" align="center">
				<input type="submit" value="Simpan" id="submit" class="icon-save"/>
				<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
			</div>
		</form>
	</body>
</html>