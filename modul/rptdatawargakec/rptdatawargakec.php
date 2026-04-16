<?php
$namakec=$_SESSION['ses_namakec'];
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $datads = pg_query($koneksi, "select * from datawarga where kodekec='".$_SESSION['ses_kodekec']."'");
  $count=pg_num_rows($datads);

  // Pagination
  $limit = 10;
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  if($page < 1) $page = 1;
  $offset = ($page - 1) * $limit;
  $total_pages = ceil($count / $limit);

	echo"
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Warga Kecamatan $namakec</h2>";
                ?>
				<form method="post" name="frm">
				
				
				<div style="text-align:right">	
		   <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>
		 
		<?php
		if($count > 0)
        {
		?>			
				
				
				 <div class="form-group">
					<label for="kodekel" class="col-sm-1 control-label">Kecamatan</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="kdkec" name="kdkec" placeholder="Kode Kecamatan" value="<?php echo $_SESSION['ses_kodekec'];?>" readonly>
						<input type="text" class="form-control" id="nmkec" name="nmkec" placeholder="Nama Kecamatan" value="<?php echo $_SESSION['ses_namakec'];?>" readonly>
                      </div>
				</div>
				<button class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Print Per Kelurahan"  onClick="print_records_rptdatawargakec();" ><i class="fa fa-print"></i> Print Per Kecamatan</button>
				
		    
		<?php } ?>	
			
				
                <div class='box-body'>
				
				<div class="box-body table-responsive no-padding">
                  <table id='table-rptdatawargakec' class='table table-bordered table-striped'>
				  
				  
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
						<th>Tgl.Terdata</th>
						<th>No.ID</th>
						<th>No.KRT</th>
						<th>Nama KRT</th>
						<th>No.KK</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Tgl.Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Alamat Domisili</th>
						<th>Alamat KTP</th>
						<th>Kelurahan/Desa</th>
						<th>Lingkungan</th>
						<th>Dasawisma</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no = $offset + 1;
					$warga =pg_query($koneksi, "select * from datawarga where kodekec='".$_SESSION['ses_kodekec']."' LIMIT $limit OFFSET $offset");
					while ($wg=pg_fetch_array($warga)){
						?>
                      <tr>
					  <td style='text-align:center'>
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $wg['id'];?>"/>
                       </td>
						<td><?php echo" $no"; ?></td>
						<td><?php echo" $wg[tglterdaftar]"; ?></td>
						<td><?php echo" $wg[id]"; ?></td>
						<td><?php echo" $wg[noreg]"; ?></td>
						<td><?php echo" $wg[nama]"; ?></td>
						<td><?php echo" $wg[nokk]"; ?></td>
						<td><?php echo" $wg[nik]"; ?></td>
						<td><?php echo" $wg[nama]"; ?></td>
						<td><?php echo" $wg[tempat_lahir]"; ?></td>
						<td><?php echo" $wg[tgl_lahir]"; ?></td>
						<td><?php echo" $wg[jenis_kelamin]"; ?></td>
						<td><?php echo" $wg[alamat_domisili]"; ?></td>
						<td><?php echo" $wg[alamat_ktp]"; ?></td>
						<td><?php echo" $wg[kelurahan]"; ?></td>
						<td><?php echo" $wg[lingkungan]"; ?></td>
						<td><?php echo" $wg[dasawisma]"; ?></td>
                      </tr>
					  <?php
                $no++;
              }
              ?>
                    </tbody>
                  </table>
				  </div>
				  </form>
                </div>

                <!-- Pagination -->
                <div class='box-footer clearfix'>
                  <ul class='pagination pagination-sm no-margin pull-right'>
                    <?php
                    $batas_halaman = 5;
                    $start = max(1, $page - floor($batas_halaman/2));
                    $end = min($total_pages, $start + $batas_halaman - 1);
                    if($end - $start < $batas_halaman - 1){
                      $start = max(1, $end - $batas_halaman + 1);
                    }
                    if($page > 1){
                      $prev = $page - 1;
                      echo "<li><a href=\"?module=rptdatawargakec&page=1\">&laquo;</a></li>";
                      echo "<li><a href=\"?module=rptdatawargakec&page=$prev\">&lsaquo;</a></li>";
                    }
                    for($i=$start; $i<=$end; $i++){
                      $aktif = ($i == $page) ? "class=\"active\"" : "";
                      echo "<li $aktif><a href=\"?module=rptdatawargakec&page=$i\">$i</a></li>";
                    }
                    if($page < $total_pages){
                      $next = $page + 1;
                      echo "<li><a href=\"?module=rptdatawargakec&page=$next\">&rsaquo;</a></li>";
                      echo "<li><a href=\"?module=rptdatawargakec&page=$total_pages\">&raquo;</a></li>";
                    }
                    ?>
                  </ul>
                  <p>Total: <?php echo $count; ?> records</p>
                </div>
              </div>


				
	 <?php
			
  }
}
?>				