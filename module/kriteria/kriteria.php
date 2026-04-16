<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "module/kriteria/aksi_kriteria.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	$batas = 10;
	$hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
	$posisi = ($hal - 1) * $batas;

	$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM kriteria");
	$count_result = pg_fetch_array($count_query);
	$count = $count_result['total'];
	$query_data = "SELECT * FROM kriteria ORDER BY kode LIMIT $batas OFFSET $posisi";

	$jml_hal = ceil($count / $batas);
  
	echo"
	
	
                <div class='box-header'>
                  <h2 class='box-title'>DATA KRITERIA KABUPATEN BATU BARA</h2>";
                ?>
		
			<div style="text-align:right">
			
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=kriteria&act=tambahkriteria"><i class="fa fa-send"></i> Tambah</a> 
		  
		</div>	
				
				
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
						<th>Data Kriteria</th>
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
                        <td><?php echo $lk['kode']; ?></td>
						<td><?php echo $lk['nama_kriteria']; ?></td>
						<td style='text-align:center'>
							<a href="?module=lihatkriteria&id=<?php echo $lk['id']; ?>" class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-desktop"></i></a>
							<a href="?module=editkriteria&id=<?php echo $lk['id']; ?>" class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="?module=hapuskriteria&id=<?php echo $lk['id']; ?>" class="btn btn-danger btn-flat margin" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-remove"></i></a>
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
                
                <!-- Pagination -->
                <div class='box-footer'>
                  <ul class='pagination pagination-sm no-margin pull-right'>
                    <?php
					if ($jml_hal > 1) {
						for ($i = 1; $i <= $jml_hal; $i++) {
							if ($i == $hal) {
								echo "<li class='active'><a href='#'>$i</a></li>";
							} else {
								echo "<li><a href='?module=kriteria&hal=$i'>$i</a></li>";
							}
						}
					}
					?>
                  </ul>
                  <p>Total: <?php echo $count; ?> records</p>
                </div>
              </div>
	<?php		  
	 break;
	   case "tambahkriteria":
 ?>
	 <center><h3 class="box-title">Data Kriteria Kabupaten Batu Bara </h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=kriteria&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
					<label for="kode" class="col-sm-4 control-label">Kode<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kode" placeholder="Kode">
                     </div>
					 </div>
					
					 <div class="form-group">
					  <label for="kriteria" class="col-sm-4 control-label">Nama Kriteria<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="nama_kriteria" placeholder="Nama Kriteria">
                       </div>
					 </div>
					
					</div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=kriteria" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>

	 
	 
	 <?php

			
  }
}
?>