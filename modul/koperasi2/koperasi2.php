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

            $('#kode').val(kodekel);
            $('#nama_kel').val(nama_kel);
            $('#kodekec').val(kodekec);
            $('#nama_kec').val(nama_kec);

            // Load cascading dropdowns
            loadLingkungan(kodekel);
            loadDasawisma(kodekel);

            $('#myModal8').modal('hide');
        });

        // Disable lingkungan and dasawisma dropdowns by default
        $('#lingkungan').prop('disabled', true);
        $('#dasawisma').prop('disabled', true);
    });
    </script>

<?php
error_reporting(0);
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/koperasi2/aksi_koperasi2.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kec = pg_query($koneksi, "SELECT * FROM koperasi");
  $count=pg_num_rows($kec);

  // Pagination
  $limit = 10;
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  if($page < 1) $page = 1;
  $offset = ($page - 1) * $limit;
  $total_pages = ceil($count / $limit);

  // Get data with pagination
  $kec = pg_query($koneksi, "SELECT * FROM koperasi order by namakoperasi LIMIT $limit OFFSET $offset");
	echo"
	

                <div class='box-header'>
                  <h2 class='box-title'>DATA KOPERASI PKK</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">

			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=koperasi2&act=tambahkoperasi2"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_koperasi2();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_koperasi2();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_koperasi2();" ><i class="fa fa-remove"></i> Hapus </button>
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
						<th>Tgl.Entry</th>
                        <th>Nama Koperasi</th>
						<th>Jenis</th>
						<th>Status Badan Hukum</th>
						<th>Anggota LK</th>
						<th>Anggota PR</th>
						<th>Status Pengelola</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no = $offset + 1;
					while ($lk=pg_fetch_array($kec)){
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $lk[tglentry]"; ?></td>
						<td><?php echo" $lk[namakoperasi]"; ?></td>
						<td><?php echo" $lk[jenis]"; ?></td>
						<td><?php echo" $lk[stshukum]"; ?></td>
						<td><?php echo" $lk[anggotalk]"; ?></td>
						<td><?php echo" $lk[anggotapr]"; ?></td>
						<td><?php echo" $lk[stspengelola]"; ?></td>
						<td><?php echo" $lk[dasawisma]"; ?></td>
						<td><?php echo" $lk[lingkungan]"; ?></td>
						<td><?php echo" $lk[kelurahan]"; ?></td>
						<td><?php echo" $lk[kecamatan]"; ?></td>
                      </tr>
					  <?php
                $no++;
              }
              ?>
                    </tbody>
                    
                  </table>
				  </div>
				  </form>
                </div>

                <!-- Pagination -->
                <div class='box-footer'>
                  <ul class='pagination'>
                    <?php if($page > 1): ?>
                      <li><a href='?module=koperasi2&page=<?php echo $page - 1; ?>'>&laquo; Prev</a></li>
                    <?php endif; ?>

                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                      <li class='<?php echo $i == $page ? 'active' : ''; ?>'>
                        <a href='?module=koperasi2&page=<?php echo $i; ?>'><?php echo $i; ?></a>
                      </li>
                    <?php endfor; ?>

                    <?php if($page < $total_pages): ?>
                      <li><a href='?module=koperasi2&page=<?php echo $page + 1; ?>'>Next &raquo;</a></li>
                    <?php endif; ?>
                  </ul>
                  <p>Total: <?php echo $count; ?> records</p>
                </div>
              </div>
	<?php		  
	 break;
	   case "tambahkoperasi2":
	  
	 ?>
	 <center><h3 class="box-title">TAMBAH DATA KOPERASI PKK</h3></center>
 
			<div class="box box-info">
                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=koperasi2&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
				  
				    <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang";?>" >
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
					  <label for="namakoperasi" class="col-sm-4 control-label">Nama Koperasi<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namakoperasi" id="namakoperasi" placeholder="Nama Koperasi">
                       </div>
					 </div>
					 
					  <div class="form-group">
					  <label for="jeniskoperasi" class="col-sm-4 control-label">Jenis Koperasi<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="jenis" id="jenis" placeholder="Jenis Koperasi">
                       </div>
					 </div>
					 
					</div><!-- /.box-body -->
				</div>	
				
		<div class="col-md-6">
             <div class="box-body">
				
					<div class="form-group">
					 <label for="stshukum" class="col-sm-4 control-label">Status<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <select class=" validate[required] form-control" name='stshukum' id='stshukum' >
							<option></option>
							<option value="Berbadan Hukum">Berbadan Hukum</option>
							<option value="Tidak Berbadan Hukum">Tidak Berbadan Hukum</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
						<label for="jlhanggota" class="col-sm-4 control-label">Jumlah Anggota</label>
					</div>
					<div class="form-group">
					<label for="anggotalk" class="col-sm-4 control-label">Laki-Laki<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="anggotalk" id="anggotalk" placeholder="Laki-Laki">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="anggotapr" class="col-sm-4 control-label">Perempuan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="anggotapr" id="anggotapr" placeholder="Perempuan">
                     </div>
					 </div>
					
					<div class="form-group">
					 <label for="stspengelola" class="col-sm-4 control-label">Status Pengelola<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <select class=" validate[required] form-control" name='stspengelola' id='stspengelola' >
							<option>Dikelola PKK</option>
							<option value="Dikelola PKK">Dikelola PKK</option>
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
					
		<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                              
                                $qu = pg_query($koneksi, "SELECT * FROM kelurahan order by kelurahan");
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
                    <a type="submit"  href="appmaster.php?module=koperasi2" name="cmwarung" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>

	 
	 
	 <?php

			
  }
}
?>				