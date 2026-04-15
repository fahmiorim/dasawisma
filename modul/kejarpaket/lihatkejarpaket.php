<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/kejarpaket/aksi_kejarpaket.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=kejarpaket';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">LIHAT DATA KEJAR PAKET/KF/PAUD</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=kejarpaket"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from kejarpaket where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
					
					<div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry];?>" readonly>
                      </div>
					</div>
				  
				  <div class="form-group">
					 <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					   <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="form-control" name="kodekel" id="kode" placeholder="Kode Kelurahan" value="<?php echo $r[kodekel];?>" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakel" class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakel" id="nama_kel" placeholder="Nama Kelurahan" value="<?php echo $r[kelurahan];?>" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <input type="text" class="form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" value="<?php echo $r[kodekec];?>" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakec" class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakec" id="nama_kec" placeholder="Nama Kecamatan" value="<?php echo $r[kecamatan];?>" readonly>
                       </div>
					</div>
					 
					
					 
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
                       <select class='validate[required] form-control' name='dasawisma' id='dasawisma' readonly>
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
					  <label for="namapaket" class="col-sm-4 control-label">Nama Kejar Paket/KF/PAUD<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namapaket" id="namapaket" placeholder="Nama Kejar Paket/KF/PAUD" value="<?php echo $r[namapaket];?>"readonly>
                       </div>
					 </div>
				  
				  <div class="form-group">
					 <label for="jenis" class="col-sm-4 control-label">Jenis PAKET/KF/PAUD<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <select class=" validate[required] form-control" name='jenis' id='jenis' readonly>
							<option><?php echo $r[jenis];?></option>
							<option value="Paket A">Paket A</option>
							<option value="Paket B">Paket B</option>
							<option value="Paket C">Paket C</option>
							<option value="Keaksaraan Fungsional">Keaksaraan Fungsional</option>
							<option value="PAUD">PAUD</option>
						</select>
                      </div>
					</div>
                  
					
                  </div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-6">
					<div class="box-body">
					
					<div class="form-group">
					 <label for="stspengelola" class="col-sm-4 control-label">Status Pengelola<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <select class=" validate[required] form-control" name='stspengelola' id='stspengelola' readonly>
							<option><?php echo $r[stspengelola];?></option>
							<option value="Dikelola PKK">Dikelola PKK</option>
							<option value="Dikelola Institusi Lain">Dikelola Institusi Lain</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
						<label for="jlhwaber" class="col-sm-4 control-label">Jumlah Warga Belajar</label>
					</div>
					<div class="form-group">
					<label for="anggotalk" class="col-sm-4 control-label">Laki-Laki<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="waberlk" id="waberlk" placeholder="Laki-Laki" value="<?php echo $r[waberlk];?>" readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="waberpr" class="col-sm-4 control-label">Perempuan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="waberpr" id="waberpr" placeholder="Perempuan" value="<?php echo $r[waberpr];?>"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
						<label for="jlhpengajar" class="col-sm-4 control-label">Jumlah Pengajar</label>
					</div>
					<div class="form-group">
					<label for="pengajarlk" class="col-sm-4 control-label">Laki-Laki<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="pengajarlk" id="pengajarlk" placeholder="Laki-Laki" value="<?php echo $r[pengajarlk];?>"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="pengajarpr" class="col-sm-4 control-label">Perempuan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="pengajarpr" id="pengajarpr" placeholder="Perempuan"value="<?php echo $r[pengajarpr];?>"readonly>
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