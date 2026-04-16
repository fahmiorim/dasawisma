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
	$aksi = "module/sipkegiatan/aksi_sipkegiatan.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(!isset($_GET['id']) || $_GET['id'] == "")
{
    ?>
    <script>
         alert('Data tidak ditemukan');
       window.location.href = 'appmaster.php?module=sipkegiatan';
    </script>
    <?php
}
$id = $_GET['id'];

?>
     <center><h3 class="box-title">Lihat Data Hasil Kegiatan Posyandu</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" name="sipkegiatan" action="<?php echo $aksi;?>?module=sipkegiatan"id="popup-validation">
	<?php
		$res=pg_query($koneksi, "select * from sipkegiatan where id=".$id);
		$r=pg_fetch_array($res);
	?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
						
						<div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" name="tglentry" id="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry];?>" readonly>
                      </div>
					</div>
				  
				    <div class="form-group">
					  <label for="tahun" class="col-sm-4 control-label">Tahun <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[number]] form-control" name="tahun" placeholder="YYYY" value="<?php echo $r[tahun];?>"readonly>
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
                        <input type="text" class="validate[required] form-control" name="idposyandu" id="idposyandu" placeholder="ID Posyandu" value="<?php echo $r[idposyandu];?>"readonly>
                      </div>
					 </div>
					
					  <div class="form-group">
					<label for="namaposyandu" class="col-sm-4 control-label">Nama Posyandu <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <input type="text" class="validate[required] form-control" name="namaposyandu" id="namaposyandu" placeholder="Nama Posyandu" value="<?php echo $r[namaposyandu];?>"readonly>
                      </div>
					 </div>
					 
					 <div class="form-group">
					<label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" value="<?php echo $r[kodekel];?>"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					  <label for="kelurahan" class="col-sm-4 control-label">Kelurahan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                        <input type="text" class="validate[required] form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $r[kelurahan];?>"readonly>
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
					    <input type="text" class="validate[required] form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan"value="<?php echo $r[kecamatan];?>"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="lingkungan" class="col-sm-4 control-label">Lingkungan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="lingkungan" id="lingkungan" placeholder="Lingkungan"value="<?php echo $r[lingkungan];?>"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="dasawisma" class="col-sm-4 control-label">Dasawisma<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="dasawisma" id="dasawisma" placeholder="Dasawisma"value="<?php echo $r[dasawisma];?>"readonly>
                     </div>
					 </div>
					
					<div class="form-group">  
					 <label for="bumil" class="col-sm-4 control-label">Jlh Ibu Hamil <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="bumil" value="<?php echo $r[bumil];?>"placeholder="Jlh Ibu Hamil" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="diperiksa" class="col-sm-4 control-label">Bumil diperiksa <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="diperiksa" value="<?php echo $r[diperiksa];?>"placeholder="Bumil diperiksa" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="fetab" class="col-sm-4 control-label">Fe Tab <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="fetab" value="<?php echo $r[fetab];?>"placeholder="Fe tab" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="menyusui" class="col-sm-4 control-label">Ibu Menyusui <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="menyusui" value="<?php echo $r[menyusui];?>"placeholder="Ibu Menyusui" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhakseptor" class="col-sm-5 control-label">Jumlah Akseptor KB</label>
				    </div>
					
					<div class="form-group">  
					 <label for="kondom" class="col-sm-4 control-label">Kondom PA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="kondom" value="<?php echo $r[kondom];?>"placeholder="Kondom" readonly> 
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="kondompb" class="col-sm-4 control-label">Kondom PB<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="kondompb" value="<?php echo $r[kondompb];?>"placeholder="Kondom PB" readonly> 
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="pil" class="col-sm-4 control-label">Pil PA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="pil" value="<?php echo $r[pil];?>"placeholder="Pil" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="pilpb" class="col-sm-4 control-label">Pil PB<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="pilpb" value="<?php echo $r[pilpb];?>"placeholder="Pil PB" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="implant" class="col-sm-4 control-label">Implant PA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="implant" value="<?php echo $r[implant];?>"placeholder="Implant" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="implantpb" class="col-sm-4 control-label">Implant PB<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="implantpb" value="<?php echo $r[implantpb];?>"placeholder="Implant PB" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="mop" class="col-sm-4 control-label">MOP PA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="mop" value="<?php echo $r[mop];?>"placeholder="MOP" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="moppb" class="col-sm-4 control-label">MOP PB<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="moppb" value="<?php echo $r[moppb];?>"placeholder="MOP PB" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="mow" class="col-sm-4 control-label">MOW PA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="mow" value="<?php echo $r[mow];?>"placeholder="MOW" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="mowpb" class="col-sm-4 control-label">MOW PB<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="mowpb" value="<?php echo $r[mowpb];?>"placeholder="MOW PB" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="iud" class="col-sm-4 control-label">IUD PA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="iud" value="<?php echo $r[iud];?>"placeholder="IUD" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="iudpb" class="col-sm-4 control-label">IUD PB<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="iudpb" value="<?php echo $r[iudpb];?>"placeholder="IUD PB" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="suntik" class="col-sm-4 control-label">Suntik PA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="suntik" value="<?php echo $r[suntik];?>"placeholder="Suntik" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="suntikpb" class="col-sm-4 control-label">Suntik PB<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="suntikpb" value="<?php echo $r[suntikpb];?>"placeholder="Suntik PB" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="lain" class="col-sm-4 control-label">Lain-Lain PA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="lain" value="<?php echo $r[lain];?>"placeholder="Lain-Lain" readonly>
                      </div>
					</div>
					
					<div class="form-group">  
					 <label for="lainpb" class="col-sm-4 control-label">Lain-Lain PB<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="lainpb" value="<?php echo $r[lainpb];?>"placeholder="Lain-Lain PB" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="jlhpenimbangan" class="col-sm-5 control-label">PENIMBANGAN BALITA</label>
				    </div>
					
					<div class="form-group">
                     <label for="jlhbalitas" class="col-sm-5 control-label">Jlh. Balita (S)</label>
				    </div>
				
				<div class="form-group">  
					 <label for="balitasl" class="col-sm-4 control-label">L<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitasl" value="<?php echo $r[balitasl];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="balitasp" class="col-sm-4 control-label">P<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitasp" value="<?php echo $r[balitasp];?>"placeholder="P" readonly>
                      </div>
					</div>
				
				<div class="form-group">
                     <label for="balitakms" class="col-sm-5 control-label">Jlh. Balita KMS(K)</label>
				    </div>
				
				<div class="form-group">  
					 <label for="balitakmsl" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitakmsl" value="<?php echo $r[balitakmsl];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="balitakmsp" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitakmsp" value="<?php echo $r[balitakmsp];?>"placeholder="P" readonly>
                      </div>
					</div>
				
				<div class="form-group">
                     <label for="balitad" class="col-sm-5 control-label">Jlh. Balita Ditimbang(D)</label>
				    </div>
				
				<div class="form-group">  
					 <label for="balitadl" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitadl" value="<?php echo $r[balitadl];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="balitadp" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitadp" value="<?php echo $r[balitadp];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="balitan" class="col-sm-5 control-label">Jlh. Balita Yang Naik(N)</label>
				    </div>
				
				<div class="form-group">  
					 <label for="balitanl" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitanl" value="<?php echo $r[balitanl];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="balitanp" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitanp" value="<?php echo $r[balitanp];?>" placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="balitavita" class="col-sm-5 control-label">Jlh. Balita Mendapat Vit.A</label>
				    </div>
				
				<div class="form-group">  
					 <label for="balitavital" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitavital" value="<?php echo $r[balitavital];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="balitavitap" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="balitavitap" value="<?php echo $r[balitavitap];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="balitapmt" class="col-sm-5 control-label">Jlh. Balita Mendapat PMT</label>
				    </div>
				
				<div class="form-group">  
					 <label for="pmtl" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="pmtl" value="<?php echo $r[pmtl];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="pmtp" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="pmtp" value="<?php echo $r[pmtp];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					
					
                  </div><!-- /.box-body -->
				</div>	
		
				<div class="col-md-6">
                  <div class="box-body">
				  
				  <div class="form-group">
                     <label for="bumiltt" class="col-sm-5 control-label">Imunisasi TT Ibu Hamil</label>
				    </div>
				
				<div class="form-group">  
					 <label for="bumiltt1" class="col-sm-4 control-label">I <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="bumiltt1" value="<?php echo $r[bumiltt1];?>"placeholder="I" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="bumiltt2" class="col-sm-4 control-label">II <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="bumiltt2" value="<?php echo $r[bumiltt2];?>"placeholder="II" readonly>
                      </div>
					</div>
				  
				<div class="form-group">
                     <label for="bcg" class="col-sm-5 control-label">BCG</label>
				    </div>
				
				<div class="form-group">  
					 <label for="bcgl" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="bcgl" value="<?php echo $r[bcgl];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="bcgp" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="bcgp" value="<?php echo $r[bcgp];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="dpt1" class="col-sm-5 control-label">DPT I</label>
				    </div>
				
				<div class="form-group">  
					 <label for="dpt1l" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="dpt1l" value="<?php echo $r[dpt1l];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="dpt1p" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="dpt1p" value="<?php echo $r[dpt1p];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="dpt2" class="col-sm-5 control-label">DPT II</label>
				    </div>
				
				<div class="form-group">  
					 <label for="dpt2l" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="dpt2l" value="<?php echo $r[dpt2l];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="dpt2p" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="dpt2p" value="<?php echo $r[dpt2p];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="dpt3" class="col-sm-5 control-label">DPT III</label>
				    </div>
				
				<div class="form-group">  
					 <label for="dpt3l" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="dpt3l" value="<?php echo $r[dpt3l];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="dpt3p" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="dpt3p" value="<?php echo $r[dpt3p];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="polio1" class="col-sm-5 control-label">POLIO I</label>
				    </div>
				
				<div class="form-group">  
					 <label for="polio1l" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="polio1l" value="<?php echo $r[polio1l];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="polio1p" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="polio1p" value="<?php echo $r[polio1p];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="polio2" class="col-sm-5 control-label">POLIO II</label>
				    </div>
				
				<div class="form-group">  
					 <label for="polio2l" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="polio2l" value="<?php echo $r[polio2l];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="polio2p" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="polio2p" value="<?php echo $r[polio2p];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="polio3" class="col-sm-5 control-label">POLIO III</label>
				    </div>
				
				<div class="form-group">  
					 <label for="polio3l" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="polio3l" value="<?php echo $r[polio3l];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="polio3p" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="polio3p" value="<?php echo $r[polio3p];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="polio4" class="col-sm-5 control-label">POLIO IV</label>
				    </div>
				
				<div class="form-group">  
					 <label for="polio4l" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="polio4l" value="<?php echo $r[polio4l];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="polio4p" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="polio4p" value="<?php echo $r[polio4p];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="campak" class="col-sm-5 control-label">CAMPAK</label>
				    </div>
				
				<div class="form-group">  
					 <label for="campakl" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="campakl" value="<?php echo $r[campakl];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="campakp" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="campakp" value="<?php echo $r[campakp];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="hepatitisb1" class="col-sm-5 control-label">HEPATITIS B I</label>
				    </div>
				
				<div class="form-group">  
					 <label for="hepatitisbl1" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hepatitisbl1" value="<?php echo $r[hepatitisbl1];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="hepatitisbp1" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hepatitisbp1" value="<?php echo $r[hepatitisbp1];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="hepatitisb2" class="col-sm-5 control-label">HEPATITIS B II</label>
				    </div>
				
				<div class="form-group">  
					 <label for="hepatitisbl2" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hepatitisbl2" value="<?php echo $r[hepatitisbl2];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="hepatitisbp2" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hepatitisbp2" value="<?php echo $r[hepatitisbp2];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="hepatitisb3" class="col-sm-5 control-label">HEPATITIS B III</label>
				    </div>
				
				<div class="form-group">  
					 <label for="hepatitisbl3" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hepatitisbl3" value="<?php echo $r[hepatitisbl3];?>"placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="hepatitisbp3" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="hepatitisbp3" value="<?php echo $r[hepatitisbp3];?>"placeholder="P" readonly>
                      </div>
					</div>
					
					<div class="form-group">
                     <label for="diare" class="col-sm-5 control-label">BALITA MENDERITA DIARE</label>
				    </div>
				
				<div class="form-group">  
					 <label for="diarel" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="diarel" value="<?php echo $r[diarel];?>" placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="diarep" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="diarep" value="<?php echo $r[diarep];?>" placeholder="P" readonly>
                      </div>
					</div>
					
						<div class="form-group">
                     <label for="oralit" class="col-sm-5 control-label">BALITA MENDAPAT ORALIT</label>
				    </div>
				
				<div class="form-group">  
					 <label for="oralitl" class="col-sm-4 control-label">L <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="oralitl" value="<?php echo $r[oralitl];?>" placeholder="L" readonly>
                      </div>
					</div>
				
				<div class="form-group">  
					 <label for="oralitp" class="col-sm-4 control-label">P <span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" name="oralitp" value="<?php echo $r[oralitp];?>" placeholder="P" readonly>
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