<script type="text/javascript">
    $(function() {
        $( "#tglentry" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tglentry" ).change(function() {
             $( "#tglentry" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });
    });
    </script>

<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	include "../../config/koneksi.php";
	$aksi = "module/sipkunjungan/aksi_sipkunjungan.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
		// --- LOGIKA PAGINATION & QUERY ---
		$batas = 10;
		$hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
		$posisi = ($hal - 1) * $batas;

		if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
			$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM sipkunjungan");
			$title = "DATA JUMLAH PENGUNJUNG/PETUGAS POSYANDU";
			$query_data = "SELECT * FROM sipkunjungan ORDER BY tahun DESC, nobln DESC LIMIT $batas OFFSET $posisi";
		} else {
			$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
			$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM sipkunjungan WHERE kodekel='$kodekel'");
			$title = "DATA JUMLAH PENGUNJUNG/PETUGAS POSYANDU DESA " . $_SESSION['ses_namakel'];
			$query_data = "SELECT * FROM sipkunjungan WHERE kodekel='$kodekel' ORDER BY tahun DESC, nobln DESC LIMIT $batas OFFSET $posisi";
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
				<a class="btn bg-purple" href="?module=sipkunjungan&act=tambahsipkunjungan"><i class="fa fa-plus"></i> Tambah</a>
			</div>

			<div class="table-responsive">
				<table class='table table-bordered table-striped'>
					<thead>
						<tr>
							<th width="50">No</th>
							<th>Bulan</th>
							<th>Tahun</th>
							<th>Nama Posyandu</th>
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
									<td>{$lk['bulan']}</td>
									<td>{$lk['tahun']}</td>
									<td>{$lk['namaposyandu']}</td>
									<td>{$lk['dasawisma']}</td>
									<td>{$lk['lingkungan']}</td>
									<td>{$lk['kelurahan']}</td>
									<td>{$lk['kecamatan']}</td>
									<td>
										<a href='?module=lihatsipkunjungan&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
										<a href='?module=editsipkunjungan&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
										<a href='?module=hapussipkunjungan&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
									</td>
								</tr>";
								$no++;
							}
						} else {
							echo "<tr><td colspan='9' class='text-center'>Tidak ada data</td></tr>";
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
					echo "<li><a href='?module=sipkunjungan&hal=1'>&laquo;</a></li>";
				}
				for ($i = $start; $i <= $end; $i++) {
					$aktif = ($i == $hal) ? "class='active'" : "";
					echo "<li $aktif><a href='?module=sipkunjungan&hal=$i'>$i</a></li>";
				}
				if ($hal < $jmlhalaman) {
					echo "<li><a href='?module=sipkunjungan&hal=$jmlhalaman'>&raquo;</a></li>";
				}
				?>
			</ul>
		</div>
	<?php
	 break;
	   case "tambahsipkunjungan":
	 ?>
	 <section class="content-header">
		<h1 class="text-center">Form Tambah Data Jumlah Pengunjung/Petugas Posyandu</h1>
	</section>
 
			<div class="box box-info" style="margin-top: 20px;">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=sipkunjungan&act=input" name="sipkunjungan" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
				  
				  <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" name="tglentry" id="tglentry" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d');?>" >
                      </div>
					</div>
				  
				    <div class="form-group">
					  <label for="tahun" class="col-sm-4 control-label">Tahun <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[number]] form-control" name="tahun" placeholder="YYYY" value="<?php echo date('Y');?>" >
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
					<label for="idposyandu" class="col-sm-4 control-label">ID Posyandu <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required] form-control" name="idposyandu" id="idposyandu" placeholder="ID Posyandu" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal12"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					  <div class="form-group">
					<label for="namaposyandu" class="col-sm-4 control-label">Nama Posyandu <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <input type="text" class="validate[required] form-control" name="namaposyandu" id="namaposyandu" placeholder="Nama Posyandu" readonly>
                      </div>
					 </div>
					 
					 <div class="form-group">
					<label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					  <label for="kelurahan" class="col-sm-4 control-label">Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <input type="text" class="validate[required] form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan"readonly>
                     </div>
					 </div>
					 
					<div class="form-group">
					<label for="kecamatan" class="col-sm-4 control-label">Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="lingkungan" class="col-sm-4 control-label">Lingkungan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="lingkungan" id="lingkungan" placeholder="Lingkungan"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="dasawisma" class="col-sm-4 control-label">Dasawisma<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="dasawisma" id="dasawisma" placeholder="Dasawisma"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
                     <label for="jlhpengunjung" class="col-sm-5 control-label">Jumlah Pengunjung</label>
				    </div>
					
					<div class="form-group">
                     <label for="balita12" class="col-sm-4 control-label">- Balita 0-12 Bln</label>
				    </div>
					
					<div class="form-group">
                     <label for="balitabaru" class="col-sm-4 control-label">- Baru</label>
				    </div>
					
					<div class="form-group">  
					 <label for="balitabarul12" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitabarul12" placeholder="0-12 Bln Baru Laki-Laki">
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="balitabarup12" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitabarup12" placeholder="0-12 Bln Baru Perempuan">
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="balitalama" class="col-sm-4 control-label">- Lama</label>
				    </div>
					
					<div class="form-group">  
					 <label for="balitalamal12" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitalamal12" placeholder="0-12 Bln Lama Laki-Laki">
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="balitalamap12" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitalamap12" placeholder="0-12 Bln Lama Perempuan">
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="balita15" class="col-sm-4 control-label">- Balita 1-5 Thn</label>
				    </div>
					
					<div class="form-group">
                     <label for="balitabaru15" class="col-sm-4 control-label">- Baru</label>
				    </div>
					
					<div class="form-group">  
					 <label for="balitabarul5" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitabarul5" placeholder="1-5 Thn Baru Laki-Laki">
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="balitabarup5" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitabarup5" placeholder="1-5 Thn Baru Perempuan">
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="balitalama15" class="col-sm-4 control-label">- Lama</label>
				    </div>
					
					<div class="form-group">  
					 <label for="balitalamal5" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitalamal5" placeholder="1-5 Thn Lama Laki-Laki">
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="balitalamap5" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitalamap5" placeholder="1-5 Thn Lama Perempuan">
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="datawus" class="col-sm-4 control-label">WUS</label>
				    </div>
					
					<div class="form-group">  
					 <label for="wus" class="col-sm-4 control-label">Sasaran <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="wus" placeholder="Sasaran">
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="wusyd" class="col-sm-4 control-label">Yang Datang <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="wusyd" placeholder="Yang Datang">
                      </div>
					</div>
					
					</div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-6">
                  <div class="box-body">
				
					<div class="form-group">
                     <label for="datapus" class="col-sm-4 control-label">PUS</label>
				    </div>
				
				<div class="form-group">  
					 <label for="pus" class="col-sm-4 control-label">Sasaran <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="pus" placeholder="Sasaran">
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="pusyd" class="col-sm-4 control-label">Yang Datang <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="pusyd" placeholder="Yang Datang">
                      </div>
					</div>
				
				<div class="form-group">
                     <label for="datahamil" class="col-sm-4 control-label">Hamil</label>
				    </div>
				
				<div class="form-group">  
					 <label for="hamil" class="col-sm-4 control-label">Sasaran <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hamil" placeholder="Sasaran">
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="hamilyd" class="col-sm-4 control-label">Yang Datang <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hamilyd" placeholder="Yang Datang">
                      </div>
					</div>
				
				<div class="form-group">
                     <label for="datamenyusui" class="col-sm-4 control-label">Menyusui</label>
				    </div>
				
				<div class="form-group">  
					 <label for="menyusui" class="col-sm-4 control-label">Sasaran <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="menyusui" placeholder="Sasaran">
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="menyusuiyd" class="col-sm-4 control-label">Yang Datang <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="menyusuiyd" placeholder="Yang Datang">
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhpetugas" class="col-sm-5 control-label">Petugas yang hadir</label>
				    </div>
					
					<div class="form-group">
                     <label for="jlhkader" class="col-sm-5 control-label">Kader</label>
				    </div>
					
					<div class="form-group">  
					 <label for="kaderl" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="kaderl" placeholder="Laki-Laki">
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="kaderp" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="kaderp" placeholder="Perempuan">
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhplkb" class="col-sm-5 control-label">PLKB</label>
				    </div>
					
					<div class="form-group">  
					 <label for="plkbl" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="plkbl" placeholder="Laki-Laki">
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="plkbp" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="plkbp" placeholder="Perempuan">
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhmedis" class="col-sm-5 control-label">Medis dan Para Medis</label>
				    </div>
					
					<div class="form-group">  
					 <label for="medisl" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="medisl" placeholder="Laki-Laki">
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="medisp" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="medisp" placeholder="Perempuan">
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhbayi" class="col-sm-5 control-label">Jumlah Bayi</label>
				    </div>
					
					<div class="form-group">
                     <label for="jlhlahir" class="col-sm-5 control-label">Yang Lahir</label>
				    </div>
					
					<div class="form-group">  
					 <label for="bayil" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="bayil" placeholder="Laki-Laki">
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="bayip" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="bayip" placeholder="Perempuan">
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhmeninggal" class="col-sm-5 control-label">Meninggal</label>
				    </div>
					
					<div class="form-group">  
					 <label for="meninggalbayil" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="meninggalbayil" placeholder="Laki-Laki">
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="meninggalbayip" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="meninggalbayip" placeholder="Perempuan">
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
					   <input type="text" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo date('H:i:s');?>"readonly>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="level" class="col-sm-4 control-label">Level User Entry</label
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
					
		<div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:1000px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Posyandu</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                     <th>ID Posyandu</th>
									<th>Nama Posyandu</th>
									<th>Kode Kel</th>
									<th>kelurahan</th>
									<th>Kode Kec</th>
									<th>Kecamatan</th>
									<th>Dasawisma</th>
									<th>Lingkungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
									$qu = pg_query($koneksi, "SELECT * FROM posyandu order by lingkungan");
								} else {
									$kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
									$qu = pg_query($koneksi, "SELECT * FROM posyandu where kodekel='$kodekel' order by lingkungan");
								}
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih12" data-id="<?php echo $data['id']; ?>" data-idposyandu="<?php echo $data['idposyandu']; ?>" data-namaposyandu="<?php echo $data['namaposyandu']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-kelurahan="<?php echo $data['kelurahan']; ?>"data-kodekec="<?php echo $data['kodekec']; ?>"data-kecamatan="<?php echo $data['kecamatan']; ?>"data-dasawisma="<?php echo $data['dasawisma']; ?>"data-lingkungan="<?php echo $data['lingkungan']; ?>">
										
                                        <td><?php echo $data['idposyandu']; ?></td>
										<td><?php echo $data['namaposyandu']; ?></td>
										<td><?php echo $data['kodekel']; ?></td>
										 <td><?php echo $data['kelurahan']; ?></td>
										 <td><?php echo $data['kodekec']; ?></td>
										 <td><?php echo $data['kecamatan']; ?></td>
										 <td><?php echo $data['dasawisma']; ?></td>
										 <td><?php echo $data['lingkungan']; ?></td>
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
                    <a type="submit"  href="appmaster.php?module=sipkunjungan" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				
