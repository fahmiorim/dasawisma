<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/useradmin/aksi_useradmin.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $ush = pg_query($koneksi, "SELECT * FROM users ");
  $count=pg_num_rows($ush);
  
  // Pagination
  $limit = 10;
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  if($page < 1) $page = 1;
  $offset = ($page - 1) * $limit;
  $total_pages = ceil($count / $limit);
  
	echo"
	
                <div class='box-header'>
                  <h2 class='box-title'>Pembuatan User Admin System</h2>
				</div>  ";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">		
          <a  class="btn bg-purple margin"  title="Tambah" href="?module=useradmin&act=tambahuseradmin"><i class="fa fa-plus"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn bg-olive btn-flat margin"  title="Edit"  onClick="update_records_useradmin();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger"  title="Hapus"   onClick="hapus_records_useradmin();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
			
				<?php if ($_SESSION['ses_level']=='admin'){ ?>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
						<th>level</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
						<th>No.HP</th>
						<th>Foto</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = $offset + 1;
					$ush =pg_query($koneksi, "select * from users order by kodekec,kodekel LIMIT $limit OFFSET $offset");
					while ($us=pg_fetch_array($ush)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $us['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $us[nama_lengkap]"; ?></td>
                        <td><?php echo" $us[username]"; ?></td>
						<td><?php echo" $us[level]"; ?></td>
						<td><?php echo" $us[namakel]"; ?></td>
						<td><?php echo" $us[namakec]"; ?></td>
						<td><?php echo" $us[nohp]"; ?></td>
						<td align="center">
						<?php
						$foto=$us['foto'];
						if($foto==''){
						?>
						<img src="images/foto_user/blank.png" width="50">
						<?php }else { ?>	
						<img src="img/foto_user/<?php echo $us['foto'];?>" width="50"> 
						<?php } ?>
						
						</td>
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                    
                  </table>
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
                      echo "<li><a href=\"?module=useradmin&page=1\">&laquo;</a></li>";
                      echo "<li><a href=\"?module=useradmin&page=$prev\">&lsaquo;</a></li>";
                    }
                    for($i=$start; $i<=$end; $i++){
                      $aktif = ($i == $page) ? "class=\"active\"" : "";
                      echo "<li $aktif><a href=\"?module=useradmin&page=$i\">$i</a></li>";
                    }
                    if($page < $total_pages){
                      $next = $page + 1;
                      echo "<li><a href=\"?module=useradmin&page=$next\">&rsaquo;</a></li>";
                      echo "<li><a href=\"?module=useradmin&page=$total_pages\">&raquo;</a></li>";
                    }
                    ?>
                  </ul>
                  <p>Total: <?php echo $count; ?> records</p>
                </div>
              </div>
			  <?php
				}
				   else {
			  ?>
			  <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
						<th>level</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
						<th>No.HP</th>
						<th>Foto</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = $offset + 1;
					$ush =pg_query($koneksi, "select * from users order by kodekec,kodekel LIMIT $limit OFFSET $offset");
					while ($us=pg_fetch_array($ush)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $us['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $us[nama_lengkap]"; ?></td>
                        <td><?php echo" $us[username]"; ?></td>
						<td><?php echo" $us[level]"; ?></td>
						<td><?php echo" $us[namakel]"; ?></td>
						<td><?php echo" $us[namakec]"; ?></td>
						<td><?php echo" $us[nohp]"; ?></td>
						<td align="center"><img src="img/foto_user/<?php echo $us['foto'];?>" width="78"> </td>
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                    
                  </table>
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
                      echo "<li><a href=\"?module=useradmin&page=1\">&laquo;</a></li>";
                      echo "<li><a href=\"?module=useradmin&page=$prev\">&lsaquo;</a></li>";
                    }
                    for($i=$start; $i<=$end; $i++){
                      $aktif = ($i == $page) ? "class=\"active\"" : "";
                      echo "<li $aktif><a href=\"?module=useradmin&page=$i\">$i</a></li>";
                    }
                    if($page < $total_pages){
                      $next = $page + 1;
                      echo "<li><a href=\"?module=useradmin&page=$next\">&rsaquo;</a></li>";
                      echo "<li><a href=\"?module=useradmin&page=$total_pages\">&raquo;</a></li>";
                    }
                    ?>
                  </ul>
                  <p>Total: <?php echo $count; ?> records</p>
                </div>
              </div>
				   <?php } ?>
			  
	<?php		  
	 break;
	   case "tambahuseradmin":
	    if ($_SESSION['ses_level']=='admin'){
	 ?>
	 <center><h3 class="box-title">Pembuatan User System</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=useradmin&act=input" method="POST" enctype="multipart/form-data" id="popup-validation">
				<div class="col-md-6">
                  <div class="box-body">
				  
				  <div class="form-group">
					  <label for="tgldaftar" class="col-sm-4 control-label">Tgl. Daftar <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tanggal" name="tgldaftar" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang";?>" readonly>
                      </div>
					</div>
				  
                    <div class="form-group">
                      <label for="username" class="col-sm-4 control-label">Username <span class="bs-label label-danger"> *</span></small></label>
                      <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="username" placeholder="Username" >
						</div>
					</div>
					
					<div class="form-group">
					 <label for="password" class="col-sm-4 control-label">Password <span class="bs-label label-danger"> *</span></small></label>
					  <div class="col-sm-7">
                        <input type="password" class="validate[required] form-control" name="password" placeholder="Password">
                      </div>
                    </div>
					
					<div class="form-group">
					 <label for="nik" class="col-sm-4 control-label">NIK <span class="bs-label label-danger"> *</span></small></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nik" placeholder="NIK" >
                      </div>
                    </div>
					<div class="form-group">
					 <label for="nama_lengkap" class="col-sm-4 control-label">Nama Lengkap <span class="bs-label label-danger"> *</span></small></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_lengkap" placeholder="Nama Lengkap" >
                      </div>
                    </div>
					
					<div class="form-group">
					 <label for="nohp" class="col-sm-4 control-label">No.HP/Telepon</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="nohp" placeholder="No.HP/Telepon" >
                      </div>
                    </div>
					
					<div class="form-group">	
					  <label for="level" class="col-sm-4 control-label">Level <span class="bs-label label-danger"> *</span></small></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control' name='level' id='level'>
						<option></option>
						<?php
									$level = pg_query($koneksi, "SELECT * FROM hakakses order by id"); 
										while($p = pg_fetch_array($level)){
													
											echo"
												<option value=\"$p[nama_hak_ases]\">$p[nama_hak_ases]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					  
                  </div><!-- /.box-body -->
				</div>	
				
			
		
			
			
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=useradmin" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>

	 
	 
	 <?php
		}
			
  }
}
?>				