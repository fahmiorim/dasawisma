<script type="text/javascript">
    $(function() {
        $( "#tglentry" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tglentry" ).change(function() {
             $( "#tglentry" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });
    });
    </script>
<script type="text/javascript">
    $(function() {
        $( "#tglmeninggal" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tglmeninggal" ).change(function() {
             $( "#tglmeninggal" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });
    });
    </script>
<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/bumilmeninggal2/aksi_bumilmeninggal2.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kec = pg_query($koneksi, "SELECT * FROM bumilmeninggal order by tglentry desc");
  $count=pg_num_rows($kec);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA IBU HAMIL/BALITA MENINGGAL</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">
			
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=bumilmeninggal2&act=tambahbumilmeninggal2"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_bumilmeninggal2();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_bumilmeninggal2();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_bumilmeninggal2();" ><i class="fa fa-remove"></i> Hapus </button>
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
						<th>No.Reg</th>
						<th>Nama Ibu</th>
						<th>Status</th>
						<th>Tgl.Meninggal</th>
						<th>Jenis Kelamin</th>
						<th>Sebab Meninggal</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$lingk =pg_query($koneksi, "select * from bumilmeninggal order by tglentry desc");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $lk[bulan]"; ?></td>
						<td><?php echo" $lk[tahun]"; ?></td>
						<td><?php echo" $lk[noreg]"; ?></td>
						<td><?php echo" $lk[nama]"; ?></td>
						<td><?php echo" $lk[statusibu]"; ?></td>
						<td><?php echo" $lk[tglmeninggal]"; ?></td>
						<td><?php echo" $lk[jenkel]"; ?></td>
						<td><?php echo" $lk[sebabmeninggal]"; ?></td>
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
              </div>
	<?php		  
	 break;
	   case "tambahbumilmeninggal2":
	  
	 ?>
	 <center><h3 class="box-title">TAMBAH DATA IBU HAMIL/BALITA MENINGGAL</h3></center>
 
			<div class="box box-info">
                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=bumilmeninggal2&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
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
                        <select class=" validate[required] form-control" name='bulan' id='bulan' >
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
					<label for="noreg" class="col-sm-4 control-label">No.Reg <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					   <input type="hidden"  id="id" class="form-control" />
					  <input type="text" class="validate[required,custom[number]] form-control" name="noreg" id="noreg" placeholder="noreg" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal7"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					<div class="form-group">
					  <label for="nama" class="col-sm-4 control-label">Nama Ibu<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama" id="nama" placeholder="Nama Ibu" readonly>
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
					  <div class="col-sm-7">
                       <select class='validate[required] form-control' name='nama_lingkungan' id='lingkungan'readonly>
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
					  <div class="col-sm-7">
                       <select class='validate[required] form-control' name='dasawisma' id='dasawisma'readonly>
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
					 
					</div><!-- /.box-body -->
				</div>	
				
		<div class="col-md-6">
             <div class="box-body">
				
					<div class="form-group">
					  <label for="nama" class="col-sm-4 control-label">Nama Bayi/Balita</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namabayi" placeholder="Nama Bayi/Balita">
                       </div>
					 </div>
					 
					<div class="form-group">
					 <label for="statusibu" class="col-sm-4 control-label">Status Ibu/Bayi/Balita<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='statusibu' id='statusibu' >
							<option></option>
							<option value="Ibu">Ibu</option>
							<option value="Balita">Balita</option>
							<option value="Bayi">Bayi</option>
							
						</select>
                      </div>
					</div>
					
					<div class="form-group">
					 <label for="jenkel" class="col-sm-4 control-label">Jenis Kelamin Bayi/Balita<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='jenkel' id='jenkel' >
							<option></option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
							
						</select>
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="tglmeninggal" class="col-sm-4 control-label">Tgl.Meninggal <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglmeninggal" name="tglmeninggal" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang";?>" >
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="sebabmeninggal" class="col-sm-4 control-label">Sebab Meninggal <span class="text-danger"> *</span></label>
                      <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" id="sebabmeninggal" name="sebabmeninggal" placeholder="Sebab Meninggal">
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
					
		<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                              
                                $qu = pg_query($koneksi, "SELECT * FROM datawarga where jenkel='Perempuan' order by nama");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih7" data-id="<?php echo $data['id']; ?>" data-noreg="<?php echo $data['noreg']; ?>"  data-nama="<?php echo $data['nama']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-namakel="<?php echo $data['kelurahan']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>"data-namakec="<?php echo $data['kecamatan']; ?>" data-dasawisma="<?php echo $data['dasawisma']; ?>" data-lingkungan="<?php echo $data['lingkungan']; ?>">
										
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
                    <a type="submit"  href="appmaster.php?module=bumilmeninggal2" name="cmdbumilmeninggal" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				