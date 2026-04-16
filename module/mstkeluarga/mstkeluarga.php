<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "module/mstkeluarga/aksi_mstkeluarga.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kec = pg_query($koneksi, "SELECT * FROM mstkeluarga");
  $count=pg_num_rows($kec);
  
  // Pagination
  $limit = 10;
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  if($page < 1) $page = 1;
  $offset = ($page - 1) * $limit;
  $total_pages = ceil($count / $limit);
  
	echo"
	

                <div class='box-header'>
                  <h2 class='box-title'>DATA STATUS KELUARGA</h2>";
                ?>
		
			<div style="text-align:right">
			
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstkeluarga&act=tambahmstkeluarga"><i class="fa fa-send"></i> Tambah</a> 
		  
		</div>	
			
				
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Status Keluarga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = $offset + 1;
					$lingk =pg_query($koneksi, "select * from mstkeluarga order by id LIMIT $limit OFFSET $offset");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $lk['stskeluarga']; ?></td>
						<td style='text-align:center'>
							<a href="?module=lihatmstkeluarga&id=<?php echo $lk['id']; ?>" class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-desktop"></i></a>
							<a href="?module=editmstkeluarga&id=<?php echo $lk['id']; ?>" class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="?module=hapusmstkeluarga&id=<?php echo $lk['id']; ?>" class="btn btn-danger btn-flat margin" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-remove"></i></a>
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
                    <?php if($page > 1): ?>
                      <li><a href='?module=mstkeluarga&page=<?php echo $page - 1; ?>'>&laquo; Prev</a></li>
                    <?php endif; ?>
                    
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                      <li class='<?php echo $i == $page ? 'active' : ''; ?>'>
                        <a href='?module=mstkeluarga&page=<?php echo $i; ?>'><?php echo $i; ?></a>
                      </li>
                    <?php endfor; ?>
                    
                    <?php if($page < $total_pages): ?>
                      <li><a href='?module=mstkeluarga&page=<?php echo $page + 1; ?>'>Next &raquo;</a></li>
                    <?php endif; ?>
                  </ul>
                  <p>Total: <?php echo $count; ?> records</p>
                </div>
              </div>
	<?php		  
	 break;
	   case "tambahmstkeluarga":
 ?>
	 <center><h3 class="box-title">Data Status Keluarga</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=mstkeluarga&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
                   	
					
					 <div class="form-group">
					  <label for="stskeluarga" class="col-sm-4 control-label">Status Keluarga<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="stskeluarga" placeholder="Status Keluarga">
                       </div>
					 </div>
					
					</div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=mstkeluarga" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>

	 
	 
	 <?php

			
  }
}
?>