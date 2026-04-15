<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();
    $.ajax({
        url: "modul/datawarga2/ambilkota.php",
        data: "propinsi="+propinsi,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kota").html(msg);
        }
    });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
        url: "modul/datawarga2/ambilkecamatan.php",
        data: "kota="+kota,
        cache: false,
        success: function(msg){
            $("#kecamatan").html(msg);
        }
    });
  });
  
  $("#kecamatan").change(function(){
    var kecamatan = $("#kecamatan").val();
    $.ajax({
        url: "modul/datawarga2/ambilkelurahan.php",
        data: "kecamatan="+kecamatan,
        cache: false,
        success: function(msg){
            $("#kelurahan").html(msg);
        }
    });
  });
  
  $("#kelurahan").change(function(){
    var kelurahan = $("#kelurahan").val();
    $.ajax({
        url: "modul/datawarga2/ambilkodepos.php",
        data: "kelurahan="+kelurahan,
        cache: false,
        success: function(msg){
            $("#kodepos").html(msg);
        }
    });
  });
  
});

</script>	

<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/datawarga2/aksi_datawarga2.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=datawarga2';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = 1;

?>

     <center><h3 class="box-title">LIHAT DATA WARGA</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=datawarga2">
		<?php
			for($i=0; $i<$chkcount; $i++)
			{
				$id = $chk[$i];
				$res=pg_query($koneksi, "select * from datawarga where id=".$id);
			}	
				$r=pg_fetch_array($res);
				
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
		
			<div class="col-md-6">
                  <div class="box-body">
					
					<div class="form-group">
					<label for="nokrt" class="col-sm-4 control-label">No.KRT <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nokrt" id="nokrt" value="<?php echo $r[nokrt];?>" placeholder="nokrt" readonly>
                      </div>
					 </div>
				  
				   <div class="form-group">
					  <label for="namakrt" class="col-sm-4 control-label">Nama Kepala Rumah Tangga<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namakrt" id="namakrt" value="<?php echo $r[namakrt];?>" placeholder="Nama Kepala Rumah Tangga" readonly>
                       </div>
					 </div>
					
				 <div class="form-group">
					  <label for="noid" class="col-sm-4 control-label">
					  No.ID <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[number]] form-control" readonly name="noreg" placeholder="No.ID" value="<?php echo $r[noreg];?>"  >
                      </div>
					</div>
				  
					 
					 <div class="form-group">
					 <label for="stsaktif" class="col-sm-4 control-label">Status Aktif<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='stsaktif' disabled >
							<option><?php echo $r[stsaktif];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='nama_lingkungan'disabled>
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
					  <label for="kriteria" class="col-sm-4 control-label">Kriteria Kader <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='kriteria'disabled>
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
					<label for="kode" class="col-sm-4 control-label">Kode Kelurahan <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="kode" value="<?php echo $r[kodekel];?>" readonly>
                      </div>
					 </div>
					
					<div class="form-group">
					  <label for="nama_kel" class="col-sm-4 control-label">Kelurahan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_kel" id="nama_kel" value="<?php echo $r[kelurahan];?>" placeholder="Kelurahan" readonly>
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
					  <label for="dasawisma" class="col-sm-4 control-label">Dasa Wisma <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='dasawisma'disabled>
						<option><?php echo $r[dasawisma];?></option>
						<?php
									$lk = pg_query($koneksi, "SELECT * FROM dasawisma order by kode"); 
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
					  <label for="tgldaftar" class="col-sm-4 control-label">Tgl.Terdata <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tgldaftar" name="tgldaftar" placeholder="YYYY-MM-DD" value="<?php echo $r[tgldaftar];?>" readonly>
                      </div>
					</div>
					
					
					
					<div class="form-group">
                     <label for="datawarga" class="col-sm-4 control-label">I. Data Warga</label>
				   </div>
				   
				   <div class="form-group">	
					  <label for="stskel" class="col-sm-4 control-label">Status Keluarga <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control select2' name='stskel' disabled>
						<option><?php echo $r[stskel];?></option>
						<?php
									$kr = pg_query($koneksi, "SELECT * FROM mstkeluarga order by id"); 
										while($p = pg_fetch_array($kr)){
													
											echo"
												<option value=\"$p[stskeluarga]\">$p[stskeluarga]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
				   
				   
				   <div class="form-group">
					<label for="nokk" class="col-sm-4 control-label">No.KK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					    <input type="text" class="validate[required,custom[number]] form-control" name="nokk" placeholder="No.KK" value="<?php echo $r[nokk];?>"readonly>
                     </div>
					 </div>
				   
                    <div class="form-group">
					<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nik" placeholder="NIK" value="<?php echo $r[nik];?>"readonly>
                     </div>
					 </div>
					  
					 <div class="form-group">
					  <label for="nama" class="col-sm-4 control-label">Nama Warga<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama" placeholder="Nama Warga" value="<?php echo $r[nama];?>"readonly>
                       </div>
					 </div>
				   
				   <div class="form-group">
					  <label for="tempat" class="col-sm-4 control-label">Tempat Lahir<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="tempat" placeholder="Tempat Lahir" value="<?php echo $r[tempat];?>"readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="tgllahir" class="col-sm-4 control-label">Tgl.Lahir <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tgllahir" name="tgllahir" placeholder="YYYY-MM-DD" value="<?php echo $r[tgllahir];?>"readonly>
                      </div>
					</div>
				   
				    <div class="form-group">
					  <label for="alamat" class="col-sm-4 control-label">Alamat<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <textarea type="text" class="validate[required] form-control" name="alamat" placeholder="Alamat"readonly><?php echo $r[alamat];?></textarea>
                       </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="agama" class="col-sm-4 control-label">Agama<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='agama' disabled >
							<option><?php echo $r[agama];?></option>
							<option value="Islam">Islam</option>				  
							<option value="Kristen">Kristen</option>
							<option value="Katholik">Katholik</option>
							<option value="Hindu">Hindu</option>
							<option value="Budha">Budha</option>
							<option value="Khonghuchu">Khonghuchu</option>
						</select>
                      </div>
					</div>
					
                  </div><!-- /.box-body -->
				</div>	
				
			<div class="col-md-6">
                  <div class="box-body">
					
					<div class="form-group">
					  <label for="jabpkk" class="col-sm-4 control-label">Jabatan dalam PKK<span class="text-danger">*</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="jabpkk" placeholder="Jabatan dalam PKK" value="<?php echo $r[jabpkk];?>"readonly>
                       </div>
					 </div>
					 	
					<div class="form-group">
					 <label for="jenkel" class="col-sm-4 control-label">Jenis Kelamin<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='jenkel' disabled >
							<option><?php echo $r[jenkel];?></option>
							<option value="Laki-Laki">Laki-Laki</option>							  
							<option value="Perempuan">Perempuan</option>
						</select>
                      </div>
					</div>
				
					<div class="form-group">
					 <label for="stskawin" class="col-sm-4 control-label">Status Perkawinan</label>
					  <div class="col-sm-5">
                        <select class="form-control" name='stskawin' disabled >
							<option><?php echo $r[stskawin];?></option>
							<option value="Menikah">Menikah</option>							  
							<option value="Lajang">Lajang</option>
							<option value="Duda">Duda</option>
							<option value="Janda">Janda</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">	
					  <label for="pendidikan" class="col-sm-4 control-label">Pendidikan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control select2' name='pendidikan' disabled>
						<option><?php echo $r[pendidikan];?></option>
						<?php
									$kr = pg_query($koneksi, "SELECT * FROM mstpendidikan order by id"); 
										while($p = pg_fetch_array($kr)){
													
											echo"
												<option value=\"$p[namapendidikan]\">$p[namapendidikan]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					 
					  <div class="form-group">
					  <label for="pekerjaan" class="col-sm-4 control-label">Pekerjaan</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo $r[pekerjaan];?>"readonly>
                       </div>
					 </div>
					
					 <div class="form-group">
					 <label for="akseptorkb" class="col-sm-4 control-label">Akseptor KB<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='akseptorkb' disabled >
							<option><?php echo $r[akseptorkb];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">	
					  <label for="jenisakseptor" class="col-sm-4 control-label">Jenis Akseptor <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='jenisakseptor' disabled>
						<option><?php echo $r[jenisakseptor];?></option>
						<?php
									$kr = pg_query($koneksi, "SELECT * FROM akseptorkb order by id"); 
										while($p = pg_fetch_array($kr)){
													
											echo"
												<option value=\"$p[jenisakseptorkb]\">$p[jenisakseptorkb]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					
					
					<div class="form-group">
					 <label for="aktif_posyandu" class="col-sm-4 control-label">Aktif Kegiatan Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='aktif_posyandu' disabled >
							<option><?php echo $r[aktif_posyandu];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					  <label for="frekuensi" class="col-sm-4 control-label">Frekuensi/Bulan</label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="frekuensi" placeholder="Frekuensi/Bulan" value="<?php echo $r[frekuensi];?>"readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="bkb" class="col-sm-4 control-label">Mengikuti Program BKB<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='bkb' disabled>
							<option><?php echo $r[bkb];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="tabungan" class="col-sm-4 control-label">Memiliki Tabungan<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='tabungan' disabled>
							<option><?php echo $r[tabungan];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="kelbelajar" class="col-sm-4 control-label">Memiliki Kel.Belajar<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='kelbelajar' disabled>
							<option><?php echo $r[kelbelajar];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 
					 <div class="form-group">
					 <label for="paud" class="col-sm-4 control-label">Mengikuti PAUD/Sejenis<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='paud' disabled>
							<option><?php echo $r[paud];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					  <div class="form-group">
					 <label for="koperasi" class="col-sm-4 control-label">Ikut Kegiatan Koperasi PKK<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='koperasi' disabled>
							<option><?php echo $r[koperasi];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					  <label for="jenis_koperasi" class="col-sm-4 control-label">Jenis Koperasi</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="jenis_koperasi" placeholder="Jenis Koperasi"value="<?php echo $r[jenis_koperasi];?>" readonly>
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
			</div>
			
				
			
		<div class="divider"></div>
		<?php
			
	
		?>
        
        <div class="form-group">
            
            <div class="col-sm-offset-2 col-sm-5">
                
				
				 <a class="btn btn-danger"  title="Kembali"  href="?module=datawarga2"><i class="fa fa-remove"></i>
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