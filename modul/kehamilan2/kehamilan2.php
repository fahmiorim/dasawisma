<script type="text/javascript">
    $(function() {
        $( "#tglentry" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tglentry" ).change(function() {
             $( "#tglentry" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });

        // Load lingkungan based on kelurahan
        function loadLingkungan(kodekel) {
            console.log('Loading lingkungan for kodekel:', kodekel);
            $.ajax({
                url: 'ajax/lingkungan.php',
                type: 'GET',
                data: { kodekel: kodekel },
                dataType: 'json',
                success: function(data) {
                    console.log('Lingkungan data received:', data);
                    $('#lingkungan').empty();
                    $('#lingkungan').append('<option></option>');
                    $.each(data.data, function(i, item) {
                        $('#lingkungan').append('<option value="'+item.lingkungan+'">'+item.lingkungan+'</option>');
                    });
                    $('#lingkungan').prop('disabled', false);
                    $('#lingkungan').trigger('change');
                    console.log('Lingkungan dropdown enabled');
                },
                error: function(xhr, status, error) {
                    console.error('Error loading lingkungan:', error);
                    console.error('Response:', xhr.responseText);
                }
            });
        }

        // Load dasawisma based on kelurahan
        function loadDasawisma(kodekel) {
            console.log('Loading dasawisma for kodekel:', kodekel);
            $.ajax({
                url: 'ajax/dasawisma.php',
                type: 'GET',
                data: { kodekel: kodekel },
                dataType: 'json',
                success: function(data) {
                    console.log('Dasawisma data received:', data);
                    $('#dasawisma').empty();
                    $('#dasawisma').append('<option></option>');
                    $.each(data.data, function(i, item) {
                        $('#dasawisma').append('<option value="'+item.nama_dasawisma+'">'+item.nama_dasawisma+'</option>');
                    });
                    $('#dasawisma').prop('disabled', false);
                    $('#dasawisma').trigger('change');
                    console.log('Dasawisma dropdown enabled');
                },
                error: function(xhr, status, error) {
                    console.error('Error loading dasawisma:', error);
                    console.error('Response:', xhr.responseText);
                }
            });
        }

        // Handle kelurahan selection from modal
        $(document).on('click', '.pilih8', function() {
            var kodekel = $(this).data('kode');
            var nama_kel = $(this).data('nama_kel');
            var kodekec = $(this).data('kodekec');
            var nama_kec = $(this).data('nama_kec');
            var nama_lurah = $(this).data('nama_lurah');

            $('#kode').val(kodekel);
            $('#nama_kel').val(nama_kel);
            $('#kodekec').val(kodekec);
            $('#nama_kec').val(nama_kec);
            $('#nama_lurah').val(nama_lurah);

            // Load cascading dropdowns
            loadLingkungan(kodekel);
            loadDasawisma(kodekel);

            $('#myModal1').modal('hide');
        });

        // Disable lingkungan and dasawisma dropdowns by default
        $('#lingkungan').prop('disabled', true);
        $('#dasawisma').prop('disabled', true);
    });
    </script>

<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/kehamilan2/aksi_kehamilan2.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

