<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/kehamilan/aksi_kehamilan.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=kehamilan';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">EDIT CATATAN IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL*, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=kehamilan&act=update"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from kehamilan where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
					
					<div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry];?>" >
                      </div>
					</div>
				  
                   <div class="form-group">
					 <label for="bulan" class="col-sm-4 control-label">Bulan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control select2" name='bulan' id='bulan' >
							<option><?php echo $r[bulan];?></option>
							<option value="Januari">Januari</option>
							<option value="Februari">Februari</option>
							<option value="Maret">Maret</option>
							<option value="April">April</option>
							<option value="Mei">Mei</option>
							<option value="Juni">Juni</option>
							<option value="Juli">Juli</option>
							<option value="Agustus">Agustus</option>
							<option value="September">September</option>
							<option value="Oktober">Oktober</option>
							<option value="November">November</option>
							<option value="Desember">Desember</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="tahun" class="col-sm-4 control-label">Tahun<span class="text-danger"> *</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="validate[required] form-control" id="tahun" name="tahun" placeholder="yyyy" value="<?php echo $r[tahun];?>">
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
					 
					 <div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='nama_lingkungan' id='lingkungan' >
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
                       <select class='validate[required] form-control select2' name='dasawisma' id='dasawisma'>
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
					<label for="jlhbumil" class="col-sm-4 control-label">Jumlah Ibu Hamil<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhbumil" id="jlhbumil" value="<?php echo $r[jlhbumil];?>" placeholder="Ibu Hamil">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="jlhmelahirkan" class="col-sm-4 control-label">Jumlah Ibu Melahirkan<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhmelahirkan" id="jlhmelahirkan" value="<?php echo $r[jlhmelahirkan];?>" placeholder="Ibu Melahirkan">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="jlhnifas" class="col-sm-4 control-label">Jumlah Ibu Nifas<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhnifas" id="jlhnifas" value="<?php echo $r[jlhnifas];?>" placeholder="Ibu Nifas">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="jlhmeninggal" class="col-sm-4 control-label">Jumlah Ibu Meninggal<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhmeninggal" id="jlhmeninggal" value="<?php echo $r[jlhmeninggal];?>" placeholder="Ibu Meninggal">
                     </div>
					 </div>
					 
					
					
                  </div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-6">
					<div class="box-body">
					
					<div class="form-group">
					<label for="bayilahirl" class="col-sm-4 control-label">Jlh Bayi Lahir LK<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bayilahirl" id="bayilahirl" value="<?php echo $r[bayilahirl];?>" placeholder="Bayi Lahir LK">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="bayilahirp" class="col-sm-4 control-label">Jlh Bayi Lahir Pr<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bayilahirp" id="bayilahirp" value="<?php echo $r[bayilahirp];?>" placeholder="Bayi Lahir Pr">
                     </div>
					 </div>
					
					<div class="form-group">
					 <label for="akte" class="col-sm-4 control-label">Akte Kelahiran</label>
					  <div class="col-sm-5">
                        <select class="form-control" name='akte' id='akte' >
							<option><?php echo $r[akte];?></option>
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="bayimeninggalk" class="col-sm-4 control-label">Bayi Meninggal LK<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bayimeninggalk" id="bayimeninggalk" value="<?php echo $r[bayimeninggalk];?>" placeholder="Bayi Meninggal LK">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="bayimeninggalp" class="col-sm-4 control-label">Bayi Meninggal Pr<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bayimeninggalp" id="bayimeninggalp" value="<?php echo $r[bayimeninggalp];?>" placeholder="Bayi Meninggal Pr">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="balital" class="col-sm-4 control-label">Balita Meninggal LK<span class="text-danger">*</span></label>
					  <div class="col-sm-5">
					    <input type="text" class="validate[required,custom[number]] form-control" name="balital" id="balital" value="<?php echo $r[balital];?>" placeholder="Balita Meninggal LK">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="balitap" class="col-sm-4 control-label">Balita Meninggal Pr<span class="text-danger">*</span></label>
					  <div class="col-sm-5">
					    <input type="text" class="validate[required,custom[number]] form-control" name="balitap" id="balitap" value="<?php echo $r[balitap];?>" placeholder="Balita Meninggal Pr">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="keterangan" class="col-sm-4 control-label">Keterangan</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="keterangan" value="<?php echo $r[keterangan];?>" placeholder="Keterangan">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="userentry" class="col-sm-4 control-label">User Entry</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="userentry" id="userentry"value="<?php echo $_SESSION['ses_nama'];?>"readonly>
                       </div>
					  </div>
					
					<div class="form-group">
					<label for="userentry" class="col-sm-4 control-label">Waktu Entry</label>
                      <div class="col-sm-4">
					   <input type="text" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo "$jam_sekarang";?>"readonly>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="level" class="col-sm-4 control-label">Level User</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="level" id="level" value="<?php echo $_SESSION['ses_level'];?>"readonly>
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
                <button class="btn bg-purple btn-flat margin"  name="cmdeditkehamilan" title="Edit" ><i class="fa fa-pencil"></i>
                   Edit
                </button>
				
				 <a class="btn btn-danger"  title="Batal"  onclick="self.history.back()"><i class="fa fa-remove"></i>
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