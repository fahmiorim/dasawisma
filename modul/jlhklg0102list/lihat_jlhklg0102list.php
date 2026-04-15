<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=jlhklg0102list';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">LIHAT CATATAN KELUARGA KELURAHAN LIMAU MUNGKUR KOTA BINJAI</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=jlhklg0102list"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from keluarga where id=".$id);
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
					<label for="noreg" class="col-sm-4 control-label">No.Reg <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="noreg" id="noreg" placeholder="noreg" value="<?php echo $r[noreg];?>" readonly>
                      </div>
					 </div>
					
					<div class="form-group">
					  <label for="namakk" class="col-sm-4 control-label">Kepala Keluarga<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="namakk" id="nama" placeholder="Kepala Keluarga" value="<?php echo $r[namakk];?>" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					<label for="nokk" class="col-sm-4 control-label">No.KK<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <input type="text" class="validate[required,custom[number]] form-control" name="nokk" value="<?php echo $r[nokk];?>" placeholder="No.KK"readonly>
                     </div>
					 </div>
					 
					<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='nama_lingkungan'readonly>
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
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='dasawisma'readonly>
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
                     <label for="jlhkel" class="col-sm-5 control-label">I. Data Anggota Keluarga</label>
				    </div>
					
					<div class="form-group">
					<label for="anggotakelpr" class="col-sm-4 control-label">Laki-Laki<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="anggotakelpr" id="anggotakelpr" placeholder="Laki-Laki" value="<?php echo $r[anggotakelpr];?>"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="anggotakelw" class="col-sm-4 control-label">Perempuan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="anggotakelw" id="anggotakelw" placeholder="Perempuan" value="<?php echo $r[anggotakelw];?>" readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="anggotakel" class="col-sm-4 control-label">Total<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="anggotakel" id="anggotakel" value="<?php echo $r[anggotakel];?>" placeholder="Total"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="jlhkk" class="col-sm-4 control-label">Jumlah KK<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhkk" id="jlhkk" value="<?php echo $r[jlhkk];?>" placeholder="Jumlah KK"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="balitapr" class="col-sm-4 control-label">Balita Laki-Laki<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="balitapr" id="balitapr" value="<?php echo $r[balitapr];?>" placeholder="Balita Laki-Laki"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="balitaw" class="col-sm-4 control-label">Balita Perempuan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="balitaw" id="balitaw" value="<?php echo $r[balitaw];?>" placeholder="Balita Perempuan"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="balita" class="col-sm-4 control-label">Jumlah Balita<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="balita" id="balita" value="<?php echo $r[balita];?>" placeholder="Jumlah Balita"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="pus" class="col-sm-4 control-label">PUS<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="pus" id="pus" value="<?php echo $r[pus];?>" placeholder="PUS"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="wus" class="col-sm-4 control-label">WUS<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="wus" id="wus" value="<?php echo $r[wus];?>" placeholder="WUS"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="bumil" class="col-sm-4 control-label">Ibu Hamil<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bumil" id="bumil" value="<?php echo $r[bumil];?>" placeholder="Ibu Hamil"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="lansia" class="col-sm-4 control-label">Lansia<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="lansia" id="lansia" value="<?php echo $r[lansia];?>" placeholder="Lansia"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="buta3" class="col-sm-4 control-label">3 Buta<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="buta3" id="buta3" value="<?php echo $r[buta3];?>" placeholder="3 Buta"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="ibumenyusui" class="col-sm-4 control-label">Ibu Menyusui<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="ibumenyusui" id="ibumenyusui" value="<?php echo $r[ibumenyusui];?>" placeholder="Ibu Menyusui"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="kbk" class="col-sm-4 control-label">Berkebutuhan Khusus<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kbk" id="kbk" value="<?php echo $r[kbk];?>" placeholder="Berkebutuhan Khusus"readonly>
                     </div>
					 </div>
					
                  </div><!-- /.box-body -->
				</div>	
		
				<div class="col-md-6">
                  <div class="box-body">
				  
				  <div class="form-group">
                     <label for="datalingk" class="col-sm-5 control-label">II. Data Umum</label>
				    </div>
					
					<div class="form-group">
					 <label for="makanan" class="col-sm-4 control-label">Makanan Pokok Sehari-hari<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='makanan' readonly >
							<option><?php echo $r[makanan];?></option>
							<option value="Beras">Beras</option>							  
							<option value="Non Beras">Non Beras</option>
						</select>
                      </div>
					</div>
				
					<div class="form-group">
					<label for="jenis_makanan" class="col-sm-4 control-label">Jenis Makanan</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="jenis_makanan" value="<?php echo $r[jenis_makanan];?>" placeholder="Jenis Makanan"readonly>
                     </div>
					 </div>
				
				<div class="form-group">
					 <label for="jamban" class="col-sm-4 control-label">Mempunyai Jamban<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='jamban' readonly >
							<option><?php echo $r[jamban];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
				
				<div class="form-group">
					<label for="jlhjamban" class="col-sm-4 control-label">Jumlah Jamban<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required] form-control" name="jlhjamban" id="jlhjamban" value="<?php echo $r[jlhjamban];?>"placeholder="Jumlah Jamban"readonly>
                     </div>
					 </div>
				
				<div class="form-group">
					 <label for="sumberair" class="col-sm-4 control-label">Sumber Air Keluarga<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='sumberair' readonly >
							<option><?php echo $r[sumberair];?></option>
							<option value="PDAM">PDAM</option>							  
							<option value="Sumur">Sumur</option>
							<option value="Sungai">Sungai</option>
							<option value="Lainnya">Lainnya</option>
						</select>
                      </div>
					</div>
				
				<div class="form-group">
					 <label for="sampah" class="col-sm-4 control-label">Mempunyai Tempat Sampah<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='sampah' readonly >
							<option><?php echo $r[sampah];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="spal" class="col-sm-4 control-label">Mempunyai SPAL<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='spal'  readonly>
							<option><?php echo $r[spal];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
				
				<div class="form-group">
					 <label for="p4k" class="col-sm-4 control-label">Menempul Stiker P4K<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='p4k' readonly>
							<option><?php echo $r[p4k];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="rumah" class="col-sm-4 control-label">Kriteria Rumah<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='rumah' readonly>
							<option><?php echo $r[rumah];?></option>
							<option value="Sehat">Sehat</option>							  
							<option value="Kurang Sehat">Kurang Sehat</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="up2k" class="col-sm-4 control-label">Aktifitas UP2K<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='up2k' readonly>
							<option><?php echo $r[up2k];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="jenis_usaha" class="col-sm-4 control-label">Jenis Usaha</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="jenis_usaha" value="<?php echo $r[jenis_usaha];?>" placeholder="Jenis Usaha"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					 <label for="kes_lingk" class="col-sm-4 control-label">Aktifitas Kesehatan Lingkungan<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='kes_lingk' readonly>
							<option><?php echo $r[kes_lingk];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="pekarangan" class="col-sm-4 control-label">Pemanfaatan Pekarangan<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='pekarangan' readonly>
							<option><?php echo $r[pekarangan];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="industri" class="col-sm-4 control-label">Industri Rumah Tangga<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='industri' readonly >
							<option><?php echo $r[industri];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="bakti" class="col-sm-4 control-label">Kerja Bakti<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='bakti' readonly >
							<option><?php echo $r[bakti];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
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