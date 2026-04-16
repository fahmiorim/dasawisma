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
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../../404.php');
  
}
else{
	$aksi = "module/sipkunjungan/aksi_sipkunjungan.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(!isset($_GET['id']) || $_GET['id'] == "")
{
    ?>
    <script>
         alert('Data tidak ditemukan');
       window.location.href = 'appmaster.php?module=sipkunjungan';
    </script>
    <?php
}
$id = $_GET['id'];

?>
     <center><h3 class="box-title">Lihat Data Kunjungan Posyandu</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" name="sipkunjungan" action="<?php echo $aksi;?>?module=sipkunjungan"id="popup-validation">
	<?php
		$res=pg_query($koneksi, "select * from sipkunjungan where id=".$id);
		$r=pg_fetch_array($res);
	?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
						
						<div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" name="tglentry" id="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry];?>" readonly >
                      </div>
					</div>
				  
				    <div class="form-group">
					  <label for="tahun" class="col-sm-4 control-label">Tahun <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[number]] form-control" name="tahun" placeholder="YYYY" value="<?php echo $r[tahun];?>" readonly>
                      </div>
					</div>
				  
				 <div class="form-group">
					<label for="nobln" class="col-sm-4 control-label">No.Bulan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					  <input type="hidden"  id="id2" class="form-control" />
                        <input type="text" class="validate[required] form-control" name="nobln" id="nobln" placeholder="No.Bulan" value="<?php echo $r[nobln];?>"readonly>
                      </div>
					 </div>
				  
				  <div class="form-group">
					<label for="bulan" class="col-sm-4 control-label">Nama Bulan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="bulan" id="bulan" placeholder="Bulan"value="<?php echo $r[bulan];?>" readonly>
                     </div>
					 </div>
					
					  <div class="form-group">
					<label for="idposyandu" class="col-sm-4 control-label">ID Posyandu <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <input type="text" class="validate[required] form-control" name="idposyandu" id="idposyandu" placeholder="ID Posyandu" value="<?php echo $r[idposyandu];?>" readonly>
                      </div>
					 </div>
					
					  <div class="form-group">
					<label for="namaposyandu" class="col-sm-4 control-label">Nama Posyandu <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <input type="text" class="validate[required] form-control" name="namaposyandu" id="namaposyandu" placeholder="Nama Posyandu" value="<?php echo $r[namaposyandu];?>" readonly>
                      </div>
					 </div>
					 
					 <div class="form-group">
					<label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" value="<?php echo $r[kodekel];?>" readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					  <label for="kelurahan" class="col-sm-4 control-label">Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <input type="text" class="validate[required] form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $r[kelurahan];?>" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" value="<?php echo $r[kodekec];?>"readonly>
                     </div>
					 </div>
					 
					<div class="form-group">
					<label for="kecamatan" class="col-sm-4 control-label">Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $r[kecamatan];?>" readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="lingkungan" class="col-sm-4 control-label">Lingkungan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="lingkungan" id="lingkungan" placeholder="Lingkungan" value="<?php echo $r[lingkungan];?>" readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="dasawisma" class="col-sm-4 control-label">Dasawisma<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="dasawisma" id="dasawisma" placeholder="Dasawisma" value="<?php echo $r[dasawisma];?>"readonly>
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
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitabarul12" value="<?php echo $r[balitabarul12];?>"placeholder="0-12 Bln Baru Laki-Laki"readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="balitabarup12" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitabarup12" value="<?php echo $r[balitabarup12];?>"placeholder="0-12 Bln Baru Perempuan"readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="balitalama" class="col-sm-4 control-label">- Lama</label>
				    </div>
					
					<div class="form-group">  
					 <label for="balitalamal12" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitalamal12" value="<?php echo $r[balitalamal12];?>"placeholder="0-12 Bln Lama Laki-Laki"readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="balitalamap12" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitalamap12" value="<?php echo $r[balitalamap12];?>"placeholder="0-12 Bln Lama Perempuan"readonly>
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
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitabarul5" value="<?php echo $r[balitabarul5];?>"placeholder="1-5 Thn Baru Laki-Laki"readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="balitabarup5" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitabarup5" value="<?php echo $r[balitabarup5];?>"placeholder="1-5 Thn Baru Perempuan"readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="balitalama15" class="col-sm-4 control-label">- Lama</label>
				    </div>
					
					<div class="form-group">  
					 <label for="balitalamal5" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitalamal5" value="<?php echo $r[balitalamal5];?>" placeholder="1-5 Thn Lama Laki-Laki"readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="balitalamap5" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitalamap5" value="<?php echo $r[balitalamap5];?>" placeholder="1-5 Thn Lama Perempuan"readonly>
                      </div>
					</div>
						
					<div class="form-group">
                     <label for="datawus" class="col-sm-4 control-label">WUS</label>
				    </div>
					
					<div class="form-group">  
					 <label for="wus" class="col-sm-4 control-label">Sasaran <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="wus" value="<?php echo $r[wus];?>"placeholder="Sasaran" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="wusyd" class="col-sm-4 control-label">Yang Datang <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="wusyd" value="<?php echo $r[wusyd];?>"placeholder="Yang Datang" readonly>
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
                        <input type="text" class="validate[required,custom[number]] form-control" name="pus" value="<?php echo $r[pus];?>" placeholder="Sasaran" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="pusyd" class="col-sm-4 control-label">Yang Datang <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="pusyd" value="<?php echo $r[pusyd];?>" placeholder="Yang Datang" readonly>
                      </div>
					</div>
				
				<div class="form-group">
                     <label for="datahamil" class="col-sm-4 control-label">Hamil</label>
				    </div>
				
				<div class="form-group">  
					 <label for="hamil" class="col-sm-4 control-label">Sasaran <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hamil" value="<?php echo $r[hamil];?>"placeholder="Sasaran" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="hamilyd" class="col-sm-4 control-label">Yang Datang <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hamilyd" value="<?php echo $r[hamilyd];?>" placeholder="Yang Datang" readonly>
                      </div>
					</div>
				
				<div class="form-group">
                     <label for="datamenyusui" class="col-sm-4 control-label">Menyusui</label>
				    </div>
				
				<div class="form-group">  
					 <label for="menyusui" class="col-sm-4 control-label">Sasaran <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="menyusui" value="<?php echo $r[menyusui];?>" placeholder="Sasaran" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="menyusuiyd" class="col-sm-4 control-label">Yang Datang <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="menyusuiyd" value="<?php echo $r[menyusuiyd];?>" placeholder="Yang Datang" readonly>
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
                        <input type="text" class="validate[required,custom[number]] form-control" name="kaderl" value="<?php echo $r[kaderl];?>" placeholder="Laki-Laki"readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="kaderp" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="kaderp" value="<?php echo $r[kaderp];?>" placeholder="Perempuan"readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhplkb" class="col-sm-5 control-label">PLKB</label>
				    </div>
					
					<div class="form-group">  
					 <label for="plkbl" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="plkbl" value="<?php echo $r[plkbl];?>"placeholder="Laki-Laki"readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="plkbp" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="plkbp" value="<?php echo $r[plkbp];?>"placeholder="Perempuan"readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhmedis" class="col-sm-5 control-label">Medis dan Para Medis</label>
				    </div>
					
					<div class="form-group">  
					 <label for="medisl" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="medisl" value="<?php echo $r[medisl];?>" placeholder="Laki-Laki"readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="medisp" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="medisp" value="<?php echo $r[medisp];?>"placeholder="Perempuan"readonly>
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
                        <input type="text" class="validate[required,custom[number]] form-control" name="bayil" value="<?php echo $r[bayil];?>"placeholder="Laki-Laki"readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="bayip" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="bayip" value="<?php echo $r[bayip];?>"placeholder="Perempuan"readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhmeninggal" class="col-sm-5 control-label">Meninggal</label>
				    </div>
					
					<div class="form-group">  
					 <label for="meninggalbayil" class="col-sm-4 control-label">Laki-Laki <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="meninggalbayil" value="<?php echo $r[meninggalbayil];?>"placeholder="Laki-Laki"readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="meninggalbayip" class="col-sm-4 control-label">Perempuan <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="meninggalbayip" value="<?php echo $r[meninggalbayip];?>"placeholder="Perempuan"readonly>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="userentry" class="col-sm-4 control-label">User Entry</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="userentry" id="userentry" value="<?php echo $r[userentry];?>"readonly>
                       </div>
					  </div>
					
					<div class="form-group">
					<label for="userentry" class="col-sm-4 control-label">Waktu Entry</label>
                      <div class="col-sm-4">
					   <input type="text" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo $r[waktuentry];?>"readonly>
                      </div>
					</div>
				  <div class="form-group">
					<label for="level" class="col-sm-4 control-label">Level User Entry</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="level" id="level" value="<?php echo $r[level];?>"readonly>
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
		?>
        
		
		
        <div class="form-group">
               <div class="col-sm-offset-2 col-sm-5">
               
				
				 <a class="btn btn-danger"  title="Kembali"  onclick="self.history.back()"><i class="fa fa-remove"></i>
                    Kembali
                </a>
            </div>
        </div>
		

    </form>
  </div>

	<?php
	break;
  }
}
?>