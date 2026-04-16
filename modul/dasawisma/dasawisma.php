<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
  include "../config/koneksi.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  // Tentukan action file berdasarkan role
  if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
    $aksi = "modul/dasawisma/aksi_dasawisma.php";
    $view_func = "view_records_dasawisma()";
    $update_func = "update_records_dasawisma()";
    $delete_func = "delete_records_dasawisma()";
  } else {
    $aksi = "modul/dasawisma/aksi_dasawisma.php";
    $view_func = "view_records_dasawisma()";
    $update_func = "update_records_dasawisma()";
    $delete_func = "delete_records_dasawisma()";
  }

  switch($act){
    default:
    // Tentukan query berdasarkan role
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      // Admin/Admpkk: semua data dengan pagination
      $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM dasawisma WHERE nama_dasawisma IS NOT NULL AND nama_dasawisma != ''");
      if (!$count_query) {
        echo "Error count query: " . pg_last_error($koneksi);
      }
      $count_result = pg_fetch_array($count_query);
      $count = $count_result['total'];
      $title = "DATA DASAWISMA KABUPATEN BATU BARA";
      $use_pagination = true;
    } else {
      // Kelurahan: filter by kodekel
      $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM dasawisma WHERE kodekel='$_SESSION[ses_kodekel]' AND nama_dasawisma IS NOT NULL AND nama_dasawisma != ''");
      $count_result = pg_fetch_array($count_query);
      $count = $count_result['total'];
      $title = "DATA DASAWISMA DESA " . $_SESSION['ses_namakel'];
      $use_pagination = false;
    }

	?>
	
          
                  <div class='box-header'>
                    <h3 class='box-title'><?php echo $title; ?></h3>
                  </div>
                <div class='box-body'>
				<form method="post" name="frm">
				<div style="text-align:right">
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>
          <?php if ($_SESSION['ses_level'] == 'admkel') { ?>
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=dasawisma&act=tambahdasawisma"><i class="fa fa-send"></i> Tambah</a>
          <?php } ?>
		</div>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
						<th width="50">No</th>
                        <th>Kode</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Desa/Kelurahan</th>
						<th>Kecamatan</th>
						<th>Nama Ketua</th>
						<th width="150">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
          if ($use_pagination) {
            // Admin/Admpkk dengan pagination
            $batas = 10;
            $hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
            $posisi = ($hal - 1) * $batas;
            
            $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM dasawisma WHERE nama_dasawisma IS NOT NULL AND nama_dasawisma != ''");
            $count_result = pg_fetch_array($count_query);
            $jmldata = $count_result['total'];
            $jmlhalaman = ceil($jmldata/$batas);
            
            $no = $posisi + 1;
            $lingk = pg_query($koneksi, "SELECT id, kode, nama_dasawisma, lingkungan, kelurahan, kecamatan, keterangan FROM dasawisma WHERE nama_dasawisma IS NOT NULL AND nama_dasawisma != '' ORDER BY kelurahan, lingkungan DESC LIMIT $batas OFFSET $posisi");
            if (!$lingk) {
              echo "<tr><td colspan='8'>Error query</td></tr>";
            } else {
              $num_rows = pg_num_rows($lingk);
              if ($num_rows == 0) {
                echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
              } else {
                while ($lk=pg_fetch_array($lingk)){       
          ?>
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo $lk['kode']; ?></td>
						<td><?php echo $lk['nama_dasawisma']; ?></td>
						<td><?php echo $lk['lingkungan']; ?></td>
						<td><?php echo $lk['kelurahan']; ?></td>
						<td><?php echo $lk['kecamatan']; ?></td>
						<td><?php echo $lk['keterangan']; ?></td>
						<td>
							<a href="?module=lihatdasawisma&id=<?php echo $lk['id']; ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
							<a href="?module=editdasawisma&id=<?php echo $lk['id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
							<a href="?module=hapusdasawisma&id=<?php echo $lk['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
						</td>
                      </tr>
					  <?php
                $no++;
              }
              }
            }
          } 
          else {
            // Kelurahan tanpa pagination
            $no = 1;
            $lingk = pg_query($koneksi, "select * from dasawisma where kodekel='$_SESSION[ses_kodekel]' AND nama_dasawisma IS NOT NULL AND nama_dasawisma != '' order by lingkungan");
            while ($lk=pg_fetch_array($lingk)){       
          ?>
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo $lk['kode']; ?></td>
						<td><?php echo $lk['nama_dasawisma']; ?></td>
						<td><?php echo $lk['lingkungan']; ?></td>
						<td><?php echo $lk['kelurahan']; ?></td>
						<td><?php echo $lk['kecamatan']; ?></td>
						<td><?php echo $lk['keterangan']; ?></td>
						<td>
							<a href="?module=lihatdasawisma&id=<?php echo $lk['id']; ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
							<a href="?module=editdasawisma&id=<?php echo $lk['id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
							<a href="?module=hapusdasawisma&id=<?php echo $lk['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
						</td>
                      </tr>
					  <?php
                $no++;
              }
          }
              ?> 
                    </tbody>
                    
                  </table>
				  </div>
				  </form>
                </div>
              </div>
          
          <?php if ($use_pagination) { ?>
				  <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <?php
                      $batas_halaman = 5;
                      $start = max(1, $hal - floor($batas_halaman/2));
                      $end = min($jmlhalaman, $start + $batas_halaman - 1);
                      if($end - $start < $batas_halaman - 1){
                        $start = max(1, $end - $batas_halaman + 1);
                      }
                      
                      if($hal > 1){
                        $prev = $hal - 1;
                        echo "<li><a href=\"?module=dasawisma&hal=1\">&laquo;</a></li>";
                        echo "<li><a href=\"?module=dasawisma&hal=$prev\">&lsaquo;</a></li>";
                      }
                      for($i=$start; $i<=$end; $i++){
                        $aktif = ($i == $hal) ? "class=\"active\"" : "";
                        echo "<li $aktif><a href=\"?module=dasawisma&hal=$i\">$i</a></li>";
                      }
                      if($hal < $jmlhalaman){
                        $next = $hal + 1;
                        echo "<li><a href=\"?module=dasawisma&hal=$next\">&rsaquo;</a></li>";
                        echo "<li><a href=\"?module=dasawisma&hal=$jmlhalaman\">&raquo;</a></li>";
                      }
                      ?>
                    </ul>
                  </div>
          <?php } ?>
	<?php		  
	 break;
	   case "tambahdasawisma":
	   $kdkel=$_SESSION['ses_kodekel'];
	  $rand5 = randpass5(4);
	 ?>
	 <center><h3 class="box-title">Data Dasawisma Kabupaten Batu Bara</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=dasawisma&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
					<label for="kode" class="col-sm-4 control-label">Kode<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kode" placeholder="Kode" value="<?php echo "$kdkel$rand5"; ?>" readonly>
                     </div>
					 </div>
					
					 <div class="form-group">
					  <label for="dasawisma" class="col-sm-4 control-label">Nama dasawisma<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_dasawisma" placeholder="Nama dasawisma">
                       </div>
					 </div>
					<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='nama_lingkungan'>
						<option></option>
						<?php
									$lk = pg_query($koneksi, "SELECT * FROM lingkungan order by kode"); 
										while($p = pg_fetch_array($lk)){
													
											echo"
												<option value=\"$p[nama_lingkungan]\">$p[nama_lingkungan]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					<div class="form-group">
					  <label for="keterangan" class="col-sm-4 control-label">Nama Ketua</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="keterangan" placeholder="Nama Ketua">
                       </div>
					 </div>
					
					<div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="kodekel" id="kodekel" value="<?php echo $_SESSION['ses_kodekel'];?>">
                       </div>
					</div>
					
					<div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="namakel" id="namakel" value="<?php echo $_SESSION['ses_namakel'];?>">
                       </div>
					</div>
					
					<div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="kodekec" id="kodekec" value="<?php echo $_SESSION['ses_kodekec'];?>">
                       </div>
					</div>
					
					<div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="namakec" value="<?php echo $_SESSION['ses_namakec'];?>">
                       </div>
					</div>
					
					</div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=dasawisma" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
		
	 
	 
	 <?php

			
  }
}
?>