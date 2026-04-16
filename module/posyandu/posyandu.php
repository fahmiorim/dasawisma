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
	$aksi = "module/posyandu/aksi_posyandu.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
		// --- LOGIKA PAGINATION & QUERY ---
		$batas = 10;
		$hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
		$posisi = ($hal - 1) * $batas;

		if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk' || $_SESSION['ses_level'] == 'admkec') {
			$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM posyandu");
			$title = "DATA PROFIL POSYANDU";
			$query_data = "SELECT * FROM posyandu ORDER BY id DESC LIMIT $batas OFFSET $posisi";
		} else {
			$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
			$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM posyandu WHERE kodekel='$kodekel'");
			$title = "DATA PROFIL POSYANDU DESA " . $_SESSION['ses_namakel'];
			$query_data = "SELECT * FROM posyandu WHERE kodekel='$kodekel' ORDER BY id DESC LIMIT $batas OFFSET $posisi";
		}

		$count_result = pg_fetch_array($count_query);
		$jmldata = $count_result['total'];
		$jmlhalaman = ceil($jmldata / $batas);
		?>

		<div class='box-header with-border'>
			<h3 class='box-title'><?php echo $title; ?></h3>
		</div>
		
		<div class='box-body'>
				<div style="text-align:right">
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>
          <a  class="btn bg-blue margin" data-toggle="tooltip" data-placement="top" title="Print Laporan" href="?module=lapposyandu" target="_blank"><i class="fa fa-print"></i> Print Laporan</a>
          <?php if ($_SESSION['ses_level'] == 'admkel') { ?>
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=posyandu&act=tambahposyandu"><i class="fa fa-send"></i> Tambah</a>
          <?php } ?>
		</div>

			<div class="table-responsive">
				<table class='table table-bordered table-striped'>
					<thead>
						<tr>
							<th width="50">No</th>
							<th>Tgl.Entry</th>
							<th>ID Posyandu</th>
							<th>Nama Posyandu</th>
							<th>Alamat</th>
							<th>Jlh Kader</th>
							<th>Strata</th>
							<th>Nama Kader</th>
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
									<td>{$lk['idposyandu']}</td>
									<td>{$lk['namaposyandu']}</td>
									<td>{$lk['alamatposyandu']}</td>
									<td>{$lk['jlhkader']}</td>
									<td>{$lk['jenis']}</td>
									<td>{$lk['namakader']}</td>
									<td>{$lk['dasawisma']}</td>
									<td>{$lk['lingkungan']}</td>
									<td>{$lk['kelurahan']}</td>
									<td>{$lk['kecamatan']}</td>
									<td>
										<a href='?module=lihatposyandu&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
										<a href='?module=editposyandu&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
										<a href='?module=hapusposyandu&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
									</td>
								</tr>";
								$no++;
							}
						} else {
							echo "<tr><td colspan='13' class='text-center'>Tidak ada data</td></tr>";
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
					echo "<li><a href='?module=posyandu&hal=1'>&laquo;</a></li>";
				}
				for ($i = $start; $i <= $end; $i++) {
					$aktif = ($i == $hal) ? "class='active'" : "";
					echo "<li $aktif><a href='?module=posyandu&hal=$i'>$i</a></li>";
				}
				if ($hal < $jmlhalaman) {
					echo "<li><a href='?module=posyandu&hal=$jmlhalaman'>&raquo;</a></li>";
				}
				?>
			</ul>
		</div>
	<?php
	 break;
	   case "tambahposyandu":
	   $a=$tgl_kode;
	  $kdkel=$_SESSION[ses_kodekel];
	  $rand4 = randpass4(3);
	 ?>
	 <section class="content-header">
		<h1 class="text-center">Form Tambah Data Profil Posyandu</h1>
	</section>
 
			<div class="box box-info" style="margin-top: 20px;">
                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=posyandu&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
				  
				    <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d');?>" >
                      </div>
					</div>
					
					<div class="form-group">
					  <label for="idposyandu" class="col-sm-4 control-label">
					  ID Posyandu <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[number]] form-control" readonly name="idposyandu" placeholder="ID Posyandu" value="<?php echo "$kdkel$a$rand4"; ?>"  >
                      </div>
					</div>
					
					<div class="form-group">
					  <label for="namaposyandu" class="col-sm-4 control-label">Nama Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namaposyandu" id="namaposyandu" placeholder="Nama Posyandu">
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="alamatposyandu" class="col-sm-4 control-label">Alamat Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <textarea type="text" class="validate[required] form-control" name="alamatposyandu" placeholder="Alamat Posyandu"></textarea>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="nosklurah" class="col-sm-4 control-label">No.SK Lurah<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="nosklurah" placeholder="No.SK Lurah">
                       </div>
					 </div>
					
					<div class="form-group">
					 <label for="jenis" class="col-sm-4 control-label">Strata Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <select class=" validate[required] form-control" name='jenis' id='jenis' >
							<option value="">Pilih</option>
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
                        <textarea type="text" class="validate[required] form-control" name="namakader" placeholder="Nama Kader Posyandu"></textarea>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="nohp" class="col-sm-4 control-label">No.HP Ketua Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="nohp" placeholder="No.HP Ketua Posyandu">
                       </div>
					 </div>
					
                    <div class="form-group">
					 <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					   <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="form-control" name="kodekel" id="kode" placeholder="Kode Kelurahan" readonly>
                       </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal8"><i class="fa fa-search"></i> Cari</button>
					</div>
					
					<div class="form-group">
					<label for="namakel" class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakel" id="nama_kel" placeholder="Nama Kelurahan" readonly>
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
                        <input type="text" class="form-control" name="namakec" id="nama_kec" placeholder="Nama Kecamatan" readonly>
                       </div>
					</div>
					 
					 
					 <div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='nama_lingkungan' id='lingkungan'>
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
                       <select class='validate[required] form-control select2' name='dasawisma' id='dasawisma'>
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
                     <label for="integrasi" class="col-sm-6 control-label">Terintegrasi dengan</label>
				    </div>
					 
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">1.PAUD</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek1" value="1" class="chk-box">
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">2.BKB</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek2" value="1" class="chk-box">
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">3.SUDUT BACA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek3" value="1" class="chk-box">
                       </div>
					 </div>
					 
					  <div class="form-group">
					  <label for="" class="col-sm-5 control-label">4.TOGA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek4" value="1" class="chk-box">
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">5.POSYANDU REMAJA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek5" value="1" class="chk-box">
                       </div>
					 </div>
					 
					  <div class="form-group">
					  <label for="" class="col-sm-5 control-label">6.POSYANDU LANSIA</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek6" value="1" class="chk-box">
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
				
		<div class="col-md-6">
             <div class="box-body">
				
				<div class="form-group">
                     <label for="sarpras" class="col-sm-6 control-label">SARANA DAN PRASARANA</label>
				    </div>
					 
					 <div class="form-group">
					 <label for="balokskdn" class="col-sm-4 control-label">Balok SKDN<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='balokskdn' id='balokskdn'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					<label for="meja" class="col-sm-4 control-label">Meja<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="meja" placeholder="Meja">
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="kursi" class="col-sm-4 control-label">Kursi<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kursi" placeholder="Kursi">
                     </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="gantung" class="col-sm-4 control-label">Timbangan Gantung<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='gantung' id='gantung'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="berdiri" class="col-sm-4 control-label">Timbangan Berdiri<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='berdiri' id='berdiri'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="kepala" class="col-sm-4 control-label">Pengukur Lingkar Kepala<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='kepala' id='kepala'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="tinggibadan" class="col-sm-4 control-label">Pengukur Tinggi Badan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="tinggibadan" id="tinggibadan" placeholder="Pengukur Tinggi Badan">
                     </div>
					 </div>
					 
					 <div class="form-group">
					 <label for="ape" class="col-sm-4 control-label">Alat Permainan Edukasi (APE)<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='ape' id='ape'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="lemari" class="col-sm-4 control-label">Lemari<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='lemari' id='lemari'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					 <label for="sound" class="col-sm-4 control-label">Sound System<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='sound' id='sound'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					 <div class="form-group">
					 <label for="tikar" class="col-sm-4 control-label">Tikar<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='tikar' id='tikar'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="pojokasi" class="col-sm-4 control-label">Pojok Asi<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='pojokasi' id='pojokasi'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="pmt" class="col-sm-4 control-label">PMT<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='pmt' id='pmt'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="seragam" class="col-sm-4 control-label">Seragam Kader Posyandu<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='seragam' id='seragam'>
							<option value="">Pilih</option>
							<option value="Ada">Ada</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
				
				 <div class="form-group">
					<label for="jlhkader" class="col-sm-4 control-label">Jumlah Kader<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhkader" id="jlhkader" placeholder="Jumlah Kader">
                     </div>
					 </div>
					
					</div><!-- /.box-body -->
				</div>	
				
					<div class="form-group">
					  <div class="col-sm-10">
                        <label for="nb" class="col-sm-8 control-label">NB: Tanda (*) Wajib Diisikan, Jika tidak ada data isikan angka 0</label>
                       </div>
					</div>
					
		<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
									<th>Kode Kelurahan</th>
                                    <th>Kelurahan</th>
                                    <th>Kode Kecamatan</th>
									<th>Kecamatan</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
									$qu = pg_query($koneksi, "SELECT * FROM kelurahan order by nama_kel");
								} else {
									$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
									$qu = pg_query($koneksi, "SELECT * FROM kelurahan where kode='$kodekel' order by nama_kel");
								}
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih8" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>" data-nama_kel="<?php echo $data['nama_kel']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>"data-nama_kec="<?php echo $data['nama_kec']; ?>">
										
										<td><?php echo $data['kode']; ?></td>
                                        <td><?php echo $data['nama_kel']; ?></td>
                                        <td><?php echo $data['kodekec']; ?></td>
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
                    <a type="submit"  href="appmaster.php?module=posyandu" name="cmposyandu" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				
