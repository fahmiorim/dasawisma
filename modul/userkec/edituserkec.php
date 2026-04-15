<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../index.php');
  
}
else{
	$aksi = "modul/userkec/aksi_userkec.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi User Belum Di pilih');
       window.location.href = 'appmaster.php?module=userkec';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">Edit User Kecamatan</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=userkec&act=update">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from users where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
        <div class="col-md-6">
                  <div class="box-body">
				  
				  <div class="form-group">
					  <label for="tgldaftar" class="col-sm-4 control-label">Tgl. Daftar <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tanggal" name="tgldaftar" placeholder="YYYY-MM-DD" value="<?php echo "$r[tgldaftar]";?>" readonly>
                      </div>
					</div>
				  
                    <div class="form-group">
                      <label for="username" class="col-sm-4 control-label">Username <span class="bs-label label-danger"> *</span></small></label>
                      <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="username" value="<?php echo "$r[username]"; ?>" placeholder="Username" >
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
                        <input type="text" class="validate[required] form-control" name="nik" value="<?php echo "$r[nik]"; ?>"placeholder="NIK" >
                      </div>
                    </div>
					<div class="form-group">
					 <label for="nama" class="col-sm-4 control-label">Nama Lengkap <span class="bs-label label-danger"> *</span></small></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_lengkap" value="<?php echo "$r[nama_lengkap]"; ?>" placeholder="Nama Lengkap" >
                      </div>
                    </div>
					
					<div class="form-group">
					<label for="kode" class="col-sm-4 control-label">Kode Kecamatan <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kodekec" id="kodekec" placeholder="kode" value="<?php echo "$r[kodekec]"; ?>" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					<div class="form-group">
					  <label for="nama_kec" class="col-sm-4 control-label">Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_kec" id="nama_kec" value="<?php echo "$r[namakec]"; ?>" placeholder="Kecamatan" readonly>
                       </div>
					 </div>
					<div class="form-group">
					 <label for="nohp" class="col-sm-4 control-label">No.HP/Telepon</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nohp" value="<?php echo "$r[nohp]"; ?>"placeholder="No.HP/Telepon" >
                      </div>
                    </div>
					<div class="form-group">	
					  <label for="level" class="col-sm-4 control-label">Level <span class="bs-label label-danger"> *</span></small></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control' name='level' id='level'>
						<option><?php echo "$r[level]"; ?></option>
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
				
		<?php
			
		}
		?>
        
		
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Kelurahan</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Kec</th>
									<th>Kecamatan</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $qu = pg_query($koneksi, "SELECT * FROM kecamatan  ");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih2" data-id="<?php echo $data['id']; ?>" data-kodekec="<?php echo $data['kode']; ?>" data-nama_kec="<?php echo $data['nama_kec']; ?>">
										
                                       
										 <td><?php echo $data['kode']; ?></td>
										 <td><?php echo $data['nama_kec']; ?></td>
										 
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
		
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button class="btn bg-purple btn-flat margin"  title="Edit" ><i class="fa fa-pencil"></i>
                   Edit
                </button>
				
				 <a class="btn btn-danger"  title="Hapus"  onclick="self.history.back()"><i class="fa fa-remove"></i>
                    Batal
                </a>
            </div>
        </div>
		

    </form>
  </div>

	<?php
    }
}
?>