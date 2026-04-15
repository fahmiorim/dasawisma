<script type="text/javascript">
    $(function() {
        $( "#tglentry" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tglentry" ).change(function() {
             $( "#tglentry" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });
    });
    </script>

<script type="text/javascript">
function startCalc(){
	interval=setInterval("calc()",1)
	}
function calc(){
	one=document.keluarga.anggotakelpr.value;
	two=document.keluarga.anggotakelw.value;
	
	document.keluarga.anggotakel.value=(one*1)+(two*1)
	}
	function stopCalc()
	{
		clearInterval(interval)
	}
	</script>
	
<script type="text/javascript">
function startCalc2(){
	interval=setInterval("calc2()",1)
	}
function calc2(){
	tree=document.keluarga.balitapr.value;
	four=document.keluarga.balitaw.value;
	
	document.keluarga.balita.value=(tree*1)+(four*1)
	}
	function stopCalc2()
	{
		clearInterval(interval)
	}
	</script>
	
<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/keluarga2/aksi_keluarga2.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kec = pg_query($koneksi, "SELECT * FROM keluarga order by namakk");
  $count=pg_num_rows($kec);
	echo"
	
                <div class='box-header'>
                  <h2 class='box-title'>DATA KELUARGA DASAWISMA PKK KABUPATEN BATU BARA</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">

			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=keluarga2&act=tambahkeluarga2"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_keluarga2();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_keluarga2();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_keluarga2();" ><i class="fa fa-remove"></i> Hapus </button>
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
                        <th>No.KK</th>
						<th>No.KRT</th>
						<th>Kepala Rumah Tangga</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$batas = 10;
					$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
					$posisi = ($hal - 1) * $batas;
					
					$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM keluarga");
					$count_result = pg_fetch_array($count_query);
					$jmldata = $count_result['total'];
					$jmlhalaman = ceil($jmldata/$batas);
					
					$no = $posisi + 1;
					$lingk =pg_query($koneksi, "select * from keluarga order by namakk LIMIT $batas OFFSET $posisi");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $lk[nokk]"; ?></td>
						<td><?php echo" $lk[nokrt]"; ?></td>
						<td><?php echo" $lk[namakk]"; ?></td>
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
                        echo "<li><a href=\"?module=keluarga2&hal=1\">&laquo;</a></li>";
                        echo "<li><a href=\"?module=keluarga2&hal=$prev\">&lsaquo;</a></li>";
                      }
                      for($i=$start; $i<=$end; $i++){
                        $aktif = ($i == $hal) ? "class=\"active\"" : "";
                        echo "<li $aktif><a href=\"?module=keluarga2&hal=$i\">$i</a></li>";
                      }
                      if($hal < $jmlhalaman){
                        $next = $hal + 1;
                        echo "<li><a href=\"?module=keluarga2&hal=$next\">&rsaquo;</a></li>";
                        echo "<li><a href=\"?module=keluarga2&hal=$jmlhalaman\">&raquo;</a></li>";
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
	   case "tambahkeluarga2":
	  
	 ?>
	 <center><h3 class="box-title">DATA KELUARGA DASAWISMA PKK KABUPATEN BATU BARA</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=keluarga2&act=input" name="keluarga" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
				  
				    <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang";?>" >
                      </div>
					</div>
				  
                    <div class="form-group">
					<label for="nokk" class="col-sm-4 control-label">No.KK<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nokk" placeholder="No.KK">
                     </div>
					 </div>
					
					  <div class="form-group">
					<label for="noreg" class="col-sm-4 control-label">No.ID <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="noreg" id="noreg" placeholder="No.ID" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal4"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					<div class="form-group">
					  <label for="nokrt" class="col-sm-4 control-label">No.KRT<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nokrt" id="nokrt" placeholder=" No.KRT" readonly>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="namakk" class="col-sm-4 control-label">Kepala Rumah Tangga<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="namakk" id="nama" placeholder="Kepala Rumah Tangga" readonly>
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
					 
					<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='nama_lingkungan'>
						<option></option>
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
                       <select class='validate[required] form-control' name='dasawisma'>
						<option></option>
						<?php
									$lk = pg_query($koneksi, "SELECT * FROM dasawisma order by kode"); 
										while($p = pg_fetch_array($lk)){
													
											echo"
												<option value=\"$p[nama_dasawisma]\">$p[nama_dasawisma]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhkel" class="col-sm-5 control-label">I. Data Anggota Keluarga</label>
				    </div>
					
					<div class="form-group">  
					 <label for="anggotakelpr" class="col-sm-4 control-label">Laki-Laki<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="anggotakelpr" onFocus="startCalc();" onBlur="stopCalc();" placeholder="Laki-Laki">
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="anggotakelw" class="col-sm-4 control-label">Perempuan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="anggotakelw" onFocus="startCalc();" onBlur="stopCalc();" placeholder="Perempuan">
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="anggotakel" class="col-sm-4 control-label">Total<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]]  form-control" name="anggotakel" placeholder="Total" readonly >
                      </div>
					</div>
					
					<div class="form-group">
					<label for="jlhkk" class="col-sm-4 control-label">Jumlah KK<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhkk" id="jlhkk" placeholder="Jumlah KK">
                     </div>
					 </div>
					
						
					
					<div class="form-group">  
					 <label for="balita" class="col-sm-4 control-label">Jumlah Balita<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]]  form-control" name="balita" placeholder="Jumlah Balita" >
                      </div>
					</div>
					
					<div class="form-group">
					<label for="pus" class="col-sm-4 control-label">PUS<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="pus" id="pus" placeholder="PUS">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="wus" class="col-sm-4 control-label">WUS<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="wus" id="wus" placeholder="WUS">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="bumil" class="col-sm-4 control-label">Ibu Hamil<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="bumil" id="bumil" placeholder="Ibu Hamil">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="lansia" class="col-sm-4 control-label">Lansia<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="lansia" id="lansia" placeholder="Lansia">
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="buta3" class="col-sm-4 control-label">3 Buta<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="buta3" id="buta3" placeholder="3 Buta">
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="kbk" class="col-sm-4 control-label">Berkebutuhan Khusus<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kbk" id="kbk" placeholder="Berkebutuhan Khusus">
                     </div>
					 </div>
					
					<div class="form-group">
					 <label for="makanan" class="col-sm-4 control-label">Makanan Pokok Sehari-hari<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='makanan'  >
							<option></option>
							<option value="Beras">Beras</option>							  
							<option value="Non Beras">Non Beras</option>
						</select>
                      </div>
					</div>
				
					<div class="form-group">
					<label for="jenis_makanan" class="col-sm-4 control-label">Jenis Makanan</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="jenis_makanan" placeholder="Jenis Makanan">
                     </div>
					 </div>
					
					</div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-6">
                  <div class="box-body">

				<div class="form-group">
					 <label for="jamban" class="col-sm-4 control-label">Mempunyai Jamban<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='jamban'  >
							<option></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
				
				<div class="form-group">
					<label for="jlhjamban" class="col-sm-4 control-label">Jumlah Jamban<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required] form-control" name="jlhjamban" id="jlhjamban" placeholder="Jumlah Jamban">
                     </div>
					 </div>
				
				<div class="form-group">
					 <label for="sumberair" class="col-sm-4 control-label">Sumber Air Keluarga<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='sumberair'  >
							<option></option>
							<option value="PDAM">PDAM</option>							  
							<option value="Sumur">Sumur</option>
							<option value="Sungai">Sungai</option>
							<option value="Lainnya">Lainnya</option>
						</select>
                      </div>
					</div>
				
				<div class="form-group">
					 <label for="sampah" class="col-sm-4 control-label">Mempunyai Tempat Sampah<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='sampah'  >
							<option></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="spal" class="col-sm-4 control-label">Mempunyai SPAL<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='spal'  >
							<option></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
				
				<div class="form-group">
					 <label for="p4k" class="col-sm-4 control-label">Menempul Stiker P4K<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='p4k' >
							<option></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="rumah" class="col-sm-4 control-label">Kriteria Rumah<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='rumah' >
							<option></option>
							<option value="Sehat">Sehat</option>							  
							<option value="Kurang Sehat">Kurang Sehat</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="up2k" class="col-sm-4 control-label">Aktifitas UP2K<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='up2k' >
							<option></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">	
					  <label for="jenis_usaha" class="col-sm-4 control-label">Jenis Usaha UP2K <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='select2 form-control' name='jenis_usaha' id='jenis_usaha'>
						<option></option>
						<?php
									$lk = pg_query($koneksi, "SELECT * FROM mstkomoditi order by jenis_komoditi"); 
										while($p = pg_fetch_array($lk)){
													
											echo"
												<option value=\"$p[nama_komoditi]\">$p[nama_komoditi]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="kes_lingk" class="col-sm-4 control-label">Aktifitas Kesehatan Lingkungan<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='kes_lingk' >
							<option></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="pekarangan" class="col-sm-4 control-label">Pemanfaatan Pekarangan<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='pekarangan' >
							<option></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">	
					  <label for="komoditi_lahan" class="col-sm-4 control-label">Komoditi Pekarangan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='select2 form-control' name='komoditi_lahan' id='komoditi_lahan'>
						<option></option>
						<?php
									$lk = pg_query($koneksi, "SELECT * FROM mstpekarangan order by jenis_komoditi"); 
										while($p = pg_fetch_array($lk)){
													
											echo"
												<option value=\"$p[nama_komoditi]\">$p[nama_komoditi]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="industri" class="col-sm-4 control-label">Industri Rumah Tangga<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='industri' >
							<option></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
						</select>
                      </div>
					</div>
					
					<div class="form-group">	
					  <label for="komoditi_industri" class="col-sm-4 control-label">Komoditi Industri <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='select2 form-control' name='komoditi_industri' id='komoditi_industri'>
						<option></option>
						<?php
									$lk = pg_query($koneksi, "SELECT * FROM mstkomoditi order by jenis_komoditi"); 
										while($p = pg_fetch_array($lk)){
													
											echo"
												<option value=\"$p[nama_komoditi]\">$p[nama_komoditi]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="bakti" class="col-sm-4 control-label">Kerja Bakti<span class="text-danger">*</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='bakti' >
							<option></option>
							<option value="Ya">Ya</option>							  
							<option value="Tidak">Tidak</option>
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
					
		<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <th>No.ID</th>
									<th>No.KRT</th>
                                    <th>Nama</th>
									<th>Alamat</th>
									<th>Lingkungan</th>
									<th>Kelurahan</th>
									<th>Kecamatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $qu = pg_query($koneksi, "SELECT * FROM datawarga where stskel='Kepala Rumah Tangga' order by nama");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih4" data-id="<?php echo $data['id']; ?>" data-noreg="<?php echo $data['noreg']; ?>" data-nokrt="<?php echo $data['nokrt']; ?>" data-nama="<?php echo $data['nama']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-namakel="<?php echo $data['kelurahan']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>"data-namakec="<?php echo $data['kecamatan']; ?>">
										
                                        <td><?php echo $data['noreg']; ?></td>
										<td><?php echo $data['nokrt']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
										 <td><?php echo $data['alamat']; ?></td>
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
                    <a type="submit"  href="appmaster.php?module=keluarga2" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				