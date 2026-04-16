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
	include "../../config/koneksi.php";
	$aksi = "module/pelatihan/aksi_pelatihan.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
		// --- LOGIKA PAGINATION & QUERY ---
		$batas = 10;
		$hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
		$posisi = ($hal - 1) * $batas;

		if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk' || $_SESSION['ses_level'] == 'admkec') {
			$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM pelatihan");
			$title = "DATA PELATIHAN";
			$query_data = "SELECT * FROM pelatihan ORDER BY id DESC LIMIT $batas OFFSET $posisi";
		} else {
			$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
			$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM pelatihan WHERE kodekel='$kodekel'");
			$title = "DATA PELATIHAN DESA " . $_SESSION['ses_namakel'];
			$query_data = "SELECT * FROM pelatihan WHERE kodekel='$kodekel' ORDER BY id DESC LIMIT $batas OFFSET $posisi";
		}

		$count_result = pg_fetch_array($count_query);
		$jmldata = $count_result['total'];
		$jmlhalaman = ceil($jmldata / $batas);
		?>

		<div class='box-header with-border'>
			<h3 class='box-title'><?php echo $title; ?></h3>
		</div>
		
		<div class='box-body'>
			<div style="text-align:right; margin-bottom:10px;">
				<a class="btn bg-green" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>
				<a class="btn bg-purple" href="?module=pelatihan&act=tambahpelatihan"><i class="fa fa-plus"></i> Tambah</a>
			</div>

			<div class="table-responsive">
				<table class='table table-bordered table-striped'>
					<thead>
						<tr>
							<th width="50">No</th>
							<th>Tgl.Entry</th>
							<th>Nama Pelatihan</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Penyelenggara</th>
							<th>Kriteria</th>
							<th>Tahun</th>
							<th>Keterangan</th>
							<th>Dasawisma</th>
							<th>Lingkungan</th>
							<th>Kelurahan</th>
							<th>Kecamatan</th>
							<th width="120">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = $posisi + 1;
						$lingk = pg_query($koneksi, $query_data);

						if (pg_num_rows($lingk) > 0) {
							while ($lk = pg_fetch_array($lingk)) {
								echo "<tr>
									<td>$no</td>
									<td>{$lk['tglentry']}</td>
									<td>{$lk['namapelatihan']}</td>
									<td>{$lk['nik']}</td>
									<td>{$lk['nama']}</td>
									<td>{$lk['penyelenggara']}</td>
									<td>{$lk['kriteria']}</td>
									<td>{$lk['tahun']}</td>
									<td>{$lk['keterangan']}</td>
									<td>{$lk['dasawisma']}</td>
									<td>{$lk['lingkungan']}</td>
									<td>{$lk['kelurahan']}</td>
									<td>{$lk['kecamatan']}</td>
									<td>
										<a href='?module=lihatpelatihan&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
										<a href='?module=editpelatihan&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
										<a href='?module=hapuspelatihan&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
									</td>
								</tr>";
								$no++;
							}
						} else {
							echo "<tr><td colspan='14' class='text-center'>Tidak ada data</td></tr>";
						}
						?>
					</tbody>

				</table>
			</div>
		</div>

		<div class="box-footer clearfix">
			<ul class="pagination pagination-sm no-margin pull-right">
				<?php
				$batas_halaman = 5;
				$start = max(1, $hal - floor($batas_halaman / 2));
				$end = min($jmlhalaman, $start + $batas_halaman - 1);

				if ($hal > 1) {
					echo "<li><a href='?module=pelatihan&hal=1'>&laquo;</a></li>";
				}
				for ($i = $start; $i <= $end; $i++) {
					$aktif = ($i == $hal) ? "class='active'" : "";
					echo "<li $aktif><a href='?module=pelatihan&hal=$i'>$i</a></li>";
				}
				if ($hal < $jmlhalaman) {
					echo "<li><a href='?module=pelatihan&hal=$jmlhalaman'>&raquo;</a></li>";
				}
				?>
			</ul>
		</div>
	<?php
	 break;
	   case "tambahpelatihan":
	  
	 ?>
	 <section class="content-header">
		<h1 class="text-center">Form Tambah Data Pelatihan</h1>
	</section>
 
			<div class="box box-info" style="margin-top: 20px;">
                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=pelatihan&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
				  
				    <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d');?>" >
                      </div>
					</div>
					
					<div class="form-group">
					  <label for="tahun" class="col-sm-4 control-label">Tahun<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="tahun" id="tahun" placeholder="Tahun">
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="pelatihan" class="col-sm-4 control-label">Nama Pelatihan<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namapelatihan" id="namapelatihan" placeholder="Nama Pelatihan">
                       </div>
					 </div>
					
					 <div class="form-group">	
					  <label for="kriteria" class="col-sm-4 control-label">Kriteria Kader <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='kriteria'>
							<option value="">Pilih</option>
							<?php
									$kr = pg_query($koneksi, "SELECT * FROM kriteria order by kode"); 
										while($p = pg_fetch_array($kr)){
											
											echo "<option value=\"{$p['nama_kriteria']}\">{$p['nama_kriteria']}</option>\n";
										}
									?>
						</select>				
                      </div>
					</div>
					
                    <div class="form-group">
					<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nik" id="nik" placeholder="NIK" readonly>
                     </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal6"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					  <div class="form-group">
					<label for="noreg" class="col-sm-4 control-label">No.Reg <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="text" class="validate[required,custom[number]] form-control" name="noreg" id="noreg" placeholder="noreg" readonly>
                      </div>
					 </div>
					
					<div class="form-group">
					  <label for="nama" class="col-sm-4 control-label">Nama<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama" id="nama" placeholder="Nama" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <input type="text" class="form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakel" class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakel" id="namakel" placeholder="Nama Kelurahan" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <input type="text" class="form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakec" class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakec" id="namakec" placeholder="Nama Kecamatan" readonly>
                       </div>
					</div>
					 
					</div><!-- /.box-body -->
				</div>	
				
		<div class="col-md-6">
             <div class="box-body">
				<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control' name='nama_lingkungan' id='lingkungan'readonly>
							<option value="">Pilih</option>
							<?php
									$lk = pg_query($koneksi, "SELECT * FROM lingkungan order by kode"); 
										while($p = pg_fetch_array($lk)){
											
											echo "<option value=\"{$p['nama_lingkungan']}\">{$p['nama_lingkungan']}</option>\n";
										}
									?>
						</select>				
                      </div>
					</div>
					
					<div class="form-group">	
					  <label for="dasawisma" class="col-sm-4 control-label">Nama Dasawisma <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control' name='dasawisma' id='dasawisma'readonly>
							<option value="">Pilih</option>
							<?php
									$lk = pg_query($koneksi, "SELECT * FROM dasawisma where kodekel='{$_SESSION['ses_kodekel']}' order by kode"); 
										while($p = pg_fetch_array($lk)){
											
											echo "<option value=\"{$p['nama_dasawisma']}\">{$p['nama_dasawisma']}</option>\n";
										}
									?>
						</select>				
                      </div>
					</div>
					
					<div class="form-group">
					  <label for="Penyelenggara" class="col-sm-4 control-label">Penyelenggara<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="penyelenggara" id="penyelenggara" placeholder="Penyelenggara">
                       </div>
					 </div>
					
					<div class="form-group">
					 <label for="keterangan" class="col-sm-4 control-label">Keterangan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <select class=" validate[required] form-control" name='keterangan' id='keterangan' >
							<option value="">Pilih</option>
							<option value="Bersertifikat">Bersertifikat</option>
							<option value="Tidak Bersertifikat">Tidak Bersertifikat</option>
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
					   <input type="text" class="form-control" name="waktuentry"  id="waktuentry" placeholder="hh:mm:ss" value="<?php echo date('H:i:s');?>"readonly>
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
					
		<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Warga</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
									<th>NIK</th>
                                    <th>No.Reg</th>
                                    <th>Nama</th>
									<th>Lingkungan</th>
									<th>Kelurahan</th>
									<th>Kecamatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
									$qu = pg_query($koneksi, "SELECT * FROM datawarga order by nik");
								} else {
									$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
									$qu = pg_query($koneksi, "SELECT * FROM datawarga where kodekel='$kodekel' order by nik");
								}
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih6" data-id="<?php echo $data['id']; ?>" data-nik="<?php echo $data['nik']; ?>"data-noreg="<?php echo $data['noreg']; ?>"  data-nama="<?php echo $data['nama']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-namakel="<?php echo $data['kelurahan']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>"data-namakec="<?php echo $data['kecamatan']; ?>" data-dasawisma="<?php echo $data['dasawisma']; ?>" data-lingkungan="<?php echo $data['lingkungan']; ?>">
										
										<td><?php echo $data['nik']; ?></td>
                                        <td><?php echo $data['noreg']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
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
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=pelatihan" name="cmpelatihan" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				
