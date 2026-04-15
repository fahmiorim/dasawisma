

<script type="text/javascript">
    $(function() {
        $( "#tgldaftar" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tgldaftar" ).change(function() {
             $( "#tgldaftar" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });
    });
    </script>

	<script type="text/javascript">
    $(function() {
        $( "#tgllahir" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tgllahir" ).change(function() {
             $( "#tgllahir" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });
    });
    </script>

<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();
    $.ajax({
        url: "modul/datawarga/ambilkota.php",
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
        url: "modul/datawarga/ambilkecamatan.php",
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
        url: "modul/datawarga/ambilkelurahan.php",
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
        url: "modul/datawarga/ambilkodepos.php",
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
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
  header('location:404.php');
}
else{
	$aksi = "modul/datawarga/aksi_datawarga.php";

  $act = isset($_GET['act']) ? $_GET['act'] : '';

  switch($act){
    default:
	 $datawarga = pg_query($koneksi, "SELECT * FROM datawarga ");
		$count=pg_num_rows($datawarga);
	echo"

	";
                ?>
		<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA WARGA</h2>
				</div>
				<form method="post" name="frm">

			<div style="text-align:right">

		  <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>

          <a  class="btn bg-purple margin"  data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=datawarga&act=tambahdatawarga"><i class="fa fa-user-plus"></i> Tambah</a>

		<?php
		if($count > 0)
        {
		?>


		   <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_datawarga();" ><i class="fa fa-desktop"></i> Lihat</button>

		  <button class="btn bg-olive btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_datawarga();" ><i class="fa fa-edit"></i> Edit Data</button>
		  <button class="btn btn-danger"  title="Hapus"  data-toggle="tooltip" data-placement="top" onClick="delete_records_datawarga();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>

		<?php } ?>


                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example22' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
						<th>Tgl.Terdata</th>
						<th>No.ID</th>
						<th>No.KRT</th>
						<th>Nama KRT</th>
						<th>No.KK</th>
                        <th>NIK</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Tgl.Lahir</th>
						<th>Jenis Kelamin</th>
                        <th>Alamat Domisili</th>
                        <th>Alamat KTP</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan/Desa</th>
						<th>Kecamatan</th>
                      </tr>
                    </thead>
                  </table>
				  </div>
				  </form>
                </div>

			 </div>
	<?php
	 break;
	   case "tambahdatawarga":
	  $a=$tgl_kode;
	  $kdkel=$_SESSION[ses_kodekel];
	  $rand4 = randpass4(3);
	 ?>
	 <center><h3 class="box-title">TAMBAH DATA WARGA</h3></center>

			<div class="box box-info">

                <div class="box-header with-border">

                </div><!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="<?php echo $aksi;?>?module=datawarga&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">



					<div class="form-group">
                     <label for="datawarga" class="col-sm-4 control-label">I. Data Warga</label>
				   </div>

				  <div class="form-group">
					  <label for="tgldaftar" class="col-sm-4 control-label">Tgl.Terdata <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tgldaftar" name="tgldaftar" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang";?>" >
                      </div>
					</div>

					 <div class="form-group">
					<label for="nokrt" class="col-sm-4 control-label">No.KRT <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nokrt" id="nokrt" placeholder="nokrt" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal11"><i class="fa fa-search"></i> Cari</button>
					 </div>

				   <div class="form-group">
					  <label for="namakrt" class="col-sm-4 control-label">Nama Kepala Rumah Tangga<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namakrt" id="namakrt" placeholder="Nama Kepala Rumah Tangga" readonly>
                       </div>
					 </div>

					<div class="form-group">
					<label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					    <input type="text" class="validate[required] form-control" name="nama_lingkungan" placeholder="Lingkungan" id="nama_lingkungan" readonly>
                     </div>
					 </div>
					 <div class="form-group">
					<label for="kode" class="col-sm-4 control-label">Kode<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					    <input type="text" class="validate[required] form-control" name="kode" placeholder="Kode" id="kode" readonly>
                     </div>
					 </div>

					 <div class="form-group">
					<label for="dasawisma" class="col-sm-4 control-label">Dasawisma<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					    <input type="text" class="validate[required] form-control" name="dasawisma" placeholder="Dasa Wisma" id="nama_dasawisma" readonly>
                     </div>
					 </div>

					<div class="form-group">
					<label for="nokk" class="col-sm-4 control-label">No.KK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					    <!-- <input type="text" class="validate[required,custom[number]] form-control" name="nokk" placeholder="No.KK"> -->
					    <input type="text" class="validate[required,custom[number]] form-control" name="nokk" placeholder="No.KK" maxlength="16" minlength="16">
                     </div>
					 </div>

                    <div class="form-group">
					<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					   <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nik" placeholder="NIK" maxlength="16" minlength="16">
						<p id="demo"></p>
                     </div>
					 </div>



					 <div class="form-group">
					  <label for="nama" class="col-sm-4 control-label">Nama Warga<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama" placeholder="Nama Warga">
                       </div>
					 </div>

					<div class="form-group">
					  <label for="noid" class="col-sm-4 control-label">
					  No.ID <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[number]] form-control" readonly name="noreg" placeholder="No.ID" value="<?php echo "$kdkel$a$rand4"; ?>"  >
                      </div>
					</div>

					  <div class="form-group">
					  <label for="kriteria" class="col-sm-4 control-label">Kriteria Kader <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control select2' name='kriteria'>
						<option></option>
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
					  <label for="jabpkk" class="col-sm-4 control-label">Jabatan dalam PKK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='jabpkk' id='jabpkk'>
						<option></option>
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
							<option></option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
                      </div>
					</div>

					   <div class="form-group">
					  <label for="tempat" class="col-sm-4 control-label">Tempat Lahir<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="tempat" placeholder="Tempat Lahir">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="tgllahir" class="col-sm-4 control-label">Tgl.Lahir <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tgllahir" name="tgllahir" placeholder="YYYY-MM-DD">
                      </div>
					</div>

						<div class="form-group">
					 <label for="stskawin" class="col-sm-4 control-label">Status Perkawinan</label>
					  <div class="col-sm-5">
                        <select class="validate[required] form-control" name='stskawin'  >
							<option></option>
							<option value="Menikah">Menikah</option>
							<option value="Lajang">Lajang</option>
							<option value="Duda">Duda</option>
							<option value="Janda">Janda</option>
						</select>
                      </div>
					</div>

				   <div class="form-group">
					  <label for="stskel" class="col-sm-4 control-label">Status Dalam Keluarga <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='stskel'>
						<option></option>
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
					 <label for="agama" class="col-sm-4 control-label">Agama<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='agama' id='agama' >
							<option></option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Katholik">Katholik</option>
							<option value="Hindu">Hindu</option>
							<option value="Budha">Budha</option>
							<option value="Khonghuchu">Khonghuchu</option>
						</select>
                      </div>
					</div>


				    <div class="form-group">
					  <label for="alamat_domisili" class="col-sm-4 control-label">Alamat sesuai Domisili<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <textarea type="text" class="validate[required] form-control" name="alamat_domisili" placeholder="Alamat Domisili"></textarea>
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="alamat_ktp" class="col-sm-4 control-label">Alamat sesuai KTP</label>
					  <div class="col-sm-7">
                        <textarea type="text" class="form-control" name="alamat_ktp" placeholder="Alamat KTP"></textarea>
						<p class="text-danger">* Catatan : di isi jika alamat domisili dan alamat KTP berbeda, jika tidak kosongkan saja.</p>
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="pendidikan" class="col-sm-4 control-label">Pendidikan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control select2' name='pendidikan'>
						<option></option>
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
						<option></option>
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
							<option></option>
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>

					<div class="form-group">
					  <label for="jenisakseptor" class="col-sm-4 control-label">Jenis Akseptor <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='form-control select2' name='jenisakseptor'>
						<option></option>
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
							<option></option>
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>

					<div class="form-group">
					  <label for="frekuensi" class="col-sm-4 control-label">Frekuensi/Bulan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required] form-control" name="frekuensi" placeholder="Frekuensi/Bulan">
                       </div>
					 </div>

					 <div class="form-group">
					 <label for="bkb" class="col-sm-4 control-label">Mengikuti Program BKB<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class="validate[required] form-control" name='bkb'  >
							<option></option>
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>

					 <div class="form-group">
					 <label for="tabungan" class="col-sm-4 control-label">Memiliki Tabungan<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='tabungan'  >
							<option></option>
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>

					 <div class="form-group">
					 <label for="kelbelajar" class="col-sm-4 control-label">Mengikuti Kelompok Belajar<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='kelbelajar'  >
							<option></option>
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>


					 <div class="form-group">
					 <label for="paud" class="col-sm-4 control-label">Mengikuti PAUD/Sejenis<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='paud'  >
							<option></option>
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>

					  <div class="form-group">
					 <label for="koperasi" class="col-sm-4 control-label">Ikut Kegiatan Koperasi PKK<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='koperasi'>
							<option></option>
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>

					 <div class="form-group">
					  <label for="jenis_koperasi" class="col-sm-4 control-label">Jenis Koperasi<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="jenis_koperasi" placeholder="Jenis Koperasi">
                       </div>
					 </div>

                  </div><!-- /.box-body -->
				</div>

			<div class="col-md-6">
                  <div class="box-body">

					 <div class="form-group">
                     <label for="kegiatan" class="col-sm-4 control-label">II.Kegiatan Warga</label>
				   </div>

					 <div class="form-group">
                     <label for="p4" class="col-sm-6 control-label">1. Penghayatan dan Pengamalan Pancasila</label>
				    </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">-Pemasangan Bendera</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek1" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">-Musrenbang</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek2" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">-Kegiatan Bela Negara</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek3" value="1" class="chk-box">
                       </div>
					 </div>

					  <div class="form-group">
					  <label for="" class="col-sm-5 control-label">-Siskamling</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek4" value="1" class="chk-box">
                       </div>
					 </div>

					  <div class="form-group">
					  <label for="" class="col-sm-5 control-label">-Sosialisasi UU</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek5" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
                     <label for="kerjabakti" class="col-sm-6 control-label">2. Kerja Bakti</label>
				    </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Membersihkan Lingkungan</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek6" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Membangun Rumah Ibadah</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek7" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Penataan Lingkungan</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek8" value="1" class="chk-box">
                       </div>
					 </div>

					  <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Membantu Korban Bencana</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek9" value="1" class="chk-box">
                       </div>
					 </div>

					  <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Membantu Sarpras</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek10" value="1" class="chk-box">
                       </div>
					 </div>

					  <div class="form-group">
                     <label for="rukunkematian" class="col-sm-6 control-label">3. Rukun Kematian</label>
				    </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- STM Kematian</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek11" value="1" class="chk-box">
                       </div>
					 </div>

					  <div class="form-group">
                     <label for="keagamaan" class="col-sm-6 control-label">4. Kegiatan Keagamaan</label>
				    </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Wirid</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek12" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Pengajian</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek13" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Kebaktian Keluarga</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek14" value="1" class="chk-box">
                       </div>
					 </div>

					  <div class="form-group">
                     <label for="jimpitan" class="col-sm-6 control-label">5. Jimpitan</label>
				    </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Uang</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek15" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Beras</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek16" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Sembako</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek17" value="1" class="chk-box">
                       </div>
					 </div>

					   <div class="form-group">
                     <label for="jimpitan" class="col-sm-6 control-label">6. Arisan di PKK</label>
				    </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek18" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Desa/Kelurahan</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek19" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Lingkungan</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek20" value="1" class="chk-box">
                       </div>
					 </div>

					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">- Dasawisma</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek21" value="1" class="chk-box">
                       </div>
					 </div>
					 <!-- <div class="form-group">
                     <label for="bantuan" class="col-sm-6 control-label">7. Bantuan</label>
				    </div>

							<div class="form-group">
								<label for="penerima_bantuan" class="col-sm-4 control-label">Penerima Bantuan<span class="text-danger"> *</span></label>
								<div class="col-sm-5">
									<select class="validate[required] form-control" name='penerima_bantuan' id='penerima_bantuan'>
										<option></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="jenis_bantuan" class="col-sm-4 control-label">Jenis Bantuan</label>
								<div class="col-sm-5">
									<select class="form-control" name='jenis_bantuan' id='jenis_bantuan'>
										<option></option>
										<option value="DTKS">DTKS</option>
										<option value="Non-DTKS">Non-DTKS</option>
										<option value="PBNT">PBNT</option>
										<option value="JPS-PROVINSI">JPS-PROVINSI</option>
										<option value="BLT-DD">BLT-DD</option>
										<option value="PKH">PKH</option>
										<option value="BST">BST</option>
										<option value="PMKS">PMKS</option>
										<option value="PBI">PBI</option>
										<option value="Lainnya">Lainnya</option>
									</select>
									<p class="text-danger">* jika tidak menerima bantuan kosongkan saja.</p>
								</div>

							</div>

						 -->

					<div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="level" id="level" value="<?php echo $_SESSION['ses_level'];?>">
                       </div>
					</div>

					<div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="kodekel" id="kodekel" value="<?php echo $_SESSION['ses_kodekel'];?>">
                       </div>
					</div>

					<div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="namakel" id="namakel" value="<?php echo $_SESSION['ses_namakel'];?>">
                       </div>
					</div>

					<div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="kodekec" id="kodekec" value="<?php echo $_SESSION['ses_kodekec'];?>">
                       </div>
					</div>

					<div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="namakec" value="<?php echo $_SESSION['ses_namakec'];?>">
                       </div>
					</div>

					<div class="form-group">
                      <div class="col-sm-5">
                        <input type="hidden" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo "$jam_sekarang";?>">
                      </div>
					</div>


					  <div class="form-group">
					  <div class="col-sm-7">
                        <input type="hidden" class="form-control" name="userentry" id="userentry"value="<?php echo $_SESSION['ses_nama'];?>">
                       </div>
					  </div>



                  </div><!-- /.box-body -->
				</div>

				<div class="form-group">
						<div class="col-sm-10">
							<label for="nb" class="col-sm-8 control-label">NB: Tanda (*) Wajib Diisikan, Jika tidak ada data isikan angka 0</label>
						</div>
					</div>

		<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Kepala Rumah Tangga</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.KRT</th>
									<th>Nama Kepala Rumah Tangga</th>
									<th>Lingkungan</th>
									<th>Kode</th>
									<th>Dasawisma</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $qu = pg_query($koneksi, "SELECT * FROM datakrt where kodekel='$_SESSION[ses_kodekel]'");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih11" data-id="<?php echo $data['id']; ?>" data-nokrt="<?php echo $data['nokrt']; ?>"  data-namakrt="<?php echo $data['namakrt']; ?>"data-nama_lingkungan="<?php echo $data['nama_lingkungan']; ?>" data-nama_dasawisma="<?php echo $data['nama_dasawisma']; ?>" data-kode="<?php echo $data['kode']; ?>">

                                        <td><?php echo $data['nokrt']; ?></td>
                                        <td><?php echo $data['namakrt']; ?></td>
										<td><?php echo $data['nama_lingkungan']; ?></td>
										<td><?php echo $data['kode']; ?></td>
										<td><?php echo $data['nama_dasawisma']; ?></td>
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
                    <a type="submit"  href="appmaster.php?module=datawarga" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>



	 <?php

  }
}
?>