<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "module/mstanggota/aksi_mstanggota.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	$batas = 10;
	$hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
	$posisi = ($hal - 1) * $batas;

	$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM mstanggota");
	$count_result = pg_fetch_array($count_query);
	$count = $count_result['total'];
	$query_data = "SELECT * FROM mstanggota ORDER BY id LIMIT $batas OFFSET $posisi";

	$jml_hal = ceil($count / $batas);

	echo"
	

                <div class='box-header'>
                  <h2 class='box-title'>DATA STATUS ANGGOTA PKK</h2>";
                ?>
		
			<div style="text-align:right">
			
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstanggota&act=tambahmstanggota"><i class="fa fa-send"></i> Tambah</a> 
		  
		</div>	
			
				
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Status Anggota</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = $posisi + 1;
					$lingk =pg_query($koneksi, $query_data);
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $lk['stsanggota']; ?></td>
						<td style='text-align:center'>
							<a href="?module=lihatmstanggota&id=<?php echo $lk['id']; ?>" class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-desktop"></i></a>
							<a href="?module=editmstanggota&id=<?php echo $lk['id']; ?>" class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="?module=hapusmstanggota&id=<?php echo $lk['id']; ?>" class="btn btn-danger btn-flat margin" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-remove"></i></a>
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
									echo "<li><a href='?module=mstanggota&hal=$i'>$i</a></li>";
								}
							}
						}
						?>
					</ul>
				</div>
              </div>
	<?php		  
	 break;
	   case "tambahmstanggota":
 ?>
	 <center><h3 class="box-title">DATA STATUS ANGGOTA PKK</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=mstanggota&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
                   	
					
					 <div class="form-group">
					  <label for="stsanggota" class="col-sm-4 control-label">Status Anggota<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="stsanggota" placeholder="Status Anggota">
                       </div>
					 </div>
					
					</div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=mstanggota" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>

	 
	 
	 <?php

			
  }
}
?>