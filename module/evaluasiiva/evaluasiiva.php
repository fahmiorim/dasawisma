<script type="text/javascript">
    $(function() {
        $( "#tglentry" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tglentry" ).change(function() {
             $( "#tglentry" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });
    });
    </script>

<?php
error_reporting(0);
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "module/evaluasiiva/aksi_evaluasiiva.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kec = pg_query($koneksi, "SELECT * FROM evaluasiiva where kodekec='$_SESSION[ses_kodekec]'");
  $count=pg_num_rows($kec);
  
  // Pagination
  $limit = 10;
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  if($page < 1) $page = 1;
  $offset = ($page - 1) * $limit;
  $total_pages = ceil($count / $limit);
  
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA EVALUASI PELAKSANAAN GERAKAN PENCEGAHAN DAN DETEKSI DINI KANKER</h2>";
                ?>
		
			<div style="text-align:right">	

			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=evaluasiiva&act=tambahevaluasiiva"><i class="fa fa-send"></i> Tambah</a> 
		  
		</div>	
			
				
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Tgl.Entry</th>
						<th>Tahun</th>
						<th>Jlh.Yankes</th>
                        <th>Jlh.Dokter</th>
						<th>Jlh.Bidan</th>
						<th>Jlh. Wanita Menikah</th>
						<th>BPJS Reguler</th>
						<th>PBI</th>
						<th>Jamkesda</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = $offset + 1;
					$lingk =pg_query($koneksi, "select * from evaluasiiva where kodekec='$_SESSION[ses_kodekec]' order by tglentry LIMIT $limit OFFSET $offset");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo $lk['tglentry']; ?></td>
						<td><?php echo $lk['tahun']; ?></td>
						<td><?php echo $lk['jlhyankes']; ?></td>
						<td><?php echo $lk['jlhdokter']; ?></td>
						<td><?php echo $lk['jlhbidan']; ?></td>
						<td><?php echo $lk['jlhmenikah']; ?></td>
						<td><?php echo $lk['jlhreguler']; ?></td>
						<td><?php echo $lk['jlhpbi']; ?></td>
						<td><?php echo $lk['jlhjamkesda']; ?></td>
						<td style='text-align:center'>
							<a href="?module=editevaluasiiva&id=<?php echo $lk['id']; ?>" class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="?module=hapusevaluasiiva&id=<?php echo $lk['id']; ?>" class="btn btn-danger btn-flat margin" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-remove"></i></a>
						</td>
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                    
                  </table>
				  </div>
                </div>
                
                <!-- Pagination -->
                <div class='box-footer clearfix'>
                  <ul class='pagination pagination-sm no-margin pull-right'>
                    <?php
                    $batas_halaman = 5;
                    $start = max(1, $page - floor($batas_halaman/2));
                    $end = min($total_pages, $start + $batas_halaman - 1);
                    if($end - $start < $batas_halaman - 1){
                      $start = max(1, $end - $batas_halaman + 1);
                    }
                    if($page > 1){
                      $prev = $page - 1;
                      echo "<li><a href=\"?module=evaluasiiva&page=1\">&laquo;</a></li>";
                      echo "<li><a href=\"?module=evaluasiiva&page=$prev\">&lsaquo;</a></li>";
                    }
                    for($i=$start; $i<=$end; $i++){
                      $aktif = ($i == $page) ? "class=\"active\"" : "";
                      echo "<li $aktif><a href=\"?module=evaluasiiva&page=$i\">$i</a></li>";
                    }
                    if($page < $total_pages){
                      $next = $page + 1;
                      echo "<li><a href=\"?module=evaluasiiva&page=$next\">&rsaquo;</a></li>";
                      echo "<li><a href=\"?module=evaluasiiva&page=$total_pages\">&raquo;</a></li>";
                    }
                    ?>
                  </ul>
                  <p>Total: <?php echo $count; ?> records</p>
                </div>
              </div>
	<?php		  
	 break;
	   case "tambahevaluasiiva":
	  
	 ?>
	 <center><h3 class="box-title">TAMBAH DATA EVALUASI PELAKSANAAN GERAKAN PENCEGAHAN DAN DETEKSI DINI KANKER</h3></center>
 
			<div class="box box-info">
                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=evaluasiiva&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
				  
				    <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang";?>" >
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="tahun" class="col-sm-4 control-label">Tahun <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[number]] form-control" name="tahun" placeholder="YYYY" value="<?php echo "$thn_sekarang";?>" >
                      </div>
					</div>
				  
					
                    <div class="form-group">
					 <label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					   <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" readonly>
                       </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search"></i> Cari</button>
					</div>
					
					
					<div class="form-group">
					<label for="namakec" class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakec" id="nama_kec" placeholder="Nama Kecamatan" readonly>
                       </div>
					</div>
					 
					 <div class="form-group">
					<label for="jlhyankes" class="col-sm-4 control-label">Jumlah Yankes<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhyankes" placeholder="Jumlah Yankes">
                     </div>
					 </div>
					 
					 <div class="form-group">
                     <label for="jlhtenagaiva" class="col-sm-4 control-label">Jlh.Tenaga Yang Menangani IVA</label>
				    </div>
					 
					  <div class="form-group">
					<label for="jlhdokter" class="col-sm-4 control-label">Dokter<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhdokter" placeholder="Dokter">
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="jlhbidan" class="col-sm-4 control-label">Bidan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhbidan" placeholder="Bidan">
                     </div>
					 </div>
					 
					 <div class="form-group">
                     <label for="jlhmenikah" class="col-sm-4 control-label">Jlh.Wanita Yang Sudah Menikah</label>
				    </div>
					 
					  <div class="form-group">
					<label for="jlhmenikah" class="col-sm-4 control-label">Jlh Sudah Menikah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhmenikah" placeholder="Jlh Sudah Menikah">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhreguler" class="col-sm-4 control-label">Anggota BPJS Reguler<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhreguler" placeholder="Anggota BPJS Reguler">
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="jlhpbi" class="col-sm-4 control-label">Anggota BPJS PBI<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhpbi" placeholder="Anggota BPJS PBI">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhjamkesda" class="col-sm-4 control-label">Anggota Jamkesda<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhjamkesda" placeholder="Anggota Jamkesda">
                     </div>
					 </div>
					 
					   <div class="form-group">
					<label for="sblmlounching" class="col-sm-4 control-label">Sebelum Lounching<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="sblmlounching" placeholder="Sebelum Lounching">
                     </div>
					 </div>
					 
					</div><!-- /.box-body -->
				</div>	
				
		<div class="col-md-6">
             <div class="box-body">
				
				 <div class="form-group">
                     <label for="periksaiva" class="col-sm-4 control-label">Pemeriksaan IVA</label>
				    </div>
				
				 <div class="form-group">
                     <label for="jumlahtw1" class="col-sm-4 control-label">Triwulan I</label>
				    </div>
				
					 <div class="form-group">
					<label for="jlhtw1" class="col-sm-4 control-label">Jumlah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhtw1" placeholder="Jumlah">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhivatw1" class="col-sm-4 control-label">IVA +<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhivatw1" placeholder="IVA +">
                     </div>
					 </div>
					 
					 <div class="form-group">
                     <label for="jumlahtw2" class="col-sm-4 control-label">Triwulan II</label>
				    </div>
				
					 <div class="form-group">
					<label for="jlhtw2" class="col-sm-4 control-label">Jumlah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhtw2" placeholder="Jumlah">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhivatw2" class="col-sm-4 control-label">IVA +<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhivatw2" placeholder="IVA +">
                     </div>
					 </div>

					 <div class="form-group">
                     <label for="jumlahtw3" class="col-sm-4 control-label">Triwulan III</label>
				    </div>
				
					 <div class="form-group">
					<label for="jlhtw2" class="col-sm-4 control-label">Jumlah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhtw3" placeholder="Jumlah">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhivatw3" class="col-sm-4 control-label">IVA +<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhivatw3" placeholder="IVA +">
                     </div>
					 </div>
					
					 <div class="form-group">
                     <label for="jumlahtw4" class="col-sm-4 control-label">Triwulan IV</label>
				    </div>
				
					 <div class="form-group">
					<label for="jlhtw4" class="col-sm-4 control-label">Jumlah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhtw4" placeholder="Jumlah">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhivatw4" class="col-sm-4 control-label">IVA +<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhivatw4" placeholder="IVA +">
                     </div>
					 </div>
					
					  <div class="form-group">
					<label for="jlhrujukrs" class="col-sm-4 control-label">Jlh Yang dirujuk ke RS<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhrujukrs" placeholder="Jlh Yang dirujuk ke RS">
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
					   <input type="text" class="form-control" name="waktuentry"  id="waktuentry" placeholder="hh:mm:ss" value="<?php echo "$jam_sekarang";?>"readonly>
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
					
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Kecamatan</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
									
                                    <th>Kode Kecamatan</th>
									<th>Kecamatan</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $qu = pg_query($koneksi, "SELECT * FROM kecamatan where kode='$_SESSION[ses_kodekec]' order by nama_kec");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih2" data-id="<?php echo $data['id']; ?>" data-kodekec="<?php echo $data['kode']; ?>"data-nama_kec="<?php echo $data['nama_kec']; ?>">
										
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
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=evaluasiiva" name="cmevaluasiiva" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				