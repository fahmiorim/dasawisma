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

     <center><h3 class="box-title">GANTI FOTO DATA WARGA</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=datawarga2&act=update2" id="popup-validation">
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
					  <label for="noreferal" class="col-sm-4 control-label">
					  No.ID <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[number]] form-control" readonly name="noreg" placeholder="No.ID" value="<?php echo $r[noreg];?>"  >
                      </div>
					</div>
				  
					 
					 <div class="form-group">
					 <label for="stsaktif" class="col-sm-4 control-label">Status Aktif<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='stsaktif'  >
							<option><?php echo $r[stsaktif];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control select2' name='nama_lingkungan'>
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
                       <select class='validate[required] form-control select2' name='kriteria'>
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
					  <label for="dasawisma" class="col-sm-4 control-label">Dasa Wisma <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control select2' name='dasawisma'>
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
                        <input type="text" class="validate[required,custom[date]] form-control" id="tgldaftar" name="tgldaftar" placeholder="YYYY-MM-DD" value="<?php echo $r[tgldaftar];?>" >
                      </div>
					</div>
					
					
					<div class="form-group">
                     <label for="datawarga" class="col-sm-4 control-label">I. Data Warga</label>
				   </div>
				   
				    <div class="form-group">	
					  <label for="stskel" class="col-sm-4 control-label">Status Keluarga <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control select2' name='stskel'>
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
					    <input type="text" class="validate[required,custom[number]] form-control" name="nokk" placeholder="No.KK" value="<?php echo $r[nokk];?>">
                     </div>
					 </div>
				   
                    <div class="form-group">
					<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nik" placeholder="NIK" value="<?php echo $r[nik];?>">
                     </div>
					 </div>
					  
					 <div class="form-group">
					  <label for="nama" class="col-sm-4 control-label">Nama Warga<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama" placeholder="Nama Warga" value="<?php echo $r[nama];?>">
                       </div>
					 </div>
				   
				   <div class="form-group">
					  <label for="tempat" class="col-sm-4 control-label">Tempat Lahir<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="tempat" placeholder="Tempat Lahir" value="<?php echo $r[tempat];?>">
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="tgllahir" class="col-sm-4 control-label">Tgl.Lahir <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tgllahir" name="tgllahir" placeholder="YYYY-MM-DD" value="<?php echo $r[tgllahir];?>">
                      </div>
					</div>
				   
				    <div class="form-group">
					  <label for="alamat" class="col-sm-4 control-label">Alamat<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <textarea type="text" class="validate[required] form-control" name="alamat" placeholder="Alamat"><?php echo $r[alamat];?></textarea>
                       </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="agama" class="col-sm-4 control-label">Agama<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='agama'  >
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
					  <label for="jabpkk" class="col-sm-4 control-label">Jabatan dalam PKK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='jabpkk' id='jabpkk'>
						<option><?php echo $r[jabpkk];?></option>
						<?php
									$kr = pg_query($koneksi, "SELECT * FROM mstjabatan order by id"); 
										while($p = pg_fetch_array($kr)){
													
											echo"
												<option value=\"$p[namajabatan]\">$p[namajabatan]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="jenkel" class="col-sm-4 control-label">Jenis Kelamin<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='jenkel'  >
							<option><?php echo $r[jenkel];?></option>
							<option value="Laki-Laki">Laki-Laki</option>							  
							<option value="Perempuan">Perempuan</option>
						</select>
                      </div>
					</div>
				
					<div class="form-group">
					 <label for="stskawin" class="col-sm-4 control-label">Status Perkawinan</label>
					  <div class="col-sm-5">
                        <select class="form-control" name='stskawin'  >
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
                       <select class='validate[required] form-control select2' name='pendidikan'>
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
					  <label for="pekerjaan" class="col-sm-4 control-label">Pekerjaan <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='pekerjaan' id='pekerjaan'>
						<option><?php echo $r[pekerjaan];?></option>
						<?php
									$kr = pg_query($koneksi, "SELECT * FROM mstpekerjaan order by id"); 
										while($p = pg_fetch_array($kr)){
													
											echo"
												<option value=\"$p[namapekerjaan]\">$p[namapekerjaan]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
										 
					 <div class="form-group">
					 <label for="akseptorkb" class="col-sm-4 control-label">Akseptor KB<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='akseptorkb'  >
							<option><?php echo $r[akseptorkb];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">	
					  <label for="jenisakseptor" class="col-sm-4 control-label">Jenis Akseptor <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='jenisakseptor'>
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
                        <select class=" validate[required] form-control" name='aktif_posyandu'  >
							<option><?php echo $r[aktif_posyandu];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					  <label for="frekuensi" class="col-sm-4 control-label">Frekuensi/Bulan</label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="frekuensi" placeholder="Frekuensi/Bulan" value="<?php echo $r[frekuensi];?>">
                       </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="bkb" class="col-sm-4 control-label">Mengikuti Program BKB<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='bkb'  >
							<option><?php echo $r[bkb];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="tabungan" class="col-sm-4 control-label">Memiliki Tabungan<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='tabungan'  >
							<option><?php echo $r[tabungan];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="kelbelajar" class="col-sm-4 control-label">Memiliki Kel.Belajar<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='kelbelajar'  >
							<option><?php echo $r[kelbelajar];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					 
					 <div class="form-group">
					 <label for="paud" class="col-sm-4 control-label">Mengikuti PAUD/Sejenis<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='paud'  >
							<option><?php echo $r[paud];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					  <div class="form-group">
					 <label for="koperasi" class="col-sm-4 control-label">Ikut Kegiatan Koperasi PKK<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='koperasi'  >
							<option><?php echo $r[koperasi];?></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					  <label for="jenis_koperasi" class="col-sm-4 control-label">Jenis Koperasi</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="jenis_koperasi" placeholder="Jenis Koperasi"value="<?php echo $r[jenis_koperasi];?>">
                       </div>
					 </div>
					
                  </div><!-- /.box-body -->
				</div>
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
			
	
		?>
        
        <div class="form-group">
            
            <div class="col-sm-offset-2 col-sm-5">
                <button class="btn bg-purple btn-flat margin"  title="Upload Foto" ><i class="fa fa-pencil"></i>
                   Upload Foto
                </button>
				
				 <a class="btn btn-danger"  title="Batal"  href="?module=datawarga2"><i class="fa fa-remove"></i>
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