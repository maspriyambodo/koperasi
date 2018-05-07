<?php include "h_tetap.php";$id=$result->c_d($_GET['id']);$tabel=$tabelKredit;include 'variabel/var_datakredit_4.php';$produk=$row['produk'];$kdkop=$row['kdkop'];$kdsales=$row['kdsales']; $jumangsuran = $row['pokok']+$row['bunga']+$row['administrasi']; $jumlunas = $row['plunas']+$row['blunas']+$row['dbunga']+$row['alunas'];$jumsimpan = $row['simpokok']+$row['simwajib'];$jumpotong = $jumlunas+$jumsimpan+$row['jumprovisi']+$row['jumbtl']+$row['jumadm']+$row['meterai']+$row['jumpremi']+$row['pot_angsuran']+$row['jum_period'];$norek=$row['norek'];$nomi=$row['nomi'];$kdskep=$row['kdskep'];$branch=$row['branch']; $jumbersih = $nomi-$jumpotong; $tgl=date_sql($row['tgtran']); $bln =date('m',strtotime($tgl)); $bln .=date('Y',strtotime($tgl));$loansaldo=$result->jumsaldo($norek,$nomi);$xkdskep=ket_jaminan($kdskep);$nmproduk=$result->produk_kredit($row['produk']);$xkdkop=ket_tagih($row['kdkop']);$xkolek=ket_kolek($row['kolek']);$xkkolek=alasan_kolek($row['ketkolek']);$xkketnas=alasan_ditagih($row['kketnas']);$xjenis_klaim=jenis_klaim($row['jenis_klaim']);$xketnas=ket_ditagih($row['ketnas']);$nmsales=$result->nama_sales($row['kdsales']);$xxkdkop=ket_tagihh($row['kdkop']);$kdaktif=$row['kdaktif'];
echo '<div id="tabs">
    <ul>
        <li style="width:auto"><a href="#tabs-1">Data Debitur</a></li>
        <li style="width:auto"><a href="#tabs-2">Data Lainnya</a></li>
        <li style="width:auto"><a href="#tabs-3">Data Pinjaman</a></li>
        <li style="width:auto"><a href="#tabs-4">Saldo Pinjaman</a></li>
        <li style="width:auto"><a href="#tabs-5">Payment Scedule</a></li>
    </ul>
    <div id="tabs-1">
        <div class="ui-widget">'; include "variabel/kreditinfoa.php"; echo '</div>
    </div>
    <div id="tabs-2">
        <div class="ui-widget">'; include "variabel/kreditinfoc.php"; echo '</div>
    </div>
    <div id="tabs-3">
        <div class="ui-widget">'; include "variabel/kreditinfoe.php"; echo '</div>
    </div>
    <div id="tabs-4">
        <div class="ui-widget">'; include "variabel/kreditinfog.php"; echo '</div>
    </div>
    <div id="tabs-5">
        <div class="ui-widget">'; include "variabel/kreditinfof.php"; echo '</div>
    </div>
</div>
<div class="ui-widget-content" align="center">
    <form id="masuk" name="masuk" method="POST" action="">
        <input name="id" type="hidden" id="id" value="'.$row['id'].'" />
        <input type="button" id="setuju" value="Pinjaman Di Cairkan" class="icon-ok" />
        <input type="button" id="batal" value="Pinjaman Di Tolak" class="icon-cancel" />
        <input type="button" id="kembali" value="Kembali" class="icon-undo" />
    </form>
</div>
<div ID="divPageData"></div>'; ?>
<script type="text/javascript" src="java/otorisasi_kredit.js"></script>