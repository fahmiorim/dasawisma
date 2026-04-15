<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/dasawisma2/aksi_dasawisma2.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=dasawisma2';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">Edit Data dasawisma Kabupaten Batu Bara</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=dasawisma2&act=update"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from dasawisma where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
						
					<div class="form-group">
					  <label for="kode" class="col-sm-4 control-label">Kode<span class="text-danger"> *</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="kodedw" placeholder="Kode" value="<?php echo $r[kode];?>" readonly >
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="dasawisma" class="col-sm-4 control-label">Nama Dasawisma<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_dasawisma" value="<?php echo $r[nama_dasawisma];?>" placeholder="Nama dasawisma">
                       </div>
					 </div>
					
					<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='nama_lingkungan'>
						<option><?php echo $r[lingkungan];?></option>
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
					<label for="kode" class="col-sm-4 control-label">Kode Kelurahan <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="kode" value="<?php echo $r[kodekel];?>" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					<div class="form-group">
					  <label for="nama_kel" class="col-sm-4 control-label">Kelurahan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_kel" id="nama_kel" value="<?php echo $r[kelurahan];?>" placeholder="Kelurahan" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="nama_lurah" class="col-sm-4 control-label">Nama Lurah</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_lurah" id="nama_lurah" placeholder="Nama Lurah" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="kodekec" id="kodekec" value="<?php echo $r[kodekec];?>" placeholder="Kode Kecamatan" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="nama_kec" class="col-sm-4 control-label">Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_kec" id="nama_kec" value="<?php echo $r[kecamatan];?>" placeholder="Kecamatan" readonly>
                       </div>
					 </div>
					
					 <div class="form-group">
					  <label for="Keterangan" class="col-sm-4 control-label">Nama Ketua</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="keterangan" value="<?php echo $r[keterangan];?>" placeholder="Nama Ketua">
                       </div>
					 </div>
					
                  </div><!-- /.box-body -->
				</div>	
				
				<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <th>Kode Kel</th>
                                    <th>Kelurahan</th>
									<th>Alamat</th>
									<th>Kode Kec</th>
									<th>Kecamatan</th>
									<th>Nama Lurah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $qu = pg_query($koneksi, "SELECT * FROM kelurahan  ");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih1" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>"  data-nama_kel="<?php echo $data['nama_kel']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>" data-nama_kec="<?php echo $data['nama_kec']; ?>" data-nama_lurah="<?php echo $data['nama_lurah']; ?>">
										
                                        <td><?php echo $data['kode']; ?></td>
                                        <td><?php echo $data['nama_kel']; ?></td>
										 <td><?php echo $data['alamat']; ?></td>
										 <td><?php echo $data['kodekec']; ?></td>
										 <td><?php echo $data['nama_kec']; ?></td>
										 <td><?php echo $data['nama_lurah']; ?></td>
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
				
		<div class="divider"></div>
		<?php
			
		}
		?>
        
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