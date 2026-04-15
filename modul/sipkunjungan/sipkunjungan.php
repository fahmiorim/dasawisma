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
	$aksi = "modul/sipkunjungan/aksi_sipkunjungan.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kec = pg_query($koneksi, "SELECT * FROM sipkunjungan order by tahun desc");
  $count=pg_num_rows($kec);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA JUMLAH PENGUNJUNG/PETUGAS POSYANDU</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">
			
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=sipkunjungan&act=tambahsipkunjungan"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_sipkunjungan();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_sipkunjungan();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_sipkunjungan();" ><i class="fa fa-remove"></i> Hapus </button>
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
						<th>Nama Posyandu</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$lingk =pg_query($koneksi, "select * from sipkunjungan where kodekel='$_SESSION[ses_kodekel]' order by tahun desc,nobln");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $lk[bulan]"; ?></td>
						<td><?php echo" $lk[tahun]"; ?></td>
						<td><?php echo" $lk[namaposyandu]"; ?></td>
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
	   case "tambahsipkunjungan":
	  
	 ?>
	 <center><h3 class="box-title">DATA JUMLAH PENGUNJUNG/PETUGAS POSYANDU</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=sipkunjungan&act=input" name="sipkunjungan" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
				  
				  <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" name="tglentry" id="tglentry" placeholder="YYYY-MM-DD" value="<?php echo "$tgl_sekarang";?>" >
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
                              
                                $qu = pg_query($koneksi, "SELECT * FROM posyandu where kodekel='$_SESSION[ses_kodekel]' order by lingkungan");
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
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				