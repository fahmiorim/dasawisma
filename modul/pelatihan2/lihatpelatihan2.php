<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/pelatihan2/aksi_pelatihan2.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=pelatihan2';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">LIHAT DATA PELATIHAN</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=pelatihan2"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from pelatihan where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
					
					<div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry];?>"readonly>
                      </div>
					</div>
				  
				  <div class="form-group">
					  <label for="tahun" class="col-sm-4 control-label">Tahun<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $r[tahun];?>"readonly>
                       </div>
					 </div>
				  
                   <div class="form-group">
					  <label for="namapelatihan" class="col-sm-4 control-label">Nama Pelatihan<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namapelatihan" placeholder="Nama Pelatihan" value="<?php echo $r[namapelatihan];?>"readonly>
                       </div>
					 </div>
					
					 <div class="form-group">	
					  <label for="kriteria" class="col-sm-4 control-label">Kriteria Kader <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='kriteria' id='kriteria' readonly>
						<option><?php echo $r[kriteria];?></option>
						<?php
									$kr = pg_query($koneksi, "SELECT * FROM kriteria order by kode"); 
										while($p = pg_fetch_array($kr)){
													
											echo"
												<option value=\"$p[nama_kriteria]\">$p[nama_kriteria]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					
                    <div class="form-group">
					<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $r[nik];?>" readonly>
                     </div>
					 </div>
					
					  <div class="form-group">
					<label for="noreg" class="col-sm-4 control-label">No.Reg <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="text" class="validate[required] form-control" name="noreg" id="noreg" placeholder="noreg" value="<?php echo $r[noreg];?> "readonly>
                      </div>
					 </div>
					
					<div class="form-group">
					  <label for="nama" class="col-sm-4 control-label">Nama<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama" id="nama" placeholder="nama"  value="<?php echo $r[nama];?>" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" value="<?php echo $r[kodekel];?>" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakel" class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakel" id="namakel" placeholder="Nama Kelurahan" value="<?php echo $r[kelurahan];?>" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" value="<?php echo $r[kodekec];?>" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakec" class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakec" id="namakec" placeholder="Nama Kecamatan" value="<?php echo $r[kecamatan];?>" readonly>
                       </div>
					</div>
					
                  </div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-6">
					<div class="box-body">
					
					<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control' name='nama_lingkungan' id='lingkungan' readonly>
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
					  <label for="dasawisma" class="col-sm-4 control-label">Nama Dasawisma <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control' name='dasawisma' id='dasawisma'readonly>
						<option><?php echo $r[dasawisma];?></option>
						<?php
									$lk = pg_query($koneksi, "SELECT * FROM dasawisma where kodekel='$_SESSION[ses_kodekel]' order by kode"); 
										while($p = pg_fetch_array($lk)){
													
											echo"
												<option value=\"$p[nama_dasawisma]\">$p[nama_dasawisma]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					
					<div class="form-group">
					  <label for="Penyelenggara" class="col-sm-4 control-label">Penyelenggara<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="penyelenggara" id="penyelenggara" placeholder="Penyelenggara"value="<?php echo $r[penyelenggara];?>"readonly>
                       </div>
					 </div>
					
					<div class="form-group">
					 <label for="keterangan" class="col-sm-4 control-label">Keterangan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <select class=" validate[required] form-control" name='keterangan' id='keterangan' readonly>
							<option><?php echo $r[keterangan];?></option>
							<option value="Bersertifikat">Bersertifikat</option>
							<option value="Tidak Bersertifikat">Tidak Bersertifikat</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="userentry" class="col-sm-4 control-label">User Entry</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="userentry" id="userentry"value="<?php echo $r[userentry];?>"readonly>
                       </div>
					  </div>
					
					<div class="form-group">
					<label for="userentry" class="col-sm-4 control-label">Waktu Entry</label>
                      <div class="col-sm-4">
					   <input type="text" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo $r[waktuentry];?>"readonly>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="level" class="col-sm-4 control-label">Level User</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="level" id="level" value="<?php echo $r['level'];?>"readonly>
                       </div>
					</div>
				
					</div><!-- /.box-body -->
				</div>	
				
					<div class="form-group">
					  <div class="col-sm-10">
                        <label for="nb" class="col-sm-8 control-label">NB: Tanda (*) Wajib Diisikan, Jika tidak ada data isikan angka 0</label>
                       </div>
					</div>
		
		<div class="divider"></div>
		<?php
			
		}
		?>
        
		
		
        <div class="form-group">
               <div class="col-sm-offset-2 col-sm-5">
               				
				 <a class="btn btn-danger"  title="Kembali"  onclick="self.history.back()"><i class="fa fa-remove"></i>
                    Kembali
                </a>
            </div>
        </div>
		

    </form>
  </div>

	<?php
    }
}
?>