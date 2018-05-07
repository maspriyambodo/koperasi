<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" src="js/tabel_sort.js"></script>
<?php $no=1;$hasil=$result->query_lap("SELECT nonas,sufix,norekgl,norekgsl,norekgssl,nama,produk,kode FROM akuntansi.sandim ORDER BY norekgssl");echo '<div ID="divPageHasil"><div class="ui-widget-content"><table class="tablesorter"><thead><tr><th>Nonas</th><th>Sufix</th><th>Norek GL</th><th>Norek GSL</th><th>Norek GSSL</th><th>Nama</th><th>Produk</th><th>Kode</th></tr></thead><tfoot><tr><th>Nonas</th><th>Sufix</th><th>Norek GL</th><th>Norek GSL</th><th>Norek GSSL</th><th>Nama</th><th>Produk</th><th>Kode</th></tr></tfoot><tbody>';while($row = $result->row($hasil)){if($no %  2){$clsname="even";}else{$clsname="odd";}echo '<tr class="'.$clsname.'"><td>'.$row['nonas'].'</td><td>'.$row['sufix'].'</td><td>'.$row['norekgl'].'</td><td>'.$row['norekgsl'].'</td><td>'.$row['norekgssl'].'</td><td>'.$row['nama'].'</td><td>'.$row['produk'].'</td><td>'.$row['kode'].'</td></tr>';$no++;}echo '</tbody></table></di>'; ?>
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