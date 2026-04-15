<script type="text/javascript">
    $(function() {
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

        // Enable and load dropdowns on page load if kodekel exists
        var existingKodekel = $('#kode').val();
        if (existingKodekel) {
            loadLingkungan(existingKodekel);
            loadDasawisma(existingKodekel);
        }
    });
    </script>

<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');

}
else{
	$aksi = "modul/koperasi2/aksi_koperasi2.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=koperasi2';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">EDIT DATA KOPERASI PKK</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=koperasi2&act=update"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from koperasi where id=".$id);
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
					 <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					   <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="form-control" name="kodekel" id="kode" placeholder="Kode Kelurahan" value="<?php echo $r[kodekel];?>" readonly>
                       </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal8"><i class="fa fa-search"></i> Cari</button>
					</div>
					
					<div class="form-group">
					<label for="namakel" class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakel" id="nama_kel" placeholder="Nama Kelurahan" value="<?php echo $r[kelurahan];?>" readonly>
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
                        <input type="text" class="form-control" name="namakec" id="nama_kec" placeholder="Nama Kecamatan" value="<?php echo $r[kecamatan];?>" readonly>
                       </div>
					</div>
					 
					
					 
					 <div class="form-group">
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='nama_lingkungan' id='lingkungan' disabled>
						<option><?php echo $r[lingkungan];?></option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					  <label for="dasawisma" class="col-sm-4 control-label">Nama Dasawisma <span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                       <select class='validate[required] form-control select2' name='dasawisma' id='dasawisma' disabled>
						<option><?php echo $r[dasawisma];?></option>
						</select>
                      </div>
					</div>
					 
					  <div class="form-group">
					  <label for="namakoperasi" class="col-sm-4 control-label">Nama Koperasi<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namakoperasi" id="namakoperasi" placeholder="Nama Koperasi" value="<?php echo $r[namakoperasi];?>">
                       </div>
					 </div>
					 
					  <div class="form-group">
					  <label for="jeniskoperasi" class="col-sm-4 control-label">Jenis Koperasi<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="jenis" id="jenis" placeholder="Jenis Koperasi" value="<?php echo $r[jenis];?>">
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
							<option><?php echo $r[stshukum];?></option>
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
					    <input type="text" class="validate[required,custom[number]] form-control" name="anggotalk" id="anggotalk" placeholder="Laki-Laki" value="<?php echo $r[anggotalk];?>">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="anggotapr" class="col-sm-4 control-label">Perempuan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="anggotapr" id="anggotapr" placeholder="Perempuan"value="<?php echo $r[anggotapr];?>">
                     </div>
					 </div>
					
					<div class="form-group">
					 <label for="stspengelola" class="col-sm-4 control-label">Status Pengelola<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <select class=" validate[required] form-control" name='stspengelola' id='stspengelola' >
							<option><?php echo $r[stspengelola];?></option>
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
		
		<div class="divider"></div>
		<?php
			
		}
		?>
        
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
                              
                                $qu = pg_query($koneksi, "SELECT * FROM kelurahan  order by nama_kel");
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
		
        <div class="form-group">
               <div class="col-sm-offset-2 col-sm-5">
                <button class="btn bg-purple btn-flat margin"  name="cmdeditkoperasi" title="Edit" ><i class="fa fa-pencil"></i>
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