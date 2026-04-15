<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/dasawisma/aksi_dasawisma.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kec = pg_query($koneksi, "SELECT * FROM dasawisma");
  $count=pg_num_rows($kec);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA DASAWISMA KABUPATEN BATU BARA</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">
			
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=dasawisma&act=tambahdasawisma"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_dasawisma();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_dasawisma();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_dasawisma();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
			
				
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
                        <th>Kode</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Desa/Kelurahan</th>
						<th>Kecamatan</th>
						<th>Nama Ketua</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$lingk =pg_query($koneksi, "select * from dasawisma where kodekel='$_SESSION[ses_kodekel]' AND nama_dasawisma IS NOT NULL AND nama_dasawisma != '' order by lingkungan");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $lk[kode]"; ?></td>
						<td><?php echo" $lk[nama_dasawisma]"; ?></td>
						<td><?php echo" $lk[lingkungan]"; ?></td>
						<td><?php echo" $lk[kelurahan]"; ?></td>
						<td><?php echo" $lk[kecamatan]"; ?></td>
						<td><?php echo" $lk[keterangan]"; ?></td>
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
              </div>
	<?php		  
	 break;
	   case "tambahdasawisma":
	   $kdkel=$_SESSION[ses_kodekel];
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
				</div>
	 
	 
	 <?php

			
  }
}
?>				