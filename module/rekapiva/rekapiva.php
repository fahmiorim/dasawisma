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
	$aksi = "module/rekapiva/aksi_rekapiva.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kec = pg_query($koneksi, "SELECT * FROM rekapiva where kodekec='$_SESSION[ses_kodekec]'");
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
                  <h2 class='box-title'>DATA DETEKSI DINI KANKER LEHER RAHIM DAN KANKER PAYUDARA</h2>";
                ?>
		
			<div style="text-align:right">	

			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=rekapiva&act=tambahrekapiva"><i class="fa fa-send"></i> Tambah</a> 
		  
		</div>	
			
				
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Tgl.Entry</th>
						<th>Bulan</th>
						<th>Tahun</th>
                        <th>Kel.Umur</th>
						<th>Diperiksa</th>
						<th>Normal</th>
						<th>Tumor</th>
						<th>Curiga Payudara</th>
						<th>Kanker Payudara</th>
						<th>IVA -</th>
						<th>IVA +</th>
						<th>Curiga Kanker IVA</th>
						<th>Kanker Lainnya</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = $offset + 1;
					$lingk =pg_query($koneksi, "select * from rekapiva where kodekec='$_SESSION[ses_kodekec]' order by tglentry LIMIT $limit OFFSET $offset");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo $lk['tglentry']; ?></td>
						<td><?php echo $lk['bulan']; ?></td>
						<td><?php echo $lk['tahun']; ?></td>
						<td><?php echo $lk['kelumur']; ?></td>
						<td><?php echo $lk['diperiksa']; ?></td>
						<td><?php echo $lk['normal']; ?></td>
						<td><?php echo $lk['tumor']; ?></td>
						<td><?php echo $lk['curigapayudara']; ?></td>
						<td><?php echo $lk['payudara']; ?></td>
						<td><?php echo $lk['ivanegatif']; ?></td>
						<td><?php echo $lk['ivapositif']; ?></td>
						<td><?php echo $lk['curigaiva']; ?></td>
						<td><?php echo $lk['kelainan']; ?></td>
						<td style='text-align:center'>
							<a href="?module=editrekapiva&id=<?php echo $lk['id']; ?>" class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="?module=hapusrekapiva&id=<?php echo $lk['id']; ?>" class="btn btn-danger btn-flat margin" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-remove"></i></a>
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
                      echo "<li><a href=\"?module=rekapiva&page=1\">&laquo;</a></li>";
                      echo "<li><a href=\"?module=rekapiva&page=$prev\">&lsaquo;</a></li>";
                    }
                    for($i=$start; $i<=$end; $i++){
                      $aktif = ($i == $page) ? "class=\"active\"" : "";
                      echo "<li $aktif><a href=\"?module=rekapiva&page=$i\">$i</a></li>";
                    }
                    if($page < $total_pages){
                      $next = $page + 1;
                      echo "<li><a href=\"?module=rekapiva&page=$next\">&rsaquo;</a></li>";
                      echo "<li><a href=\"?module=rekapiva&page=$total_pages\">&raquo;</a></li>";
                    }
                    ?>
                  </ul>
                  <p>Total: <?php echo $count; ?> records</p>
                </div>
              </div>
	<?php		  
	 break;
	   case "tambahrekapiva":
	  
	 ?>
	 <center><h3 class="box-title">TAMBAH DATA DETEKSI DINI KANKER LEHER RAHIM DAN KANKER PAYUDARA</h3></center>
 
			<div class="box box-info">
                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=rekapiva&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
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
					<label for="nobln" class="col-sm-4 control-label">No.Bulan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					  <input type="hidden"  id="id2" class="form-control" />
                        <input type="text" class="validate[required] form-control" name="nobln" id="nobln" placeholder="No.Bulan" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal14"><i class="fa fa-search"></i> Cari</button>
					 </div>
				  
				  <div class="form-group">
					<label for="bulan" class="col-sm-4 control-label">Nama Bulan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="bulan" id="bulan" placeholder="Bulan"readonly>
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
					 <label for="kelumur" class="col-sm-4 control-label">Kelompok Umur<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='kelumur' id='kelumur'>
							<option></option>
							<option value="Usia < 30 Tahun">Usia < 30 Tahun</option>
							<option value="Usia 30-39 Tahun">Usia 30-39 Tahun</option>
							<option value="Usia 40-50 Tahun">Usia 40-50 Tahun</option>
							<option value="Usia > 50 Tahun">Usia > 50 Tahun</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					<label for="diperiksa" class="col-sm-4 control-label">Diperiksa<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="diperiksa" placeholder="Diperiksa">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="normal" class="col-sm-4 control-label">Normal<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="normal" placeholder="Normal">
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="tumor" class="col-sm-4 control-label">Tumor/Benjolan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="tumor" placeholder="Tumor/Benjolan">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="curigapayudara" class="col-sm-4 control-label">Curiga Kanker Payudara<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="curigapayudara" placeholder="Curiga Kanker Payudara">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="payudara" class="col-sm-4 control-label">Kanker Payudara<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="payudara" placeholder="Kanker Payudara">
                     </div>
					 </div>
					 
					
					 
					</div><!-- /.box-body -->
				</div>	
				
		<div class="col-md-6">
             <div class="box-body">
				
					 <div class="form-group">
					<label for="ivanegatif" class="col-sm-4 control-label">IVA Negatif<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="ivanegatif" placeholder="IVA Negatif">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="ivapositif" class="col-sm-4 control-label">IVA Positif<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="ivapositif" placeholder="IVA Positif">
                     </div>
					 </div>
					 
					   <div class="form-group">
					<label for="curigaiva" class="col-sm-4 control-label">Curiga Kanker IVA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="curigaiva" placeholder="Curiga Kanker IVA">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="kelainan" class="col-sm-4 control-label">Kelainan Lainnya<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kelainan" placeholder="Kelainan Lainnya">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="rahim" class="col-sm-4 control-label">Kanker Leher Rahim<span class="text-danger">*</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="rahim" placeholder="Kanker Leher Rahim">
                     </div>
					 </div>

					<div class="form-group">
                     <label for="krioterapi" class="col-sm-3 control-label">Kriotrerapi</label>
				    </div>
					
					<div class="form-group">
					<label for="kriosama" class="col-sm-4 control-label">Hari yang sama<span class="text-danger">*</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kriosama" placeholder="Hari yang sama">
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="kriobeda" class="col-sm-4 control-label">Hari yang berbeda<span class="text-danger">*</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kriobeda" placeholder="Hari yang berbeda">
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
		
		<div class="modal fade" id="myModal14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:1000px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nama Bulan</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.Bulan</th>
									<th>Nama Bulan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $qu = pg_query($koneksi, "SELECT * FROM mstbulan order by nobln");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih14" data-id2="<?php echo $data['id']; ?>" data-nobln="<?php echo $data['nobln']; ?>" data-bulan="<?php echo $data['bulan']; ?>">
										
                                        <td><?php echo $data['nobln']; ?></td>
										<td><?php echo $data['bulan']; ?></td>
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
                    <a type="submit"  href="appmaster.php?module=rekapiva" name="cmrekapiva" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				