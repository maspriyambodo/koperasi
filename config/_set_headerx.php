<?php $hasil=$result->query_x1("SELECT a.id,a.branch,a.norek,a.nonas,a.sufix,a.produk,a.nopen,a.suku,a.tgtran,a.nomi,a.jangka,a.saldoa,a.kdkop,a.tglahir,a.kdsales,a.kkbayar,a.nmbayar,a.umur,b.nama,b.tmplahir,b.noktp,b.alamat,b.lurah,b.camat,b.kota,b.kdpos,a.kolek,c.nmproduk".",".$fieldss." FROM $tabel_kredit a JOIN nasabah b ON a.nonas=b.nonas JOIN $tabel_produk c ON a.produk=c.kdproduk WHERE a.norek='$norek' LIMIT 1");if($result->num($hasil)<1)$result->msg_error('Data Tidak Ditemukan Atau Sudah Lunas..!!');$row=$result->row($hasil);$nama=$row['nama'];$alamat=$row['alamat'];$lurah=$row['lurah'];$camat=$row['camat'];$kota=$row['kota'];$kdpos=$row['kdpos'];$noktp=$row['noktp'];$tglahir=date_sql($row['tglahir']);$branch=$row['branch'];$nonas=$row['nonas'];$sufix=$row['sufix'];$norek=$row['norek'];$nopen=$row['nopen'];$nomi=$row['nomi'];$suku=$row['suku'];$jangka=$row['jangka'];$tgtran=date_sql($row['tgtran']);$kdkop=$row['kdkop'];$saldox=$row['saldoa'];$kolek=$row['kolek'];$ketnas=$row['ketnas'];$produk=$row['produk'];$nmproduk=$row['nmproduk'];$kkbayar=$row['kkbayar'];$nmbayar=$row['nmbayar'];$umur=$row['umur'];$idd=$row['id'];$tmplahir=$row['tmplahir']; ?>