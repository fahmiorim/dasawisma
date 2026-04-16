<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
  header('location:404.php');
}
else{
	$aksi = "module/hakakses/aksi_hakakses.php";
	 
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	$batas = 10;
	$hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
	$posisi = ($hal - 1) * $batas;

	$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM hakakses");
	$count_result = pg_fetch_array($count_query);
	$count = $count_result['total'];
	$query_data = "SELECT * FROM hakakses ORDER BY id LIMIT $batas OFFSET $posisi";

	$jml_hal = ceil($count / $batas);

	echo"
	
                <div class='box-header'>
                  <h2 class='box-title'>DATA HAK AKSES</h2>";
                ?>
		
			<div style="text-align:right">		
  
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=hakakses&act=tambahhakakses"><i class="fa fa-send"></i> Tambah</a> 
		  
		</div>	
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = $posisi + 1;
					$izi =pg_query($koneksi, $query_data);
					while ($iz=pg_fetch_array($izi)){       
			?>
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo $iz['nama_hak_ases']; ?></td>
						<td style='text-align:center'>
							<a href="?module=edithakakses&id=<?php echo $iz['id']; ?>" class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="?module=hapushakakses&id=<?php echo $iz['id']; ?>" class="btn btn-danger btn-flat margin" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-remove"></i></a>
						</td>
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                    
                  </table>
				  </div>
                </div>
				<div class="box-footer">
					<ul class="pagination pagination-sm no-margin pull-right">
						<?php
						if ($jml_hal > 1) {
							for ($i = 1; $i <= $jml_hal; $i++) {
								if ($i == $hal) {
									echo "<li class='active'><a href='#'>$i</a></li>";
								} else {
									echo "<li><a href='?module=hakakses&hal=$i'>$i</a></li>";
								}
							}
						}
						?>
					</ul>
				</div>
              </div>
	<?php		  
	 break;
	   case "tambahhakakses":
 ?>
	 <center><h3 class="box-title">Data Hak Akses</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=hakakses&act=input" method="POST">
				
					
					<div class="form-group">
					 <label for="namahakakses" class="col-sm-3 control-label">Hak Akses</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namahakakses" placeholder="Hak Akses">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
				</div>	
				

                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=hakakses" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
			
	 <?php		
  }
}
?>