switch($act){
    default:
    $kec = pg_query($koneksi, "SELECT * FROM kehamilan");
  $count=pg_num_rows($kec);

  // Pagination
  $batas = 10;
  $hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
  $posisi = ($hal - 1) * $batas;

  $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM kehamilan");
  $count_result = pg_fetch_array($count_query);
  $jmldata = $count_result['total'];
  $jmlhalaman = ceil($jmldata/$batas);

  // Get data with pagination
  $kec = pg_query($koneksi, "SELECT * FROM kehamilan order by lingkungan,dasawisma LIMIT $batas OFFSET $posisi");
	echo"
	

                <div class='box-header'>
                  <h2 class='box-title'>CATATAN IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL*, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">
			
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=kehamilan2&act=tambahkehamilan2"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_kehamilan2();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_kehamilan2();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_kehamilan2();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
			
				
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
						<th>Bulan</th>
						<th>Tahun</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
						<th>Lingkungan</th>
                        <th>Dasawisma</th>
						<th>Jlh Bumil</th>
						<th>Jlh Melahirkan</th>
						<th>Nifas</th>
						<th>Meninggal</th>
						<th>Jlh Bayi Lahir LK</th>
						<th>Jlh Bayi Lahir P</th>
						<th>Akte Lahir</th>
						<th>Bayi Meninggal LK</th>
						<th>Bayi Meninggal P</th>
						<th>Balita Meninggal LK</th>
						<th>Balita Meninggal P</th>
						<th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = $posisi + 1;
					while ($hml=pg_fetch_array($kec)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $hml['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
						<td><?php echo" $hml[bulan]"; ?></td>
						<td><?php echo" $hml[tahun]"; ?></td>
						<td><?php echo" $hml[kelurahan]"; ?></td>
						<td><?php echo" $hml[kecamatan]"; ?></td>
						<td><?php echo" $hml[lingkungan]"; ?></td>
                        <td><?php echo" $hml[dasawisma]"; ?></td>
						<td><?php echo" $hml[jlhbumil]"; ?></td>
						<td><?php echo" $hml[jlhmelahirkan]"; ?></td>
						<td><?php echo" $hml[jlhnifas]"; ?></td>
						<td><?php echo" $hml[jlhmeninggal]"; ?></td>
						<td><?php echo" $hml[bayilahirl]"; ?></td>
						<td><?php echo" $hml[bayilahirp]"; ?></td>
						<td><?php echo" $hml[akte]"; ?></td>
						<td><?php echo" $hml[bayimeninggalk]"; ?></td>
						<td><?php echo" $hml[bayimeninggalp]"; ?></td>
						<td><?php echo" $hml[balital]"; ?></td>
						<td><?php echo" $hml[balitap]"; ?></td>
						<td><?php echo" $hml[keterangan]"; ?></td>
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                    
                  </table>
				  <div class="box-footer clearfix">
					<ul class="pagination pagination-sm no-margin pull-right">
						<?php
						$batas_halaman = 5;
						$start = max(1, $hal - floor($batas_halaman/2));
						$end = min($jmlhalaman, $start + $batas_halaman - 1);
						if($end - $start < $batas_halaman - 1){
							$start = max(1, $end - $batas_halaman + 1);
						}
						if($hal > 1){
							$prev = $hal - 1;
							echo "<li><a href=\"?module=kehamilan2&hal=1\">&laquo;</a></li>";
							echo "<li><a href=\"?module=kehamilan2&hal=$prev\">&lsaquo;</a></li>";
						}
						for($i=$start; $i<=$end; $i++){
							$aktif = ($i == $hal) ? "class=\"active\"" : "";
							echo "<li $aktif><a href=\"?module=kehamilan2&hal=$i\">$i</a></li>";
						}
						if($hal < $jmlhalaman){
							$next = $hal + 1;
							echo "<li><a href=\"?module=kehamilan2&hal=$next\">&rsaquo;</a></li>";
							echo "<li><a href=\"?module=kehamilan2&hal=$jmlhalaman\">&raquo;</a></li>";
						}
						?>
					</ul>
				  </div>
				  </div>
				  </form>
                </div>
              </div>
	<?php		  
	 break;
	   case "tambahkehamilan2":
	  
	 ?>
	 <center><h3 class="box-title">TAMBAH CATATAN IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL*, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA</h3></center>
 
			<div class="box box-info">
                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=kehamilan2&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
				  
				    <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang";?>" >
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="bulan" class="col-sm-4 control-label">Bulan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control select2" name='bulan' id='bulan' >
							<option></option>
							<option value="Januari">Januari</option>
							<option value="Februari">Februari</option>
							<option value="Maret">Maret</option>
							<option value="April">April</option>
							<option value="Mei">Mei</option>
							<option value="Juni">Juni</option>
							<option value="Juli">Juli</option>
							<option value="Agustus">Agustus</option>
							<option value="September">September</option>
							<option value="Oktober">Oktober</option>
							<option value="November">November</option>
							<option value="Desember">Desember</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="tahun" class="col-sm-4 control-label">Tahun<span class="text-danger"> *</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="validate[required] form-control" id="tahun" name="tahun" placeholder="yyyy" value="<?php echo "$_SESSION[thnaktif]";?>">
                      </div>
					</div>
					
					<div class="form-group">
					<label for="kode" class="col-sm-4 control-label">Kode Kelurahan <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="kode" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					<div class="form-group">
					  <label for="nama_kel" class="col-sm-4 control-label">Kelurahan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_kel" id="nama_kel" placeholder="Kelurahan" readonly>
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
                        <input type="text" class="validate[required] form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="nama_kec" class="col-sm-4 control-label">Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_kec" id="nama_kec" placeholder="Kecamatan" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='nama_lingkungan' id='lingkungan' disabled>
						<option></option>
						</select>
                      </div>
					</div>

					<div class="form-group">
					  <label for="dasawisma" class="col-sm-4 control-label">Nama Dasawisma <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='dasawisma' id='dasawisma' disabled>
						<option></option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="jlhmelahirkan" class="col-sm-4 control-label">Jumlah Ibu Melahirkan<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhmelahirkan" id="jlhmelahirkan" placeholder="Ibu Melahirkan">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="jlhnifas" class="col-sm-4 control-label">Jumlah Ibu Nifas<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhnifas" id="jlhnifas" placeholder="Ibu Nifas">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="jlhmeninggal" class="col-sm-4 control-label">Jumlah Ibu Meninggal<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhmeninggal" id="jlhmeninggal" placeholder="Ibu Meninggal">
                     </div>
					 </div>
					 
					</div><!-- /.box-body -->
				</div>	
				
		<div class="col-md-6">
             <div class="box-body">
				
					
					<div class="form-group">
					<label for="bayilahirl" class="col-sm-4 control-label">Jlh Bayi Lahir LK<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bayilahirl" id="bayilahirl" placeholder="Bayi Lahir LK">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="bayilahirp" class="col-sm-4 control-label">Jlh Bayi Lahir Pr<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bayilahirp" id="bayilahirp" placeholder="Bayi Lahir Pr">
                     </div>
					 </div>
					
					<div class="form-group">
					 <label for="akte" class="col-sm-4 control-label">Akte Kelahiran</label>
					  <div class="col-sm-5">
                        <select class="form-control" name='akte' id='akte' >
							<option></option>
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="bayimeninggalk" class="col-sm-4 control-label">Bayi Meninggal LK<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bayimeninggalk" id="bayimeninggalk" placeholder="Bayi Meninggal LK">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="bayimeninggalp" class="col-sm-4 control-label">Bayi Meninggal Pr<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bayimeninggalp" id="bayimeninggalp" placeholder="Bayi Meninggal Pr">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="balital" class="col-sm-4 control-label">Balita Meninggal LK<span class="text-danger">*</span></label>
					  <div class="col-sm-5">
					    <input type="text" class="validate[required,custom[number]] form-control" name="balital" id="balital" placeholder="Balita Meninggal LK">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="balitap" class="col-sm-4 control-label">Balita Meninggal Pr<span class="text-danger">*</span></label>
					  <div class="col-sm-5">
					    <input type="text" class="validate[required,custom[number]] form-control" name="balitap" id="balitap" placeholder="Balita Meninggal Pr">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="keterangan" class="col-sm-4 control-label">Keterangan</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
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
					
		
		<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                    <tr class="pilih8" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>"  data-nama_kel="<?php echo $data['nama_kel']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>" data-nama_kec="<?php echo $data['nama_kec']; ?>" data-nama_lurah="<?php echo $data['nama_lurah']; ?>">
										
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
		
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=kehamilan2" name="cmdkehamilan" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>

	 
	 
	 <?php

			
  }
}
?>				