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
       window.location.href = 'appmaster.php?module=jlhpos0307list';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">LIHAT DATA POSYANDU KELURAHAN SUMBER KARYA KOTA BINJAI</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=jlhpos0307list"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from posyandu where id=".$id);
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
					  <label for="namaposyandu" class="col-sm-4 control-label">Nama Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namaposyandu" placeholder="Nama Posyandu" value="<?php echo $r[namaposyandu];?>" readonly>
                       </div>
					 </div>
					
                    <div class="form-group">
					  <label for="alamatposyandu" class="col-sm-4 control-label">Alamat Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <textarea type="text" class="validate[required] form-control" name="alamatposyandu" placeholder="Alamat Posyandu"readonly><?php echo $r[alamatposyandu];?></textarea>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="nosklurah" class="col-sm-4 control-label">No.SK Lurah<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="nosklurah" value="<?php echo $r[nosklurah];?>"placeholder="No.SK Lurah" readonly>
                       </div>
					 </div>
					
					<div class="form-group">
					 <label for="jenis" class="col-sm-4 control-label">Strata Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <select class=" validate[required] form-control" name='jenis' id='jenis' disabled>
							<option><?php echo $r[jenis];?></option>
							<option value="Pratama">Pratama</option>
							<option value="Madya">Madya</option>
							<option value="Purnama">Purnama</option>
							<option value="Mandiri">Mandiri</option>
						</select>
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="namakader" class="col-sm-4 control-label">Nama Kader Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <textarea type="text" class="validate[required] form-control" name="namakader" placeholder="Nama Kader Posyandu" disabled><?php echo $r[namakader];?></textarea>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="nohp" class="col-sm-4 control-label">No.HP Ketua Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="nohp" placeholder="No.HP Ketua Posyandu" value="<?php echo $r[nohp];?>" readonly>
                       </div>
					 </div>
					
					
                    <div class="form-group">
					 <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					   <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="form-control" name="kodekel" id="kode" placeholder="Kode Kelurahan"  value="<?php echo $r[kodekel];?>"readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakel" class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakel" id="nama_kel" placeholder="Nama Kelurahan"  value="<?php echo $r[kelurahan];?>"readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <input type="text" class="form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan"  value="<?php echo $r[kodekec];?>"readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakec" class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakec" id="nama_kec" placeholder="Nama Kecamatan"  value="<?php echo $r[kecamatan];?>"readonly>
                       </div>
					</div>
					
					
					<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='nama_lingkungan' id='lingkungan' disabled>
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
                       <select class='validate[required] form-control select2' name='dasawisma' id='dasawisma' disabled>
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
                     <label for="integrasi" class="col-sm-6 control-label">Terintegrasi dengan</label>
				    </div>
					
					 <?php if ($r['stspaud']=='1'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">1.PAUD</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek1" class="chk-box" value="1" checked disabled>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">1.PAUD</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek1" class="chk-box" value="1" disabled>
                       </div>
					 </div>
					 <?php } ?>
					 
					 <?php if ($r['stsbkb']=='1'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">2.BKB</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek2" class="chk-box" value="1" checked disabled>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">2.BKB</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek2" class="chk-box" value="1" disabled>
                       </div>
					 </div>
					  <?php } ?>
					 
					 <?php if ($r['stsbaca']=='1'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">3.SUDUT BACA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek3" class="chk-box" value="1" checked disabled>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">3.SUDUT BACA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek3" class="chk-box" value="1" disabled>
                       </div>
					 </div>
					 <?php } ?>
					 
					 <?php if ($r['ststoga']=='1'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">4.TOGA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek4" class="chk-box" value="1" checked disabled>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">4.TOGA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek4" class="chk-box" value="1" disabled>
                       </div>
					 </div>
					 <?php } ?>
					
					<?php if ($r['stsremaja']=='1'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">5.POSYANDU REMAJA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek5" class="chk-box" value="1" checked disabled>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">5.POSYANDU REMAJA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek5" class="chk-box" value="1" disabled>
                       </div>
					 </div>
					 <?php } ?>
					
					<?php if ($r['stslansia']=='1'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">6.POSYANDU LANSIA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek6" class="chk-box" value="1" checked disabled>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">6.POSYANDU LANSIA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek6" class="chk-box" value="1" disabled>
                       </div>
					 </div>
					 <?php } ?>
					
					<div class="form-group">
					<label for="userentry" class="col-sm-4 control-label">User Entry</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="userentry" id="userentry" value="<?php echo $r[userentry];?>"readonly>
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
                        <input type="text" class="form-control" name="level" id="level" value="<?php echo $r[level];?>"readonly>
                       </div>
					</div>
					
                  </div><!-- /.box-body -->
				</div>
				
				<div class="col-md-6">
					<div class="box-body">
					
					<div class="form-group">
                     <label for="sarpras" class="col-sm-6 control-label">SARANA DAN PRASARANA</label>
				    </div>
					 
					 <div class="form-group">
					 <label for="balokskdn" class="col-sm-4 control-label">Balok SKDN<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='balokskdn' id='balokskdn' disabled>
							<option><?php echo $r[balokskdn];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					<label for="meja" class="col-sm-4 control-label">Meja<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="meja" placeholder="Meja"value="<?php echo $r[meja];?>"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="kursi" class="col-sm-4 control-label">Kursi<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kursi" placeholder="Kursi"value="<?php echo $r[kursi];?>"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="gantung" class="col-sm-4 control-label">Timbangan Gantung<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='gantung' id='gantung'disabled>
							<option><?php echo $r[gantung];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="berdiri" class="col-sm-4 control-label">Timbangan Berdiri<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='berdiri' id='berdiri'disabled>
							<option><?php echo $r[berdiri];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="kepala" class="col-sm-4 control-label">Pengukur Lingkar Kepala<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='kepala' id='kepala'disabled>
							<option><?php echo $r[kepala];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="tinggibadan" class="col-sm-4 control-label">Pengukur Tinggi Badan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="tinggibadan" id="tinggibadan" placeholder="Pengukur Tinggi Badan"value="<?php echo $r[tinggibadan];?>"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="ape" class="col-sm-4 control-label">Alat Permainan Edukasi (APE)<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='ape' id='ape'disabled>
							<option><?php echo $r[ape];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="lemari" class="col-sm-4 control-label">Lemari<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='lemari' id='lemari'disabled>
							<option><?php echo $r[lemari];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="sound" class="col-sm-4 control-label">Sound System<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='sound' id='sound'disabled>
							<option><?php echo $r[sound];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					 <div class="form-group">
					 <label for="tikar" class="col-sm-4 control-label">Tikar<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='tikar' id='tikar'disabled>
							<option><?php echo $r[tikar];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="pojokasi" class="col-sm-4 control-label">Pojok Asi<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='pojokasi' id='pojokasi'disabled>
							<option><?php echo $r[pojokasi];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="pmt" class="col-sm-4 control-label">PMT<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='pmt' id='pmt'disabled>
							<option><?php echo $r[pmt];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="seragam" class="col-sm-4 control-label">Seragam Kader Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='seragam' id='seragam'disabled>
							<option><?php echo $r[seragam];?></option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					 <div class="form-group">
					<label for="jlhkader" class="col-sm-4 control-label">Jumlah Kader<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhkader" id="jlhkader" placeholder="Jumlah Kader"value="<?php echo $r[jlhkader];?>"readonly>
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