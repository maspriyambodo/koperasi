<?php 
include 'h_atas.php';$nonas=$result->c_d($_POST['nonas']);if(strlen($nonas)<3) $result->msg_error('Kriteria Pencairan Minimal 2 Karakter');$hasil=$result->query_lap("SELECT notas,nama_penerima,tgl_lahir_penerima,jenis,kdjiwa,bersih,alm_peserta,nmdati4,kota,nomor_skep,tanggal_skep,penerbit_skep,nmkanbyr,telepon,namapensiunan,tgl_lahir_pensiunan FROM $tabel_maspen WHERE notas LIKE '%$nonas%' OR nama_penerima LIKE '%$nonas' OR namapensiunan LIKE '%$nonas' ORDER BY notas");$no=1;echo '<div class="table"><table width="100%"><thead><tr class="td" bgcolor="#e5e5e5"><th>No</th><th>NOPEN</th><th>NAMA PENERIMA</th><th>TGL LAHIR PENERIMA</th><th>NAMA PENSIUN</th><th>TGL LAHIR</th><th>JENIS</th><th>KODE JIWA</th><th>GAJI BERSIH</th><th>ALAMAT</th><th>NO SKEP</th><th>PENERBIT SKEP</th><th>TGL SKEP</th><th>KANTOR BAYAR</th><th>NO TELEPON</th></tr></thead><tbody>';$no=1;while($row=$result->row($hasil)){echo '<tr><td>'.$no.'</td><td>'.$row['notas'].'</td><td>'.$row['nama_penerima'].'</td><td>'.$row['tgl_lahir_penerima'].'</td><td>'.$row['namapensiunan'].'</td><td>'.$row['tgl_lahir_pensiunan'].'</td><td>'.$row['jenis'].'</td><td>'.$row['kdjiwa'].'</td><td>'.$row['bersih'].'</td><td>'.trim($row['nmdati4']).' '.trim($row['alm_peserta']).' KAB. '.trim($row['kota']).'</td><td>'.$row['nomor_skep'].'</td><td>'.$row['tanggal_skep'].'</td><td>'.$row['penerbit_skep'].'</td><td>'.$row['nmkanbyr'].'</td><td>'.$row['telepon'].'</td></tr>';$no++;
}echo '</tbody></table></div>';
?>