<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/industri/aksi_industri.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=industri';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">EDIT DATA INDUSTRI RUMAH TANGGA</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=industri&act=update"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from industri where id=".$id);
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
					<label for="nokk" class="col-sm-4 control-label">No.KK<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nokk" id="nokk" placeholder="No.KK" value="<?php echo $r[nokk];?>" readonly>
                     </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal5"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					  <div class="form-group">
					<label for="noreg" class="col-sm-4 control-label">No.Reg <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="text" class="validate[required,custom[number]] form-control" name="noreg" id="noreg" placeholder="noreg" value="<?php echo $r[nokk];?>" readonly>
                      </div>
					 </div>
					
					<div class="form-group">
					  <label for="namakk" class="col-sm-4 control-label">Kepala Keluarga<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="namakk" id="namakk" placeholder="Kepala Keluarga" value="<?php echo $r[namakk];?>" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
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
					  <div class="col-sm-5">
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
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='nama_lingkungan' id='lingkungan'readonly>
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
					
                  </div><!-- /.box-body -->
				</div>	
		
				<div class="col-md-6">
                  <div class="box-body">
				  
					<div class="form-group">
                     <label for="dataindustri" class="col-sm-5 control-label">I. Data Industri Rumah Tangga</label>
				    </div>
					
					<div class="form-group">
					 <label for="kategori" class="col-sm-4 control-label">Kategori<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <select class=" validate[required] form-control" name='kategori'  >
							<option><?php echo $r[kategori];?></option>
							<option value="Sandang">Sandang</option>
							<option value="Pangan">Pangan</option>
							<option value="Konvensi">Konvensi</option>
							<option value="Jasa">Jasa</option>
							<option value="Lain-Lain">Lain-Lain</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="komoditi" class="col-sm-4 control-label">Komoditi<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					    <input type="text" class="validate[required] form-control" name="komoditi" id="komoditi" placeholder="Komoditi" value="<?php echo $r[komoditi];?>">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="jumlah" class="col-sm-4 control-label">Jumlah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jumlah" id="jumlah" value="<?php echo $r[jumlah];?>" placeholder="Jumlah">
                     </div>
					 </div>
					
					<div class="form-group">
					 <label for="satuan" class="col-sm-4 control-label">Satuan<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='satuan' id='satuan'  >
							<option><?php echo $r[satuan];?></option>
							<?php
									$lk = pg_query($koneksi, "SELECT * FROM mstsatuan order by id"); 
										while($p = pg_fetch_array($lk)){
													
											echo"
												<option value=\"$p[satuan]\">$p[satuan]</option>\n";
											}
										echo"";	
															  								  
						?>				
						</select>
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
					<label for="level" class="col-sm-4 control-label">Level User Entry</label>
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
        
		<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Keluarga</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
									<th>No.KK</th>
                                    <th>No.Reg</th>
                                    <th>Nama</th>
									<th>Lingkungan</th>
									<th>Kelurahan</th>
									<th>Kecamatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $qu = pg_query($koneksi, "SELECT * FROM keluarga where kodekel='$_SESSION[ses_kodekel]' order by namakk");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih5" data-id="<?php echo $data['id']; ?>" data-nokk="<?php echo $data['nokk']; ?>"data-noreg="<?php echo $data['noreg']; ?>"  data-namakk="<?php echo $data['namakk']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-namakel="<?php echo $data['kelurahan']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>"data-namakec="<?php echo $data['kecamatan']; ?>" data-dasawisma="<?php echo $data['dasawisma']; ?>" data-lingkungan="<?php echo $data['lingkungan']; ?>">
										
										<td><?php echo $data['nokk']; ?></td>
                                        <td><?php echo $data['noreg']; ?></td>
                                        <td><?php echo $data['namakk']; ?></td>
										 <td><?php echo $data['lingkungan']; ?></td>
										 <td><?php echo $data['kelurahan']; ?></td>
										 <td><?php echo $data['kecamatan']; ?></td>
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
                <button class="btn bg-purple btn-flat margin"  name="cmdeditindustri" title="Edit" ><i class="fa fa-pencil"></i>
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